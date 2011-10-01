<?php

class ConfirmAccountsPage extends SpecialPage {
	protected $queueType = -1;
	protected $acrID = 0;
	protected $file = '';

	protected $showHeld = false;
	protected $showRejects = false;
	protected $showStale = false;

	protected $reqUsername;
	protected $reqType;
	protected $reqBio;
	protected $submitType;
	protected $reqAreas;
	protected $reqAreaSet;
	protected $reason;

	function __construct() {
		parent::__construct( 'ConfirmAccounts', 'confirmaccount' );
	}

	function execute( $par ) {
		global $wgAccountRequestTypes;

		$reqUser = $this->getUser();
		$request = $this->getRequest();

		if ( !$reqUser->isAllowed( 'confirmaccount' ) ) {
			throw new PermissionsError( 'confirmaccount' );
		} elseif ( !$reqUser->getID() ) {
			throw new PermissionsError( 'user' );
		}

		$this->setHeaders();

		$this->specialPageParameter = $par;
		# Use the special page param to act as a super type.
		# Convert this to its integer form.
		$this->queueType = -1;
		foreach ( $wgAccountRequestTypes as $i => $params ) {
			if ( $params[0] === $par ) {
				$this->queueType = $i;
				break;
			}
		}
		# User account request ID
		$this->acrID = $request->getIntOrNull( 'acrid' );
		# Attachment file name to view
		$this->file = $request->getVal( 'file' );

		# Load areas user plans to be active in...
		# @FIXME: move this down and refactor
		$this->reqAreas = $this->reqAreaSet = array();
		if ( wfMsgForContent( 'requestaccount-areas' ) ) {
			$areas = explode("\n*","\n".wfMsg('requestaccount-areas'));
			foreach( $areas as $area ) {
				$set = explode("|",$area,2);
				if ( $set[0] && isset($set[1]) ) {
					$formName = "wpArea-" . htmlspecialchars(str_replace(' ','_',$set[0]));
					$this->reqAreas[$formName] = $request->getInt( $formName, -1 );
					# Make a simple list of interests
					if ( $this->reqAreas[$formName] > 0 ) {
						$this->reqAreaSet[] = str_replace( '_', ' ', $set[0] );
					}
				}
			}
		}

		// Showing a file
		if ( $this->file ) {
			$this->showFile( $this->file );
			return; // nothing else to do
		// Showing or confirming an account request
		} elseif ( $this->acrID ) {
			if ( $request->wasPosted() ) {
				# For renaming to alot for collisions with other local requests
				# that were added to some global $wgAuth system first.
				$this->reqUsername = trim( $request->getText( 'wpNewName' ) );
				# Position sought
				$this->reqType = $request->getIntOrNull( 'wpType' );
				if ( !isset( $wgAccountRequestTypes[$this->reqType] ) ) {
					$this->reqType = null;
				}
				# For removing private info or such from bios
				$this->reqBio = $request->getText( 'wpNewBio' );
				# Action the admin is taking and why
				$this->submitType = $request->getVal( 'wpSubmitType' );
				$this->reason = $request->getText( 'wpReason' );
				# Check if this is a valid submission...
				$token = $request->getVal( 'wpEditToken' );
				if ( $reqUser->matchEditToken( $token, $this->acrID ) ) {
					$this->doAccountConfirmSubmit();
				} else {
					$this->showAccountConfirmForm( wfMsgHtml( 'sessionfailure' ) );
				}
			} else {
				$this->showAccountConfirmForm();
			}
		// Showing all account requests in a queue
		} elseif ( $this->queueType != -1 ) {
			# Held requests hidden by default
			$this->showHeld = $request->getBool( 'wpShowHeld' );
			# Show stale requests
			$this->showStale = $request->getBool( 'wpShowStale' );
			# For viewing rejected requests (stale requests count as rejected)
			$this->showRejects = $request->getBool( 'wpShowRejects' );

			$this->showList();
		// Showing all account request queues
		} else {
			$this->showQueues();
		}

		// Show what queue we are in and links to others
		$this->addQueueSubtitleLinks();

		$this->getOutput()->addModules( 'ext.confirmAccount' ); // CSS
	}

	protected function addQueueSubtitleLinks() {
		$titleObj = SpecialPage::getTitleFor( 'ConfirmAccounts', $this->specialPageParameter );

		# Show other sub-queue links. Grey out the current one.
		# When viewing a request, show them all.
		if ( $this->acrID || $this->showStale || $this->showRejects || $this->showHeld ) {
			$listLink = Linker::link( $titleObj,
				wfMsgHtml( 'confirmaccount-showopen' ), array(), array(), "known" );
		} else {
			$listLink = wfMsgHtml( 'confirmaccount-showopen' );
		}
		if ( $this->acrID || !$this->showHeld ) {
			$listLink = $this->getLang()->pipeList( array(
				$listLink,
				Linker::makeKnownLinkObj( $titleObj,
					wfMsgHtml( 'confirmaccount-showheld' ),
					wfArrayToCGI( array( 'wpShowHeld' => 1 ) ) )
			) );
		} else {
			$listLink = $this->getLang()->pipeList( array(
				$listLink,
				wfMsgHtml( 'confirmaccount-showheld' )
			) );
		}
		if ( $this->acrID || !$this->showRejects ) {
			$listLink = $this->getLang()->pipeList( array(
				$listLink,
				Linker::makeKnownLinkObj( $titleObj,
					wfMsgHtml( 'confirmaccount-showrej' ),
					wfArrayToCGI( array( 'wpShowRejects' => 1 ) ) )
			) );
		} else {
			$listLink = $this->getLang()->pipeList( array(
				$listLink,
				wfMsgHtml( 'confirmaccount-showrej' )
			) );
		}
		if ( $this->acrID || !$this->showStale ) {
			$listLink = $this->getLang()->pipeList( array(
				$listLink,
				Linker::makeKnownLinkObj( $titleObj,
					wfMsgHtml( 'confirmaccount-showexp' ),
					wfArrayToCGI( array( 'wpShowStale' => 1 ) ) )
			) );
		} else {
			$listLink = $this->getLang()->pipeList( array(
				$listLink,
				wfMsgHtml( 'confirmaccount-showexp' )
			) );
		}

		# Say what queue we are in...
		if ( $this->queueType != -1 ) {
			$viewall = Linker::makeKnownLinkObj(
				$this->getTitle(), wfMsgHtml('confirmaccount-all') );

			$this->getOutput()->setSubtitle(
				"<strong>" . wfMsgHtml('confirmaccount-type') . " <i>" .
				wfMsgHtml("confirmaccount-type-{$this->queueType}") .
				"</i></strong> [{$listLink}] <strong>{$viewall}</strong>" );
		}
	}

