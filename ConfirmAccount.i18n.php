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
	'requestaccount-urls'     => 'List of websites, if any (separate with newlines):',
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

	Bitte lies zunächst die [[{{NS:PROJECT}}:Nutzungsbedingungen|Nutzungsbedingungen]] bevor du ein Benutzerkonto beantragst.

	Sobald das Konto bestätigt wurde, wirst du per E-Mail benachrichtigt und du kannst dich unter „[[{{ns:special}}:Userlogin|Anmelden]]“ einloggen.',
	'requestaccount-dup'      => '\'\'\'Achtung: Du bist bereits mit einem registrierten Benutzerkonto eingeloggt.\'\'\'',
	'requestacount-legend1'   => 'Benutzerkonto:',
	'requestacount-legend2'   => 'Persönliche Informationen:',
	'requestacount-legend3'   => 'Weitere Informationen:',
	'requestacount-acc-text'  => 'An deine E-Mail-Adresse wird nach dem Absenden dieses Formulars eine Bestätigungsmail geschickt. 
	Bitte reagiere darauf, indem du auf den in dieser Mail enthaltenen Bestätigungs-Link klickst. Sobald dein Konto angelegt wurde,
	wird dir dein Passwort per E-Mail zugeschickt.',
	'requestacount-ext-text'  => 'Die folgenden Informationen werden vertraulich behandelt und ausschließlich für diesen Antrag
	verwendet. Du kannst Kontakt-Angaben wie eine Telefonnummer machen, um die Bearbeitung deines Antrags zu vereinfachen.',
	'requestaccount-bio-text' => "Deine Biographie wird als initialer Inhalt deiner Benutzerseite gespeichert. Versuche alle nötigen
	Empfehlungen zu erwähnen, aber stelle sicher, dass du die Informationen auch wirklich veröffentlichen möchtest. Du kannst deinen
	Namen unter „[[{{ns:special}}:preferences|Einstellungen]]“ ändern.",
	'requestaccount-real'     => 'Real-Name:',
	'requestaccount-same'     => '(wie der Real-Name)',
	'requestaccount-email'    => 'E-Mail-Adresse:',
	'requestaccount-bio'      => 'Persönliche Biographie:',
	'requestaccount-notes'    => 'Zusätzliche Angaben:',
	'requestaccount-urls'     => 'Liste von Webseiten (durch Zeilenumbrüche getrennt):',
	'requestaccount-agree'    => 'Du musst bestätigen, dass Dein Real-Name korrekt ist und du die Benutzerbedingungen akzeptierst.',
	'requestaccount-inuse'    => 'Der Benutzername ist bereits in einem anderen Benutzerantrag in Verwendung.',
	'requestaccount-tooshort' => 'Deine Biographie sollte mindestens $1 Worte lang sein.',
	'requestaccount-tos'      => 'Ich habe die Benutzerbedingungen von {{SITENAME}} gelesen und akzeptiere sie.',
	'requestaccount-correct'  => 'Ich bestätige, dass der Name, den ich unter „Real-Name“ angegeben habe, mein wirklicher Name ist.',
	'requestacount-submit'    => 'Benutzerkonto beantragen',
	'requestaccount-sent'     => 'Dein Antrag wurde erfolgreich verschickt und muss nun noch überprüft werden.',
	'request-account-econf'   => 'Deine E-Mail-Adresse wurde bestätigt und wird nun als solche in Deinem Account-Antrag geführt.',
	'requestaccount-email-subj' => '{{SITENAME}} E-Mail-Adressen Prüfung',
	'requestaccount-email-body' => 'Jemand, mit der IP Adresse $1, möglicherweise du, hat bei {{SITENAME}} 
das Benutzerkonto "$2" mit deiner E-Mail-Adresse beantragt.

Um zu bestätigen, dass wirklich du dieses Konto bei {{SITENAME}}
beantragt hast, öffne bitte folgenden Link in deinem Browser:

$3

Wenn das Benutzerkonto erstellt wurde, bekommst du eine weitere E-Mail
mit dem Passwort.

Wenn du das Benutzerkonto *nicht* beantragt hast, öffne den Link bitte nicht!

