<?php
#(c) Aaron Schulz

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "ConfirmAccount extension\n";
	exit( 1 ) ;
}

# This extension needs email enabled!
# Otherwise users can't get their passwords...
if( !$wgEnableEmail ) {
	echo "ConfirmAccount extension requeires \$wgEnableEmail set to true \n";
	exit( 1 ) ;
}

$wgExtensionCredits['specialpage'][] = array(
	'name' => 'Confirm user accounts',
	'description' => 'Gives bureaucrats the ability to confirm account requests',
	'author' => 'Aaron Schulz'
);

# Set the person's bio as their userpage?
$wgMakeUserPageFromBio = true;
$wgSaveRejectedAccountReqs = true;
$wgRejectedAccountMaxAge = 7 * 24 * 3600; // One week

$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['sysop']['createaccount'] = false;
$wgGroupPermissions['bureaucrat']['confirmaccount'] = true;

$wgAccountRequestThrottle = 1;

# Internationalisation
require_once( 'ConfirmAccount.i18n.php' );

function efLoadConfirmAccountsMessages() {
	global $wgMessageCache, $wgConfirmAccountMessages;

	foreach( $wgConfirmAccountMessages as $key => $value ) {
		$wgMessageCache->addMessages( $wgConfirmAccountMessages[$key], $key );
	}
}

function efAddRequestLoginText( &$template ) {
	efLoadConfirmAccountsMessages();
	
	$template->set( 'header', wfMsgExt('requestacount-loginnotice', array('parse') ) );
	
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