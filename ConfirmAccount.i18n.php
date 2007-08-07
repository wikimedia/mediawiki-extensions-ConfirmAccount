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
// German translations (by Rrosenfeld)
$wgConfirmAccountMessages['de'] = array(
	# Request account page
	'requestaccount'          => 'Benutzerkonto beantragen',
	'requestacount-text'      => '\'\'\'Fülle das folgende Formular aus und schick es ab, um ein Benutzerkonto zu beantragen\'\'\'. 
	
	Bitte lies zunächst die [[{{NS:PROJECT}}:Nutzungsbedingungen|Nutzungsbedingungen]] bevor Du ein Benutzerkonto beantragst.
	
	Sobald das Konto bestätigt wurde, wirst Du per E-Mail benachrichtigt und Du kannst Dich unter [[Spezial:Anmelden]] einloggen.',
	'requestaccount-dup'      => '\'\'\'Achtung: Du bist bereits mit einem registrierten Benutzerkonto eingeloggt.\'\'\'',
	'requestacount-legend1'   => 'Benutzerkonto:',
	'requestacount-legend2'   => 'Persönliche Informationen:',
	'requestacount-legend3'   => 'Weitere Informationen:',
	'requestacount-acc-text'  => 'An Deine E-Mail-Adresse wird nach dem Absenden dieses Formulars eine Bestätigungsmail geschickt. 
	Bitte reagiere darauf, indem Du auf den in dieser Mail enthaltenen Bestätigungs-Link klickst. Sobald Dein Konto angelegt wurde,
	wird Dir Dein Passwort per E-Mail zugeschickt.',
	'requestacount-ext-text'  => 'Die folgenden Informationen werden vertraulich behandelt und ausschließlich für diesen Antrag
	verwendet. Du kannst Kontakt-Angaben wie eine Telefonnummer machen, um die Bearbeitung Deines Antrags zu vereinfachen.',
	'requestaccount-bio-text' => "Deine Biographie wird als initialer Inhalt Deiner Benutzerseite gespeichert. Versuche alle nötigen
	Empfehlungen zu erwähnen, aber stelle sicher, dass Du die Informationen auch wirklich veröffentlichen möchtest. Du kannst Deinen
	Namen unter [[Spezial:Einstellungen]] ändern.",
	'requestaccount-real'     => 'Real-Name:',
	'requestaccount-same'     => '(wie der Real-Name)',
	'requestaccount-email'    => 'E-Mail Adresse:',
	'requestaccount-bio'      => 'Persönliche Biographie:',
	'requestaccount-notes'    => 'Zusätzliche Angaben:',
	'requestaccount-urls'     => 'Liste von Webseiten (durch Zeilenumbrüche getrennt):',
	'requestaccount-agree'    => 'Du musst bestätigen, dass Dein Real-Name korrekt ist und Du die Benutzerbedingungen akzeptierst.',
	'requestaccount-inuse'    => 'Der Benutzername ist bereits in einem anderen Benutzerantrag in Verwendung.',
	'requestaccount-tooshort' => 'Deine Biographie sollte mindestens $1 Worte lang sein.',
	'requestaccount-tos'      => 'Ich habe die Benutzerbedingungen von {{SITENAME}} gelesen und akzeptiere sie.',
	'requestaccount-correct'  => 'Ich bestätige, dass der Name, den ich unter "Real-Name" angegeben habe, mein wirklicher Name ist.',
	'requestacount-submit'    => 'Benutzerkonto beantragen',
	'requestaccount-sent'     => 'Dein Antrag wurde erfolgreich verschickt und muss nun noch überprüft werden.',
	'request-account-econf'   => 'Deine E-Mail Adresse wurde bestätigt und wird nun als solche in Deinem Account-Antrag geführt.',
	'requestaccount-email-subj' => '{{SITENAME}} E-Mail Adressen Prüfung',
	'requestaccount-email-body' => 'Jemand, mit der IP Adresse $1, möglicherweise Du, hat bei {{SITENAME}} 
das Benutzerkonto "$2" mit Deiner E-Mail Adresse beantragt.

Um zu bestätigen, dass wirklich Du dieses Konto bei {{SITENAME}}
beantragt hast, öffne bitte folgenden Link in Deinem Browser:

$3

Wenn das Benutzerkonto erstellt wurde, bekommst Du eine weitere E-Mail
mit dem Passwort.

Wenn Du das Benutzerkonto *nicht* beantragt hast, öffne den Link bitte nicht!

Dieser Bestätigungscode wird um $4 ungültig.',

	'acct_request_throttle_hit' => "Du hast bereits $1 Benutzerkonten beantragt, Du kannst momentan keine weiteren beantragen.",
	
	# Add to Special:Login
	'requestacount-loginnotice' => 'Um ein neues Benutzerkonto zu erhalten, musst Du es \'\'\'[[SpeZial:RequestAccount|beantragen]]\'\'\'.',
	
	# Confirm account page
	'confirmaccounts'       => 'Benutzerkonto-Anträge bestätigen', 
	'confirmacount-list'    => 'Unten findest Du eine Liste von noch zu bearbeitenden Benutzerkonto-Anträgen.
	Bestätigte Konten werden angelegt und aus der Liste entfernt. Abgelehnte Konten werden einfach aus der Liste gelöscht.',
	'confirmacount-list2'    => 'Below is a list recently rejected account requests which may automatically be deleted 
	once several days old. They can still be approved into accounts, though you may want to first consult the rejecting 
	admin before doing so.',
	'confirmacount-text'    => 'Dies ist ein Antrag auf ein Benutzerkonto bei \'\'\'{{SITENAME}}\'\'\'. Prüfe alle unten
	stehenden Informationen gründlich und bestätige die Informationen wenn möglich. Bitte beachte, dass Du den Zugang bei Bedarf unter
	einem anderen Benutzernamen anlegen kannst. Du solltest dies nur nutzen, um Kollisionen mit anderen Namen zu vermeiden.
	
	Wenn Du diese Seite verlässt, ohne das Konto zu bestätigen oder abzulehnen, wird der Antrag offen stehen bleiben.',
	'confirmacount-none'    => 'Momentan gibt es keine offenen Benutzeranträge.',
	'confirmacount-none2'   => 'Momentan gibt es keine kürzlich abgelehnten Benutzeranträge.',
	'confirmaccount-badid'  => 'Momentan gibt es keinen Benutzerantrag zur angegebenen ID. Möglicherweise wurde er bereits bearbeitet.',
	'confirmaccount-back'   => 'Liste der offenen Anträge ansehen',
	'confirmaccount-back2'  => 'Liste der kürzlich abgelehnten Anträge ansehen',
	'confirmaccount-name'   => 'Benutzername',
	'confirmaccount-real'   => 'Name',
	'confirmaccount-email'  => 'E-Mail',
	'confirmaccount-bio'    => 'Biographie',
	'confirmaccount-urls'   => 'Liste der Webseiten:',
	'confirmaccount-nourls' => '(Nichts angegeben)',
	'confirmaccount-review' => 'Bestätigen/Ablehnen',
	'confirmacount-confirm' => 'Benutze die folgende Auswahl, um den Antrag zu akzeptieren oder abzulehnen.',
	'confirmaccount-econf'  => '(bestätigt)',
	'confirmaccount-reject' => '(rejected by [[User:$1|$1]] on $2)',
	'confirmacount-create'  => 'Bestätigen (Konto anlegen)',
	'confirmacount-deny'    => 'Ablehnen (Antrag löschen)',
	'requestaccount-reason' => 'Kommentar (wird in die Mail an den Antragsteller eingefügt):',
	'confirmacount-submit'  => 'Abschicken',
	'confirmaccount-acc'    => 'Benutzerantrag erfolgreich bestätigt; Benutzer [[Benutzer:$1]] wurde angelegt.',
	'confirmaccount-rej'    => 'Benutzerantrag wurde abgelehnt.',
	'confirmaccount-summary' => 'Erzeuge Benutzerseite mit der Biographie des neuen Benutzers.',
	'confirmaccount-welc'   => "'''Willkommen bei ''{{SITENAME}}''!''' Wir hoffen, dass Du viele gute Informationen beisteuerst.
	Möglicherweise möchtest Du zunächst [[{{NS:PROJECT}}:Erste Schritte|Erste Schritte]]. Nochmal: Willkommen und hab' Spaß! 
	~~~~",
	'confirmaccount-wsum'   => 'Willkommen!',
	'confirmaccount-email-subj' => '{{SITENAME}} Antrag auf Benutzerkonto',
	'confirmaccount-email-body' => 'Dein Antrag auf ein Benutzerkonto bei {{SITENAME}} wurde bestätigt.

Benutzername: $1

Passwort: $2

Aus Sicherheitsgründen solltest Du Dein Passwort unbedingt beim ersten
Einloggen ändern. Um Dich einzuloggen gehst Du auf die Seite
{{fullurl:Spezial:Anmelden}}.',
	'confirmaccount-email-body2' => 'Dein Antrag auf ein Benutzerkonto bei {{SITENAME}} wurde bestätigt.

Benutzername: $1

Passwort: $2

$3

Aus Sicherheitsgründen solltest Du Dein Passwort unbedingt beim ersten
Einloggen ändern. Um Dich einzuloggen gehst Du auf die Seite
{{fullurl:Spezial:Anmelden}}.',
	'confirmaccount-email-body3' => 'Leider wurde Dein Antrag auf eine Benutzerkonto "$1" 
bei {{SITENAME}} abgelehnt.

Dies kann viele Gründe haben. Möglicherweise hast Du das Antragsformular
nicht richtig ausgefüllt, hast nicht genügend Angaben gemacht oder hast
die Anforderungen auf andere Weise nicht erfüllt.

Möglicherweise gibt es auf der Seite Kontaktadressen, an die Du Dich wenden
kannst, wenn Du mehr über die Anforderungen wissen möchtest.',
	'confirmaccount-email-body4' => 'Leider wurde Dein Antrag auf eine Benutzerkonto "$1" 
bei {{SITENAME}} abgelehnt.

$2

Möglicherweise gibt es auf der Seite Kontaktadressen, an die Du Dich wenden
kannst, wenn Du mehr über die Anforderungen wissen möchtest.',
);
