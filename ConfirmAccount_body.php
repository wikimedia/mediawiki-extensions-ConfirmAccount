<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "ConfirmAccount extension\n";
	exit( 1 );
}

# Add messages
efLoadConfirmAccountsMessages();

class RequestAccountPage extends SpecialPage {
	function __construct() {
		parent::__construct( 'RequestAccount' );
	}

	function execute( $subpage ) {
		global $wgUser, $wgOut, $wgRequest, $action, $wgUseRealNamesOnly,
			$wgAccountRequestToS, $wgAccountRequestExtraInfo;

		if( $wgUser->isBlockedFromCreateAccount() ) {
			$wgOut->blockedPage();
			return;
		}
		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		$this->setHeaders();

		$this->mRealName = $wgRequest->getText( 'wpRealName' );
		# We may only want real names being used
		if( $wgUseRealNamesOnly )
			$this->mUsername = $this->mRealName;
		else
			$this->mUsername = $wgRequest->getText( 'wpUsername' );
		# Attachments...
		$this->initializeUpload( $wgRequest );
		$this->mPrevAttachment = $wgRequest->getText( 'attachment' );
		$this->mForgotAttachment = $wgRequest->getBool( 'forgotAttachment' );
		# Other fields...
		$this->mEmail = $wgRequest->getText( 'wpEmail' );
		$this->mBio = $wgRequest->getText( 'wpBio', '' );
		$this->mNotes = $wgAccountRequestExtraInfo ? 
			$wgRequest->getText( 'wpNotes', '' ) : '';
		$this->mUrls = $wgAccountRequestExtraInfo ? 
			$wgRequest->getText( 'wpUrls', '' ) : '';
		$this->mToS = $wgAccountRequestToS ? 
			$wgRequest->getBool('wpToS') : false;
		# We may be confirming an email address here
		$emailCode = $wgRequest->getText( 'wpEmailToken' );

		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			if( !$this->mPrevAttachment )
				$this->mPrevAttachment = $this->mSrcName;
			$this->doSubmit();
		} else if( $action == 'confirmemail' ) {
			$this->confirmEmailToken( $emailCode );
		} else {
			$this->showForm();
		}
	}

	function showForm( $msg='', $forgotFile=0 ) {
		global $wgOut, $wgUser, $wgTitle, $wgUseRealNamesOnly, $wgAccountRequestToS,
			$wgAccountRequestExtraInfo, $wgAllowAccountRequestFiles;

		$this->mForgotAttachment = $forgotFile;

		$wgOut->setPagetitle( wfMsgHtml( "requestaccount" ) );
		# Output failure message if any
		if( $msg ) {
			$wgOut->addHTML( '<div class="errorbox">'.$msg.'</div><div class="visualClear"></div>' );
		}
		# Give notice to users that are logged in
		if( $wgUser->getID() ) {
			$wgOut->addWikiText( wfMsgHtml( "requestaccount-dup" ) );
		}

		$wgOut->addWikiText( wfMsgHtml( "requestaccount-text" ) );

		$action = $wgTitle->escapeLocalUrl( 'action=submit' );
		$form = "<form name='accountrequest' action='$action' enctype='multipart/form-data' method='post'>";
		$form .= '<fieldset><legend>' . wfMsgHtml('requestaccount-legend1') . '</legend>';
		$form .= wfMsgExt( 'requestaccount-acc-text', array('parse') )."\n";
		$form .= '<table cellpadding=\'4\'>';
		if( $wgUseRealNamesOnly ) {
			$form .= "<tr><td>".wfMsgHtml('username')."</td>";
			$form .= "<td>".wfMsgHtml('requestaccount-same')."</td></tr>\n";
		} else {
			$form .= "<tr><td>".Xml::label( wfMsgHtml('username'), 'wpUsername' )."</td>";
			$form .= "<td>".Xml::input( 'wpUsername', 30, $this->mUsername, array('id' => 'wpUsername') )."</td></tr>\n";
		}
		$form .= "<tr><td>".Xml::label( wfMsgHtml('requestaccount-email'), 'wpEmail' )."</td>";
		$form .= "<td>".Xml::input( 'wpEmail', 30, $this->mEmail, array('id' => 'wpEmail') )."</td></tr>\n";
		$form .= '</table></fieldset>';

		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('requestaccount-legend2') . '</legend>';
		$form .= wfMsgExt( 'requestaccount-bio-text', array('parse') )."\n";
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".Xml::label( wfMsgHtml('requestaccount-real'), 'wpRealName' )."</td>";
		$form .= "<td>".Xml::input( 'wpRealName', 35, $this->mRealName, array('id' => 'wpRealName') )."</td></tr>\n";
		$form .= '</table>';
		$form .= "<p>".wfMsgHtml('requestaccount-bio')."</p>";
		$form .= "<p><textarea tabindex='1' name='wpBio' id='wpBio' rows='10' cols='80' style='width:100%'>" .
			htmlspecialchars($this->mBio) .
			"</textarea></p>\n";
		$form .= '</fieldset>';
		if( $wgAccountRequestExtraInfo ) {
			$form .= '<fieldset>';
			$form .= '<legend>' . wfMsgHtml('requestaccount-legend3') . '</legend>';
			$form .= wfMsgExt( 'requestaccount-ext-text', array('parse') )."\n";
			if( $wgAllowAccountRequestFiles ) {
				$form .= "<p>".wfMsgHtml('requestaccount-attach')." ";
				$form .= Xml::input( 'wpUploadFile', 35, '', 
					array('id' => 'wpUploadFile', 'type' => 'file') )."</p>\n";
			}
			$form .= "<p>".wfMsgHtml('requestaccount-notes')."</p>\n";
			$form .= "<p><textarea tabindex='1' name='wpNotes' id='wpNotes' rows='3' cols='80' style='width:100%'>" .
				htmlspecialchars($this->mNotes) .
				"</textarea></p>\n";
			$form .= "<p>".wfMsgHtml('requestaccount-urls')."</p>\n";
			$form .= "<p><textarea tabindex='1' name='wpUrls' id='wpUrls' rows='2' cols='80' style='width:100%'>" .
				htmlspecialchars($this->mUrls) .
				"</textarea></p>\n";
			$form .= '</fieldset>';
		}
		# Pseudo template for extensions
		global $wgCaptcha;
		if( isset($wgCaptcha) ) {
			$template = new UsercreateTemplate();
			$template->set( 'header', '' );
			# Hook point to add captchas
			$wgCaptcha->injectUserCreate( $template );
			if( $template->data['header'] ) {
				$form .= '<fieldset>';
				$form .= $template->data['header'];
				$form .= '</fieldset>';
			}
		}
		if( $wgAccountRequestToS ) {
			$form .= "<p>".Xml::check( 'wpToS', $this->mToS, array('id' => 'wpToS') ).
				' <label for="wpToS">'.wfMsgExt( 'requestaccount-tos', array('parseinline') )."</label></p>\n";
		}
		$form .= Xml::hidden( 'title', $wgTitle->getPrefixedUrl() )."\n";
		$form .= Xml::hidden( 'wpEditToken', $wgUser->editToken() )."\n";
		$form .= Xml::hidden( 'attachment', $this->mPrevAttachment )."\n";
		$form .= Xml::hidden( 'forgotAttachment', $this->mForgotAttachment )."\n";
		$form .= "<p>".Xml::submitButton( wfMsgHtml( 'requestaccount-submit') )."</p>";
		$form .= '</form>';

		$wgOut->addHTML( $form );
	}

	function doSubmit() {
		global $wgOut, $wgUser, $wgAuth, $wgAccountRequestThrottle, $wgMemc;
		# Now create a dummy user ($u) and check if it is valid
		$name = trim( $this->mUsername );
		$u = User::newFromName( $name, 'creatable' );	
		if( is_null( $u ) ) {
			$this->showForm( wfMsgHtml('noname') );
			return;
		}
		# No request spamming...
		if( $wgAccountRequestThrottle && ( !method_exists($wgUser,'isPingLimitable') || $wgUser->isPingLimitable() ) ) {
			$key = wfMemcKey( 'acctrequest', 'ip', wfGetIP() );
			$value = $wgMemc->get( $key );
			if( $value > $wgAccountRequestThrottle ) {
				$this->throttleHit( $wgAccountRequestThrottle );
				return;
			}
		}
		# Check if already in use
		if( 0 != $u->idForName() || $wgAuth->userExists( $u->getName() ) ) {
			$this->showForm( wfMsgHtml('userexists') );
			return;
		}
		# Check pending accounts for name use
		$dbw = wfGetDB( DB_MASTER );
		$dup = $dbw->selectField( 'account_requests', '1',
			array( 'acr_name' => $u->getName() ),
			__METHOD__ );
		if( $dup ) {
			$this->showForm( wfMsgHtml('requestaccount-inuse') );
			return;
		}
		# Make sure user agrees to policy here
		global $wgAccountRequestToS;
		if( $wgAccountRequestToS && !$this->mToS ) {
			$this->showForm( wfMsgHtml('requestaccount-agree') );
			return;
		}
		# Validate email address
		if( !$u->isValidEmailAddr( $this->mEmail ) ) {
			$this->showForm( wfMsgHtml('invalidemailaddress') );
			return;
		}
		global $wgAccountRequestMinWords;
		# Check if biography is long enough
		if( str_word_count($this->mBio) < $wgAccountRequestMinWords ) {
			$this->showForm( wfMsgHtml('requestaccount-tooshort',$wgAccountRequestMinWords) );
			return;
		}
		# Set some additional data so the AbortNewAccount hook can be
		# used for more than just username validation
		$u->setEmail( $this->mEmail );
		$u->setRealName( $this->mRealName );
		# Let captchas deny request...
		global $wgCaptcha;
		if( isset($wgCaptcha) ) {
			$abortError = '';
			$wgCaptcha->confirmUserCreate( $u, $abortError );
			if( $abortError ) {
				$this->showForm( $abortError );
				return false;
			}
		}
		# Per security reasons, file dir cannot be pulled from client,
		# so ask them to resubmit it then...
		global $wgAllowAccountRequestFiles, $wgAccountRequestExtraInfo;
		# If the extra fields are off, then uploads are off
		$allowFiles = $wgAccountRequestExtraInfo && $wgAllowAccountRequestFiles;
		if( $allowFiles && $this->mPrevAttachment && !$this->mSrcName ) {
			# If the user is submitting forgotAttachment as true with no file, 
			# then they saw the notice and choose not to re-select the file. 
			# Assume that they don't want to send one anymore.
			if( !$this->mForgotAttachment ) {
				$this->mPrevAttachment = '';
				$this->showForm( wfMsgHtml('requestaccount-resub'), 1 );
				return false;
			}
		}
		# Process upload...
		if( $allowFiles && $this->mSrcName ) {
			$ext = explode('.',$this->mSrcName);
			$finalExt = $ext[count($ext)-1];
			# File must have size.
			if( trim( $this->mSrcName ) == '' || empty( $this->mFileSize ) ) {
				$this->mPrevAttachment = '';
				$this->showForm( wfMsgHtml( 'emptyfile' ) );
				return false;
			}
    		# Look at the contents of the file; if we can recognize the
		 	# type but it's corrupt or data of the wrong type, we should
		 	# probably not accept it.
		 	global $wgAccountRequestExts;
		 	if( !in_array($finalExt,$wgAccountRequestExts) ) {
		 		$this->mPrevAttachment = '';
				$this->showForm( wfMsgHtml( 'requestaccount-exts' ) );
				return false;
		 	}
			$fileProps = File::getPropsFromPath( $this->mTempPath, $finalExt );
			$veri = $this->verify( $this->mTempPath, $finalExt );
			if( $veri !== true ) {
				$this->mPrevAttachment = '';
				$this->showForm( wfMsgHtml( 'uploadcorrupt' ) );
				return false;
			}
			# Start a transaction, move file from temp to account request directory.
			$transaction = new FSTransaction();
			if( !FileStore::lock() ) {
				wfDebug( __METHOD__.": failed to acquire file store lock, aborting\n" );
				return false;
			}
			$store = FileStore::get( 'accountreqs' );
			$key = FileStore::calculateKey( $this->mTempPath, $finalExt );
			
			$transaction->add( $store->insert( $key, $this->mTempPath, FileStore::DELETE_ORIGINAL ) );
			if( $transaction === false ) {
				// Failed to move?
				wfDebug( __METHOD__.": import to file store failed, aborting\n" );
				throw new MWException( "Could not archive and delete file $oldpath" );
				return false;
			}
		}
		# Insert into pending requests...
		$dbw->begin();
		
		$expires = null; // passed by reference
		$token = $this->getConfirmationToken( $u, $expires );
		
		$acr_id = $dbw->nextSequenceValue( 'account_requests_acr_id_seq' );
		$dbw->insert( 'account_requests', 
			array( 
				'acr_id' => $acr_id,
				'acr_name' => $u->mName,
				'acr_email' => $u->mEmail,
				'acr_real_name' => $u->mRealName,
				'acr_registration' => $dbw->timestamp(),
				'acr_bio' => $this->mBio,
				'acr_notes' => $this->mNotes,
				'acr_urls' => $this->mUrls,
				'acr_filename' => isset($this->mSrcName) ? $this->mSrcName : null,
				'acr_storage_key' => isset($key) ? $key : null,
				'acr_comment' => '',
				'acr_email_token' => md5($token),
			    'acr_email_token_expires' => $dbw->timestamp( $expires ),
				'acr_ip' => wfGetIP() // Possible use for spam blocking
			),
			__METHOD__ 
		);
		# Send confirmation, required!
		$result = $this->sendConfirmationMail( $u, $token, $expires );
		if( WikiError::isError( $result ) ) {
			$dbw->rollback(); // Nevermind
			$error = wfMsg( 'mailerror', htmlspecialchars( $result->getMessage() ) );
			$this->showForm( $error );
			return false;
		}
		$dbw->commit();
		if( isset($transaction) ) {
			wfDebug( __METHOD__.": set db items, applying file transactions\n" );
			$transaction->commit();
			FileStore::unlock();
		}
		# No request spamming...
		# BC: check if isPingLimitable() exists
		if( $wgAccountRequestThrottle && ( !method_exists($wgUser,'isPingLimitable') || $wgUser->isPingLimitable() ) ) {
			$key = wfMemcKey( 'acctrequest', 'ip', wfGetIP() );
			$value = $wgMemc->incr( $key );
			if( !$value ) {
				$wgMemc->set( $key, 1, 86400 );
			}
		}
		# Done!
		$this->showSuccess();
	}

	function showSuccess() {
		global $wgOut;

		$wgOut->setPagetitle( wfMsg( "requestaccount" ) );
		$wgOut->addWikiText( wfMsg( "requestaccount-sent" ) );

		$wgOut->returnToMain();
	}
	
	/**
	 * Initialize the uploaded file from PHP data
	 * @access private
	 */
	function initializeUpload( $request ) {
		$this->mTempPath       = $request->getFileTempName( 'wpUploadFile' );
		$this->mFileSize       = $request->getFileSize( 'wpUploadFile' );
		$this->mSrcName        = $request->getFileName( 'wpUploadFile' );
		$this->mRemoveTempFile = false; // PHP will handle this
	}
	
	/**
	 * Verifies that it's ok to include the uploaded file
	 *
	 * @param string $tmpfile the full path of the temporary file to verify
	 * @param string $extension The filename extension that the file is to be served with
	 * @return mixed true of the file is verified, a WikiError object otherwise.
	 */
	function verify( $tmpfile, $extension ) {
		#magically determine mime type
		$magic=& MimeMagic::singleton();
		$mime = $magic->guessMimeType($tmpfile,false);

		#check mime type, if desired
		global $wgVerifyMimeType;
		if ($wgVerifyMimeType) {

		  wfDebug ( "\n\nmime: <$mime> extension: <$extension>\n\n");
			#check mime type against file extension
			if( !$this->verifyExtension( $mime, $extension ) ) {
				return new WikiErrorMsg( 'uploadcorrupt' );
			}

			#check mime type blacklist
			global $wgMimeTypeBlacklist;
			if( isset($wgMimeTypeBlacklist) && !is_null($wgMimeTypeBlacklist)
				&& $this->checkFileExtension( $mime, $wgMimeTypeBlacklist ) ) {
				return new WikiErrorMsg( 'filetype-badmime', htmlspecialchars( $mime ) );
			}
		}

		wfDebug( __METHOD__.": all clear; passing.\n" );
		return true;
	}
	
	/**
	 * Checks if the mime type of the uploaded file matches the file extension.
	 *
	 * @param string $mime the mime type of the uploaded file
	 * @param string $extension The filename extension that the file is to be served with
	 * @return bool
	 */
	function verifyExtension( $mime, $extension ) {
		$magic =& MimeMagic::singleton();

		if ( ! $mime || $mime == 'unknown' || $mime == 'unknown/unknown' )
			if ( ! $magic->isRecognizableExtension( $extension ) ) {
				wfDebug( __METHOD__.": passing file with unknown detected mime type; " .
					"unrecognized extension '$extension', can't verify\n" );
				return true;
			} else {
				wfDebug( __METHOD__.": rejecting file with unknown detected mime type; ".
					"recognized extension '$extension', so probably invalid file\n" );
				return false;
			}

		$match = $magic->isMatchingExtension($extension,$mime);

		if ($match===NULL) {
			wfDebug( __METHOD__.": no file extension known for mime type $mime, passing file\n" );
			return true;
		} elseif ($match===true) {
			wfDebug( __METHOD__.": mime type $mime matches extension $extension, passing file\n" );

			#TODO: if it's a bitmap, make sure PHP or ImageMagic resp. can handle it!
			return true;

		} else {
			wfDebug( __METHOD__.": mime type $mime mismatches file extension $extension, rejecting file\n" );
			return false;
		}
	}
	
	/**
	 * Perform case-insensitive match against a list of file extensions.
	 * Returns true if the extension is in the list.
	 *
	 * @param string $ext
	 * @param array $list
	 * @return bool
	 */
	function checkFileExtension( $ext, $list ) {
		return in_array( strtolower( $ext ), $list );
	}
	
	/**
	 * @private
	 */
	function throttleHit( $limit ) {
		global $wgOut;

		$wgOut->addWikiText( wfMsgHtml( 'acct_request_throttle_hit', $limit ) );
	}
	
	function confirmEmailToken( $code ) {
		global $wgUser, $wgOut;
		# Confirm if this token is in the pending requests
		$name = $this->requestFromEmailToken( $code );
		if( $name !== false ) {
			$this->confirmEmail( $name );
			$wgOut->addWikiText( wfMsgHtml( 'request-account-econf' ) );
			$wgOut->returnToMain();
			return;
		}
		# Maybe the user confirmed after account was created...
		$user = User::newFromConfirmationCode( $code );
		if( is_object( $user ) ) {
			if( $user->confirmEmail() ) {
				$message = $wgUser->isLoggedIn() ? 'confirmemail_loggedin' : 'confirmemail_success';
				$wgOut->addWikiText( wfMsg( $message ) );
				if( !$wgUser->isLoggedIn() ) {
					$title = SpecialPage::getTitleFor( 'Userlogin' );
					$wgOut->returnToMain( true, $title->getPrefixedUrl() );
				}
			} else {
				$wgOut->addWikiText( wfMsg( 'confirmemail_error' ) );
			}
		} else {
			$wgOut->addWikiText( wfMsg( 'confirmemail_invalid' ) );
		}
	}
	
	/**
	 * Get a request name from an emailconfirm token
	 *
	 * @param sring $code
	 * @returns string $name
	 */		
	function requestFromEmailToken( $code ) {	
		$dbr = wfGetDB( DB_SLAVE );
		$reqID = $dbr->selectField( 'account_requests', 'acr_name', 
			array( 'acr_email_token' => md5($code),
				'acr_email_token_expires > ' . $dbr->addQuotes( $dbr->timestamp() ),
			) 
		);
		return $reqID;
	}
	
	/**
	 * Flag a user's email as confirmed in the db
	 *
	 * @param sring $name
	 */	
	function confirmEmail( $name ) {
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'account_requests', 
			array( 'acr_email_authenticated' => $dbw->timestamp() ),
			array( 'acr_name' => $name ),
			__METHOD__ );
	}
	
	/**
	 * Generate a new e-mail confirmation token and send a confirmation
	 * mail to the user's given address.
	 *
	 * @param User $user
	 * @param string $token
	 * @param string $expiration
	 * @return mixed True on success, a WikiError object on failure.
	 */
	function sendConfirmationMail( $user, $token, $expiration ) {
		global $wgContLang;
		$url = $this->confirmationTokenUrl( $token );
		return $user->sendMail( wfMsg( 'requestaccount-email-subj' ),
			wfMsg( 'requestaccount-email-body',
				wfGetIP(),
				$user->getName(),
				$url,
				$wgContLang->timeanddate( $expiration, false ) ) );
	}	
	
	/**
	 * Generate and store a new e-mail confirmation token, and return
	 * the URL the user can use to confirm.
	 * @param string $token
	 * @return string
	 * @private
	 */
	function confirmationTokenUrl( $token ) {
		$title = Title::makeTitle( NS_SPECIAL, 'RequestAccount' );
		return $title->getFullUrl( 'action=confirmemail&wpEmailToken='.$token );
	}
	
	/**
	 * Generate, store, and return a new e-mail confirmation code.
	 * A hash (unsalted since it's used as a key) is stored.
	 * @param User $user
	 * @param string $expiration
	 * @return string
	 * @private
	 */
	function getConfirmationToken( $user, &$expiration ) {
		$expires = time() + 7 * 24 * 60 * 60;
		$expiration = wfTimestamp( TS_MW, $expires );

		$token = $user->generateToken( $user->getName() . $user->getEmail() . $expires );

		return $token;
	}
	
}

