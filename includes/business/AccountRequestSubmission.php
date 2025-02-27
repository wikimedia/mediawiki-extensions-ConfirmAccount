<?php

use MediaWiki\Extension\ConfirmAccount\HookRunner;
use MediaWiki\MediaWikiServices;

class AccountRequestSubmission {
	/* User making the request */
	protected $requester;
	/* Copy of the parameters for the hook */
	protected $params;
	/* Desired name and fields filled from form */
	protected $userName;
	protected $realName;
	protected $tosAccepted;
	protected $email;
	protected $bio;
	protected $notes;
	protected $urls;
	protected $type;
	/** @var array */
	protected $areas;
	protected $registration;
	protected $ip;
	protected $xff;
	protected $agent;
	/* File attachment fields */
	protected $attachmentSrcName; // user given attachment base name
	protected $attachmentPrevName; // user given attachment base name last attempt
	protected $attachmentDidNotForget; // user already saw "please re-attach" notice
	protected $attachmentSize; // bytes size of file
	protected $attachmentTempPath; // tmp path file was uploaded to FS

	public function __construct( User $requester, array $params ) {
		$this->requester = $requester;
		$this->params = $params;
		$this->userName = trim( $params['userName'] );
		$this->realName = trim( $params['realName'] );
		$this->tosAccepted = $params['tosAccepted'];
		$this->email = $params['email'];
		$this->bio = trim( $params['bio'] );
		$this->notes = trim( $params['notes'] );
		$this->urls = trim( $params['urls'] );
		$this->type = $params['type'];
		$this->areas = $params['areas'];
		$this->ip = $params['ip'];
		$this->xff = $params['xff'];
		$this->agent = $params['agent'];
		$this->registration = wfTimestamp( TS_MW, $params['registration'] );
		$this->attachmentPrevName = $params['attachmentPrevName'];
		$this->attachmentSrcName = $params['attachmentSrcName'];
		$this->attachmentDidNotForget = $params['attachmentDidNotForget'];
		$this->attachmentSize = $params['attachmentSize'];
		$this->attachmentTempPath = $params['attachmentTempPath'];
	}

	/**
	 * @return string
	 */
	public function getAttachmentDidNotForget() {
		return $this->attachmentDidNotForget;
	}

	/**
	 * @return string
	 */
	public function getAttachtmentPrevName() {
		return $this->attachmentPrevName;
	}