Dieser Bestätigungscode wird um $4 ungültig.',

	'acct_request_throttle_hit' => "Du hast bereits $1 Benutzerkonten beantragt, du kannst momentan keine weiteren beantragen.",

	# Add to Special:Login
	'requestacount-loginnotice' => 'Um ein neues Benutzerkonto zu erhalten, musst du es \'\'\'[[{{ns:special}}:RequestAccount|beantragen]]\'\'\'.',

	# Confirm account page
	'confirmaccounts'       => 'Benutzerkonto-Anträge bestätigen', 
	'confirmacount-list'    => 'Unten findest du eine Liste von noch zu bearbeitenden Benutzerkonto-Anträgen.
	Bestätigte Konten werden angelegt und aus der Liste entfernt. Abgelehnte Konten werden einfach aus der Liste gelöscht.',
	'confirmacount-text'    => 'Dies ist ein Antrag auf ein Benutzerkonto bei \'\'\'{{SITENAME}}\'\'\'. Prüfe alle unten
	stehenden Informationen gründlich und bestätige die Informationen wenn möglich. Bitte beachte, dass du den Zugang bei Bedarf unter
	einem anderen Benutzernamen anlegen kannst. Du solltest dies nur nutzen, um Kollisionen mit anderen Namen zu vermeiden.

	Wenn du diese Seite verlässt, ohne das Konto zu bestätigen oder abzulehnen, wird der Antrag offen stehen bleiben.',
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
	'confirmacount-create'  => 'Bestätigen (Konto anlegen)',
	'confirmacount-deny'    => 'Ablehnen (Antrag löschen)',
	'requestaccount-reason' => 'Kommentar (wird in die Mail an den Antragsteller eingefügt):',
	'confirmacount-submit'  => 'Abschicken',
	'confirmaccount-acc'    => 'Benutzerantrag erfolgreich bestätigt; Benutzer [[{{ns:User}}:$1]] wurde angelegt.',
	'confirmaccount-rej'    => 'Benutzerantrag wurde abgelehnt.',
	'confirmaccount-summary' => 'Erzeuge Benutzerseite mit der Biographie des neuen Benutzers.',
	'confirmaccount-welc'   => "'''Willkommen bei ''{{SITENAME}}''!''' Wir hoffen, dass du viele gute Informationen beisteuerst.
	Möglicherweise möchtest Du zunächst [[{{NS:PROJECT}}:Erste Schritte|Erste Schritte]]. Nochmal: Willkommen und hab' Spaß! 
	~~~~",
	'confirmaccount-wsum'   => 'Willkommen!',
	'confirmaccount-email-subj' => '{{SITENAME}} Antrag auf Benutzerkonto',
	'confirmaccount-email-body' => 'Dein Antrag auf ein Benutzerkonto bei {{SITENAME}} wurde bestätigt.

Benutzername: $1

Passwort: $2

Aus Sicherheitsgründen solltest du dein Passwort unbedingt beim ersten
Einloggen ändern. Um dich einzuloggen gehst du auf die Seite
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'Dein Antrag auf ein Benutzerkonto bei {{SITENAME}} wurde bestätigt.

Benutzername: $1

Passwort: $2

$3

Aus Sicherheitsgründen solltest du Dein Passwort unbedingt beim ersten
Einloggen ändern. Um dich einzuloggen gehst du auf die Seite
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'Leider wurde dein Antrag auf ein Benutzerkonto "$1" 
bei {{SITENAME}} abgelehnt.

Dies kann viele Gründe haben. Möglicherweise hast du das Antragsformular
nicht richtig ausgefüllt, hast nicht genügend Angaben gemacht oder hast
die Anforderungen auf andere Weise nicht erfüllt.

Möglicherweise gibt es auf der Seite Kontaktadressen, an die du dich wenden
kannst, wenn du mehr über die Anforderungen wissen möchtest.',
	'confirmaccount-email-body4' => 'Leider wurde dein Antrag auf ein Benutzerkonto "$1" 
bei {{SITENAME}} abgelehnt.

$2

Möglicherweise gibt es auf der Seite Kontaktadressen, an die du dich wenden
kannst, wenn du mehr über die Anforderungen wissen möchtest.',
);

$wgConfirmAccountMessages['hsb'] = array(
	'requestaccount'              => 'Wu�iwarske konto sej �adac',
	'requestaccount-dup'          => '\'\'\'Kedzbu: Sy hi�o ze zregistrowanym wu�iwarskim kontom prizjewjeny.\'\'\'',
	'requestacount-legend1'       => 'Wu�iwarske konto:',
	'requestacount-legend2'       => 'Wosobinske informacije:',
	'requestacount-legend3'       => 'Dal�e informacije',
	'requestaccount-real'         => 'Woprawdzite mjeno:',
	'requestaccount-same'         => '(ka� woprawdzite mjeno)',
	'requestaccount-email'        => 'E-mejlowa adresa:',
	'requestaccount-bio'          => 'Wosobinska biografija:',
	'requestaccount-notes'        => 'Pridatne podaca:',
	'requestaccount-urls'         => 'Liscina webowych sydlow (prez linkowe lamanja wotdzelene)',
	'requestaccount-inuse'        => 'Wu�iwarske mjeno so hi�o w druhim kontowym po�adanju wu�iwa.',
	'requestaccount-tooshort'     => 'Twoja biografija dyrbi znajmjen�a $1 slowow dolho byc.',
	'requestaccount-correct'      => 'Wobkrucam, zo mjeno, kotre� sym pod "Woprawdzite mjeno" podal, je woprawdze moje woprawdzite mjeno.',
	'requestacount-submit'        => 'Wu�iwarske konto sej �adac',
	'requestaccount-email-subj'   => '{{SITENAME}} Pruwowanje e-mejloweje adresy',
	'acct_request_throttle_hit'   => 'Sy hi�o $1 wu�iwarskich kontow po�adal, njem�e� sej we wokomiku dal�e konta �adac.',
	'confirmaccounts'             => 'Kontowe po�adanja potwjerdzic',
	'confirmaccount-name'         => 'Wu�iwarske mjeno',
	'confirmaccount-real'         => 'Mjeno',
	'confirmaccount-email'        => 'E-mejl',
	'confirmaccount-bio'          => 'Biografija',
	'confirmaccount-urls'         => 'Liscina webowych sydlow:',
	'confirmaccount-nourls'       => '(Nico podate)',
	'confirmaccount-review'       => 'Dowolic/Wotpokazac',
	'confirmaccount-econf'        => '(potwjerdzene)',
	'confirmaccount-reject'       => '(wot [[Wu�iwar:$1|$1]] na $2 wotpokazany)',
	'confirmacount-create'        => 'Akceptowac (Konto wutworic)',
	'confirmacount-deny'          => 'Wotpokazac (Po�adanje wotstronic)',
	'requestaccount-reason'       => 'Komentar (zasunje so do mejlki)',
	'confirmacount-submit'        => 'Potwjerdzic',
	'confirmaccount-summary'      => 'Wutworja so wu�iwarska strona z biografiju noweho wu�iwarja.',
	'confirmaccount-wsum'         => 'Witaj!',
);

