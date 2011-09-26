<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "ConfirmAccount extension\n";
	exit( 1 );
}

class RequestAccountPage extends SpecialPage {

	function __construct() {
		parent::__construct( 'RequestAccount' );
	}

	function execute( $par ) {
		global $wgUser, $wgOut, $wgRequest, $wgUseRealNamesOnly,
			$wgAccountRequestToS, $wgAccountRequestExtraInfo, $wgAccountRequestTypes;
		# If a user cannot make accounts, don't let them request them either
		global $wgAccountRequestWhileBlocked;
		if ( !$wgAccountRequestWhileBlocked && $wgUser->isBlockedFromCreateAccount() ) {
			$wgOut->blockedPage();
			return;
		}
		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		$this->setHeaders();

		$this->mRealName = trim( $wgRequest->getText( 'wpRealName' ) );
		# We may only want real names being used
		$this->mUsername = $wgUseRealNamesOnly ? $this->mRealName : $wgRequest->getText( 'wpUsername' );
		$this->mUsername = trim( $this->mUsername );
		# Attachments...
		$this->initializeUpload( $wgRequest );
		$this->mPrevAttachment = $wgRequest->getText( 'attachment' );
		$this->mForgotAttachment = $wgRequest->getBool( 'forgotAttachment' );
		# Other fields...
		$this->mEmail = trim( $wgRequest->getText( 'wpEmail' ) );
		$this->mBio = $wgRequest->getText( 'wpBio', '' );
		$this->mNotes = $wgAccountRequestExtraInfo ?
			$wgRequest->getText( 'wpNotes', '' ) : '';
		$this->mUrls = $wgAccountRequestExtraInfo ?
			$wgRequest->getText( 'wpUrls', '' ) : '';
		$this->mToS = $wgAccountRequestToS ?
			$wgRequest->getBool( 'wpToS' ) : false;
		$this->mType = $wgRequest->getInt( 'wpType' );
		$this->mType = isset( $wgAccountRequestTypes[$this->mType] ) ? $this->mType : 0;
		# Load areas user plans to be active in...
		$this->mAreas = $this->mAreaSet = array();
		if ( wfMsg( 'requestaccount-areas' ) ) {
			$areas = explode( "\n*", "\n" . wfMsg( 'requestaccount-areas' ) );
			foreach ( $areas as $n => $area ) {
				$set = explode( "|", $area, 2 );
				if ( $set[0] && isset( $set[1] ) ) {
					$formName = "wpArea-" . htmlspecialchars( str_replace( ' ', '_', $set[0] ) );
					$this->mAreas[$formName] = $wgRequest->getInt( $formName, - 1 );
					# Make a simple list of interests
					if ( $this->mAreas[$formName] > 0 )
						$this->mAreaSet[] = str_replace( '_', ' ', $set[0] );
				}
			}
		}
		# We may be confirming an email address here
		$emailCode = $wgRequest->getText( 'wpEmailToken' );

		$this->skin = $wgUser->getSkin();

		$action = $wgRequest->getVal( 'action' );
		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			$this->mPrevAttachment = $this->mPrevAttachment ? $this->mPrevAttachment : $this->mSrcName;
			$this->doSubmit();
		} elseif ( $action == 'confirmemail' ) {
			$this->confirmEmailToken( $emailCode );
		} else {
			$this->showForm();
		}
		$wgOut->addModules( 'ext.confirmAccount' ); // CSS
	}

	protected function showForm( $msg = '', $forgotFile = 0 ) {
		global $wgOut, $wgUser, $wgUseRealNamesOnly, $wgAllowRealName;
		global $wgAccountRequestToS, $wgAccountRequestTypes, $wgAccountRequestExtraInfo,
			$wgAllowAccountRequestFiles, $wgMakeUserPageFromBio;

		$this->mForgotAttachment = $forgotFile;

		$wgOut->setPagetitle( wfMsgHtml( "requestaccount" ) );
		# Output failure message if any
		if ( $msg ) {
			$wgOut->addHTML( '<div class="errorbox">' . $msg . '</div><div class="visualClear"></div>' );
		}
		# Give notice to users that are logged in
		if ( $wgUser->getID() ) {
			$wgOut->addWikiMsg( 'requestaccount-dup' );
		}

		$wgOut->addWikiMsg( 'requestaccount-text' );

		$form  = Xml::openElement( 'form', array( 'method' => 'post', 'name' => 'accountrequest',
			'action' => $this->getTitle()->getLocalUrl(), 'enctype' => 'multipart/form-data' ) );
		$form .= '<fieldset><legend>' . wfMsgHtml( 'requestaccount-leg-user' ) . '</legend>';
		$form .= wfMsgExt( 'requestaccount-acc-text', array( 'parse' ) ) . "\n";
		$form .= '<table cellpadding=\'4\'>';
		if ( $wgUseRealNamesOnly ) {
			$form .= "<tr><td>" . wfMsgHtml( 'username' ) . "</td>";
			$form .= "<td>" . wfMsgHtml( 'requestaccount-same' ) . "</td></tr>\n";
		} else {
			$form .= "<tr><td>" . Xml::label( wfMsgHtml( 'username' ), 'wpUsername' ) . "</td>";
			$form .= "<td>" . Xml::input( 'wpUsername', 30, $this->mUsername, array( 'id' => 'wpUsername' ) ) . "</td></tr>\n";
		}
		$form .= "<tr><td>" . Xml::label( wfMsgHtml( 'requestaccount-email' ), 'wpEmail' ) . "</td>";
		$form .= "<td>" . Xml::input( 'wpEmail', 30, $this->mEmail, array( 'id' => 'wpEmail' ) ) . "</td></tr>\n";
		if ( count( $wgAccountRequestTypes ) > 1 ) {
			$form .= "<tr><td>" . wfMsgHtml( 'requestaccount-reqtype' ) . "</td><td>";
			foreach ( $wgAccountRequestTypes as $i => $params ) {
				$options[] = Xml::option( wfMsg( "requestaccount-level-$i" ), $i, ( $i == $this->mType ) );
			}
			$form .= Xml::openElement( 'select', array( 'name' => "wpType" ) );
			$form .= implode( "\n", $options );
			$form .= Xml::closeElement( 'select' ) . "\n";
			$form .= '</td></tr>';
		}
		$form .= '</table></fieldset>';

		if ( wfMsg( 'requestaccount-areas' ) ) {
			$form .= '<fieldset>';
			$form .= '<legend>' . wfMsgHtml( 'requestaccount-leg-areas' ) . '</legend>';
			$form .=  wfMsgExt( 'requestaccount-areas-text', array( 'parse' ) ) . "\n";

			$areas = explode( "\n*", "\n" . wfMsg( 'requestaccount-areas' ) );
			$form .= "<div style='height:150px; overflow:scroll; background-color:#f9f9f9;'>";
			$form .= "<table cellspacing='5' cellpadding='0' style='background-color:#f9f9f9;'><tr valign='top'>";
			$count = 0;
			foreach ( $areas as $area ) {
				$set = explode( "|", $area, 3 );
				if ( $set[0] && isset( $set[1] ) ) {
					$count++;
					if ( $count > 5 ) {
						$form .= "</tr><tr valign='top'>";
						$count = 1;
					}
					$formName = "wpArea-" . htmlspecialchars( str_replace( ' ', '_', $set[0] ) );
					if ( isset( $set[1] ) ) {
						$pg = Linker::link( Title::newFromText( $set[1] ), wfMsgHtml( 'requestaccount-info' ), array(), array(), "known" );
					} else {
						$pg = '';
					}
					$form .= "<td>" . Xml::checkLabel( $set[0], $formName, $formName, $this->mAreas[$formName] > 0 ) . " {$pg}</td>\n";
				}
			}
			$form .= "</tr></table></div>";
			$form .= '</fieldset>';
		}

		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml( 'requestaccount-leg-person' ) . '</legend>';
		if ( $wgMakeUserPageFromBio ) {
			$form .= wfMsgExt( 'requestaccount-bio-text-i', 'parse' ) . "\n";
		}
		$form .= wfMsgExt( 'requestaccount-bio-text', 'parse' ) . "\n";

		if ( $wgUseRealNamesOnly  || $wgAllowRealName ) {
			$form .= '<table cellpadding=\'4\'>';
			$form .= "<tr><td>" . Xml::label( wfMsgHtml( 'requestaccount-real' ), 'wpRealName' ) . "</td>";
			$form .= "<td>" . Xml::input( 'wpRealName', 35, $this->mRealName, array( 'id' => 'wpRealName' ) ) . "</td></tr>\n";
			$form .= '</table>';
		}
		$form .= "<p>" . wfMsgWikiHtml( 'requestaccount-bio' ) . "\n";
		$form .= "<textarea tabindex='1' name='wpBio' id='wpBio' rows='12' cols='80' style='width:100%; background-color:#f9f9f9;'>" .
			htmlspecialchars( $this->mBio ) . "</textarea></p>\n";
		$form .= '</fieldset>';
		if ( $wgAccountRequestExtraInfo ) {
			$form .= '<fieldset>';
			$form .= '<legend>' . wfMsgHtml( 'requestaccount-leg-other' ) . '</legend>';
			$form .= wfMsgExt( 'requestaccount-ext-text', array( 'parse' ) ) . "\n";
			if ( $wgAllowAccountRequestFiles ) {
				$form .= "<p>" . wfMsgHtml( 'requestaccount-attach' ) . " ";
				$form .= Xml::input( 'wpUploadFile', 35, '',
					array( 'id' => 'wpUploadFile', 'type' => 'file' ) ) . "</p>\n";
			}
			$form .= "<p>" . wfMsgHtml( 'requestaccount-notes' ) . "\n";
			$form .= "<textarea tabindex='1' name='wpNotes' id='wpNotes' rows='3' cols='80' style='width:100%;background-color:#f9f9f9;'>" .
				htmlspecialchars( $this->mNotes ) .
				"</textarea></p>\n";
			$form .= "<p>" . wfMsgHtml( 'requestaccount-urls' ) . "\n";
			$form .= "<textarea tabindex='1' name='wpUrls' id='wpUrls' rows='2' cols='80' style='width:100%; background-color:#f9f9f9;'>" .
				htmlspecialchars( $this->mUrls ) .
				"</textarea></p>\n";
			$form .= '</fieldset>';
		}
		if ( $wgAccountRequestToS ) {
			$form .= '<fieldset>';
			$form .= '<legend>' . wfMsgHtml( 'requestaccount-leg-tos' ) . '</legend>';
			$form .= "<p>" . Xml::check( 'wpToS', $this->mToS, array( 'id' => 'wpToS' ) ) .
				' <label for="wpToS">' . wfMsgExt( 'requestaccount-tos', array( 'parseinline' ) ) . "</label></p>\n";
			$form .= '</fieldset>';
		}
		# FIXME: do this better...
		global $wgConfirmAccountCaptchas, $wgCaptchaClass, $wgCaptchaTriggers;
		if ( $wgConfirmAccountCaptchas && isset( $wgCaptchaClass )
			&& $wgCaptchaTriggers['createaccount'] && !$wgUser->isAllowed( 'skipcaptcha' ) )
		{
			$captcha = new $wgCaptchaClass;
			# Hook point to add captchas
			$form .= '<fieldset>';
			$form .= wfMsgExt( 'captcha-createaccount', 'parse' );
			$form .= $captcha->getForm();
			$form .= '</fieldset>';
		}
		$form .= Html::Hidden( 'title', $this->getTitle()->getPrefixedDBKey() ) . "\n";
		$form .= Html::Hidden( 'wpEditToken', $wgUser->editToken() ) . "\n";
		$form .= Html::Hidden( 'attachment', $this->mPrevAttachment ) . "\n";
		$form .= Html::Hidden( 'forgotAttachment', $this->mForgotAttachment ) . "\n";
		$form .= "<p>" . Xml::submitButton( wfMsgHtml( 'requestaccount-submit' ) ) . "</p>";
		$form .= Xml::closeElement( 'form' );

		$wgOut->addHTML( $form );

		$wgOut->addWikiMsg( 'requestaccount-footer' );
	}

	protected function doSubmit() {
		global $wgOut, $wgUser, $wgAuth, $wgAccountRequestThrottle;
		# Now create a dummy user ($u) and check if it is valid
		$name = trim( $this->mUsername );
		$u = User::newFromName( $name, 'creatable' );
		if ( !$u ) {
			$this->showForm( wfMsgHtml( 'noname' ) );
			return;
		}
		# FIXME: Hack! If we don't want captchas for requests, temporarily turn it off!
		global $wgConfirmAccountCaptchas, $wgCaptchaTriggers;
		if ( !$wgConfirmAccountCaptchas && isset( $wgCaptchaTriggers ) ) {
			$old = $wgCaptchaTriggers['createaccount'];
			$wgCaptchaTriggers['createaccount'] = false;
		}
		$abortError = '';
		if ( !wfRunHooks( 'AbortNewAccount', array( $u, &$abortError ) ) ) {
			// Hook point to add extra creation throttles and blocks
			wfDebug( "RequestAccount::doSubmit: a hook blocked creation\n" );
			$this->showForm( $abortError );
			return;
		}
		# Set it back!
		if ( !$wgConfirmAccountCaptchas && isset( $wgCaptchaTriggers ) ) {
			$wgCaptchaTriggers['createaccount'] = $old;
		}
		# No request spamming...
		if ( $wgAccountRequestThrottle && $wgUser->isPingLimitable() ) {
			global $wgMemc;
			$key = wfMemcKey( 'acctrequest', 'ip', wfGetIP() );
			$value = $wgMemc->get( $key );
			if ( $value > $wgAccountRequestThrottle ) {
				$this->throttleHit( $wgAccountRequestThrottle );
				return;
			}
		}
		# Check if already in use
		if ( 0 != $u->idForName() || $wgAuth->userExists( $u->getName() ) ) {
			$this->showForm( wfMsgHtml( 'userexists' ) );
			return;
		}
		# Check pending accounts for name use
		$dbw = wfGetDB( DB_MASTER );
		$dup = $dbw->selectField( 'account_requests', '1',
			array( 'acr_name' => $u->getName() ),
			__METHOD__ );
		if ( $dup ) {
			$this->showForm( wfMsgHtml( 'requestaccount-inuse' ) );
			return;
		}
		# Make sure user agrees to policy here
		global $wgAccountRequestToS;
		if ( $wgAccountRequestToS && !$this->mToS ) {
			$this->showForm( wfMsgHtml( 'requestaccount-agree' ) );
			return;
		}
		# Validate email address
		if ( !$u->isValidEmailAddr( $this->mEmail ) ) {
			$this->showForm( wfMsgHtml( 'invalidemailaddress' ) );
			return;
		}
		global $wgAccountRequestMinWords;
		# Check if biography is long enough
		if ( str_word_count( $this->mBio ) < $wgAccountRequestMinWords ) {
			global $wgLang;
			$this->showForm( wfMsgExt( 'requestaccount-tooshort', 'parsemag',
				$wgLang->formatNum( $wgAccountRequestMinWords ) ) );
			return;
		}
		# Set some additional data so the AbortNewAccount hook can be
		# used for more than just username validation
		$u->setEmail( $this->mEmail );
		# Check if someone else has an account request with the same email
		$dup = $dbw->selectField( 'account_requests', '1',
			array( 'acr_email' => $u->getEmail() ),
			__METHOD__ );
		if ( $dup ) {
			$this->showForm( wfMsgHtml( 'requestaccount-emaildup' ) );
			return;
		}
		$u->setRealName( $this->mRealName );
		# Per security reasons, file dir cannot be pulled from client,
		# so ask them to resubmit it then...
		global $wgAllowAccountRequestFiles, $wgAccountRequestExtraInfo;
		# If the extra fields are off, then uploads are off
		$allowFiles = $wgAccountRequestExtraInfo && $wgAllowAccountRequestFiles;
		if ( $allowFiles && $this->mPrevAttachment && !$this->mSrcName ) {
			# If the user is submitting forgotAttachment as true with no file,
			# then they saw the notice and choose not to re-select the file.
			# Assume that they don't want to send one anymore.
			if ( !$this->mForgotAttachment ) {
				$this->mPrevAttachment = '';
				$this->showForm( wfMsgHtml( 'requestaccount-resub' ), 1 );
				return false;
			}
		}
		# Process upload...
		if ( $allowFiles && $this->mSrcName ) {
			$ext = explode( '.', $this->mSrcName );
			$finalExt = $ext[count( $ext ) - 1];
			# File must have size.
			if ( trim( $this->mSrcName ) == '' || empty( $this->mFileSize ) ) {
				$this->mPrevAttachment = '';
				$this->showForm( wfMsgHtml( 'emptyfile' ) );
				return false;
			}
			# Look at the contents of the file; if we can recognize the
		 	# type but it's corrupt or data of the wrong type, we should
		 	# probably not accept it.
		 	global $wgAccountRequestExts;
		 	if ( !in_array( $finalExt, $wgAccountRequestExts ) ) {
		 		$this->mPrevAttachment = '';
				$this->showForm( wfMsgHtml( 'requestaccount-exts' ) );
				return false;
		 	}
			$veri = ConfirmAccount::verifyAttachment( $this->mTempPath, $finalExt );
			if ( !$veri->isGood() ) {
				$this->mPrevAttachment = '';
				$this->showForm( wfMsgHtml( 'uploadcorrupt' ) );
				return false;
			}
			# Start a transaction, move file from temp to account request directory.
			global $wgConfirmAccountFSRepos;
			$repo = new FSRepo( $wgConfirmAccountFSRepos['accountreqs'] );
			$key = sha1_file($this->mTempPath) . '.' . $finalExt;
			$pathRel = $key[0].'/'.$key[0].$key[1].'/'.$key[0].$key[1].$key[2].'/'.$key;
			$triplet = array( $this->mTempPath, 'public', $pathRel );
			$repo->storeBatch( array($triplet) ); // save!
		}
		$expires = null; // passed by reference
		$token = ConfirmAccount::getConfirmationToken( $u, $expires );
		# Insert into pending requests...
		$req = UserAccountRequest::newFromArray( array(
			'name' 			=> $u->getName(),
			'email' 		=> $u->getEmail(),
			'real_name' 	=> $u->getRealName(),
			'registration' 	=> wfTimestampNow(),
			'bio' 			=> $this->mBio,
			'notes' 		=> $this->mNotes,
			'urls' 			=> $this->mUrls,
			'filename' 		=> isset( $this->mSrcName ) ? $this->mSrcName : null,
			'type' 			=> $this->mType,
			'areas' 		=> $this->mAreaSet,
			'storage_key' 	=> isset( $key ) ? $key : null,
			'comment' 		=> '',
			'email_token' 	=> md5( $token ),
			'email_token_expires' => $expires,
			'ip' 			=> wfGetIP(),
		) );
		$dbw->begin();
		$req->insertOn();
		# Send confirmation, required!
		$result = ConfirmAccount::sendConfirmationMail( $u, wfGetIP(), $token, $expires );
		if ( !$result->isOK() ) {
			$dbw->rollback(); // Nevermind
			$error = wfMsg( 'mailerror', $wgOut->parse( $result->getWikiText() ) );
			$this->showForm( $error );
			return false;
		}
		$dbw->commit();
		# Clear cache for notice of how many account requests there are
		global $wgMemc;
		$key = wfMemcKey( 'confirmaccount', 'noticecount' );
		$wgMemc->delete( $key );
		# No request spamming...
		# BC: check if isPingLimitable() exists
		if ( $wgAccountRequestThrottle && $wgUser->isPingLimitable() ) {
			$key = wfMemcKey( 'acctrequest', 'ip', wfGetIP() );
			if ( !$value = $wgMemc->incr( $key ) ) {
				$wgMemc->set( $key, 1, 86400 );
			}
		}
		# Done!
		$this->showSuccess();
	}

	protected function showSuccess() {
		global $wgOut;
		$wgOut->setPagetitle( wfMsg( "requestaccount" ) );
		$wgOut->addWikiMsg( 'requestaccount-sent' );
		$wgOut->returnToMain();
	}

	/**
	 * Initialize the uploaded file from PHP data
	 */
	protected function initializeUpload( $request ) {
		$this->mTempPath       = $request->getFileTempName( 'wpUploadFile' );
		$this->mFileSize       = $request->getFileSize( 'wpUploadFile' );
		$this->mSrcName        = $request->getFileName( 'wpUploadFile' );
		$this->mRemoveTempFile = false; // PHP will handle this
	}

	/**
	 * @private
	 * @param int $limit number of accounts allowed to be requested from the same IP
	 */
	protected function throttleHit( $limit ) {
		global $wgOut;
		$wgOut->addHTML( wfMsgExt( 'acct_request_throttle_hit', 'parsemag', $limit ) );
	}

	/**
	 * (a) Try to confirm an email address via a token
	 * (b) Notify $wgConfirmAccountContact on success
	 * @param int $limit number of accounts allowed to be requested from the same IP
	 */
	protected function confirmEmailToken( $code ) {
		global $wgUser, $wgOut, $wgConfirmAccountContact, $wgPasswordSender;
		# Confirm if this token is in the pending requests
		$name = ConfirmAccount::requestNameFromEmailToken( $code );
		if ( $name !== false ) {
			# Send confirmation email to prospective user
			ConfirmAccount::confirmEmail( $name );
			# Send mail to admin after e-mail has been confirmed
			if ( $wgConfirmAccountContact != '' ) {
				$target = new MailAddress( $wgConfirmAccountContact );
				$source = new MailAddress( $wgPasswordSender );
				$title = SpecialPage::getTitleFor( 'ConfirmAccounts' );
				$subject = wfMsgForContent( 'requestaccount-email-subj-admin' );
				$body = wfMsgForContent(
					'requestaccount-email-body-admin', $name, $title->getFullUrl() );
				# Actually send the email...
				$result = UserMailer::send( $target, $source, $subject, $body );
				if ( !$result->isOK() ) {
					wfDebug( "Could not sent email to admin at $target\n" );
				}
			}
			$wgOut->addWikiMsg( 'request-account-econf' );
			$wgOut->returnToMain();
			return;
		}
		# Maybe the user confirmed after account was created...
		$user = User::newFromConfirmationCode( $code );
		if ( is_object( $user ) ) {
			if ( $user->confirmEmail() ) {
				$message = $wgUser->isLoggedIn() ? 'confirmemail_loggedin' : 'confirmemail_success';
				$wgOut->addWikiMsg( $message );
				if ( !$wgUser->isLoggedIn() ) {
					$title = SpecialPage::getTitleFor( 'Userlogin' );
					$wgOut->returnToMain( true, $title->getPrefixedUrl() );
				}
			} else {
				$wgOut->addWikiMsg( 'confirmemail_error' );
			}
		} else {
			$wgOut->addWikiMsg( 'confirmemail_invalid' );
		}
	}
}