	protected function showQueues() {
		global $wgAccountRequestTypes;

		$out = $this->getOutput();

		$out->addWikiMsg( 'confirmaccount-maintext' );
		$out->addHTML( '<p><strong>' . wfMsgHtml('confirmaccount-types') . '</strong></p>' );

		# List each queue and some information about it...
		$out->addHTML( '<ul>' );
		foreach ( $wgAccountRequestTypes as $i => $params ) {
			$titleObj = SpecialPage::getTitleFor( 'ConfirmAccounts', $params[0] );
			$counts = ConfirmAccount::getOpenRequestCount( $i );

			$open = '<b>' . Linker::makeKnownLinkObj( $titleObj,
				wfMsgHtml( 'confirmaccount-q-open' ),
				wfArrayToCGI( array( 'wpShowHeld' => 0 ) ) ) . '</b>';
			$open .= ' [' . $counts['open'] . ']';

			$held = Linker::makeKnownLinkObj( $titleObj,
				wfMsgHtml( 'confirmaccount-q-held' ),
				wfArrayToCGI( array( 'wpShowHeld' => 1 ) ) );
			$held .= ' [' . $counts['held'] . ']';

			$rejects = Linker::makeKnownLinkObj( $titleObj,
				wfMsgHtml( 'confirmaccount-q-rej' ),
				wfArrayToCGI( array( 'wpShowRejects' => 1 ) ) );
			$rejects .= ' [' . $counts['rejected'] . ']';

			$stale = '<i>'.Linker::makeKnownLinkObj( $titleObj,
				wfMsgHtml( 'confirmaccount-q-stale' ),
				wfArrayToCGI( array( 'wpShowStale' => 1 ) ) ).'</i>';

			$out->addHTML( "<li><i>".wfMsgHtml("confirmaccount-type-$i")."</i> (" .
				$this->getLang()->pipeList( array( $open, $held, $rejects, $stale ) ) . ")</li>" );
		}
		$out->addHTML( '</ul>' );
	}

