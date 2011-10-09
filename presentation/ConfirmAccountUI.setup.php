<?php
/**
 * Class containing hooked functions for a ConfirmAccount environment
 */
class ConfirmAccountUISetup {
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
