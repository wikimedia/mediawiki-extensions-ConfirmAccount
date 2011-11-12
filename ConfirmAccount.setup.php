<?php
/**
 * Class containing basic setup functions.
 */
class ConfirmAccountSetup {
	/**
	 * Register source code paths.
	 * This function must NOT depend on any config vars.
	 * 
	 * @param $classes Array $classes
	 * @param $messagesFiles Array $messagesFiles
	 * @param $aliasesFiles Array $aliasesFiles
	 * @return void
	 */
	public static function defineSourcePaths(
		array &$classes, array &$messagesFiles, array &$aliasesFiles
	) {
		$dir = dirname( __FILE__ );

		# Basic directory layout
		$backendDir       = "$dir/backend";
		$schemaDir        = "$dir/backend/schema";
		$businessDir      = "$dir/business";
		$frontendDir      = "$dir/frontend";
		$langDir          = "$dir/frontend/";
		$spActionDir      = "$dir/frontend/specialpages/actions";
		$spReportDir      = "$dir/frontend/specialpages/reports";

		# Internationalization files
		$messagesFiles['ConfirmAccount'] = "$langDir/ConfirmAccount.i18n.php";
		$aliasesFiles['ConfirmAccount'] = "$langDir/ConfirmAccount.alias.php";

		# UI setup class
		$classes['ConfirmAccountUISetup'] = "$frontendDir/ConfirmAccountUI.setup.php";
		# UI event handler classes
		$classes['ConfirmAccountUIHooks'] = "$frontendDir/ConfirmAccountUI.hooks.php";

		# UI to request an account
		$classes['RequestAccountPage'] = "$spActionDir/RequestAccount_body.php";
		# UI to confirm accounts
		$classes['ConfirmAccountsPage'] = "$spActionDir/ConfirmAccount_body.php";
		# UI to see account credentials
		$classes['UserCredentialsPage'] = "$spActionDir/UserCredentials_body.php";

		# Utility functions
		$classes['ConfirmAccount'] = "$backendDir/ConfirmAccount.class.php";
		# Data access objects
		$classes['UserAccountRequest'] = "$backendDir/UserAccountRequest.php";

		# Business logic
		$classes['AccountRequestSubmission'] = "$businessDir/AccountRequestSubmission.php";

		# Schema changes
		$classes['ConfirmAccountUpdaterHooks'] = "$schemaDir/ConfirmAccountUpdater.hooks.php";
	}
}
