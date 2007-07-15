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
		global $wgUser, $wgOut, $wgRequest, $action ;

		if( $wgUser->isBlocked() ) {
			$wgOut->blockedPage();
			return;
		}
		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		$this->setHeaders();

		$this->mUsername = $wgRequest->getText( 'wpUsername' );
		$this->mRealName = $wgRequest->getText( 'wpRealName' );
		$this->mEmail = $wgRequest->getText( 'wpEmail' );
		$this->mBio = $wgRequest->getText( 'wpBio' );
		$this->mNotes = $wgRequest->getText( 'wpNotes' );
		$this->mUrls = $wgRequest->getText( 'wpUrls' );
		$emailCode = $wgRequest->getText( 'wpEmailToken' );

		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			$this->doSubmit();
		} else if( $action == 'confirmemail' ) {
			$this->confirmEmailToken( $emailCode );
		} else {
			$this->showForm();
		}
	}

	function showForm( $msg='' ) {
		global $wgOut, $wgUser, $wgTitle, $wgAuth;

		$wgOut->setPagetitle( wfMsg( "requestaccount" ) );
		# Output failure message
		if( $msg ) {
			$wgOut->addHTML( '<div class="errorbox">' . $msg . '</div><div class="visualClear"></div>' );
		}
		# Give notice to users that are logged in
		if( $wgUser->getID() ) {
			$wgOut->addWikiText( wfMsg( "requestaccount-dup" ) );
		}

		$wgOut->addWikiText( wfMsg( "requestacount-text" ) );

		$action = $wgTitle->escapeLocalUrl( 'action=submit' );
		$form = "<form name='accountrequest' action='$action' method='post'><fieldset>";
		$form .= '<legend>' . wfMsg('requestacount-legend1') . '</legend>';
		$form .= "<p>".wfMsgExt( 'requestacount-acc-text', array('parse') )."</p>\n";
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".Xml::label( wfMsgHtml('username'), 'wpUsername' )."</td>";
		$form .= "<td>".Xml::input( 'wpUsername', 30, $this->mUsername, array('id' => 'wpUsername') )."</td></tr>\n";
		$form .= "<tr><td>".Xml::label( wfMsgHtml('requestaccount-email'), 'wpEmail' )."</td>";
		$form .= "<td>".Xml::input( 'wpEmail', 30, $this->mEmail, array('id' => 'wpEmail') )."</td></tr>\n";
		$form .= '</table></fieldset>';

		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsg('requestacount-legend2') . '</legend>';
		$form .= "<p>".wfMsgExt( 'requestaccount-bio-text', array('parse') )."</p>\n";
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".Xml::label( wfMsgHtml('requestaccount-real'), 'wpRealName' )."</td>";
		$form .= "<td>".Xml::input( 'wpRealName', 35, $this->mRealName, array('id' => 'wpRealName') )."</td></tr>\n";
		$form .= '</table cellpadding=\'4\'>';
		$form .= "<p>".wfMsgHtml('requestaccount-bio')."</p>";
		$form .= "<p><textarea tabindex='1' name='wpBio' id='wpBio' rows='10' cols='80' style='width:100%'>" .
			$this->mBio .
			"</textarea></p>";
		$form .= '</fieldset>';

		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsg('requestacount-legend3') . '</legend>';
		$form .= "<p>".wfMsgExt( 'requestacount-ext-text', array('parse') )."</p>\n";

		$form .= "<p>".wfMsgHtml('requestaccount-notes')."</p>\n";
		$form .= "<p><textarea tabindex='1' name='wpNotes' id='wpNotes' rows='3' cols='80' style='width:100%'>" .
			$this->mNotes .
			"</textarea></p>";
		$form .= "<p>".wfMsgHtml('requestaccount-urls')."</p>\n";
		$form .= "<p><textarea tabindex='1' name='wpUrls' id='wpUrls' rows='2' cols='80' style='width:100%'>" .
			$this->mUrls .
			"</textarea></p>";

		$form .= Xml::hidden( 'title', $wgTitle->getPrefixedText() )."\n";
		$form .= Xml::hidden( 'wpEditToken', $wgUser->editToken() )."\n";
		$form .= '</fieldset>';

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

		$form .= "<p>".wfMsgExt( 'requestacount-confirm', array('parse') )."</p>\n";
		$form .= "<p>".Xml::submitButton( wfMsgHtml( 'requestacount-submit') ) . "</p></fieldset>";
		$form .=  '</form>';

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
		# Validate email address
		if( !$u->isValidEmailAddr( $this->mEmail ) ) {
			$this->showForm( wfMsgHtml('invalidemailaddress') );
			return;
		}
		# Set some additional data so the AbortNewAccount hook can be
		# used for more than just username validation
		$u->setEmail( $this->mEmail );
		$u->setRealName( $this->mRealName );
		# Let captchas confirm
		global $wgCaptcha;
		if( isset($wgCaptcha) ) {
			$abortError = '';
			$wgCaptcha->confirmUserCreate( $u, &$abortError );
			if( $abortError ) {
				$this->showForm( $abortError );
				return false;
			}
		}
		# Insert into pending requests...
		$dbw->begin();
		$dbw->insert( 'account_requests', 
			array(
				'acr_name' => $u->mName,
				'acr_email' => $u->mEmail,
				'acr_real_name' => $u->mRealName,
				'acr_registration' => wfTimestampNow(),
				'acr_bio' => $this->mBio,
				'acr_notes' => $this->mNotes,
				'acr_urls' => $this->mUrls,
				'acr_ip' => wfGetIP() // Possible use for spam blocking
			),
			__METHOD__ 
		);
		# Send confirmation, required!
		$result = $this->sendConfirmationMail( $u );
		if( WikiError::isError( $result ) ) {
			$error = wfMsg( 'mailerror', htmlspecialchars( $result->getMessage() ) );
			$this->showForm( $error );
			$dbw->rollback(); // Nevermind
			return false;
		}
		$dbw->commit();
		# Now request spamming!
		if( $wgAccountRequestThrottle && $wgUser->isPingLimitable() ) {
			$key = wfMemcKey( 'acctrequest', 'ip', wfGetIP() );
			$value = $wgMemc->incr( $key );
			if( !$value ) {
				$wgMemc->set( $key, 1, 86400 );
			}
			if( $value > $wgAccountRequestThrottle ) {
				$this->throttleHit( $wgAccountRequestThrottle );
				return false;
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
	 * @private
	 */
	function throttleHit( $limit ) {
		global $wgOut;

		$wgOut->addWikiText( wfMsg( 'acct_request_throttle_hit', $limit ) );
	}
	
	function confirmEmailToken( $code ) {
		global $wgUser, $wgOut;
		# Confirm if this token is in the pending requests
		$name = $this->requestFromEmailToken( $code );
		if( $name !== false ) {
			$this->confirmEmail( $name );
			$message = $wgUser->isLoggedIn() ? 'confirmemail_loggedin' : 'confirmemail_success';
			$wgOut->addWikiText( wfMsg( $message ) );
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
					$wgOut->returnToMain( true, $title->getPrefixedText() );
				}
			} else {
				$wgOut->addWikiText( wfMsg( 'confirmemail_error' ) );
			}
		} else {
			$wgOut->addWikiText( wfMsg( 'confirmemail_invalid' ) );
		}
	}
	
	/**
	 * Get a request ID from an emailconfirm token
	 *
	 * @param Sring $code
	 * @returns Integer $reqID
	 */		
	function requestFromEmailToken( $code ) {	
		$dbr = wfGetDB( DB_SLAVE );
		$reqID = $dbr->selectField( 'account_requests', 'acr_name', 
			array( 'acr_email_token' => md5( $code ),
				'acr_email_token_expires > ' . $dbr->addQuotes( $dbr->timestamp() ),
			) 
		);
		return $reqID;
	}
	
	/**
	 * Flag a user's email as confirmed in the db
	 *
	 * @param Sring $name
	 */	
	function confirmEmail( $name ) {
		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'account_requests', 
			array( 'acr_email_authenticated' => wfTimestampNow() ),
			array( 'acr_name' => $name ),
			__METHOD__ );
	}
	
	/**
	 * Generate a new e-mail confirmation token and send a confirmation
	 * mail to the user's given address.
	 *
	 * @param User $user
	 * @return mixed True on success, a WikiError object on failure.
	 */
	function sendConfirmationMail( $user ) {
		global $wgContLang;
		$expiration = null; // gets passed-by-ref and defined in next line.
		$url = $this->confirmationTokenUrl( $user, $expiration );
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
	 * @param User $user
	 * @return string
	 * @private
	 */
	function confirmationTokenUrl( $user, &$expiration ) {
		$token = $this->confirmationToken( $user, $expiration );
		$title = Title::makeTitle( NS_SPECIAL, 'RequestAccount' );
		return $title->getFullUrl( 'action=confirmemail&wpEmailToken='.$token );
	}
	
	/**
	 * Generate, store, and return a new e-mail confirmation code.
	 * A hash (unsalted since it's used as a key) is stored.
	 * @param User $user
	 * @return string
	 * @private
	 */
	function confirmationToken( $user, &$expiration ) {
		$now = time();
		$expires = $now + 7 * 24 * 60 * 60;
		$expiration = wfTimestamp( TS_MW, $expires );

		$token = $user->generateToken( $user->getName() . $user->getEmail() . $expires );
		$hash = md5( $token );

		$dbw = wfGetDB( DB_MASTER );
		$dbw->update( 'account_requests',
			array( 'acr_email_token'         => $hash,
			       'acr_email_token_expires' => $dbw->timestamp( $expires ) ),
			array( 'acr_name'                => $user->getName() ),
			__METHOD__ );

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
		# For renaming to alot for collisions with other local requests
		# that were added to some global $wgAuth system first.
		$this->mUsername = $wgRequest->getIntOrNull( 'wpNewName' );

		$this->skin = $wgUser->getSkin();

		if ( $wgRequest->wasPosted() && $wgUser->matchEditToken( $wgRequest->getVal( 'wpEditToken' ) ) ) {
			$this->doSubmit();
		} else if( $this->acrID ) {
			$this->showForm();
		} else {
			$this->showList();
		}
	}
	
	function doSubmit() {
		global $wgOut, $wgTitle, $wgAuth, $action;

		$row = $this->getRequest();
		if( !$row ) {
			$wgOut->addHTML( wfMsg('confirmaccount-badid') );
			$wgOut->returnToMain( null, $wgTitle );
			return;
		}
		
		if( $action == 'reject' ) {
			$dbw = wfGetDB( DB_MASTER );
			$dbw->delete( 'account_requests', array('acr_id' => $this->acrID), __METHOD__ );
			
			$this->showSuccess( $action );
		} else if( $action == 'accept' ) {
			global $wgMakeUserPageFromBio;
			# Check if the name is to be overridden
			$name = $this->mUsername ? trim($this->mUsername) : $row->acr_name;
			# Now create a dummy user ($u) and check if it is valid
			$u = User::newFromName( $name, 'creatable' );	
			if( is_null( $u ) ) {
				$this->showForm( wfMsgHtml('noname') );
				return;
			}
			# Check if already in use
			if( 0 != $u->idForName() || $wgAuth->userExists( $u->getName() ) ) {
				$this->showForm( wfMsgHtml('userexists') );
				return;
			}
			
			$pass = User::randomPassword();
			if( !$wgAuth->addUser( $u, $pass, $row->acr_email, $row->acr_real_name ) ) {
				$this->showForm( wfMsg( 'externaldberror' ) );
				return false;
			}
			# Now that name is validated, create the stub account
			$user = User::createNew( $name );
			# VERY important to set email now. Otherwise user will have to request
			# a new password at the login screen...
			$user->setEmail( $row->acr_email );
			$user->setRealName( $row->acr_real_name );
			$user->setPassword( $pass );
			$user->saveSettings(); // Save this stuff now
			# Email this password
			$user->sendMail( wfMsg( 'confirmaccount-email-subj' ),
				wfMsg( 'confirmaccount-email-body',
					$user->getName(),
					$pass ) );
			# Check if the user already confirmed email address
			$dbw = wfGetDB( DB_MASTER );
			$dbw->update( 'user', 
				array( 'user_email_authenticated' => $row->acr_email_authenticated,
					'user_email_token_expires' => $row->acr_email_token_expires ),
				array( 'user_id' => $user->getID() ),
				__METHOD__ );
				
			# OK, now remove the request
			$dbw->delete( 'account_requests', array('acr_id' => $this->acrID), __METHOD__ );
				
			wfRunHooks( 'AddNewAccount', array( $user ) );
			# Start up the user's brand new userpage
			if( $wgMakeUserPageFromBio ) {
				$userpage = new Article( $user->getUserPage() );
				$userpage->doEdit( $row->acr_bio, wfMsg('confirmaccount-summary'), EDIT_NEW );
			}
			
			$this->showSuccess( $action, $user->getName() );
		}
	}
	
	function showForm( $msg='' ) {
		global $wgOut, $wgTitle, $wgUser;
		
		# Output failure message
		if( $msg ) {
			$wgOut->addHTML( '<div class="errorbox">' . $msg . '</div><div class="visualClear"></div>' );
		}
		
		$listLink = $this->skin->makeKnownLinkObj( $wgTitle, wfMsgHtml( 'confirmaccount-back' ) );
		$wgOut->setSubtitle( '<p>'.$listLink.'</p>' );
		
		$row = $this->getRequest();
		if( !$row ) {
			$wgOut->addHTML( wfMsg('confirmaccount-badid') );
			$wgOut->returnToMain( null, $wgTitle );
			return;
		}
		
		$wgOut->addWikiText( wfMsg( "confirmacount-text" ) );
		
		$action = $wgTitle->escapeLocalUrl( 'action=submit' );
		$form = "<form name='accountconfirm' action='$action' method='post'><fieldset>";
		$form .= '<legend>' . wfMsg('requestacount-legend1') . '</legend>';
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".Xml::label( wfMsgHtml('username'), 'wpUsername' )."</td>";
		$form .= "<td>".Xml::input( 'wpUsername', 30, $row->acr_name, array('id' => 'wpUsername') )."</td></tr>\n";
		
		$econf = $row->acr_email_authenticated ? ' <strong>'.wfMsg('confirmaccount-econf').'</strong>' : '';
		$form .= "<tr><td>".wfMsgHtml('requestaccount-email')."</td>";
		$form .= "<td>".$row->acr_email.$econf."</td></tr>\n";
		$form .= '</table></fieldset>';
		
		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsg('requestacount-legend2') . '</legend>';
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".wfMsgHtml('requestaccount-real')."</td>";
		$form .= "<td>".$row->acr_real_name."</td></tr>\n";
		$form .= '</table cellpadding=\'4\'>';
		$form .= "<p>".wfMsgHtml('requestaccount-bio')."</p>";
		$form .= "<p><textarea tabindex='1' readonly name='wpBio' id='wpBio' rows='10' cols='80' style='width:100%'>" .
			$row->acr_bio .
			"</textarea></p>";
		$form .= '</fieldset>';
		
		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsg('requestacount-legend3') . '</legend>';
		$form .= "<p>".wfMsgHtml('requestaccount-notes')."</p>\n";
		$form .= "<p><textarea tabindex='1' readonly name='wpNotes' id='wpNotes' rows='3' cols='80' style='width:100%'>" .
			$row->acr_notes .
			"</textarea></p>";
		$form .= "<p>".wfMsgHtml('requestaccount-urls')."</p>\n";
		$form .= "<p><textarea tabindex='1' readonly name='wpUrls' id='wpUrls' rows='2' cols='80' style='width:100%'>" .
			$row->acr_urls .
			"</textarea></p>";
		$form .= '</fieldset>';
		
		$form .= Xml::hidden( 'title', $wgTitle->getPrefixedText() )."\n";
		$form .= Xml::hidden( 'action', 'accept' );
		$form .= Xml::hidden( 'acrid', $row->acr_id );
		$form .= Xml::hidden( 'wpEditToken', $wgUser->editToken() )."\n";
		
		$form .= "<p>".wfMsgExt( 'confirmacount-confirm', array('parse') )."</p>\n";
		$form .= '<div style="float: left">'.Xml::submitButton( wfMsgHtml( 'confirmacount-create') ).'</div>';
		$form .=  '</form>';
		# Make deny use a separate form to avoid problems with people pressing enter
		$form .= "<form name='accountreject' action='$action' method='post'>";
		$form .= '<div style="float: right">'.Xml::submitButton( wfMsgHtml( 'confirmacount-deny') ) . "</div>";
		$form .= Xml::hidden( 'title', $wgTitle->getPrefixedText() )."\n";
		$form .= Xml::hidden( 'action', 'reject' );
		$form .= Xml::hidden( 'acrid', $row->acr_id );
		$form .= Xml::hidden( 'wpEditToken', $wgUser->editToken() )."\n";
		$form .=  '</form>';
		
		$wgOut->addHTML( $form );
	}
	
	function getRequest() {
		if( !$this->acrID )
			return false;

		$dbw = wfGetDB( DB_SLAVE );
		$row = $dbw->selectRow( 'account_requests', '*', array('acr_id' => $this->acrID ), __METHOD__ );

		return $row;
	}
	
	function showSuccess( $action, $name = NULL ) {
		global $wgOut, $wgTitle;

		$wgOut->setPagetitle( wfMsg( "requestaccount" ) );
		if( $action == 'accept' )
			$wgOut->addWikiText( wfMsg( "confirmaccount-acc", $name ) );
		else
			$wgOut->addWikiText( wfMsg( "confirmaccount-del" ) );
		
		$wgOut->returnToMain( null, $wgTitle );
	}

	function showList() {
		global $wgOut, $wgUser, $wgLang;

		$pager = new ConfirmAccountsPager( $this, array() );	
		if ( $pager->getNumRows() ) {
			$wgOut->addHTML( wfMsgExt('confirmacount-list', array('parse') ) );
			$wgOut->addHTML( $pager->getNavigationBar() );
			$wgOut->addHTML( "<ul>" . $pager->getBody() . "</ul>" );
			$wgOut->addHTML( $pager->getNavigationBar() );
		} else {
			$wgOut->addHTML( wfMsgExt('confirmacount-none', array('parse')) );
		}
	}
	
	function formatRow( $row ) {
		global $wgLang, $wgUser;

		$title = SpecialPage::getTitleFor( 'ConfirmAccounts' );
		$link = $this->skin->makeKnownLinkObj( $title, wfMsg('confirmaccount-review'), 'acrid='.$row->acr_id );
		$time = $wgLang->timeanddate( wfTimestamp(TS_MW, $row->acr_registration), true );
		
		$r = '<li>';
		$r .= $time." ($link)".'<br/>';
		$r .= '<table cellspacing=\'1\' cellpadding=\'3\' border=\'1\' width=\'100%\'>';
		$r .= '<tr><td><strong>'.wfMsg('confirmaccount-name').'</strong></td><td width=\'100%\'>'.$row->acr_name.'</td></tr>';
		$r .= '<tr><td><strong>'.wfMsg('confirmaccount-real').'</strong></td><td width=\'100%\'>'.$row->acr_real_name.'</td></tr>';
		$econf = $row->acr_email_authenticated ? ' <strong>'.wfMsg('confirmaccount-econf').'</strong>' : '';
		$r .= '<tr><td><strong>'.wfMsg('confirmaccount-email').'</strong></td><td width=\'100%\'>'.$row->acr_email.$econf.'</td></tr>';
		# Truncate this, blah blah...
		$bio = substr( $row->acr_bio, 0, 500 );
		$bio = strlen($bio) < strlen($row->acr_bio) ? "$bio . . ." : $bio;
		
		$r .= '<tr><td><strong>'.wfMsg('confirmaccount-bio').'</strong></td><td width=\'100%\'><i>'.$bio.'</i></td></tr>';
		$r .= '</table></li>';
		
		return $r;
	}
}

/**
 * Query to list out stable versions for a page
 */
class ConfirmAccountsPager extends ReverseChronologicalPager {
	public $mForm, $mConds;

	function __construct( $form, $conds = array() ) {
		$this->mForm = $form;
		$this->mConds = $conds;
		parent::__construct();
	}
	
	function formatRow( $row ) {
		$block = new Block;
		return $this->mForm->formatRow( $row );
	}

	function getQueryInfo() {
		$conds = $this->mConds;
		return array(
			'tables' => array('account_requests'),
			'fields' => 'acr_id,acr_name,acr_real_name,acr_registration,acr_email,acr_email_authenticated,
				acr_bio,acr_notes,acr_urls',
			'conds' => $conds
		);
	}

	function getIndexField() {
		return 'acr_registration';
	}
}