	/**
	 * Attempt to validate and submit this data to the DB
	 * @param IContextSource $context
	 * @return array [ true or error key string, html error msg or null ]
	 */
	public function submit( IContextSource $context ) {
		global $wgAccountRequestThrottle, $wgConfirmAccountRequestFormItems, $wgConfirmAccountCaptchas;
		global $wgCaptchaClass, $wgCaptchaTriggers;

		ConfirmAccount::runAutoMaintenance();

		$cache = ObjectCache::getLocalClusterInstance();
		$formConfig = $wgConfirmAccountRequestFormItems; // convience
		$reqUser = $this->requester;

		# Make sure that basic permissions are checked
		$block = ConfirmAccount::getAccountRequestBlock( $reqUser );
		if ( $block ) {
			return [
				'accountreq_permission_denied',
				$context->msg( 'badaccess-group0' )->escaped()
			];
		} elseif ( MediaWikiServices::getInstance()->getReadOnlyMode()->isReadOnly() ) {
			return [ 'accountreq_readonly', $context->msg( 'badaccess-group0' )->escaped() ];
		}

		# Check for captcha validity
		if ( $wgConfirmAccountCaptchas && isset( $wgCaptchaClass )
			&& $wgCaptchaTriggers['createaccount'] && !$reqUser->isAllowed( 'skipcaptcha' ) ) {
			/** @var SimpleCaptcha $captcha */
			$captcha = new $wgCaptchaClass;
			if ( !$captcha->passCaptchaLimitedFromRequest( $context->getRequest(), $reqUser ) ) {
				return [ 'accountreq_bad_captcha', $context->msg( 'captcha-createaccount-fail' )->escaped() ];
			}
		}

		# Now create a dummy user ($u) and check if it is valid
		if ( $this->userName === '' ) {
			return [ 'accountreq_no_name', $context->msg( 'noname' )->escaped() ];
		}
		$u = User::newFromName( $this->userName, 'creatable' );
		if ( !$u ) {
			return [ 'accountreq_invalid_name', $context->msg( 'noname' )->escaped() ];
		}
		# No request spamming...
		if ( $wgAccountRequestThrottle && $reqUser->isPingLimitable() ) {
			$key = $cache->makeKey( 'acctrequest', 'ip', $this->ip );
			$value = (int)$cache->get( $key );
			if ( $value > $wgAccountRequestThrottle ) {
				return [
					'accountreq_throttled',
					$context->msg( 'acct_request_throttle_hit', $wgAccountRequestThrottle )->escaped()
				];
			}
		}
		# Make sure user agrees to policy here
		if ( $formConfig['TermsOfService']['enabled'] && !$this->tosAccepted ) {
			return [
				'acct_request_skipped_tos',
				$context->msg( 'requestaccount-agree' )->escaped()
			];
		}
		# Validate email address
		if ( !Sanitizer::validateEmail( $this->email ) ) {
			return [
				'acct_request_invalid_email',
				$context->msg( 'invalidemailaddress' )->escaped()
			];
		}
		# Check if biography is long enough
		if ( $formConfig['Biography']['enabled']
			&& str_word_count( $this->bio ) < $formConfig['Biography']['minWords'] ) {
			$minWords = $formConfig['Biography']['minWords'];

			return [
				'acct_request_short_bio',
				$context->msg( 'requestaccount-tooshort' )->numParams( $minWords )->escaped()
			];
		}
		# Per security reasons, file dir cannot be pulled from client,
		# so ask them to resubmit it then...
		# If the extra fields are off, then uploads are off
		$allowFiles = $formConfig['CV']['enabled'];
		if ( $allowFiles && $this->attachmentPrevName && !$this->attachmentSrcName ) {
			# If the user is submitting forgotAttachment as true with no file,
			# then they saw the notice and choose not to re-select the file.
			# Assume that they don't want to send one anymore.
			if ( !$this->attachmentDidNotForget ) {
				$this->attachmentPrevName = '';
				$this->attachmentDidNotForget = 0;
				return [ false, $context->msg( 'requestaccount-resub' )->escaped() ];
			}
		}

		$authManager = MediaWikiServices::getInstance()->getAuthManager();
		# Check if already in use
		if ( $u->idForName() != 0 || $authManager->userExists( $u->getName() ) ) {
			return [
				'accountreq_username_exists',
				$context->msg( 'userexists' )->escaped()
			];
		}
		# Set email and real name
		$u->setEmail( $this->email );
		$u->setRealName( $this->realName );

		$lbFactory = MediaWikiServices::getInstance()->getDBLoadBalancerFactory();
		$dbw = $lbFactory->getMainLB()->getConnection( DB_PRIMARY );
		$dbw->startAtomic( __METHOD__, $dbw::ATOMIC_CANCELABLE ); // ready to acquire locks
		# Check pending accounts for name use
		if ( !UserAccountRequest::acquireUsername( $u->getName() ) ) {
			$dbw->endAtomic( __METHOD__ );
			return [
				'accountreq_username_pending',
				$context->msg( 'requestaccount-inuse' )->escaped()
			];
		}
		# Check if someone else has an account request with the same email
		if ( !UserAccountRequest::acquireEmail( $u->getEmail() ) ) {
			$dbw->endAtomic( __METHOD__ );
			return [
				'acct_request_email_exists',
				$context->msg( 'requestaccount-emaildup' )->escaped()
			];
		}
		# Process upload...
		if ( $allowFiles && $this->attachmentSrcName ) {
			global $wgAccountRequestExts, $wgConfirmAccountFSRepos;

			$ext = explode( '.', $this->attachmentSrcName );
			$finalExt = $ext[count( $ext ) - 1];
			# File must have size.
			if ( trim( $this->attachmentSrcName ) == '' || empty( $this->attachmentSize ) ) {
				$this->attachmentPrevName = '';
				$dbw->endAtomic( __METHOD__ );
				return [ 'acct_request_empty_file', $context->msg( 'emptyfile' )->escaped() ];
			}
			# Look at the contents of the file; if we can recognize the
			# type but it's corrupt or data of the wrong type, we should
			# probably not accept it.
			if ( !in_array( $finalExt, $wgAccountRequestExts ) ) {
				$this->attachmentPrevName = '';
				$dbw->endAtomic( __METHOD__ );
				return [
					'acct_request_bad_file_ext',
					$context->msg( 'requestaccount-exts' )->escaped()
				];
			}
			$veri = ConfirmAccount::verifyAttachment( $this->attachmentTempPath, $finalExt );
			if ( !$veri->isGood() ) {
				$this->attachmentPrevName = '';
				$dbw->endAtomic( __METHOD__ );
				return [
					'acct_request_corrupt_file',
					$context->msg( 'verification-error' )->escaped()
				];
			}
			# Start a transaction, move file from temp to account request directory.
			$repo = ConfirmAccount::getFileRepo( $wgConfirmAccountFSRepos['accountreqs'] );
			$storageKey = sha1_file( $this->attachmentTempPath ) . '.' . $finalExt;
			$pathRel = UserAccountRequest::relPathFromKey( $storageKey );
			$triplet = [ $this->attachmentTempPath, 'public', $pathRel ];
			$status = $repo->storeBatch( [ $triplet ], FileRepo::OVERWRITE_SAME ); // save!
			if ( !$status->isOk() ) {
				$dbw->cancelAtomic( __METHOD__ );
				return [ 'acct_request_file_store_error',
					$context->msg( 'filecopyerror', $this->attachmentTempPath, $pathRel )->escaped() ];
			}
		}

		$hookRunner = new HookRunner( MediaWikiServices::getInstance()->getHookContainer() );
		$message = "";
		if ( $hookRunner->onConfirmAccount__checkRequest( $u, $this->params, $message ) === false ) {
			$dbw->cancelAtomic( __METHOD__ );
			return [ 'acct_request_check_request_error', $message ];
		}

		$expires = null; // passed by reference
		$token = ConfirmAccount::getConfirmationToken( $u, $expires );

		# Insert into pending requests...
		$req = UserAccountRequest::newFromArray( [
			'name' 			=> $u->getName(),
			'email' 		=> $u->getEmail(),
			'real_name' 	=> $u->getRealName(),
			'registration' 	=> $this->registration,
			'bio' 			=> $this->bio,
			'notes' 		=> $this->notes,
			'urls' 			=> $this->urls,
			'filename' 		=> isset( $this->attachmentSrcName )
				? $this->attachmentSrcName
				: null,
			'type' 			=> $this->type,
			'areas' 		=> $this->areas,
			'storage_key' 	=> isset( $storageKey ) ? $storageKey : null,
			'comment' 		=> '',
			'email_token' 	=> md5( $token ),
			'email_token_expires' => $expires,
			'ip' 			=> $this->ip,
			'xff'           => $this->xff,
			'agent'         => $this->agent
		] );
		$req->insertOn();
		# Send confirmation, required!
		$result = ConfirmAccount::sendConfirmationMail( $u, $this->ip, $token, $expires );
		if ( !$result->isOK() ) {
			$dbw->cancelAtomic( __METHOD__ );
			if ( isset( $repo ) && isset( $pathRel ) ) { // remove attachment
				$repo->cleanupBatch( [ [ 'public', $pathRel ] ] );
			}

			$param = $context->getOutput()->parseAsInterface( $result->getWikiText() );

			return [
				'acct_request_mail_failed',
				$context->msg( 'mailerror' )->rawParams( $param )->escaped() ];
		}

		$dbw->endAtomic( __METHOD__ );

		DeferredUpdates::addCallableUpdate( static function () use ( $context, $reqUser, $cache ) {
			global $wgAccountRequestThrottle;
			# Clear cache for notice of how many account requests there are
			ConfirmAccount::clearAccountRequestCountCache();
			# No request spamming...
			if ( $wgAccountRequestThrottle && $reqUser->isPingLimitable() ) {
				$ip = $context->getRequest()->getIP();
				$key = $cache->makeKey( 'acctrequest', 'ip', $ip );
				$cache->incrWithInit( $key, $cache::TTL_DAY );
			}
		} );

		# Done!
		return [ true, null ];
	}
}