$wgConfirmAccountMessages['nl'] = array(
	# Request account page
	'requestaccount'          => 'Gebruiker aanvragen',
	'requestacount-text'      => '\'\'\'Vul het onderstaande formulier in en stuur het op om een gebruiker aan te vragen\'\'\'. 
	
	Zorg ervoor dat u eerst de [[{{NS:PROJECT}}:Terms of Service|Voorwaarden]] leest voordat u een gebruiker aanvraagt.
	
	Als uw gebruiker is goedgekeurd, krijgt u een e-mail en daarna kunt u aanmelden via [[Special:Userlogin]].',
	'requestaccount-dup'      => '\'\'\'Note bene: U bent al aangemeld met een geregistreede gebruiker.\'\'\'',
	'requestacount-legend1'   => 'Gebruiker:',
	'requestacount-legend2'   => 'Persoonlijke informatie:',
	'requestacount-legend3'   => 'Overige informatie:',
	'requestacount-acc-text'  => 'U ontvangt een e-mailbevestiging als uw verzoek is ontvangen. Reageer daar alstublieft op 
	door de klikken op de bevesitigngslink die in de e-mail staat. U krijgt een wachtwoord als uw gebruiker is aangemaakt.',
	'requestacount-ext-text'  => 'De volgende informatie wordt vertrouwelijk behandeld en wordt alleen gebruikt voor dit verzoek. 
	U kunt contactgegevens zoals een telefoonummer opgeven om te helpen bij het vaststellen van uw identiteit.',
	'requestaccount-bio-text' => "Uw biografie wordt opgenomen in uw gebruikerspagina. Probeer uw belangrijkste gegevens 
	op te nemen. Zorg ervoor dat u achter het publiceren van dergelijke informatie staat. U kunt uw naam wijzigen via uw [[Special:Preferences|voorkeuren]].",
	'requestaccount-real'     => 'Uw naam:',
	'requestaccount-same'     => '(gelijk aan uw naam)',
	'requestaccount-email'    => 'E-mailadres:',
	'requestaccount-bio'      => 'Persoonlijke biografie:',
	'requestaccount-notes'    => 'Opmerkingen:',
	'requestaccount-urls'     => 'Lijst van websites, als van toepassing (iedere site op een aparte regel):',
	'requestaccount-agree'    => 'U moet aangegeven dat uw naam juist is en dat u akkoord gaat met de Voorwaarden.',
	'requestaccount-inuse'    => 'De gebruiker is al bekend in een aanvraagprocedure.',
	'requestaccount-tooshort' => 'Uw biografie moet tenminste $1 woorden bevatten.',
	'requestaccount-tos'      => 'Ik heb de Voorwaarden van {{SITENAME}} gelezen en ga ermee akkoord.',
	'requestaccount-correct'  => 'Ik bevestig dat de naam die ik heb opgegeven onder "Uw naam" inderdaad mijn eigen naam is.',
	'requestacount-submit'    => 'Gebruiker aanvragen',
	'requestaccount-sent'     => 'Uw gebruikersaanvraag is verstuurd en wacht op review.',
	'request-account-econf'   => 'Uw e-mailadres is bevestigd en wordt in uw gebruikersaanvraag opgenomen.',
	'requestaccount-email-subj' => '{{SITENAME}} bevestiging e-mailadres',
	'requestaccount-email-body' => 'Iemand, waarschijnlijk u, heeft vanaf  IP-adres $1 op {{SITENAME}} een verzoek gedaan
voor het aanmaken van gebruiker "$2" met dit e-mailadres.

Open de onderstaande link in uw browser om te bevestigen dat deze gebruiker op {{SITENAME}} daadwerkelijk bij u hoort:

$3

Als de gebruiker is aangemaakt krijgt alleen u een e-mail met het wachtwoord. Als de aanvraag niet van u afkomstig is, volg de link dan *niet*. 
Deze bevestigingse-mail verloop op $4.',

	'acct_request_throttle_hit' => "Sorry, maar u heeft al $1 gebruikersverzoeken gedaan. U kunt geen nieuwe verzoeken meer uitbrengen.",
	
	# Add to Special:Login
	'requestacount-loginnotice' => 'Om een gebruiker te krijgen, moet u \'\'\'[[Special:RequestAccount|een verzoek doen]]\'\'\'.',
	
	# Confirm account page
	'confirmaccounts'       => 'Bevestig gebruikersverzoeken',
	'confirmacount-list'    => 'Hieronder staan de gebruikersverzoeken die op afhandeling wachten. 
	Voor goedgekeurde gebruikersverzoeken worden gebruikers aangemaakt en dat verzoek komt niet langer voor in deze lijst. 
	Afgewezen gebruikersverzoeken worden van de lijst verwijderd.',
	'confirmacount-list2'    => 'Hieronder staan recentelijk afgewezen gebruikersverzoeken die die over een aantal dagen
	automatisch worden verwijderd. Ze kunnen nog steeds goedgekeurd worden, hoewel het verstandig is voorafgaand contact te
	zoeken met de beheerder die het verzoek heeft afgewezen.',
	'confirmacount-text'    => 'Dit is een openstaand gebruikersverzoek voor \'\'\'{{SITENAME}}\'\'\'. Beoordeel het
	alstublieft zorgvuldig en bevestig, als nodig, alle onderstaande informatie. U kunt een gebruiker aanmaken met een andere
	naam. Doe dit alleen als er mogelijk verwarring kan optreden met andere gebruikersnamen.
	
	Als u deze pagina verlaat zonder het gebruikersverzoek te bevestigen of af te wijzen, dan blijft het open staan.',
	'confirmacount-none'    => 'Er zijn op dit moment geen openstaande gebruikersverzoeken.',
	'confirmacount-none2'   => 'Er zijn op het moment geen recent afgewezen gebruikersverzoeken.',
	'confirmaccount-badid'  => 'Er is geen openstaand gebruikersverzoeken voor het opgegeven ID. Wellicht is het al afgehandeld.',
	'confirmaccount-back'   => 'Bekijk openstaande gebruikersverzoeken',
	'confirmaccount-back2'  => 'Bekijk recent afgewezen verzoeken',
	'confirmaccount-name'   => 'Gebruikersnaam',
	'confirmaccount-real'   => 'Naam',
	'confirmaccount-email'  => 'E-mail',
	'confirmaccount-bio'    => 'Biografie',
	'confirmaccount-urls'   => 'Lijst met websites:',
	'confirmaccount-nourls' => '(niet opgegeven)',
	'confirmaccount-review' => 'toegelaten/afgewezen',
	'confirmacount-confirm' => 'Gebruik de onderUse the buttons below to accept this request or deny it.',
	'confirmaccount-econf'  => '(bevestigd)',
	'confirmaccount-reject' => '(afgewezen door [[User:$1|$1]] op $2)',
	'confirmacount-create'  => 'Toelaten (gebruiker aanmaken)',
	'confirmacount-deny'    => 'Afwijzen (verwijderen)',
	'requestaccount-reason' => 'Opmerking (wordt opgenomen in de e-mail):',
	'confirmacount-submit'  => 'Bevestigen',
	'confirmaccount-acc'    => 'Gebruikersverzoek goedgekeurd. De gebruiker [[User:$1]] is aangemaakt.',
	'confirmaccount-rej'    => 'Gebruikersverzoek afgewezen.',
	'confirmaccount-summary' => 'Er wordt een gebruikerspagina gemaakt met de biografie van de nieuwe gebruiker.',
	'confirmaccount-welc'   => "'''Welkom bij ''{{SITENAME}}''!''' We hopen dat u veel goed bijdragen levert. 
	Waarschijnlijk wilt u kennis nemen van [[{{NS:PROJECT}}:Getting started|Eerste stappen]]. Nogmaals, welkom en veel plezier! 
	~~~~",
	'confirmaccount-wsum'   => 'Welkom!',
	'confirmaccount-email-subj' => '{{SITENAME}} gebruikersverzoek',
	'confirmaccount-email-body' => 'Uw gebruikersverzoek op {{SITENAME}} is goedgekeurd.

Gebruiker: $1

Wachtwoord: $2

Om beveiligingsredenen dient u uw wachtwoord bij de eerste keer aanmelden te wijzigen. Aanmelden kan via 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'Uw gebruikersverzoek op {{SITENAME}} is goedekeurd.

Gebruikersnaam: $1

Wachtwoord: $2

$3

Om beveiligingsredenen dient u uw wachtwoord bij de eerste keer aanmelden te wijzigen. Aanmelden kan via 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'Sorry, uw gebruikersverzoek voor "$1" op {{SITENAME}} is afgewezen.

Dit kan meerdere oorzaken hebben. Mogelijk heeft u het formulier niet volledig ingevuld, waren uw antwoorden 
onvoldoende compleet, of heeft u om een andere reden niet voldaan aan de eisen. Op de site staan mogelijk 
lijsten met contactgegevens als u meer wilt weten over het gebruikersbeleid.',
	'confirmaccount-email-body4' => 'Sorry, uw gebruikersverzoek voor "$1" op {{SITENAME}} is afgewezen.

$2

Op de site staan mogelijk lijsten met contactgegevens als u meer wilt weten over het gebruikersbeleid.',
);