class ConfirmAccountsPage extends SpecialPage
{

    function __construct() {
        SpecialPage::SpecialPage('ConfirmAccounts','confirmaccount');
    }

    function execute( $par ) {
        global $wgRequest, $wgOut, $wgUser;
        
		if( !$wgUser->isAllowed( 'confirmaccount' ) ) {
			$wgOut->permissionRequired( 'confirmaccount' );
			return;
		}

		$this->setHeaders();
		# A target user
		$this->acrID = $wgRequest->getIntOrNull( 'acrid' );
		# Attachments
		$this->file = $wgRequest->getVal( 'file' );
		# For renaming to alot for collisions with other local requests
		# that were added to some global $wgAuth system first.
		$this->mUsername = $wgRequest->getText( 'wpNewName' );
		# For viewing rejects
		$this->showRejects = $wgRequest->getBool( 'wpShowRejects' );
		# Held requests hidden by default
		$this->showHeld = $wgRequest->getBool( 'wpShowHeld' );

		$this->submitType = $wgRequest->getVal( 'wpSubmitType' );
		$this->reason = $wgRequest->getText( 'wpReason' );

		$this->skin = $wgUser->getSkin();

		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			$this->doSubmit();
		} else if( $this->file ) {
			$this->showFile( $this->file );
		} else if( $this->acrID ) {
			$this->showForm();
		} else {
			$this->showList();
		}
	}
	
	function showForm( $msg='' ) {
		global $wgOut, $wgTitle, $wgUser, $wgLang;
		
		# Output failure message
		if( $msg ) {
			$wgOut->addHTML( '<div class="errorbox">' . $msg . '</div><div class="visualClear"></div>' );
		}
		$row = $this->getRequest();
		if( !$row || $row->acr_rejected && !$this->showRejects ) {
			$wgOut->addHTML( wfMsgHtml('confirmaccount-badid') );
			$wgOut->returnToMain( true, $wgTitle );
			return;
		}
		
		$listLink = $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back' ) );
		if( $this->showRejects ) {
			$listLink .= ' / '.$this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back2' ),
				wfArrayToCGI( array('wpShowRejects' => 1 ) ) );
		}
		$wgOut->setSubtitle( '<p>'.$listLink.'</p>' );
		
		$wgOut->addWikiText( wfMsg( "confirmaccount-text" ) );
		
		if( $row->acr_rejected ) {
			$time = $wgLang->timeanddate( wfTimestamp(TS_MW, $row->acr_rejected), true );
			$wgOut->addHTML('<b>'.wfMsgExt( 'confirmaccount-reject', array('parseinline'), 
				User::whoIs($row->acr_user), $time ).'</b>');
		} else if( $row->acr_held ) {
			$time = $wgLang->timeanddate( wfTimestamp(TS_MW, $row->acr_held), true );
			$wgOut->addHTML('<b>'.wfMsgExt( 'confirmaccount-held', array('parseinline'), 
				User::whoIs($row->acr_user), $time ).'</b>');
		}
		
		$action = $wgTitle->escapeLocalUrl( 'action=submit' );
		$form = "<form name='accountconfirm' action='$action' method='post'><fieldset>";
		$form .= '<legend>' . wfMsgHtml('requestaccount-legend1') . '</legend>';
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".Xml::label( wfMsgHtml('username'), 'wpNewName' )."</td>";
		$form .= "<td>".Xml::input( 'wpNewName', 30, $row->acr_name, array('id' => 'wpNewName') )."</td></tr>\n";
		
		$econf = $row->acr_email_authenticated ? ' <strong>'.wfMsgHtml('confirmaccount-econf').'</strong>' : '';
		$form .= "<tr><td>".wfMsgHtml('confirmaccount-email')."</td>";
		$form .= "<td>".htmlspecialchars($row->acr_email).$econf."</td></tr>\n";
		$form .= '</table></fieldset>';
		
		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('requestaccount-legend2') . '</legend>';
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".wfMsgHtml('confirmaccount-real')."</td>";
		$form .= "<td>".htmlspecialchars($row->acr_real_name)."</td></tr>\n";
		$form .= '</table cellpadding=\'4\'>';
		$form .= "<p>".wfMsgHtml('confirmaccount-bio')."</p>";
		$form .= "<p><textarea tabindex='1' readonly name='wpBio' id='wpBio' rows='10' cols='80' style='width:100%'>" .
			htmlspecialchars($row->acr_bio) .
			"</textarea></p>\n";
		$form .= '</fieldset>';
		
		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('requestaccount-legend3') . '</legend>';
		$form .= '<p>'.wfMsgHtml('confirmaccount-attach') . ' ';
		if( $row->acr_filename ) {
			$form .= $this->skin->makeKnownLinkObj( $wgTitle, htmlspecialchars($row->acr_filename),
				'file=' . $row->acr_storage_key );
		} else {
			$form .= wfMsgHtml('confirmaccount-none-p');
		}
		$form .= "</p><p>".wfMsgHtml('confirmaccount-notes')."</p>\n";
		$form .= "<p><textarea tabindex='1' readonly name='wpNotes' id='wpNotes' rows='3' cols='80' style='width:100%'>" .
			htmlspecialchars($row->acr_notes) .
			"</textarea></p>\n";
		$form .= "<p>".wfMsgHtml('confirmaccount-urls')."</p>\n";
		$form .= "<p>".$this->parseLinks($row->acr_urls)."</p>";
		if( $wgUser->isAllowed( 'requestips' ) ) {
			$blokip = SpecialPage::getTitleFor( 'blockip' );
			$form .= "<p>".wfMsgHtml('confirmaccount-ip')." ".htmlspecialchars($row->acr_ip).
			" (" . $this->skin->makeKnownLinkObj( $blokip, wfMsgHtml('blockip'), 
				'ip=' . $row->acr_ip . '&wpCreateAccount=1' ).")</p>\n";
		}
		$form .= '</fieldset>';
		
		$form .= "<p>".wfMsgExt( 'confirmaccount-confirm', array('parse') )."</p>\n";
		$form .= "<table cellpadding='5'><tr>";
		$form .= "<td>".Xml::radio( 'wpSubmitType', 'accept', $this->submitType=='accept', 
			array('id' => 'submitCreate', 'onClick' => 'document.getElementById("wpComment").style.display="block"') );
		$form .= ' '.Xml::label( wfMsg('confirmaccount-create'), 'submitCreate' )."</td>\n";
		$form .= "<td>".Xml::radio( 'wpSubmitType', 'reject', $this->submitType=='reject', 
			array('id' => 'submitDeny', 'onClick' => 'document.getElementById("wpComment").style.display="block"') );
		$form .= ' '.Xml::label( wfMsg('confirmaccount-deny'), 'submitDeny' )."</td>\n";
		$form .= "<td>".Xml::radio( 'wpSubmitType', 'hold', $this->submitType=='hold', 
			array('id' => 'submitHold', 'onClick' => 'document.getElementById("wpComment").style.display="block"') );
		$form .= ' '.Xml::label( wfMsg('confirmaccount-hold'), 'submitHold' )."</td>\n";
		$form .= "<td>".Xml::radio( 'wpSubmitType', 'spam', $this->submitType=='spam', 
			array('id' => 'submitSpam', 'onClick' => 'document.getElementById("wpComment").style.display="none"') );
		$form .= ' '.Xml::label( wfMsg('confirmaccount-spam'), 'submitSpam' )."</td>\n";
		$form .= "</tr></table>";

		$form .= "<div id=wpComment><p>".wfMsgHtml('confirmaccount-reason')."</p>\n";
		$form .= "<p><textarea name='wpReason' id='wpReason' rows='3' cols='80' style='width:80%; display=block;'>" .
			htmlspecialchars($this->reason) .
			"</textarea></p></div>\n";
		$form .= "<p>".Xml::submitButton( wfMsgHtml( 'confirmaccount-submit') )."</p>\n";
		$form .= Xml::hidden( 'title', $wgTitle->getPrefixedUrl() )."\n";
		$form .= Xml::hidden( 'action', 'reject' );
		$form .= Xml::hidden( 'acrid', $row->acr_id );
		$form .= Xml::hidden( 'wpShowRejects', $this->showRejects );
		$form .= Xml::hidden( 'wpEditToken', $wgUser->editToken() )."\n";
		$form .=  '</form>';
		
		$wgOut->addHTML( $form );
	}
	
	/**
	 * Show a private file requested by the visitor.
	 */
	function showFile( $key ) {
		global $wgOut, $wgRequest;
		$wgOut->disable();
		
		# We mustn't allow the output to be Squid cached, otherwise
		# if an admin previews a private image, and it's cached, then
		# a user without appropriate permissions can toddle off and
		# nab the image, and Squid will serve it
		$wgRequest->response()->header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', 0 ) . ' GMT' );
		$wgRequest->response()->header( 'Cache-Control: no-cache, no-store, max-age=0, must-revalidate' );
		$wgRequest->response()->header( 'Pragma: no-cache' );
		
		$store = FileStore::get( 'accountreqs' );
		$store->stream( $key );
	}
	
	function doSubmit() {
		global $wgOut, $wgTitle, $wgAuth;

		$row = $this->getRequest();
		if( !$row ) {
			$wgOut->addHTML( wfMsgHtml('confirmaccount-badid') );
			$wgOut->returnToMain( true, $wgTitle );
			return;
		}

		if( $this->submitType == 'reject' || $this->submitType == 'spam' ) {
			# Make proxy user to email a rejection message :(
			$u = User::newFromName( $row->acr_name, 'creatable' );
			$u->setEmail( $row->acr_email );
			# Do not send multiple times, don't send for "spam" requests
			if( !$row->acr_rejected && $this->submitType != 'spam' ) {
				if( $this->reason ) {
					$result = $u->sendMail( wfMsg( 'confirmaccount-email-subj' ),
						wfMsgExt( 'confirmaccount-email-body4', array('parsemag'), $u->getName(), $this->reason ) );
				} else {
					$result = $u->sendMail( wfMsg( 'confirmaccount-email-subj' ),
						wfMsgExt( 'confirmaccount-email-body3', array('parsemag'), $u->getName() ) );
				}
				if( WikiError::isError( $result ) ) {
					$error = wfMsg( 'mailerror', htmlspecialchars( $result->getMessage() ) );
					$this->showForm( $error );
					return false;
				}
			}
			$dbw = wfGetDB( DB_MASTER );
			# Mark off the row as deleted
			global $wgUser;
			# Request can later be recovered
			$dbw->update( 'account_requests', 
				array( 'acr_rejected' => $dbw->timestamp(),
					'acr_user' => $wgUser->getID(),
					'acr_deleted' => 1 ), 
				array( 'acr_id' => $this->acrID, 'acr_deleted' => 0 ), 
				__METHOD__ );

			$this->showSuccess( $this->submitType );
		} else if( $this->submitType == 'accept' ) {
			global $wgMakeUserPageFromBio, $wgAutoWelcomeNewUsers;
			# Check if the name is to be overridden
			$name = $this->mUsername ? trim($this->mUsername) : $row->acr_name;
			# Now create user and check if the name is valid
			$user = User::newFromName( $name, 'creatable' );	
			if( is_null( $user ) ) {
				$this->showForm( wfMsgHtml('noname') );
				return;
			}
			# Check if already in use
			if( 0 != $user->idForName() || $wgAuth->userExists( $user->getName() ) ) {
				$this->showForm( wfMsgHtml('userexists') );
				return;
			}
			$user = User::createNew( $name );
			# Make a random password
			$p = User::randomPassword();
			# VERY important to set email now. Otherwise user will have to request
			# a new password at the login screen...
			$user->setEmail( $row->acr_email );
			if( $this->reason ) {
				$result = $user->sendMail( wfMsg( 'confirmaccount-email-subj' ),
					wfMsgExt( 'confirmaccount-email-body2', array('parsemag'), $user->getName(), $p, $this->reason ) );
			} else {
				$result = $user->sendMail( wfMsg( 'confirmaccount-email-subj' ),
					wfMsgExt( 'confirmaccount-email-body', array('parsemag'), $user->getName(), $p ) );
			}
			if( WikiError::isError( $result ) ) {
				$error = wfMsg( 'mailerror', htmlspecialchars( $result->getMessage() ) );
				$this->showForm( $error );
				return false;
			}
			if( !$wgAuth->addUser( $user, $p, $row->acr_email, $row->acr_real_name ) ) {
				$this->showForm( wfMsgHtml( 'externaldberror' ) );
				return false;
			}
			# Set password and realname
			$user->setNewpassword( $p );
			$user->setRealName( $row->acr_real_name );
			$user->saveSettings(); // Save this into the DB
			# Check if the user already confirmed email address
			$dbw = wfGetDB( DB_MASTER );
			$dbw->update( 'user',
				array( 'user_email_authenticated' => $row->acr_email_authenticated,
					'user_email_token_expires' => $row->acr_email_token_expires,
					'user_email_token' => $row->acr_email_token ),
				array( 'user_id' => $user->getID() ),
				__METHOD__ );
			# OK, now remove the request
			$dbw->delete( 'account_requests', array('acr_id' => $this->acrID), __METHOD__ );
			# Delete any attached file
			$transaction = new FSTransaction();
			if( !FileStore::lock() ) {
				wfDebug( __METHOD__.": failed to acquire file store lock, aborting\n" );
			}
			$store = FileStore::get( 'accountreqs' );
			# Clear out any associated attachments and delete those rows
			$key = $row->acr_storage_key;
			if( $key ) {
				$path = $store->filePath( $key );
				if( $path && file_exists($path) ) {
					$transaction->addCommit( FSTransaction::DELETE_FILE, $path );
				}
			}
			$transaction->commit();

			wfRunHooks( 'AddNewAccount', array( $user ) );
			# Start up the user's (presumedly brand new) userpages
			# Will not append, so previous content will be blanked
			if( $wgMakeUserPageFromBio ) {
				global $wgAutoUserBioText;
				
				$userpage = new Article( $user->getUserPage() );
				
				$autotext = strval($wgAutoUserBioText);
				$body = $autotext ? "{$row->acr_bio}\n{$autotext}" : $row->acr_bio;
				
				$userpage->doEdit( $body, wfMsg('confirmaccount-summary'), EDIT_MINOR );
			}
			if( $wgAutoWelcomeNewUsers ) {
				$utalk = new Article( $user->getTalkPage() );
				$utalk->doEdit( wfMsg('confirmaccount-welc') . ' ~~~~', 
					wfMsg('confirmaccount-wsum'), EDIT_MINOR );
			}

			$this->showSuccess( $this->submitType, $user->getName() );
		} else if( $this->submitType == 'hold' ) {
			global $wgUser;
			# Make proxy user to email a message
			$u = User::newFromName( $row->acr_name, 'creatable' );
			$u->setEmail( $row->acr_email );
			# Pointless without a summary...
			if( $row->acr_held || ($row->acr_deleted && $row->acr_deleted !='f') ) {
				$error = wfMsg( 'confirmaccount-canthold' );
				$this->showForm( $error );
				return false;
			} else if( !$this->reason ) {
				$error = wfMsg( 'confirmaccount-needreason' );
				$this->showForm( $error );
				return false;
			}
			# If not already held or deleted, mark as held
			$dbw = wfGetDB( DB_MASTER );
			$dbw->begin();
			$dbw->update( 'account_requests',
				array( 'acr_held' => $dbw->timestamp(), 
					'acr_user' => $wgUser->getID() ),
				array( 'acr_id' => $this->acrID, 'acr_held IS NULL', 'acr_deleted' => 0 ), 
					__METHOD__ );
			# Do not send multiple times
			if( !$row->acr_held && !($row->acr_deleted && $row->acr_deleted !='f') ) {
				$result = $u->sendMail( wfMsg( 'confirmaccount-email-subj' ),
						wfMsgExt( 'confirmaccount-email-body5', array('parsemag'), $u->getName(), $this->reason ) );
				if( WikiError::isError( $result ) ) {
					$dbw->rollback();
					$error = wfMsg( 'mailerror', htmlspecialchars( $result->getMessage() ) );
					$this->showForm( $error );
					return false;
				}
			}
			$dbw->commit();
			$this->showSuccess( $this->submitType );
		} else {
			$this->showForm();
		}
	}
	
	/**
	 * Extract a list of all recognized HTTP links in the text.
	 * @param string $text
	 * @return string $linkList, list of clickable links
	 */
	function parseLinks( $text ) {
		global $wgParser, $wgTitle, $wgUser;
		# Don't let this get flooded
		$max = 10;
		$count = 0;

		$linkList = '';
		# Normalize space characters
		$text = str_replace( array("\r","\t"), array("\n"," "), htmlspecialchars($text) );
		# Split out each line as a link
		$lines = explode( "\n", $text );
		foreach( $lines as $line ) {
			$links = explode(" ",$line,2);
			$link = $links[0];
			# Any explanation text is not part of the link...
			$extra = isset($links[1]) ? ' '.$links[1] : '';
			if( strpos($link,'.') ) {
				$link = ( strpos($link,'http://')===false ) ? 'http://'.$link : $link;
				$linkList .= "<li><a href='$link'>$link</a>$extra</li>\n";
			}
			$count++;
			if( $count >= $max )
				break;
		}
		if( $linkList == '' ) {
			$linkList = wfMsgHtml( 'confirmaccount-none-p' );
		} else {
			$linkList = "<ul>$linkList</ul>";
		}

		return $linkList;
	}
	
	function getRequest() {
		if( !$this->acrID )
			return false;

		$dbw = wfGetDB( DB_SLAVE );
		$row = $dbw->selectRow( 'account_requests', '*', 
			array('acr_id' => $this->acrID ), 
			__METHOD__ );

		return $row;
	}
	
	function showSuccess( $action, $name = NULL ) {
		global $wgOut, $wgTitle;

		$wgOut->setPagetitle( wfMsgHtml('actioncomplete') );
		if( $this->submitType == 'accept' ) {
			$wgOut->addWikiText( wfMsg( "confirmaccount-acc", $name ) );
		} else if( $this->submitType == 'reject' || $this->submitType == 'spam' ) {
			$wgOut->addWikiText( wfMsg( "confirmaccount-rej" ) );
		} else {
			$wgOut->redirect( $wgTitle->getFullUrl() );
			return;
		}
		# Give link to see other requests
		$wgOut->returnToMain( true, $wgTitle );
	}

	function showList() {
		global $wgOut, $wgUser, $wgTitle, $wgLang;
		
		if( $this->showRejects ) {
			$listLink = $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back' ) );
		} else {
			if( $this->showHeld ) {
				$listLink = $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back' ) ) . ' / ';
			} else {
				$listLink = $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-showheld' ),
					wfArrayToCGI( array( 'wpShowHeld' => 1 ) ) ) . ' / ';
			}
			$listLink .= $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back2' ),
				wfArrayToCGI( array( 'wpShowRejects' => 1 ) ) );
		}
		$wgOut->setSubtitle( '<p>'.$listLink.'</p>' );

		# Every 100th view, prune old deleted items
		wfSeedRandom();
		if( 0 == mt_rand( 0, 99 ) ) {
			global $wgRejectedAccountMaxAge;

			$dbw = wfGetDB( DB_MASTER );
			$transaction = new FSTransaction();
			if( !FileStore::lock() ) {
				wfDebug( __METHOD__.": failed to acquire file store lock, aborting\n" );
				return false;
			}
			# Select all items older than time $cutoff
			$cutoff = $dbw->timestamp( time() - $wgRejectedAccountMaxAge );
			$accountrequests = $dbw->tableName( 'account_requests' );
			$sql = "SELECT acr_storage_key,acr_id FROM $accountrequests WHERE acr_rejected < '{$cutoff}'";
			$res = $dbw->query( $sql );

			$store = FileStore::get( 'accountreqs' );
			# Clear out any associated attachments and delete those rows
			while( $row = $dbw->fetchObject( $res ) ) {
				$key = $row->acr_storage_key;
				if( $key ) {
					$path = $store->filePath( $key );
					if( $path && file_exists($path) ) {
						$transaction->addCommit( FSTransaction::DELETE_FILE, $path );
						$dbw->query( "DELETE FROM $accountrequests WHERE acr_id = {$row->acr_id}" );
					}
				}
			}
			$transaction->commit();
		}

		$pager = new ConfirmAccountsPager( $this, array(), $this->showRejects, $this->showHeld );
			
		if ( $pager->getNumRows() ) {
			if( $this->showRejects )
				$wgOut->addHTML( wfMsgExt('confirmaccount-list2', array('parse') ) );
			else
				$wgOut->addHTML( wfMsgExt('confirmaccount-list', array('parse') ) );
			$wgOut->addHTML( $pager->getNavigationBar() );
			$wgOut->addHTML( "<ul>" . $pager->getBody() . "</ul>" );
			$wgOut->addHTML( $pager->getNavigationBar() );
		} else {
			if( $this->showRejects )
				$wgOut->addHTML( wfMsgExt('confirmaccount-none2', array('parse')) );
			else
				$wgOut->addHTML( wfMsgExt('confirmaccount-none', array('parse')) );
		}
	}
	
	function formatRow( $row ) {
		global $wgLang, $wgUser, $wgUseRealNamesOnly;

		$title = SpecialPage::getTitleFor( 'ConfirmAccounts' );
		if( $this->showRejects ) {
			$link = $this->skin->makeKnownLinkObj( $title, wfMsgHtml('confirmaccount-review'), 
				'acrid='.$row->acr_id.'&wpShowRejects=1' );
		} else {
			$link = $this->skin->makeKnownLinkObj( $title, wfMsgHtml('confirmaccount-review'), 
				'acrid='.$row->acr_id );
		}
		$time = $wgLang->timeanddate( wfTimestamp(TS_MW, $row->acr_registration), true );
		
		$r = '<li>';
		if( $row->acr_held ) {
			$r .= '<span class="confirmaccount-held">';
		}
		
		$r .= $time." ($link)";
		if( $this->showRejects ) {
			$time = $wgLang->timeanddate( wfTimestamp(TS_MW, $row->acr_rejected), true );
			$r .= ' <b>'.wfMsgExt( 'confirmaccount-reject', array('parseinline'), $row->user_name, $time ).'</b>';
		} else if( $row->acr_held ) {
			$time = $wgLang->timeanddate( wfTimestamp(TS_MW, $row->acr_held), true );
			$r .= ' <b>'.wfMsgExt( 'confirmaccount-held', array('parseinline'), User::whoIs($row->acr_user), $time ).'</b>';
		}
		$r .= '<br/><table cellspacing=\'1\' cellpadding=\'3\' border=\'1\' width=\'100%\'>';
		if( !$wgUseRealNamesOnly ) {
			$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-name').'</strong></td><td width=\'100%\'>' .
				htmlspecialchars($row->acr_name) . '</td></tr>';
		}
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-real-q').'</strong></td><td width=\'100%\'>' .
			htmlspecialchars($row->acr_real_name) . '</td></tr>';
		$econf = $row->acr_email_authenticated ? ' <strong>'.wfMsg('confirmaccount-econf').'</strong>' : '';
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-email-q').'</strong></td><td width=\'100%\'>' .
			htmlspecialchars($row->acr_email) . $econf.'</td></tr>';
		# Truncate this, blah blah...
		$bio = htmlspecialchars($row->acr_bio);
		$preview = $wgLang->truncate( $bio, 400 );
		if( strlen($preview) < strlen($bio) ) {
			$preview = substr( $preview, 0, strrpos($preview,' ') );
			$preview .= " . . .";
		}
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-bio-q') .
			'</strong></td><td width=\'100%\'><i>'.$preview.'</i></td></tr>';
		$r .= '</table>';
		if( $row->acr_held ) {
			$r .= '</span>';
		}
		$r .= '</li>';
		
		return $r;
	}
}

