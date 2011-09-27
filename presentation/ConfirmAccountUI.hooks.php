<?php
/**
 * Class containing hooked functions for a ConfirmAccount environment
 */
class ConfirmAccountUIHooks {
	public static function addRequestLoginText( &$template ) {
		global $wgUser, $wgOut;
		# Add a link to RequestAccount from UserLogin
		if ( !$wgUser->isAllowed( 'createaccount' ) ) {
			$template->set( 'header', wfMsgExt( 'requestaccount-loginnotice', 'parse' ) );
			$wgOut->addModules( 'ext.confirmAccount' ); // CSS
		}
		return true;
	}

	public static function setRequestLoginLinks( &$personal_urls, &$title ) {
		if ( isset( $personal_urls['anonlogin'] ) ) {
			$personal_urls['anonlogin']['text'] = wfMsg('nav-login-createaccount');
		} elseif ( isset($personal_urls['login'] ) ) {
			$personal_urls['login']['text'] = wfMsg('nav-login-createaccount');
		}
		return true;
	}

	public static function checkIfAccountNameIsPending( User $user, &$abortError ) {
		# If an account is made with name X, and one is pending with name X
		# we will have problems if the pending one is later confirmed
		$dbw = wfGetDB( DB_MASTER );
		$dup = $dbw->selectField( 'account_requests', '1',
			array( 'acr_name' => $user->getName() ),
			__METHOD__ );
		if ( $dup ) {
			$abortError = wfMsgHtml( 'requestaccount-inuse' );
			return false;
		}
		return true;
	}

	// FIXME: don't just take on to general site notice
	public static function confirmAccountsNotice( $notice ) {
		global $wgConfirmAccountNotice, $wgUser, $wgMemc, $wgOut;
		if ( !$wgConfirmAccountNotice || !$wgUser->isAllowed( 'confirmaccount' ) ) {
			return true;
		}
		# Only show on some special pages
		$title = RequestContext::getMain()->getTitle();
		if ( !$title->isSpecialPage() ) {
			return true;
		} elseif (
			!$title->equals( SpecialPage::getTitleFor( 'Recentchanges' ) ) &&
			!$title->equals( SpecialPage::getTitleFor( 'Watchlist' ) ) )
		{
			return true;
		}
		# Check cached results
		$key = wfMemcKey( 'confirmaccount', 'noticecount' );
		$count = $wgMemc->get( $key );
		# Only show message if there are any such requests
		if ( !$count )  {
			$dbw = wfGetDB( DB_MASTER );
			$count = $dbw->selectField( 'account_requests', 'COUNT(*)',
				array( 'acr_deleted' => 0,
					'acr_held IS NULL',
					'acr_email_authenticated IS NOT NULL' ),
				__METHOD__ );
			# Use '-' for zero, to avoid any confusion over key existence
			if ( !$count ) {
				$count = '-';
			}
			# Cache results
			$wgMemc->set( $key, $count, 3600 * 24 * 7 );
		}
		if ( $count !== '-' ) {
			$message = wfMsgExt( 'confirmaccount-newrequests', array( 'parsemag' ), $count );
			$notice .= '<div id="mw-confirmaccount-msg" class="mw-confirmaccount-bar">' .
				$wgOut->parse( $message ) . '</div>';
			$wgOut->addModules( 'ext.confirmAccount' ); // CSS
		}
		return true;
	}

	public static function confirmAccountAdminLinks( &$admin_links_tree ) {
		$users_section = $admin_links_tree->getSection( wfMsg( 'adminlinks_users' ) );
		$extensions_row = $users_section->getRow( 'extensions' );

		if ( is_null( $extensions_row ) ) {
			$extensions_row = new ALRow( 'extensions' );
			$users_section->addRow( $extensions_row );
		}

		$extensions_row->addItem( ALItem::newFromSpecialPage( 'ConfirmAccounts' ) );
		$extensions_row->addItem( ALItem::newFromSpecialPage( 'UserCredentials' ) );

		return true;
	}
}