	protected function showAccountConfirmForm( $msg='' ) {
		global $wgAccountRequestTypes;
		$reqUser = $this->getUser();
		$out = $this->getOutput();

		$titleObj = SpecialPage::getTitleFor( 'ConfirmAccounts', $this->specialPageParameter );

		$row = $this->getAccountRequest();
		if( !$row || $row->acr_rejected && !$this->showRejects ) {
			$out->addHTML( wfMsgHtml('confirmaccount-badid') );
			$out->returnToMain( true, $titleObj );
			return;
		}

		# Output any failure message
		if( $msg ) {
			$out->addHTML( '<div class="errorbox">' . $msg . '</div><div class="visualClear"></div>' );
		}

		$out->addWikiMsg( 'confirmaccount-text' );

		if( $row->acr_rejected ) {
			$datim = $this->getLang()->timeanddate( wfTimestamp(TS_MW, $row->acr_rejected), true );
			$date = $this->getLang()->date( wfTimestamp(TS_MW, $row->acr_rejected), true );
			$time = $this->getLang()->time( wfTimestamp(TS_MW, $row->acr_rejected), true );
			$reason = $row->acr_comment ?
				htmlspecialchars($row->acr_comment) : wfMsgHtml('confirmaccount-noreason');
			# Auto-rejected requests have a user ID of zero
			if( $row->acr_user ) {
				$out->addHTML('<p><b>'.wfMsgExt( 'confirmaccount-reject', array('parseinline'),
					User::whoIs($row->acr_user), $datim, $date, $time ).'</b></p>');
				$out->addHTML( '<p><strong>' . wfMsgHtml('confirmaccount-rational') . '</strong><i> ' .
					$reason . '</i></p>' );
			} else {
				$out->addHTML( "<p><i> $reason </i></p>" );
			}
		} elseif( $row->acr_held ) {
			$datim = $this->getLang()->timeanddate( wfTimestamp(TS_MW, $row->acr_held), true );
			$date = $this->getLang()->date( wfTimestamp(TS_MW, $row->acr_held), true );
			$time = $this->getLang()->time( wfTimestamp(TS_MW, $row->acr_held), true );
			$reason = $row->acr_comment ? $row->acr_comment : wfMsgHtml('confirmaccount-noreason');

			$out->addHTML('<p><b>'.wfMsgExt( 'confirmaccount-held', array('parseinline'),
				User::whoIs($row->acr_user), $datim, $date, $time ).'</b></p>');
			$out->addHTML( '<p><strong>' . wfMsgHtml('confirmaccount-rational') . '</strong><i> ' .
				$reason . '</i></p>' );
		}

		$form  = Xml::openElement( 'form', array( 'method' => 'post', 'name' => 'accountconfirm',
			'action' => $titleObj->getLocalUrl() ) );
		$form .= "<fieldset>";
		$form .= '<legend>' . wfMsgHtml('confirmaccount-leg-user') . '</legend>';
		$form .= '<table cellpadding=\'4\'>';
		$form .= "<tr><td>".Xml::label( wfMsgHtml('username'), 'wpNewName' )."</td>";
		$form .= "<td>".Xml::input( 'wpNewName', 30, $this->reqUsername, array('id' => 'wpNewName') )."</td></tr>\n";

		$econf = $row->acr_email_authenticated ? ' <strong>'.wfMsgHtml('confirmaccount-econf').'</strong>' : '';
		$form .= "<tr><td>".wfMsgHtml('confirmaccount-email')."</td>";
		$form .= "<td>".htmlspecialchars($row->acr_email).$econf."</td></tr>\n";
		if( count($wgAccountRequestTypes) > 1 ) {
			$options = array();
			$form .= "<tr><td><strong>".wfMsgHtml('confirmaccount-reqtype')."</strong></td><td>";
			foreach( $wgAccountRequestTypes as $i => $params ) {
				$options[] = Xml::option( wfMsg( "confirmaccount-pos-$i" ), $i, ($i == $this->reqType) );
			}
			$form .= Xml::openElement( 'select', array( 'name' => "wpType" ) );
			$form .= implode( "\n", $options );
			$form .= Xml::closeElement('select')."\n";
			$form .= "</td></tr>\n";
		}

		$form .= '</table></fieldset>';

		if( wfMsgForContent( 'requestaccount-areas' ) ) {
			$form .= '<fieldset>';
			$form .= '<legend>' . wfMsgHtml('confirmaccount-leg-areas') . '</legend>';

			$areas = explode("\n*","\n".wfMsg('requestaccount-areas'));
			$form .= "<div style='height:150px; overflow:scroll; background-color:#f9f9f9;'>";
			$form .= "<table cellspacing='5' cellpadding='0' style='background-color:#f9f9f9;'><tr valign='top'>";
			$count = 0;
			foreach( $areas as $area ) {
				$set = explode("|",$area,3);
				if( $set[0] && isset($set[1]) ) {
					$count++;
					if( $count > 5 ) {
						$form .= "</tr><tr valign='top'>";
						$count = 1;
					}
					$formName = "wpArea-" . htmlspecialchars(str_replace(' ','_',$set[0]));
					if( isset($set[1]) ) {
						$pg = Linker::link( Title::newFromText( $set[1] ), wfMsgHtml('requestaccount-info'), array(), array(), "known" );
					} else {
						$pg = '';
					}

					$form .= "<td>".Xml::checkLabel( $set[0], $formName, $formName, $this->reqAreas[$formName] > 0 )." {$pg}</td>\n";
				}
			}
			$form .= "</tr></table></div>";
			$form .= '</fieldset>';
		}

		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('confirmaccount-leg-person') . '</legend>';
		global $wgUseRealNamesOnly, $wgAllowRealName;
		if( $wgUseRealNamesOnly || $wgAllowRealName ) {
			$form .= '<table cellpadding=\'4\'>';
			$form .= "<tr><td>".wfMsgHtml('confirmaccount-real')."</td>";
			$form .= "<td>".htmlspecialchars($row->acr_real_name)."</td></tr>\n";
			$form .= '</table>';
		}
		$form .= "<p>".wfMsgHtml('confirmaccount-bio')."\n";
		$form .= "<textarea tabindex='1' name='wpNewBio' id='wpNewBio' rows='12' cols='80' style='width:100%; background-color:#f9f9f9;'>" .
			htmlspecialchars($this->reqBio) .
			"</textarea></p>\n";
		$form .= '</fieldset>';
		global $wgAccountRequestExtraInfo;
		if ($wgAccountRequestExtraInfo || $reqUser->isAllowed( 'requestips' ) ) {
			$form .= '<fieldset>';
			$form .= '<legend>' . wfMsgHtml('confirmaccount-leg-other') . '</legend>';
			if( $wgAccountRequestExtraInfo ) {
				$form .= '<p>'.wfMsgHtml('confirmaccount-attach') . ' ';
				if( $row->acr_filename ) {
					$form .= Linker::makeKnownLinkObj( $titleObj, htmlspecialchars($row->acr_filename),
						'file=' . $row->acr_storage_key );
				} else {
					$form .= wfMsgHtml('confirmaccount-none-p');
				}
				$form .= "</p><p>".wfMsgHtml('confirmaccount-notes')."\n";
				$form .= "<textarea tabindex='1' readonly='readonly' name='wpNotes' id='wpNotes' rows='3' cols='80' style='width:100%'>" .
					htmlspecialchars($row->acr_notes) .
					"</textarea></p>\n";
				$form .= "<p>".wfMsgHtml('confirmaccount-urls')."</p>\n";
				$form .= self::parseLinks($row->acr_urls);
			}
			if( $reqUser->isAllowed( 'requestips' ) ) {
				$blokip = SpecialPage::getTitleFor( 'Block' );
				$form .= "<p>".wfMsgHtml('confirmaccount-ip')." ".htmlspecialchars($row->acr_ip).
				" (" . Linker::makeKnownLinkObj( $blokip, wfMsgHtml('blockip'),
					'ip=' . $row->acr_ip . '&wpCreateAccount=1' ).")</p>\n";
			}
			$form .= '</fieldset>';
		}


		$form .= '<fieldset>';
		$form .= '<legend>' . wfMsgHtml('confirmaccount-legend') . '</legend>';
		$form .= "<strong>".wfMsgExt( 'confirmaccount-confirm', array('parseinline') )."</strong>\n";
		$form .= "<table cellpadding='5'><tr>";
		$form .= "<td>".Xml::radio( 'wpSubmitType', 'accept', $this->submitType=='accept',
			array('id' => 'submitCreate','onclick' => 'document.getElementById("wpComment").style.display="block"') );
		$form .= ' '.Xml::label( wfMsg('confirmaccount-create'), 'submitCreate' )."</td>\n";
		$form .= "<td>".Xml::radio( 'wpSubmitType', 'reject', $this->submitType=='reject',
			array('id' => 'submitDeny','onclick' => 'document.getElementById("wpComment").style.display="block"') );
		$form .= ' '.Xml::label( wfMsg('confirmaccount-deny'), 'submitDeny' )."</td>\n";
		$form .= "<td>".Xml::radio( 'wpSubmitType', 'hold', $this->submitType=='hold',
			array('id' => 'submitHold','onclick' => 'document.getElementById("wpComment").style.display="block"') );
		$form .= ' '.Xml::label( wfMsg('confirmaccount-hold'), 'submitHold' )."</td>\n";
		$form .= "<td>".Xml::radio( 'wpSubmitType', 'spam', $this->submitType=='spam',
			array('id' => 'submitSpam','onclick' => 'document.getElementById("wpComment").style.display="none"') );
		$form .= ' '.Xml::label( wfMsg('confirmaccount-spam'), 'submitSpam' )."</td>\n";
		$form .= "</tr></table>";

		$form .= "<div id='wpComment'><p>".wfMsgHtml('confirmaccount-reason')."</p>\n";
		$form .= "<p><textarea name='wpReason' id='wpReason' rows='3' cols='80' style='width:80%; display=block;'>" .
			htmlspecialchars($this->reason) . "</textarea></p></div>\n";
		$form .= "<p>".Xml::submitButton( wfMsgHtml( 'confirmaccount-submit') )."</p>\n";
		$form .= '</fieldset>';

		$form .= Html::Hidden( 'title', $titleObj->getPrefixedDBKey() )."\n";
		$form .= Html::Hidden( 'action', 'reject' );
		$form .= Html::Hidden( 'acrid', $row->acr_id );
		$form .= Html::Hidden( 'wpShowRejects', $this->showRejects );
		$form .= Html::Hidden( 'wpEditToken', $reqUser->editToken( $row->acr_id ) )."\n";
		$form .= Xml::closeElement( 'form' );

		$out->addHTML( $form );

		global $wgMemc;
		# Set a key to who is looking at this request.
		# Have it expire in 10 minutes...
		$key = wfMemcKey( 'acctrequest', 'view', $row->acr_id );
		$wgMemc->set( $key, $reqUser->getID(), 60*10 );
	}

