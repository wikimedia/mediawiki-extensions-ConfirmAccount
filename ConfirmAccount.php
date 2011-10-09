<?php
/*
 (c) Aaron Schulz 2007, GPL

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 http://www.gnu.org/copyleft/gpl.html
*/

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "ConfirmAccount extension\n";
	exit( 1 ) ;
}

$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'Confirm User Accounts',
	'descriptionmsg' => 'confirmedit-desc',
	'author'         => 'Aaron Schulz',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:ConfirmAccount',
);

# This extension needs email enabled!
# Otherwise users can't get their passwords...
if ( !$wgEnableEmail ) {
	echo "ConfirmAccount extension requires \$wgEnableEmail set to true \n";
	exit( 1 ) ;
}

# Load default config variables
require( dirname( __FILE__ ) . '/ConfirmAccount.config.php' );

# Let some users confirm account requests and view credentials for created accounts
$wgAvailableRights[] = 'confirmaccount'; // user can confirm account requests
$wgAvailableRights[] = 'requestips'; // user can see IPs in request queue
$wgAvailableRights[] = 'lookupcredentials'; // user can lookup info on confirmed users

$dir = dirname( __FILE__ ) . '/presentation';
$wgAutoloadClasses['ConfirmAccountUISetup'] = "$dir/ConfirmAccountUI.setup.php";
# Internationalization files
$wgExtensionMessagesFiles['ConfirmAccount'] = "$dir/ConfirmAccount.i18n.php";
$wgExtensionAliasesFiles['ConfirmAccount'] = "$dir/ConfirmAccount.alias.php";
# UI event handler classes
$wgAutoloadClasses['ConfirmAccountUIHooks'] = "$dir/ConfirmAccountUI.hooks.php";

$dir = dirname( __FILE__ ) . '/presentation/specialpages';
# UI to request an account
$wgAutoloadClasses['RequestAccountPage'] = "$dir/actions/RequestAccount_body.php";
# UI to confirm accounts
$wgAutoloadClasses['ConfirmAccountsPage'] = "$dir/actions/ConfirmAccount_body.php";
# UI to see account credentials
$wgAutoloadClasses['UserCredentialsPage'] = "$dir/actions/UserCredentials_body.php";

$dir = dirname( __FILE__ ) . '/dataclasses';
# Utility functions
$wgAutoloadClasses['ConfirmAccount'] = "$dir/ConfirmAccount.class.php";
# Data access objects
$wgAutoloadClasses['UserAccountRequest'] = "$dir/UserAccountRequest.php";

$dir = dirname( __FILE__ ) . '/business';
# Business logic
$wgAutoloadClasses['AccountRequestSubmission'] = "$dir/AccountRequestSubmission.php";

$dir = dirname( __FILE__ ) . '/schema';
# Schema changes
$wgAutoloadClasses['ConfirmAccountUpdaterHooks'] = "$dir/ConfirmAccountUpdater.hooks.php";

# Actually register special pages
ConfirmAccountUISetup::defineSpecialPages( $wgSpecialPages, $wgSpecialPageGroups );

# JS/CSS modules and message bundles used by JS scripts
ConfirmAccountUISetup::defineResourceModules( $wgResourceModules );

# ####### EVENT-HANDLER FUNCTIONS #########

# UI-related hook handlers
ConfirmAccountUISetup::defineHookHandlers( $wgHooks );

# Check for account name collisions
$wgHooks['AbortNewAccount'][] = 'ConfirmAccountUIHooks::checkIfAccountNameIsPending';

# Schema changes
$wgHooks['LoadExtensionSchemaUpdates'][] = 'ConfirmAccountUpdaterHooks::addSchemaUpdates';

# ####### END HOOK TRIGGERED FUNCTIONS #########