$wgConfirmAccountMessages['yue'] = array(
	# Request account page
	'requestaccount'          => '請求戶口',
	'requestacount-text'      => '\'\'\'完成並遞交下面嘅表格去請求一個用戶戶口\'\'\'。 
	
	請確認你響請求一個戶口之前，先讀過[[{{NS:PROJECT}}:服務細則|服務細則]]。
	
	一旦個戶口批准咗，你將會收到一個電郵通知訊息，噉個戶口就可以響[[Special:Userlogin]]度用。',
	'requestaccount-dup'      => '\'\'\'留意: 你已經登入咗做一個已經註冊咗嘅戶口。\'\'\'',
	'requestacount-legend1'   => '用戶戶口:',
	'requestacount-legend2'   => '個人資料:',
	'requestacount-legend3'   => '其它資料:',
	'requestacount-acc-text'  => '當完成請求時，一封確認訊息會發到你嘅電郵地址。
	請響封電郵度撳個確認連結去回應佢。同時，當你個戶口開咗之後，你戶口個密碼將會電郵畀你。',
	'requestacount-ext-text'  => '下面嘅資料會保密，而且只係會用響呢次請求度。 
	你可能需要列示聯絡資料，好似電話號碼等去幫手證明你嘅確認。',
	'requestaccount-bio-text' => "你嘅傳記將會設定做響你用戶頁度嘅預設內容。試吓包含任何嘅憑據。
	而且你係肯定你係可以發佈呢啲資料。你嘅名可以透過[[Special:Preferences]]改到。",
	'requestaccount-real'     => '真名:',
	'requestaccount-same'     => '(同真名一樣)',
	'requestaccount-email'    => '電郵地址:',
	'requestaccount-bio'      => '個人傳記:',
	'requestaccount-notes'    => '附加註解:',
	'requestaccount-urls'     => '網站一覽，如有者 (用新行分開):',
	'requestaccount-agree'    => '你一定要證明到你個真名係啱嘅，而且你同意我哋嘅服務細則。',
	'requestaccount-inuse'    => '個用戶名已經用來請求緊個戶口。',
	'requestaccount-tooshort' => '你嘅傳記一定要最少有$1個字長。',
	'requestaccount-tos'      => '我已經讀咗同埋同意持續遵守{{SITENAME}}嘅服務細則。',
	'requestaccount-correct'  => '我證明我響"真名"度指定嘅名係我自己實際上嘅真名。',
	'requestacount-submit'    => '請求戶口',
	'requestaccount-sent'     => '你個戶口請求已經成功發出，現正等候複審。',
	'request-account-econf'   => '你嘅電郵地址已經確認，將會響你嘅戶口請求度列示。',
	'requestaccount-email-subj' => '{{SITENAME}}電郵地址確認',
	'requestaccount-email-body' => '有人，可能係你，由IP地址$1，響{{SITENAME}}度用呢個電郵地址請求一個叫做"$2"嘅戶口。

去確認呢個戶口真係屬於響{{SITENAME}}上面嘅你，就響你嘅瀏覽器度開呢個連結:

$3

如果個戶口開咗，只有你先至會收到個電郵密碼。如果呢個戶口*唔係*你嘅話，唔好撳個連結。 
呢個確認碼將會響$4過期。',

	'acct_request_throttle_hit' => "對唔住，你已經請求咗$1個戶口。你唔可以請求更多個戶口。",
	
	# Add to Special:Login
	'requestacount-loginnotice' => '要拎一個用戶戶口，你一定要\'\'\'[[Special:RequestAccount|請求一個]]\'\'\'。',
	
	# Confirm account page
	'confirmaccounts'       => '確認戶口請求', 
	'confirmacount-list'    => '下面係等緊批准嘅用戶請求一覽。 
	已經批准嘅戶口將會建立同埋響呢個表度拎走。拒絕咗嘅用戶將會就噉響呢個表度拎走。',
	'confirmacount-list2'    => '下面係一個先前拒絕過嘅戶口請求，可能會響幾日之後刪除。
	佢哋仍舊可以批准去開一個戶口，但係響你做之前請問吓拒絕嘅管理員先。',
	'confirmacount-text'    => '呢個係響\'\'\'{{SITENAME}}\'\'\'度等候請求戶口嘅一版。
	請小心去睇過，有需要嘅話，就要確認埋佢下面全部嘅資料。
	要留意嘅係你可以用另一個用戶名去開一個戶口。只係同其他嘅名有衝突嗰陣先至去做。
	
	如果你無確認或者拒絕呢個請求，就噉留低呢版嘅話，佢就會維持等候狀態。',
	'confirmacount-none'    => '現時無未決定嘅請求。',
	'confirmacount-none2'   => '現時無最近拒絕嘅戶口請求。',
	'confirmaccount-badid'  => '提供嘅ID係無未決定嘅請求。佢可能已經被處理咗。',
	'confirmaccount-back'   => '去睇未決定嘅戶口一覽',
	'confirmaccount-back2'  => '去睇先前拒絕咗嘅戶口一覽',
	'confirmaccount-name'   => '用戶名',
	'confirmaccount-real'   => '名',
	'confirmaccount-email'  => '電郵',
	'confirmaccount-bio'    => '傳記',
	'confirmaccount-urls'   => '網站一覽:',
	'confirmaccount-nourls' => '(無提供)',
	'confirmaccount-review' => '批准/拒絕',
	'confirmacount-confirm' => '用下面嘅掣去批准或拒絕呢個請求。',
	'confirmaccount-econf'  => '(已批准)',
	'confirmaccount-reject' => '(響$2被[[User:$1|$1]]拒絕)',
	'confirmacount-create'  => '接受 (開戶口)',
	'confirmacount-deny'    => '拒絕 (反列示)',
	'requestaccount-reason' => '註解 (會用響封電郵度):',
	'confirmacount-submit'  => '確認',
	'confirmaccount-acc'    => '戶口請求已經成功噉確認；開咗一個新嘅用戶戶口[[User:$1]]。',
	'confirmaccount-rej'    => '戶口請求已經成功噉拒絕。',
	'confirmaccount-summary' => '開緊一個新用戶擁有傳記嘅用戶頁。',
	'confirmaccount-welc'   => "'''歡迎來到''{{SITENAME}}''！'''我哋希望你會作出更多更好的貢獻。 
	你可能會去睇吓[[{{NS:PROJECT}}:開始|開始]]。再一次歡迎你！ 
	~~~~",
	'confirmaccount-wsum'   => '歡迎！',
	'confirmaccount-email-subj' => '{{SITENAME}}戶口請求',
	'confirmaccount-email-body' => '你請求嘅戶口已經響{{SITENAME}}度批准咗。

戶口名: $1

密碼: $2

為咗安全性嘅原故，你需要響第一次登入嗰陣去改個密碼。要登入，請去{{fullurl:Special:Userlogin}}。',
	'confirmaccount-email-body2' => '你請求嘅戶口已經響{{SITENAME}}度批准咗。

戶口名: $1

密碼: $2

$3

為咗安全性嘅原故，你需要響第一次登入嗰陣去改個密碼。要登入，請去{{fullurl:Special:Userlogin}}。',
	'confirmaccount-email-body3' => '對唔住，你響{{SITENAME}}請求嘅戶口"$1"已經拒絕咗。

當中可能會有好多個原因，令到你嘅請求被拒絕。你可能無正確噉填好晒個表格，可能響你嘅回應度無足夠嘅長度，又可能未能符合到一啲政策嘅條件。響呢個網站度提供咗聯絡人一覽，你可以用去知道更多用戶戶口政策嘅資料。',
	'confirmaccount-email-body4' => '對唔住，你響{{SITENAME}}請求嘅戶口"$1"已經拒絕咗。

$2

響呢個網站度提供咗聯絡人一覽，你可以用去知道更多用戶戶口政策嘅資料。',
);

