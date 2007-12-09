<?php
#(c) Aaron Schulz 2007, GPL

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "ConfirmAccount extension\n";
	exit( 1 ) ;
}

# This extension needs email enabled!
# Otherwise users can't get their passwords...
if( !$wgEnableEmail ) {
	echo "ConfirmAccount extension requires \$wgEnableEmail set to true \n";
	exit( 1 ) ;
}

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Confirm user accounts',
	'version' => '1.1',
	'description' => 'Gives bureaucrats the ability to confirm account requests',
	'author' => 'Aaron Schulz',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ConfirmAccount',
);

# Set the person's bio as their userpage?
$wgMakeUserPageFromBio = true;
# Text to add to bio pages if the above option is on
$wgAutoUserBioText = '';

$wgAutoWelcomeNewUsers = true;
# Make the username of the real name?
$wgUseRealNamesOnly = true;
$wgRejectedAccountMaxAge = 7 * 24 * 3600; // One week
# How many requests can an IP make at once?
$wgAccountRequestThrottle = 1;
# Minimum biography specs
$wgAccountRequestMinWords = 50;

# Show ToS checkbox
$wgAccountRequestToS = true;
# Show confirmation info fields
$wgAccountRequestExtraInfo = true;

# Location of attached files
$wgAllowAccountRequestFiles = true;
$wgAccountRequestExts = array('txt','pdf','doc','latex','rtf','text','wp','wpd' );
$wgFileStore['accountreqs']['directory'] = "{$wgUploadDirectory}/accountreqs";
$wgFileStore['accountreqs']['url'] = null; // Private
$wgFileStore['accountreqs']['hash'] = 3;

$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['bureaucrat']['confirmaccount'] = true;
$wgGroupPermissions['bureaucrat']['requestips'] = true;

# Internationalisation
function efLoadConfirmAccountsMessages() {
	global $wgMessageCache, $wgConfirmAccountMessages;
	require_once( dirname (__FILE__) . '/ConfirmAccount.i18n.php');
	foreach( $wgConfirmAccountMessages as $key => $value ) {
		$wgMessageCache->addMessages( $value, $key );
	}
}

function efAddRequestLoginText( &$template ) {
	global $wgUser;

	efLoadConfirmAccountsMessages();

	if( !$wgUser->isAllowed('createaccount') ) {
		$template->set( 'header', wfMsgExt('requestaccount-loginnotice', array('parse') ) );
	}

	return true;
}

function efCheckIfAccountNameIsPending( &$user, &$abortError ) {
	efLoadConfirmAccountsMessages();
	# If an account is made with name X, and one is pending with name X
	# we will have problems if the pending one is later confirmed
	$dbw = wfGetDB( DB_MASTER );
	$dup = $dbw->selectField( 'account_requests', '1',
		array( 'acr_name' => $user->getName() ),
		__METHOD__ );
	if ( $dup ) {
		$abortError = wfMsgHtml('requestaccount-inuse');
		return false;
	}
	return true;
}

# Register special page
if ( !function_exists( 'extAddSpecialPage' ) ) {
	require( dirname(__FILE__) . '/../ExtensionFunctions.php' );
}
# Request an account
extAddSpecialPage( dirname(__FILE__) . '/ConfirmAccount_body.php', 'RequestAccount', 'RequestAccountPage' );
# Confirm accounts
extAddSpecialPage( dirname(__FILE__) . '/ConfirmAccount_body.php', 'ConfirmAccounts', 'ConfirmAccountsPage' );

# Add notice of where to request an account
$wgHooks['UserCreateForm'][] = 'efAddRequestLoginText';
$wgHooks['UserLoginForm'][] = 'efAddRequestLoginText';
# Check for collisions
$wgHooks['AbortNewAccount'][] = 'efCheckIfAccountNameIsPending';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'efConfirmAccountSchemaUpdates';

function efConfirmAccountSchemaUpdates() {
	global $wgDBtype, $wgExtNewFields, $wgExtPGNewFields;

	$base = dirname(__FILE__);
	if ($wgDBtype == 'mysql') {
		$wgExtNewFields[] = array('account_requests', 'acr_filename',
			"$base/archives/patch-acr_filename.sql" );
	} else {
		$wgExtPGNewFields[] = array('account_requests', 'acr_filename', "TEXT" );
		$wgExtPGNewFields[] = array('account_requests', 'acr_held', "TIMESTAMPTZ" );
		$wgExtPGNewFields[] = array('account_requests', 'acr_storage_key', "TEXT" );
		$wgExtPGNewFields[] = array('account_requests', 'acr_comment', "TEXT" );
	}

	return true;
}