	/**
	 * Show a private file requested by the visitor.
	 * @param $key string
	 */
	protected function showFile( $key ) {
		global $wgConfirmAccountFSRepos;
		$out = $this->getOutput();
		$request = $this->getRequest();

		$out->disable();

		# We mustn't allow the output to be Squid cached, otherwise
		# if an admin previews a private image, and it's cached, then
		# a user without appropriate permissions can toddle off and
		# nab the image, and Squid will serve it
		$request->response()->header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', 0 ) . ' GMT' );
		$request->response()->header( 'Cache-Control: no-cache, no-store, max-age=0, must-revalidate' );
		$request->response()->header( 'Pragma: no-cache' );

		$repo = new FSRepo( $wgConfirmAccountFSRepos['accountreqs'] );
		$path = $repo->getZonePath( 'public' ).'/'.
			$key[0].'/'.$key[0].$key[1].'/'.$key[0].$key[1].$key[2].'/'.$key;

		StreamFile::stream( $path );
	}

	protected function doAccountConfirmSubmit() {
		$reqUser = $this->getUser();
		$out = $this->getOutput();

		$titleObj = SpecialPage::getTitleFor( 'ConfirmAccounts', $this->specialPageParameter );

		$row = $this->getAccountRequest( true );
		if( !$row ) {
			$out->addHTML( wfMsgHtml('confirmaccount-badid') );
			$out->returnToMain( true, $titleObj );
			return;
		}

		if( $this->submitType === 'reject' || $this->submitType === 'spam' ) {
			# Make proxy user to email a rejection message :(
			$u = User::newFromName( $row->acr_name, 'creatable' );
			$u->setEmail( $row->acr_email );

			# Request can later be recovered
			$dbw = wfGetDB( DB_MASTER );
			$dbw->begin();
			$dbw->update( 'account_requests',
				array( 'acr_rejected' => $dbw->timestamp(),
					'acr_user' => $reqUser->getID(),
					'acr_comment' => ($this->submitType == 'spam') ? '' : $this->reason,
					'acr_deleted' => 1 ),
				array( 'acr_id' => $this->acrID, 'acr_deleted' => 0 ),
				__METHOD__ );

			# Do not send multiple times, don't send for "spam" requests
			if( !$row->acr_rejected && $this->submitType != 'spam' ) {
				if( $this->reason ) {
					$result = $u->sendMail(
						wfMsgForContent( 'confirmaccount-email-subj' ),
						wfMsgExt( 'confirmaccount-email-body4',
							array('parsemag','content'), $u->getName(), $this->reason )
					);
				} else {
					$result = $u->sendMail(
						wfMsgForContent( 'confirmaccount-email-subj' ),
						wfMsgExt( 'confirmaccount-email-body3',
							array('parsemag','content'), $u->getName() )
					);
				}

				if( !$result->isOk() ) {
					$error = wfMsg( 'mailerror', $out->parse( $result->getWikiText() ) );
					$this->showAccountConfirmForm( $error );
					return false;
				}
			}

			$dbw->commit();

			# Clear cache for notice of how many account requests there are
			global $wgMemc;
			$key = wfMemcKey( 'confirmaccount', 'noticecount' );
			$wgMemc->delete( $key );

			$this->showSuccess( $this->submitType );
		} elseif( $this->submitType === 'accept' ) {
			global $wgAuth, $wgConfirmAccountSaveInfo, $wgAllowAccountRequestFiles;

			# Now create user and check if the name is valid
			$user = User::newFromName( $this->reqUsername, 'creatable' );
			if( is_null($user) ) {
				$this->showAccountConfirmForm( wfMsgHtml('noname') );
				return;
			}

			# Make a random password
			$p = User::randomPassword();

			# Check if already in use
			if( 0 != $user->idForName() || $wgAuth->userExists( $user->getName() ) ) {
				$this->showAccountConfirmForm( wfMsgHtml('userexists') );
				return;
			}
			# Add user to DB
			$dbw = wfGetDB( DB_MASTER );
			# DELETE also ran due to possible rollback failure,
			# such as that caused by objectcache table usage.
			# Per http://bugs.mysql.com/bug.php?id=30767, not
			# too huge of a deal anyway...
			$dbw->begin();
			$user = User::createNew( $user->getName() );
			# VERY important to set email now. Otherwise user will have to request
			# a new password at the login screen...
			$user->setEmail( $row->acr_email );
			# Set password and realname
			$user->setNewpassword( $p );
			$user->setRealName( $row->acr_real_name );
			$user->saveSettings(); // Save this into the DB
			# Import email address confirmation
			$dbw->update( 'user',
				array( 'user_email_authenticated' => $row->acr_email_authenticated,
					'user_email_token_expires' => $row->acr_email_token_expires,
					'user_email_token' => $row->acr_email_token ),
				array( 'user_id' => $user->getID() ),
				__METHOD__
			);

			# Move to credentials if configured to do so
			global $wgConfirmAccountFSRepos;
			$key = $row->acr_storage_key;

			if( $wgConfirmAccountSaveInfo ) {
				# Copy any attached files to new storage group
				if( $wgAllowAccountRequestFiles && $key ) {
					$repoOld = new FSRepo( $wgConfirmAccountFSRepos['accountreqs'] );
					$repoNew = new FSRepo( $wgConfirmAccountFSRepos['accountcreds'] );
					$pathRel = $key[0].'/'.$key[0].$key[1].'/'.$key[0].$key[1].$key[2].'/'.$key;
					$oldPath = $repoOld->getZonePath( 'public' ) . '/' . $pathRel;
					if( file_exists($oldPath) ) {
						$triplet = array( $oldPath, 'public', $pathRel );
						$repoNew->storeBatch( array($triplet) /*,FSRepo::DELETE_SOURCE*/ ); // move!
					}
				}
				$acd_id = $dbw->nextSequenceValue( 'account_credentials_acd_id_seq' );
				# Move request data into a separate table
				$dbw->insert( 'account_credentials',
					array( 'acd_user_id' => $user->getID(),
						'acd_real_name' => $row->acr_real_name,
						'acd_email' => $row->acr_email,
						'acd_email_authenticated' => $row->acr_email_authenticated,
						'acd_bio' => $row->acr_bio,
						'acd_notes' => $row->acr_notes,
						'acd_urls' => $row->acr_urls,
						'acd_ip' => $row->acr_ip,
						'acd_filename' => $row->acr_filename,
						'acd_storage_key' => $row->acr_storage_key,
						'acd_areas' => $row->acr_areas,
						'acd_registration' => $row->acr_registration,
						'acd_accepted' => $dbw->timestamp(),
						'acd_user' => $reqUser->getID(),
						'acd_comment' => $this->reason,
						'acd_id' => $acd_id ),
					__METHOD__
				);
			}

			# Add to global user login system (if there is one)
			if( !$wgAuth->addUser( $user, $p, $row->acr_email, $row->acr_real_name ) ) {
				$dbw->delete( 'user', array( 'user_id' => $user->getID() ) );
				$dbw->rollback();
				$this->showAccountConfirmForm( wfMsgHtml( 'externaldberror' ) );
				return false;
			}

			# Grant any necessary rights
			$grouptext = $group = '';
			global $wgAccountRequestTypes;
			if( array_key_exists($this->reqType,$wgAccountRequestTypes) ) {
				$params = $wgAccountRequestTypes[$this->reqType];
				$group = isset($params[1]) ? $params[1] : false;
				$grouptext = isset($params[2]) ? $params[2] : '';
				// Do not add blank or dummy groups
				if( $group && $group !='user' && $group !='*' ) {
					$user->addGroup( $group );
				}
			}

			# OK, now remove the request from the queue
			$dbw->delete( 'account_requests', array('acr_id' => $this->acrID), __METHOD__ );

			# Commit this if we make past the CentralAuth system
			# and the groups are added. Next step is sending out an
			# email, which we cannot take back...
			$dbw->commit();

			# Send out password
			if( $this->reason ) {
				$msg = "confirmaccount-email-body2-pos{$this->reqType}";
				# If the user is in a group and there is a welcome for that group, use it
				if( $group && !wfEmptyMsg( $msg, wfMsg($msg) ) ) {
					$ebody = wfMsgExt( $msg, array('parsemag','content'),
						$user->getName(), $p, $this->reason );
				# Use standard if none found...
				} else {
					$ebody = wfMsgExt( 'confirmaccount-email-body2',
						array('parsemag','content'), $user->getName(), $p, $this->reason );
				}
			} else {
				$msg = "confirmaccount-email-body-pos{$this->reqType}";
				# If the user is in a group and there is a welcome for that group, use it
				if( $group && !wfEmptyMsg( $msg, wfMsg($msg) ) ) {
					$ebody = wfMsgExt($msg, array('parsemag','content'),
						$user->getName(), $p, $this->reason );
				# Use standard if none found...
				} else {
					$ebody = wfMsgExt( 'confirmaccount-email-body',
						array('parsemag','content'), $user->getName(), $p, $this->reason );
				}
			}

			$result = $user->sendMail( wfMsgForContent( 'confirmaccount-email-subj' ), $ebody );

			// init $error
			$error = '';

			if( !$result->isOK() ) {
				$error = wfMsg( 'mailerror', $out->parse( $result->getWikiText() ) );
			}

			# Safe to hook/log now...
			wfRunHooks( 'AddNewAccount', array( $user, false /* not by email */ ) );
			$user->addNewUserLogEntry();

			# Clear cache for notice of how many account requests there are
			global $wgMemc;
			$memKey = wfMemcKey( 'confirmaccount', 'noticecount' );
			$wgMemc->delete( $memKey );

			# Delete any attached file. Do not stop the whole process if this fails
			if( $key ) {
				$repoOld = new FSRepo( $wgConfirmAccountFSRepos['accountreqs'] );
				$pathRel = $key[0].'/'.$key[0].$key[1].'/'.$key[0].$key[1].$key[2].'/'.$key;
				$oldPath = $repoOld->getZonePath( 'public' ) . '/' . $pathRel;
				if( file_exists($oldPath) ) {
					unlink($oldPath); // delete!
				}
			}

			# Start up the user's (presumedly brand new) userpages
			# Will not append, so previous content will be blanked
			global $wgMakeUserPageFroreqBio, $wgAutoUserBioText;
			if( $wgMakeUserPageFroreqBio ) {
				$usertitle = $user->getUserPage();
				$userpage = new Article( $usertitle );

				$autotext = strval($wgAutoUserBioText);
				$body = $autotext ? "{$this->reqBio}\n\n{$autotext}" : $this->reqBio;
				$body = $grouptext ? "{$body}\n\n{$grouptext}" : $body;

				# Add any interest categories
				if( wfMsgForContent( 'requestaccount-areas' ) ) {
					$areas = explode("\n*","\n".wfMsg('requestaccount-areas'));
					foreach( $areas as $line ) {
						$set = explode("|",$line);
						//$name = str_replace("_"," ",$set[0]);
						if( in_array($set[0],$this->reqAreaSet) ) {
							# General userpage text for anyone with this interest
							if( isset($set[2]) ) {
								$body .= $set[2];
							}
							# Message for users with this interested with the given account type
							# MW: message of format <name>|<wiki page>|<anyone>|<group0>|<group1>...
							if( isset($set[3+$this->reqType]) && $set[3+$this->reqType] ) {
								$body .= $set[3+$this->reqType];
							}
						}
					}
				}

				# Set sortkey and use it on bio
				global $wgConfirmAccountSortkey, $wgContLang;
				if( !empty($wgConfirmAccountSortkey) ) {
					$sortKey = preg_replace($wgConfirmAccountSortkey[0],$wgConfirmAccountSortkey[1],$usertitle->getText());
					$body .= "\n{{DEFAULTSORT:{$sortKey}}}";
					# Clean up any other categories...
					$catNS = $wgContLang->getNSText(NS_CATEGORY);
					$replace = '/\[\['.preg_quote($catNS).':([^\]]+)\]\]/i'; // [[Category:x]]
					$with = "[[{$catNS}:$1|".str_replace('$','\$',$sortKey)."]]"; // [[Category:x|sortkey]]
					$body = preg_replace( $replace, $with, $body );
				}

				# Create userpage!
				$userpage->doEdit( $body, wfMsg('confirmaccount-summary'), EDIT_MINOR );
			}

			# Update user count
			$ssUpdate = new SiteStatsUpdate( 0, 0, 0, 0, 1 );
			$ssUpdate->doUpdate();

			# Greet user...
			global $wgAutoWelcomeNewUsers;
			if( $wgAutoWelcomeNewUsers ) {
				$utalk = new Article( $user->getTalkPage() );
				$msg = "confirmaccount-welc-pos{$this->reqType}";
				# Is there a custom message?
				$welcome = wfEmptyMsg( $msg, wfMsg($msg) ) ?
					wfMsg('confirmaccount-welc') : wfMsg($msg);
				# Add user welcome message!
				$utalk->doEdit( $welcome . ' ~~~~', wfMsg('confirmaccount-wsum'), EDIT_MINOR );
			}
			# Finally, done!!!
			$this->showSuccess( $this->submitType, $user->getName(), array( $error ) );
		} elseif( $this->submitType === 'hold' ) {
			$reqUser = $this->getUser();

			# Make proxy user to email a message
			$u = User::newFromName( $row->acr_name, 'creatable' );
			$u->setEmail( $row->acr_email );

			# Pointless without a summary...
			if( $row->acr_held || ($row->acr_deleted && $row->acr_deleted !='f') ) {
				$error = wfMsg( 'confirmaccount-canthold' );
				$this->showAccountConfirmForm( $error );
				return false;
			} elseif( !$this->reason ) {
				$error = wfMsg( 'confirmaccount-needreason' );
				$this->showAccountConfirmForm( $error );
				return false;
			}

			# If not already held or deleted, mark as held
			$dbw = wfGetDB( DB_MASTER );
			$dbw->begin();
			$dbw->update( 'account_requests',
				array( 'acr_held' => $dbw->timestamp(),
					'acr_user'    => $reqUser->getID(),
					'acr_comment' => $this->reason ),
				array( 'acr_id' => $this->acrID, 'acr_held IS NULL', 'acr_deleted' => 0 ),
					__METHOD__
			);

			# Do not send multiple times
			if( !$row->acr_held && !($row->acr_deleted && $row->acr_deleted !='f') ) {
				$result = $u->sendMail(
					wfMsgForContent( 'confirmaccount-email-subj' ),
					wfMsgExt( 'confirmaccount-email-body5',
						array('parsemag','content'), $u->getName(), $this->reason )
				);
				if( !$result->isOK() ) {
					$dbw->rollback();
					$error = wfMsg( 'mailerror', $out->parse( $result->getWikiText() ) );
					$this->showAccountConfirmForm( $error );
					return false;
				}
			}
			$dbw->commit();

			# Clear cache for notice of how many account requests there are
			global $wgMemc;
			$key = wfMemcKey( 'confirmaccount', 'noticecount' );
			$wgMemc->delete( $key );

			$this->showSuccess( $this->submitType );
		} else {
			$this->showAccountConfirmForm();
		}
	}

