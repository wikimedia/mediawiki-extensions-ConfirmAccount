<?php

class AccountRequestSubmission {
	/* User making the request */
	protected $requester;
	/* Desired name and fields filled from form */
	protected $userName;
	protected $realName;
	protected $tosAccepted;
	protected $email;
	protected $bio;
	protected $notes;
	protected $urls;
	protected $type;
	protected $areas;
	protected $registration;
	/* File attachment fields */
	protected $attachmentSrcName; // user given attachment base name
	protected $attachmentPrevName; // user given attachment base name last attempt
	protected $attachmentDidNotForget; // user already saw "please re-attach" notice
	protected $attachmentSize; // bytes size of file
	protected $attachmentTempPath; // tmp path file was uploaded to FS

	public function __construct( User $requester, array $params ) {
		$this->requester = $requester;
		$this->userName = $params['userName'];
		$this->realName = $params['realName'];
		$this->tosAccepted = $params['tosAccepted'];
		$this->email = $params['email'];
		$this->bio = $params['bio'];
		$this->notes = $params['notes'];
		$this->urls = $params['urls'];
		$this->type = $params['type'];
		$this->areas = $params['areas'];
		$this->attachmentPrevName = $params['attachmentPrevName'];
		$this->attachmentSrcName = $params['attachmentSrcName'];
		$this->attachmentDidNotForget = $params['attachmentDidNotForget'];
		$this->attachmentSize = $params['attachmentSize'];
		$this->attachmentTempPath = $params['attachmentTempPath'];
		$this->registration = wfTimestamp( TS_MW, $params['registration'] );
	}

	public function getAttachmentDidNotForget() {
		return $this->attachmentDidNotForget;
	}

	public function getAttachtmentPrevName() {
		return $this->attachmentPrevName;
	}

