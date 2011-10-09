<?php
/**
 * Class containing hooked functions for a ConfirmAccount environment
 */
class ConfirmAccountUISetup {
	/**
	 * Register ConfirmAccount hooks.
	 * @param $hooks Array $wgHooks (assoc array of hooks and handlers)
	 * @return void
	 */
	public static function defineHookHandlers( &$hooks ) {
		# Make sure "login / create account" notice still as "create account"
		$hooks['PersonalUrls'][] = 'ConfirmAccountUIHooks::setRequestLoginLinks';
		# Add notice of where to request an account at UserLogin
		$hooks['UserCreateForm'][] = 'ConfirmAccountUIHooks::addRequestLoginText';
		$hooks['UserLoginForm'][] = 'ConfirmAccountUIHooks::addRequestLoginText';
		# Status header like "new messages" bar
		$hooks['BeforePageDisplay'][] = 'ConfirmAccountUIHooks::confirmAccountsNotice';
		# Register admin pages for AdminLinks extension.
		$hooks['AdminLinks'][] = 'ConfirmAccountUIHooks::confirmAccountAdminLinks';
	}

	/**
	 * Register ConfirmAccount special pages as needed.
	 * @param $pages Array $wgSpecialPages (list of special pages)
	 * @param $groups Array $wgSpecialPageGroups (assoc array of special page groups)
	 */
	public static function defineSpecialPages( array &$pages, array &$groups ) {
		global $wgSpecialPages, $wgSpecialPageGroups, $wgConfirmAccountSaveInfo;

		$pages['RequestAccount'] = 'RequestAccountPage';
		$groups['RequestAccount'] = 'login';

		$pages['ConfirmAccounts'] = 'ConfirmAccountsPage';
		$groups['ConfirmAccounts'] = 'users';

		if ( $wgConfirmAccountSaveInfo ) {
			$pages['UserCredentials'] = 'UserCredentialsPage';
			$groups['UserCredentials'] = 'users';
		}

		return true;
	}

	/**
	 * Append ConfirmAccount resource module definitions
	 * @param $modules Array $wgResourceModules
	 */
	public static function defineResourceModules( &$modules ) {
		$modules['ext.confirmAccount'] = array(
			'styles'        => 'confirmaccount.css',
			'localBasePath' => dirname( __FILE__ ) . '/modules',
			'remoteExtPath' => 'ConfirmAccount/presentation/modules',
		);
	}
}