	/*
	 * Get requested account request row and load some fields
	 */
	function getAccountRequest( $forUpdate = false ) {
		if( !$this->acrID ) return false;

		$db = $forUpdate ? wfGetDB( DB_MASTER ) : wfGetDB( DB_SLAVE );
		$row = $db->selectRow( 'account_requests', '*',
			array( 'acr_id' => $this->acrID ),
			__METHOD__
		);
		# Check if parameters are to be overridden
		if( $row ) {
			$this->reqUsername = $this->reqUsername ? $this->reqUsername : $row->acr_name;
			$this->reqBio = $this->reqBio ? $this->reqBio : $row->acr_bio;
			$this->reqType = !is_null($this->reqType) ? $this->reqType : $row->acr_type;
			$rowareas = UserAccountRequest::expandAreas( $row->acr_areas );

			foreach( $this->reqAreas as $area => $within ) {
				# If admin didn't set any of these checks, go back to how the user set them
				if( $within == -1 ) {
					if( in_array($area,$rowareas) )
						$this->reqAreas[$area] = 1;
					else
						$this->reqAreas[$area] = 0;
				}
			}
		}
		return $row;
	}

	/**
	 * Extract a list of all recognized HTTP links in the text.
	 * @param string $text
	 * @return string $linkList, list of clickable links
	 */
	public static function parseLinks( $text ) {
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
			$linkList = "<ul>{$linkList}</ul>";
		}
		return $linkList;
	}

	protected function showSuccess( $titleObj, $name = null, $errors = array() ) {
		$out = $this->getOutput();

		$titleObj = SpecialPage::getTitleFor( 'ConfirmAccounts', $this->specialPageParameter );
		$out->setPagetitle( wfMsgHtml('actioncomplete') );
		if( $this->submitType == 'accept' ) {
			$out->addWikiMsg( 'confirmaccount-acc', $name );
		} elseif( $this->submitType == 'reject' || $this->submitType == 'spam' ) {
			$out->addWikiMsg( 'confirmaccount-rej' );
		} else {
			$out->redirect( $titleObj->getFullUrl() );
			return;
		}
		# Output any errors
		foreach( $errors as $error ) {
			$out->addHTML( '<p>' . $error . '</p>' );
		}
		# Give link to see other requests
		$out->returnToMain( true, $titleObj );
	}

	protected function showList() {
		$out = $this->getOutput();

		# Output the list
		$pager = new ConfirmAccountsPager( $this, array(),
			$this->queueType, $this->showRejects, $this->showHeld, $this->showStale );

		if( $pager->getNumRows() ) {
			if( $this->showStale ) {
				$out->addHTML( wfMsgExt('confirmaccount-list3', array('parse') ) );
			} elseif( $this->showRejects ) {
				$out->addHTML( wfMsgExt('confirmaccount-list2', array('parse') ) );
			} else {
				$out->addHTML( wfMsgExt('confirmaccount-list', array('parse') ) );
			}
			$out->addHTML( $pager->getNavigationBar() );
			$out->addHTML( $pager->getBody() );
			$out->addHTML( $pager->getNavigationBar() );
		} else {
			if( $this->showRejects ) {
				$out->addHTML( wfMsgExt('confirmaccount-none-r', array('parse')) );
			} elseif( $this->showStale ) {
				$out->addHTML( wfMsgExt('confirmaccount-none-e', array('parse')) );
			} elseif( $this->showHeld ) {
				$out->addHTML( wfMsgExt('confirmaccount-none-h', array('parse')) );
			} else {
				$out->addHTML( wfMsgExt('confirmaccount-none-o', array('parse')) );
			}
		}

		# Every 30th view, prune old deleted items
		if( 0 == mt_rand( 0, 29 ) ) {
			ConfirmAccount::runAutoMaintenance();
		}
	}

	public function formatRow( $row ) {
		global $wgUseRealNamesOnly, $wgAllowRealName, $wgMemc;

		$titleObj = SpecialPage::getTitleFor( 'ConfirmAccounts', $this->specialPageParameter );
		if( $this->showRejects || $this->showStale ) {
			$link = Linker::makeKnownLinkObj( $titleObj, wfMsgHtml('confirmaccount-review'),
				'acrid='.$row->acr_id.'&wpShowRejects=1' );
		} else {
			$link = Linker::makeKnownLinkObj( $titleObj, wfMsgHtml('confirmaccount-review'),
				'acrid='.$row->acr_id );
		}
		$time = $this->getLang()->timeanddate( wfTimestamp(TS_MW, $row->acr_registration), true );

		$r = "<li class='mw-confirmaccount-time-{$this->queueType}'>";

		$r .= $time." (<strong>{$link}</strong>)";
		# Auto-rejected accounts have a user ID of zero
		if( $row->acr_rejected && $row->acr_user ) {
			$datim = $this->getLang()->timeanddate( wfTimestamp(TS_MW, $row->acr_rejected), true );
			$date = $this->getLang()->date( wfTimestamp(TS_MW, $row->acr_rejected), true );
			$time = $this->getLang()->time( wfTimestamp(TS_MW, $row->acr_rejected), true );
			$r .= ' <b>'.wfMsgExt( 'confirmaccount-reject', array('parseinline'), $row->user_name, $datim, $date, $time ).'</b>';
		} elseif( $row->acr_held && !$row->acr_rejected ) {
			$datim = $this->getLang()->timeanddate( wfTimestamp(TS_MW, $row->acr_held), true );
			$date = $this->getLang()->date( wfTimestamp(TS_MW, $row->acr_held), true );
			$time = $this->getLang()->time( wfTimestamp(TS_MW, $row->acr_held), true );
			$r .= ' <b>'.wfMsgExt( 'confirmaccount-held', array('parseinline'), User::whoIs($row->acr_user), $datim, $date, $time ).'</b>';
		}
		# Check if someone is viewing this request
		$key = wfMemcKey( 'acctrequest', 'view', $row->acr_id );
		$value = $wgMemc->get( $key );
		if( $value ) {
			$r .= ' <b>'.wfMsgExt( 'confirmaccount-viewing', array('parseinline'), User::whoIs($value) ).'</b>';
		}

		$r .= "<br /><table class='mw-confirmaccount-body-{$this->queueType}' cellspacing='1' cellpadding='3' border='1' width='100%'>";
		if( !$wgUseRealNamesOnly ) {
			$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-name').'</strong></td><td width=\'100%\'>' .
				htmlspecialchars($row->acr_name) . '</td></tr>';
		}
		if( $wgUseRealNamesOnly  || $wgAllowRealName ) {
			$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-real-q').'</strong></td><td width=\'100%\'>' .
				htmlspecialchars($row->acr_real_name) . '</td></tr>';
		}
		$econf = $row->acr_email_authenticated ? ' <strong>'.wfMsg('confirmaccount-econf').'</strong>' : '';
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-email-q').'</strong></td><td width=\'100%\'>' .
			htmlspecialchars($row->acr_email) . $econf.'</td></tr>';
		# Truncate this, blah blah...
		$bio = htmlspecialchars($row->acr_bio);
		$preview = $this->getLang()->truncate( $bio, 400, '' );
		if( strlen($preview) < strlen($bio) ) {
			$preview = substr( $preview, 0, strrpos($preview,' ') );
			$preview .= " . . .";
		}
		$r .= '<tr><td><strong>'.wfMsgHtml('confirmaccount-bio-q') .
			'</strong></td><td width=\'100%\'><i>'.$preview.'</i></td></tr>';
		$r .= '</table>';

		$r .= '</li>';

		return $r;
	}
}

