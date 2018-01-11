<?php
/**
 * Class containing hooked functions for a ConfirmAccount environment
 */
class ConfirmAccountUISetup {
	/**
	 * Register ConfirmAccount hooks.
	 * @param array &$hooks $wgHooks (assoc array of hooks and handlers)
	 */
	public static function defineHookHandlers( array &$hooks ) {
		# Make sure "login / create account" notice still as "create account"
		$hooks['PersonalUrls'][] = 'ConfirmAccountUIHooks::setRequestLoginLinks';
		# Add notice of where to request an account at UserLogin
		$hooks['UserCreateForm'][] = 'ConfirmAccountUIHooks::addRequestLoginText';
		$hooks['UserLoginForm'][] = 'ConfirmAccountUIHooks::addRequestLoginText';
		# Status header like "new messages" bar
		$hooks['BeforePageDisplay'][] = 'ConfirmAccountUIHooks::confirmAccountsNotice';
		# Register admin pages for AdminLinks extension.
		$hooks['AdminLinks'][] = 'ConfirmAccountUIHooks::confirmAccountAdminLinks';
		# Pre-fill/lock the form if its for an approval
		$hooks['AuthChangeFormFields'][] = 'ConfirmAccountUIHooks::onAuthChangeFormFields';
	}

	/**
	 * Register ConfirmAccount special pages as needed.
	 * @param array &$pages $wgSpecialPages (list of special pages)
	 */
	public static function defineSpecialPages( array &$pages ) {
		$pages['RequestAccount'] = 'RequestAccountPage';
		$pages['ConfirmAccounts'] = 'ConfirmAccountsPage';
		$pages['UserCredentials'] = 'UserCredentialsPage';
	}

	/**
	 * Append ConfirmAccount resource module definitions
	 * @param array &$modules $wgResourceModules
	 */
	public static function defineResourceModules( array &$modules ) {
		$modules['ext.confirmAccount'] = [
			'styles'        => 'confirmaccount.css',
			'localBasePath' => __DIR__ . '/modules',
			'remoteExtPath' => 'ConfirmAccount/frontend/modules',
		];
	}
}
