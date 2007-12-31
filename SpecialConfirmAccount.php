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
	'description' => 'Gives bureaucrats the ability to confirm account requests',
	'author' => 'Aaron Schulz',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ConfirmAccount',
	'version' => '1.0',
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

# Prospective account access levels. 
# Should be integer -> (special page param,user group) pairs.
# The special page param is used at Special:ConfirmAccount.
$wgAccountRequestTypes = array(
	0 => array( 'authors', 'user' )
);

# IMPORTANT: do we store the user's notes and credentials
# for sucessful account request? This will be stored indefinetely
# and will be accessible to users with crediential lookup permissions
$wgConfirmAccountSaveInfo = true;

# Send an email to ddress when account requests confirm their email.
# Set to false to skip this.
$wgConfirmAccountContact = false;

# Location of attached files for pending requests
$wgAllowAccountRequestFiles = true;
$wgAccountRequestExts = array('txt','pdf','doc','latex','rtf','text','wp','wpd','sxw');
$wgFileStore['accountreqs']['directory'] = "{$wgUploadDirectory}/accountreqs";
$wgFileStore['accountreqs']['url'] = null; // Private
$wgFileStore['accountreqs']['hash'] = 3;

# Location of credential files
$wgFileStore['accountcreds']['directory'] = "{$wgUploadDirectory}/accountcreds";
$wgFileStore['accountcreds']['url'] = null; // Private
$wgFileStore['accountcreds']['hash'] = 3;

$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['bureaucrat']['confirmaccount'] = true;
# This right has the request IP show when confirming accounts
$wgGroupPermissions['bureaucrat']['requestips'] = true;
$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['ConfirmAccount'] = $dir . 'ConfirmAccount.i18n.php';

# If credentials are stored, this right lets users look them up
$wgGroupPermissions['bureaucrat']['lookupcredentials'] = true;

# Internationalisation
function efLoadConfirmAccountsMessages() {
	wfLoadExtensionMessages( 'ConfirmAccount' );
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
# Account credentials
extAddSpecialPage( dirname(__FILE__) . '/ConfirmAccount_body.php', 'UserCredentials', 'UserCredentialsPage' );

# Add notice of where to request an account
$wgHooks['UserCreateForm'][] = 'efAddRequestLoginText';
$wgHooks['UserLoginForm'][] = 'efAddRequestLoginText';
# Check for collisions
$wgHooks['AbortNewAccount'][] = 'efCheckIfAccountNameIsPending';
$wgHooks['LoadExtensionSchemaUpdates'][] = 'efConfirmAccountSchemaUpdates';

function efConfirmAccountSchemaUpdates() {
	global $wgDBtype, $wgExtNewFields, $wgExtPGNewFields, $wgExtNewTables;
	
	$base = dirname(__FILE__);
	if( $wgDBtype == 'mysql' ) {
		$wgExtNewFields[] = array('account_requests', 'acr_filename',
			"$base/archives/patch-acr_filename.sql" );
			
		$wgExtNewTables[] = array('account_credentials', "$base/archives/patch-account_credentials.sql" );
	} else if( $wgDBtype == 'postgres' ) {
		$wgExtPGNewFields[] = array('account_requests', 'acr_filename', "TEXT" );
		$wgExtPGNewFields[] = array('account_requests', 'acr_held', "TIMESTAMPTZ" );
		$wgExtPGNewFields[] = array('account_requests', 'acr_storage_key', "TEXT" );
		$wgExtPGNewFields[] = array('account_requests', 'acr_comment', "TEXT" );
		
		$wgExtPGNewFields[] = array('account_requests', 'acr_type', "INTEGER" );
		$wgExtNewTables[] = array('account_credentials', "$base/postgres/patch-account_credentials.sql" );
	}
	
	return true;
}