/**
 * Query to list out pending accounts
 */
class ConfirmAccountsPager extends ReverseChronologicalPager {
	public $mForm, $mConds;

	function __construct(
		$form, $conds = array(), $type, $rejects=false, $showHeld=false, $showStale=false
	) {
		$this->mForm = $form;
		$this->mConds = $conds;

		$this->mConds['acr_type'] = $type;

		$this->rejects = $rejects;
		$this->stale = $showStale;
		if( $rejects || $showStale ) {
			$this->mConds['acr_deleted'] = 1;
		} else {
			$this->mConds['acr_deleted'] = 0;
			if( $showHeld ) {
				$this->mConds[] = 'acr_held IS NOT NULL';
			} else {
				$this->mConds[] = 'acr_held IS NULL';
			}

		}
		parent::__construct();
		# Treat 20 as the default limit, since each entry takes up 5 rows.
		$urlLimit = $this->mRequest->getInt( 'limit' );
		$this->mLimit = $urlLimit ? $urlLimit : 20;
	}

	function getTitle() {
		return SpecialPage::getTitleFor( 'ConfirmAccounts', $this->mForm->specialPageParameter );
	}

	function formatRow( $row ) {
		return $this->mForm->formatRow( $row );
	}

	function getStartBody() {
		if ( $this->getNumRows() ) {
			return '<ul>';
		} else {
			return '';
		}
	}

	function getEndBody() {
		if ( $this->getNumRows() ) {
			return '</ul>';
		} else {
			return '';
		}
	}

	function getQueryInfo() {
		$conds = $this->mConds;
		$tables = array( 'account_requests' );
		$fields = array( 'acr_id','acr_name','acr_real_name','acr_registration','acr_held','acr_user',
			'acr_email','acr_email_authenticated','acr_bio','acr_notes','acr_urls','acr_type','acr_rejected' );
		# Stale requests have a user ID of zero
		if( $this->stale ) {
			$conds[] = 'acr_user = 0';
		} elseif( $this->rejects ) {
			$conds[] = 'acr_user != 0';
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