	/**
	 * Attempt to validate and submit this data to the DB
	 * @param $context IContextSource
	 * @return array( true or error key string, html error msg or null )
	 */
	public function submit( IContextSource $context ) {
		global $wgAuth, $wgAccountRequestThrottle, $wgMemc, $wgContLang;
		$reqUser = $this->requester;

		# Now create a dummy user ($u) and check if it is valid
		$name = trim( $this->userName );
		if ( $name === '' ) {
			return array( 'accountreq_no_name', wfMsgHtml( 'noname' ) );
		}
		$u = User::newFromName( $name, 'creatable' );
		if ( !$u ) {
			return array( 'accountreq_invalid_name', wfMsgHtml( 'noname' ) );
		}
		# No request spamming...
		if ( $wgAccountRequestThrottle && $reqUser->isPingLimitable() ) {
			$key = wfMemcKey( 'acctrequest', 'ip', wfGetIP() );
			$value = (int)$wgMemc->get( $key );
			if ( $value > $wgAccountRequestThrottle ) {
				return array( 'accountreq_throttled',
					wfMsgExt( 'acct_request_throttle_hit', 'parsemag', $wgAccountRequestThrottle )
				);
			}
		}
		# Check if already in use
		if ( 0 != $u->idForName() || $wgAuth->userExists( $u->getName() ) ) {
			return array( 'accountreq_username_exists', wfMsgHtml( 'userexists' ) );
		}
		# Check pending accounts for name use
		$dbw = wfGetDB( DB_MASTER );
		$dup = $dbw->selectField( 'account_requests', '1',
			array( 'acr_name' => $u->getName() ), __METHOD__ );
		if ( $dup ) {
			return array( 'accountreq_username_pending', wfMsgHtml( 'requestaccount-inuse' ) );
		}
		# Make sure user agrees to policy here
		global $wgAccountRequestToS;
		if ( $wgAccountRequestToS && !$this->tosAccepted ) {
			return array( 'acct_request_skipped_tos', wfMsgHtml( 'requestaccount-agree' ) );
		}
		# Validate email address
		if ( !Sanitizer::validateEmail( $this->email ) ) {
			return array( 'acct_request_invalid_email', wfMsgHtml( 'invalidemailaddress' ) );
		}
		# Check if biography is long enough
		global $wgAccountRequestMinWords;
		if ( str_word_count( $this->bio ) < $wgAccountRequestMinWords ) {
			return array( 'acct_request_short_bio',
				wfMsgExt( 'requestaccount-tooshort', 'parsemag',
					$wgContLang->formatNum( $wgAccountRequestMinWords ) )
			);
		}
		# Set some additional data so the AbortNewAccount hook can be
		# used for more than just username validation
		$u->setEmail( $this->email );
		# Check if someone else has an account request with the same email
		$dup = $dbw->selectField( 'account_requests', '1',
			array( 'acr_email' => $u->getEmail() ), __METHOD__ );
		if ( $dup ) {
			return array( 'acct_request_email_exists', wfMsgHtml( 'requestaccount-emaildup' ) );
		}
		$u->setRealName( $this->realName );
		# Per security reasons, file dir cannot be pulled from client,
		# so ask them to resubmit it then...
		global $wgAllowAccountRequestFiles, $wgAccountRequestExtraInfo;
		# If the extra fields are off, then uploads are off
		$allowFiles = $wgAccountRequestExtraInfo && $wgAllowAccountRequestFiles;
		if ( $allowFiles && $this->attachmentPrevName && !$this->attachmentSrcName ) {
			# If the user is submitting forgotAttachment as true with no file,
			# then they saw the notice and choose not to re-select the file.
			# Assume that they don't want to send one anymore.
			if ( !$this->attachmentDidNotForget ) {
				$this->attachmentPrevName = '';
				$this->attachmentDidNotForget = 0;
				return array( false, wfMsgHtml( 'requestaccount-resub' ) );
			}
		}
		# Process upload...
		if ( $allowFiles && $this->attachmentSrcName ) {
			$ext = explode( '.', $this->attachmentSrcName );
			$finalExt = $ext[count( $ext ) - 1];
			# File must have size.
			if ( trim( $this->attachmentSrcName ) == '' || empty( $this->attachmentSize ) ) {
				$this->attachmentPrevName = '';
				return array( 'acct_request_empty_file', wfMsgHtml( 'emptyfile' ) );
			}
			# Look at the contents of the file; if we can recognize the
		 	# type but it's corrupt or data of the wrong type, we should
		 	# probably not accept it.
		 	global $wgAccountRequestExts;
		 	if ( !in_array( $finalExt, $wgAccountRequestExts ) ) {
		 		$this->attachmentPrevName = '';
				return array( 'acct_request_bad_file_ext', wfMsgHtml( 'requestaccount-exts' ) );
		 	}
			$veri = ConfirmAccount::verifyAttachment( $this->attachmentTempPath, $finalExt );
			if ( !$veri->isGood() ) {
				$this->attachmentPrevName = '';
				return array( 'acct_request_corrupt_file', wfMsgHtml( 'uploadcorrupt' ) );
			}
			# Start a transaction, move file from temp to account request directory.
			global $wgConfirmAccountFSRepos;
			$repo = new FSRepo( $wgConfirmAccountFSRepos['accountreqs'] );
			$key = sha1_file( $this->attachmentTempPath ) . '.' . $finalExt;
			$pathRel = $key[0].'/'.$key[0].$key[1].'/'.$key[0].$key[1].$key[2].'/'.$key;
			$triplet = array( $this->attachmentTempPath, 'public', $pathRel );
			$repo->storeBatch( array($triplet) ); // save!
		}
		$expires = null; // passed by reference
		$token = ConfirmAccount::getConfirmationToken( $u, $expires );

		global $wgRequest;
		$ip = $wgRequest->getIP();
		# Insert into pending requests...
		$req = UserAccountRequest::newFromArray( array(
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
			'storage_key' 	=> isset( $key ) ? $key : null,
			'comment' 		=> '',
			'email_token' 	=> md5( $token ),
			'email_token_expires' => $expires,
			'ip' 			=> $ip,
		) );
		$dbw->begin();
		$req->insertOn();
		# Send confirmation, required!
		$result = ConfirmAccount::sendConfirmationMail( $u, $ip, $token, $expires );
		if ( !$result->isOK() ) {
			$dbw->rollback(); // Nevermind
			return array( 'acct_request_mail_failed',
				wfMsg( 'mailerror', $context->getOutput()->parse( $result->getWikiText() ) ) );
		}
		$dbw->commit();
		# Clear cache for notice of how many account requests there are
		$key = wfMemcKey( 'confirmaccount', 'noticecount' );
		$wgMemc->delete( $key );
		# No request spamming...
		# BC: check if isPingLimitable() exists
		if ( $wgAccountRequestThrottle && $reqUser->isPingLimitable() ) {
			$key = wfMemcKey( 'acctrequest', 'ip', $ip );
            $value = $wgMemc->incr( $key );
			if ( !$value ) {
				$wgMemc->set( $key, 1, 86400 );
			}
		}
		# Done!
		return array( true, null );
	}
}