/**
 * Query to list out pending accounts
 */
class ConfirmAccountsPager extends ReverseChronologicalPager {
	public $mForm, $mConds;

	function __construct( $form, $conds = array(), $rejects=false, $showHeld=false ) {
		$this->mForm = $form;
		$this->mConds = $conds;
		if( $rejects ) {
			$this->mConds['acr_deleted'] = 1;
		} else {
			$this->mConds['acr_deleted'] = 0;
			if( !$showHeld )
				$this->mConds[] = 'acr_held IS NULL';
		}
		$this->rejects = $rejects;
		parent::__construct();
		# Treat 20 as the default limit, since each entry takes up 5 rows.
		$urlLimit = $this->mRequest->getInt( 'limit' );
		$this->mLimit = $urlLimit ? $urlLimit : 20;
	}
	
	function formatRow( $row ) {
		$block = new Block;
		return $this->mForm->formatRow( $row );
	}

	function getQueryInfo() {
		$conds = $this->mConds;
		$tables = array('account_requests');
		$fields = array('acr_id','acr_name','acr_real_name','acr_registration','acr_held',
			'acr_email','acr_email_authenticated','acr_bio','acr_notes','acr_urls','acr_user');
		if( $this->rejects ) {
			$tables[] = 'user';
			$conds[] = 'acr_user = user_id';
			$fields[] = 'user_name';
			$fields[] = 'acr_rejected';
		}
		return array(
			'tables' => $tables,
			'fields' => $fields,
			'conds' => $conds
		);
	}

	function getIndexField() {
		return 'acr_registration';
	}
}