$wgConfirmAccountMessages['zh-hans'] = array(
	# Request account page
	'requestaccount'          => '请求账户',
	'requestacount-text'      => '\'\'\'完成并递交以下的表格去请求一个用户账户\'\'\'。 
	
	请确认您在请求一个账户之前，先读过[[{{NS:PROJECT}}:服务细则|服务细则]]。
	
	一旦该账户获得批准，您将会收到一个电邮通知信息，该账户就可以在[[Special:Userlogin]]中使用。',
	'requestaccount-dup'      => '\'\'\'注意: 您已经登入成一个已注册的账户。\'\'\'',
	'requestacount-legend1'   => '用户账户:',
	'requestacount-legend2'   => '个人资料:',
	'requestacount-legend3'   => '其它资料:',
	'requestacount-acc-text'  => '当完成请求时，一封确认信息会发到您的电邮地址。
	请在该封电邮中点击确认连结去反应它。同时，当您的账户被创建后，您账户的个密码将会电邮给您。',
	'requestacount-ext-text'  => '以下的资料将会保密，而且只是会用在这次请求中。 
	您可能需要列示联络资料，像电话号码等去帮助证明您的确认。',
	'requestaccount-bio-text' => "您传记将会设置成在您用户页中的预设内容。尝试包含任何的凭据。
	而且你是肯定您是可以发布这些资料。您的名字可以通过[[Special:Preferences]]更改。",
	'requestaccount-real'     => '真实名字:',
	'requestaccount-same'     => '(同真实名字)',
	'requestaccount-email'    => '电邮地址:',
	'requestaccount-bio'      => '个人传记:',
	'requestaccount-notes'    => '附加注解:',
	'requestaccount-urls'     => '网站列表，如有者 (以新行分开):',
	'requestaccount-agree'    => '您一定要证明到您的真实名字是正确的，而且您同意我们的服务细则。',
	'requestaccount-inuse'    => '该用户名已经用来请求账户。',
	'requestaccount-tooshort' => '您的传记必须最少有$1个字的长度。',
	'requestaccount-tos'      => '我已经阅读以及同意持续遵守{{SITENAME}}的服务细则。',
	'requestaccount-correct'  => '我证明我在"真实名字"中指定的名是我自己实际上的真名。',
	'requestacount-submit'    => '请求账户',
	'requestaccount-sent'     => '您的账户请求已经成功发出，现正等候复审。',
	'request-account-econf'   => '您的电邮地址已经确认，将会在您的账户口请求中列示。',
	'requestaccount-email-subj' => '{{SITENAME}}电邮地址确认',
	'requestaccount-email-body' => '有人，可能是您，由IP地址$1，在{{SITENAME}}中用这个电邮地址请求一个名叫"$2"的账户。

要确认这个户口真的属于在{{SITENAME}}上面?您，就在您的浏览器中度开启这个连结:

$3

如果该账户已经创建，只有您才会收到该电邮密码。如果这个账户*不是*属于您的话，不要点击这个连结。 
呢个确认码将会响$4过期。',

	'acct_request_throttle_hit' => "抱歉，您已经请求了$1个户口。您不可以请求更多个账户。",
	
	# Add to Special:Login
	'requestacount-loginnotice' => '要取得个用户账户，您一定要\'\'\'[[Special:RequestAccount|请求一个]]\'\'\'。',
	
	# Confirm account page
	'confirmaccounts'       => '确认户口请求', 
	'confirmacount-list'    => '以下是正在等候批准的用户请求列表。 
	已经批准的账户将会创建以及在这个列表中移除。已拒绝的用户将只会在这个表中移除。',
	'confirmacount-list2'   => '以下是一个先前拒绝过的帐口请求，可能会在数日后删除。
	它们仍旧可以批准创建一个账户，但是在您作之前请先问拒绝该账户的管理员。',
	'confirmacount-text'    => '这个是在\'\'\'{{SITENAME}}\'\'\'中等候请求账户的页面。
	请小心阅读，有需要的话，就要同时确认它下面的全部资料。
	要留意的是您可以用另一个用户名字去创建一个账户。只有其他的名字有冲突时才需要去作。
	
	如果你无确认或者拒绝这个请求，只留下这页面的话，它便会维持等候状态。',
	'confirmacount-none'    => '现时没有未决定的请求。',
	'confirmacount-none2'   => '现时没有最近拒绝的账户请求。',
	'confirmaccount-badid'  => '提供的ID是没有未决定的请求。它可能已经被处理。',
	'confirmaccount-back'   => '查看未决定的账户列表',
	'confirmaccount-back2'  => '查看先前拒绝过的账户列表',
	'confirmaccount-name'   => '用户名字',
	'confirmaccount-real'   => '名字',
	'confirmaccount-email'  => '电邮',
	'confirmaccount-bio'    => '传记',
	'confirmaccount-urls'   => '网站列表:',
	'confirmaccount-nourls' => '(没有提供)',
	'confirmaccount-review' => '批准/拒绝',
	'confirmacount-confirm' => '用以下的按钮去批准或拒绝这个请求。',
	'confirmaccount-econf'  => '(已批准)',
	'confirmaccount-reject' => '(于$2被[[User:$1|$1]]拒绝)',
	'confirmacount-create'  => '接受 (创建账户)',
	'confirmacount-deny'    => '拒绝 (反列示)',
	'requestaccount-reason' => '注解 (在电邮中使用):',
	'confirmacount-submit'  => '确认',
	'confirmaccount-acc'    => '账户请求已经成功确认；已经创建一个新的用户帐号[[User:$1]]。',
	'confirmaccount-rej'    => '账户请求已经成功拒绝。',
	'confirmaccount-summary' => '正在创建一个新用户拥有传记的用户页面。',
	'confirmaccount-welc'   => "'''欢迎来到''{{SITENAME}}''！'''我们希望您会作出更多更好的贡献。 
	您可能会去参看[[{{NS:PROJECT}}:开始|开始]]。再一次欢迎你！ 
	~~~~",
	'confirmaccount-wsum'   => '欢迎！',
	'confirmaccount-email-subj' => '{{SITENAME}}账户请求',
	'confirmaccount-email-body' => '您请求的账户已经在{{SITENAME}}中批准。

账户名称: $1

密码: $2

为了安全性的原故，您需要在一次登入时更改密码。要登入，请前往{{fullurl:Special:Userlogin}}。',
	'confirmaccount-email-body2' => '您请求的账户已经在{{SITENAME}}中批准。

账户名称: $1

密码: $2

$3

为了安全性的原故，您需要在一次登入时更改密码。要登入，请前往{{fullurl:Special:Userlogin}}。',
	'confirmaccount-email-body3' => '抱歉，你在{{SITENAME}}请求的账户"$1"已经遭到拒绝。

当中可能会有很多原因，会令到您?请求被拒绝。您可能没有正确地填上整个表格，可能在您的反应中没有足够的长度，又可能未能符合到一些政策的条件。在这个网站中度提供了联络人列表，您可以用去知道更多用户账户方针的资料。',
	'confirmaccount-email-body4' => '抱歉，你在{{SITENAME}}请求的账户"$1"已经遭到拒绝。

$2

在这个网站中度提供了联络人列表，您可以用去知道更多用户账户方针的资料。',
);

