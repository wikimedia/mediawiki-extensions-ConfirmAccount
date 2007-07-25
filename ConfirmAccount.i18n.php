<?php
/**
 * Internationalisation file for ConfirmAccount extension.
 *
 * @addtogroup Extensions
*/

$wgConfirmAccountMessages = array();

$wgConfirmAccountMessages['en'] = array(
	# Request account page
	'requestaccount'          => 'Request account',
	'requestacount-text'      => '\'\'\'Complete and submit the following form to request a user account\'\'\'. 
	
	Make sure that you first read the [[{{NS:PROJECT}}:Terms of Service|Terms of Service]] before requesting an account.
	
	Once the account is approved, you will be emailed a notification message and the account will be usable at 
	[[Special:Userlogin]].',
	'requestaccount-dup'      => '\'\'\'Note: You already are logged in with a registered account.\'\'\'',
	'requestacount-legend1'   => 'User account:',
	'requestacount-legend2'   => 'Personal information:',
	'requestacount-legend3'   => 'Other information:',
	'requestacount-acc-text'  => 'Your email address will be sent a confirmation message once this request is submited. Please respond by clicking 
	on the confirmation link provided by the the email. Also, your password will be emailed to you when your account is created.',
	'requestacount-ext-text'  => 'The following information is kept private and will only be used for this request. 
	You may want to list contacts such a phone number to aid in identify confirmation.',
	'requestaccount-bio-text' => "Your biography will be set as the default content for your userpage. Try to include 
	any credentials. Make sure you are comfortable publishing such information. Your name can be changed via [[Special:Preferences]].",
	'requestaccount-real'     => 'Real name:',
	'requestaccount-same'     => '(same as real name)',
	'requestaccount-email'    => 'Email address:',
	'requestaccount-bio'      => 'Personal biography:',
	'requestaccount-notes'    => 'Additional notes:',
	'requestaccount-urls'     => 'List of websites (separated by newlines):',
	'requestaccount-agree'    => 'You must certify that your real name is correct and that you agree to our Terms of Service.',
	'requestaccount-inuse'    => 'Username is already in use in a pending account request.',
	'requestaccount-tooshort' => 'Your biography must be at least be $1 words long.',
	'requestaccount-tos'      => 'I have read and agree to abide by the Terms of Service of {{SITENAME}}.',
	'requestaccount-correct'  => 'I certify that the name I have specified under "Real name" is in fact my own real name.',
	'requestacount-submit'    => 'Request account',
	'requestaccount-sent'     => 'Your account request has successfully been sent and is now pending review.',
	'request-account-econf'   => 'Your e-mail address has been confirmed and will be listed as such in your account 
	request.',
	'requestaccount-email-subj' => '{{SITENAME}} e-mail address confirmation',
	'requestaccount-email-body' => 'Someone, probably you from IP address $1, has requested an
account "$2" with this e-mail address on {{SITENAME}}.

To confirm that this account really does belong to you on {{SITENAME}}, open this link in your browser:

$3

If the account is created, only you will be emailed the password. If this is *not* you, don\'t follow the link. 
This confirmation code will expire at $4.',

	'acct_request_throttle_hit' => "Sorry, you have already requested $1 accounts. You can't make any more requests.",
	
	# Add to Special:Login
	'requestacount-loginnotice' => 'To obtain a user account, you must \'\'\'[[Special:RequestAccount|request one]]\'\'\'.',
	
	# Confirm account page
	'confirmaccounts'       => 'Confirm account requests', 
	'confirmacount-list'    => 'Below is a list of account requests awaiting approval. 
	Approved accounts will be created and removed from this list. Rejected accounts will simply be deleted from this 
	list.',
	'confirmacount-list2'    => 'Below is a list recently rejected account requests which may automatically be deleted 
	once several days old. They can still be approved into accounts, though you may want to first consult the rejecting 
	admin before doing so.',
	'confirmacount-text'    => 'This is a pending request for a user account at \'\'\'{{SITENAME}}\'\'\'. Carefully 
	review and if needed, confirm, all the below information. Note that you can choose to create the account under a 
	different username. Use this only to avoid 	collisions with other names.
	
	If you simply leave this page without confirming or denying this request, it will remain pending.',
	'confirmacount-none'    => 'There are currently no pending account requests.',
	'confirmacount-none2'   => 'There are currently no recently rejected account requests.',
	'confirmaccount-badid'  => 'There is no pending request corresponding to the given ID. It may have already been handled.',
	'confirmaccount-back'   => 'View pending account list',
	'confirmaccount-back2'  => 'View recently rejected account list',
	'confirmaccount-name'   => 'Username',
	'confirmaccount-real'   => 'Name',
	'confirmaccount-email'  => 'Email',
	'confirmaccount-bio'    => 'Biography',
	'confirmaccount-urls'   => 'List of websites:',
	'confirmaccount-nourls' => '(None provided)',
	'confirmaccount-review' => 'Approve/Reject',
	'confirmacount-confirm' => 'Use the buttons below to accept this request or deny it.',
	'confirmaccount-econf'  => '(confirmed)',
	'confirmaccount-reject' => '(rejected by [[User:$1|$1]] on $2)',
	'confirmacount-create'  => 'Accept (create account)',
	'confirmacount-deny'    => 'Reject (delist)',
	'requestaccount-reason' => 'Comment (will be included in email):',
	'confirmacount-submit'  => 'Confirm',
	'confirmaccount-acc'    => 'Account request confirmed successfully; created new user account [[User:$1]].',
	'confirmaccount-rej'    => 'Account request rejected successfully.',
	'confirmaccount-summary' => 'Creating user page with biography of new user.',
	'confirmaccount-welc'   => "'''Welcome to ''{{SITENAME}}''!''' We hope you will contribute much and well. 
	You'll probably want to read [[{{NS:PROJECT}}:Getting started|Getting started]]. Again, welcome and have fun! 
	~~~~",
	'confirmaccount-wsum'   => 'Welcome!',
	'confirmaccount-email-subj' => '{{SITENAME}} account request',
	'confirmaccount-email-body' => 'Your request for an account has been approved on {{SITENAME}}.

Account name: $1

Password: $2

For security reasons you will need to change your password on first login. To login, please go to 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'Your request for an account has been approved on {{SITENAME}}.

Account name: $1

Password: $2

$3

For security reasons you will need to change your password on first login. To login, please go to 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'Sorry, your request for an account "$1" has been rejected on {{SITENAME}}.

There are several ways this can happen. You may not have filled out the form correctly, did not provide adequate 
length in your responses, or otherwise failed to meet some policy criteria. There may be contact lists on site that 
you can use if you want to know more about user account policy.',
	'confirmaccount-email-body4' => 'Sorry, your request for an account "$1" has been rejected on {{SITENAME}}.

$2

There may be contact lists on site that you can use if you want to know more about user account policy.',
);