$wgConfirmAccountMessages['zh-hant'] = array(
	# Request account page
	'requestaccount'          => '請求帳戶',
	'requestacount-text'      => '\'\'\'完成並遞交以下的表格去請求一個用戶帳戶\'\'\'。 
	
	請確認您在請求一個帳戶之前，先讀過[[{{NS:PROJECT}}:服務細則|服務細則]]。
	
	一旦該帳戶獲得批准，您將會收到一個電郵通知訊息，該帳戶就可以在[[Special:Userlogin]]中使用。',
	'requestaccount-dup'      => '\'\'\'注意: 您已經登入成一個已註冊的帳戶。\'\'\'',
	'requestacount-legend1'   => '用戶帳戶:',
	'requestacount-legend2'   => '個人資料:',
	'requestacount-legend3'   => '其它資料:',
	'requestacount-acc-text'  => '當完成請求時，一封確認訊息會發到您的電郵地址。
	請在該封電郵中點擊確認連結去回應它。同時，當您的帳戶被創建後，您帳戶的個密碼將會電郵給您。',
	'requestacount-ext-text'  => '以下的資料將會保密，而且只是會用在這次請求中。 
	您可能需要列示聯絡資料，像電話號碼等去幫助證明您的確認。',
	'requestaccount-bio-text' => "您傳記將會設定成在您用戶頁中的預設內容。嘗試包含任何的憑據。
	而且你是肯定您是可以發佈這些資料。您的名字可以透過[[Special:Preferences]]更改。",
	'requestaccount-real'     => '真實名字:',
	'requestaccount-same'     => '(同真實名字)',
	'requestaccount-email'    => '電郵地址:',
	'requestaccount-bio'      => '個人傳記:',
	'requestaccount-notes'    => '附加註解:',
	'requestaccount-urls'     => '網站列表，如有者 (以新行分開):',
	'requestaccount-agree'    => '您一定要證明到您的真實名字是正確的，而且您同意我們的服務細則。',
	'requestaccount-inuse'    => '該用戶名已經用來請求帳戶。',
	'requestaccount-tooshort' => '您的傳記必須最少有$1個字的長度。',
	'requestaccount-tos'      => '我已經閱讀以及同意持續遵守{{SITENAME}}的服務細則。',
	'requestaccount-correct'  => '我證明我在"真實名字"中指定的名是我自己實際上的真名。',
	'requestacount-submit'    => '請求帳戶',
	'requestaccount-sent'     => '您的帳戶請求已經成功發出，現正等候複審。',
	'request-account-econf'   => '您的電郵地址已經確認，將會在您的帳戶口請求中列示。',
	'requestaccount-email-subj' => '{{SITENAME}}電郵地址確認',
	'requestaccount-email-body' => '有人，可能是您，由IP地址$1，在{{SITENAME}}中用這個電郵地址請求一個名叫"$2"的帳戶。

要確認這個戶口真的屬於在{{SITENAME}}上面嘅您，就在您的瀏覽器中度開啟這個連結:

$3

如果該帳戶已經創建，只有您才會收到該電郵密碼。如果這個帳戶*不是*屬於您的話，不要點擊這個連結。 
呢個確認碼將會響$4過期。',

	'acct_request_throttle_hit' => "抱歉，您已經請求了$1個戶口。您不可以請求更多個帳戶。",
	
	# Add to Special:Login
	'requestacount-loginnotice' => '要取得個用戶帳戶，您一定要\'\'\'[[Special:RequestAccount|請求一個]]\'\'\'。',
	
	# Confirm account page
	'confirmaccounts'       => '確認戶口請求', 
	'confirmacount-list'    => '以下是正在等候批准的用戶請求列表。 
	已經批准的帳戶將會創建以及在這個列表中移除。已拒絕的用戶將只會在這個表中移除。',
	'confirmacount-list2'   => '以下是一個先前拒絕過的帳口請求，可能會在數日後刪除。
	它們仍舊可以批准創建一個帳戶，但是在您作之前請先問拒絕該帳戶的管理員。',
	'confirmacount-text'    => '這個是在\'\'\'{{SITENAME}}\'\'\'中等候請求帳戶的頁面。
	請小心閱讀，有需要的話，就要同時確認它下面的全部資料。
	要留意的是您可以用另一個用戶名字去創建一個帳戶。只有其他的名字有衝突時才需要去作。
	
	如果你無確認或者拒絕這個請求，只留下這頁面的話，它便會維持等候狀態。',
	'confirmacount-none'    => '現時沒有未決定的請求。',
	'confirmacount-none2'   => '現時沒有最近拒絕的帳戶請求。',
	'confirmaccount-badid'  => '提供的ID是沒有未決定的請求。它可能已經被處理。',
	'confirmaccount-back'   => '檢視未決定的帳戶列表',
	'confirmaccount-back2'  => '檢視先前拒絕過的帳戶列表',
	'confirmaccount-name'   => '用戶名字',
	'confirmaccount-real'   => '名字',
	'confirmaccount-email'  => '電郵',
	'confirmaccount-bio'    => '傳記',
	'confirmaccount-urls'   => '網站列表:',
	'confirmaccount-nourls' => '(沒有提供)',
	'confirmaccount-review' => '批准/拒絕',
	'confirmacount-confirm' => '用以下的按鈕去批准或拒絕這個請求。',
	'confirmaccount-econf'  => '(已批准)',
	'confirmaccount-reject' => '(於$2被[[User:$1|$1]]拒絕)',
	'confirmacount-create'  => '接受 (創建帳戶)',
	'confirmacount-deny'    => '拒絕 (反列示)',
	'requestaccount-reason' => '註解 (在電郵中使用):',
	'confirmacount-submit'  => '確認',
	'confirmaccount-acc'    => '帳戶請求已經成功確認；已經創建一個新的用戶帳號[[User:$1]]。',
	'confirmaccount-rej'    => '帳戶請求已經成功拒絕。',
	'confirmaccount-summary' => '正在創建一個新用戶擁有傳記的用戶頁面。',
	'confirmaccount-welc'   => "'''歡迎來到''{{SITENAME}}''！'''我們希望您會作出更多更好嘅貢獻。 
	您可能會去參看[[{{NS:PROJECT}}:開始|開始]]。再一次歡迎你！ 
	~~~~",
	'confirmaccount-wsum'   => '歡迎！',
	'confirmaccount-email-subj' => '{{SITENAME}}帳戶請求',
	'confirmaccount-email-body' => '您請求的帳戶已經在{{SITENAME}}中批准。

帳戶名稱: $1

密碼: $2

為了安全性的原故，您需要在一次登入時更改密碼。要登入，請前往{{fullurl:Special:Userlogin}}。',
	'confirmaccount-email-body2' => '您請求的帳戶已經在{{SITENAME}}中批准。

帳戶名稱: $1

密碼: $2

$3

為了安全性的原故，您需要在一次登入時更改密碼。要登入，請前往{{fullurl:Special:Userlogin}}。',
	'confirmaccount-email-body3' => '抱歉，你在{{SITENAME}}請求的帳戶"$1"已經遭到拒絕。

當中可能會有很多原因，會令到您嘅請求被拒絕。您可能沒有正確地填上整個表格，可能在您的回應中沒有足夠的長度，又可能未能符合到一些政策的條件。在這個網站中度提供了聯絡人列表，您可以用去知道更多用戶帳戶方針的資料。',
	'confirmaccount-email-body4' => '抱歉，你在{{SITENAME}}請求的帳戶"$1"已經遭到拒絕。

$2

在這個網站中度提供了聯絡人列表，您可以用去知道更多用戶帳戶方針的資料。',
);

$wgConfirmAccountMessages['zh'] = $wgConfirmAccountMessages['zh-hans'];
$wgConfirmAccountMessages['zh-cn'] = $wgConfirmAccountMessages['zh-hans'];
$wgConfirmAccountMessages['zh-hk'] = $wgConfirmAccountMessages['zh-hant'];
$wgConfirmAccountMessages['zh-sg'] = $wgConfirmAccountMessages['zh-hans'];
$wgConfirmAccountMessages['zh-tw'] = $wgConfirmAccountMessages['zh-hant'];
$wgConfirmAccountMessages['zh-yue'] = $wgConfirmAccountMessages['yue'];
