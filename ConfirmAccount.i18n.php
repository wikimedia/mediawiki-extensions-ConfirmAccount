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
	'requestaccount-text'      => '\'\'\'Complete and submit the following form to request a user account\'\'\'. 
	
	Make sure that you first read the [[{{NS:PROJECT}}:Terms of Service|Terms of Service]] before requesting an account.
	
	Once the account is approved, you will be emailed a notification message and the account will be usable at 
	[[Special:Userlogin]].',
	'requestaccount-dup'      => '\'\'\'Note: You already are logged in with a registered account.\'\'\'',
	'requestaccount-legend1'   => 'User account',
	'requestaccount-legend2'   => 'Personal information',
	'requestaccount-legend3'   => 'Other information',
	'requestaccount-acc-text'  => 'Your email address will be sent a confirmation message once this request is submitted. Please respond by clicking 
	on the confirmation link provided by the the email. Also, your password will be emailed to you when your account is created.',
	'requestaccount-ext-text'  => 'The following information is kept private and will only be used for this request. 
	You may want to list contacts such a phone number to aid in identify confirmation.',
	'requestaccount-bio-text' => "Your biography will be set as the default content for your userpage. Try to include 
	any credentials. Make sure you are comfortable publishing such information. Your name can be changed via [[Special:Preferences]].",
	'requestaccount-real'     => 'Real name:',
	'requestaccount-same'     => '(same as real name)',
	'requestaccount-email'    => 'Email address:',
	'requestaccount-bio'      => 'Personal biography:',
	'requestaccount-attach'   => 'Resume or CV (optional):',
	'requestaccount-notes'    => 'Additional notes:',
	'requestaccount-urls'     => 'List of websites, if any (separate with newlines):',
	'requestaccount-agree'    => 'You must certify that your real name is correct and that you agree to our Terms of Service.',
	'requestaccount-inuse'    => 'Username is already in use in a pending account request.',
	'requestaccount-tooshort' => 'Your biography must be at least be $1 words long.',
	'requestaccount-exts'     => 'Attachment file type is disallowed.',
	'requestaccount-resub'    => 'Your CV/resume file must be re-selected for security reasons. Leave the field blank 
	if you no longer want to include one.',
	'requestaccount-tos'      => 'I have read and agree to abide by the [[{{NS:PROJECT}}:Terms of Service|Terms of Service]] of {{SITENAME}}. 
	The name I have specified under "Real name" is in fact my own real name.',
	'requestaccount-submit'   => 'Request account',
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
	'requestaccount-loginnotice' => 'To obtain a user account, you must \'\'\'[[Special:RequestAccount|request one]]\'\'\'.',
	
	# Confirm account page
	'confirmaccounts'       => 'Confirm account requests', 
	'confirmaccount-list'    => 'Below is a list of account requests awaiting approval. 
	Approved accounts will be created and removed from this list. Rejected accounts will simply be deleted from this 
	list.',
	'confirmaccount-list2'    => 'Below is a list recently rejected account requests which may automatically be deleted 
	once several days old. They can still be approved into accounts, though you may want to first consult the rejecting 
	admin before doing so.',
	'confirmaccount-text'    => 'This is a pending request for a user account at \'\'\'{{SITENAME}}\'\'\'. Carefully 
	review and if needed, confirm, all the below information. Note that you can choose to create the account under a 
	different username. Use this only to avoid 	collisions with other names.
	
	If you simply leave this page without confirming or denying this request, it will remain pending.',
	'confirmaccount-none'    => 'There are currently no pending account requests.',
	'confirmaccount-none2'   => 'There are currently no recently rejected account requests.',
	'confirmaccount-badid'   => 'There is no pending request corresponding to the given ID. It may have already been handled.',
	'confirmaccount-back'    => 'View pending account list',
	'confirmaccount-back2'   => 'View recently rejected account list',
	'confirmaccount-name'    => 'Username',
	'confirmaccount-real'    => 'Name:',
	'confirmaccount-real-q'  => 'Name',
	'confirmaccount-email'   => 'Email:',
	'confirmaccount-email-q' => 'Email',
	'confirmaccount-bio'     => 'Biography:',
	'confirmaccount-bio-q'   => 'Biography',
	'confirmaccount-attach'  => 'Resume/CV:',
	'confirmaccount-notes'   => 'Additional notes:',
	'confirmaccount-urls'    => 'List of websites:',
	'confirmaccount-none'    => '(not provided)',
	'confirmaccount-review'  => 'Approve/Reject',
	'confirmaccount-confirm' => 'Use the options below to accept, deny, or hold this request:',
	'confirmaccount-econf'   => '(confirmed)',
	'confirmaccount-reject'  => '(rejected by [[User:$1|$1]] on $2)',
	'confirmaccount-held'    => '(marked "on hold" by [[User:$1|$1]] on $2)',
	'confirmaccount-create'  => 'Accept (create account)',
	'confirmaccount-deny'    => 'Reject (delist)',
	'confirmaccount-hold'    => 'Hold',
	'confirmaccount-spam'    => 'Spam (don\'t send email)',
	'confirmaccount-reason'  => 'Comment (will be included in email):',
	'confirmaccount-ip'      => 'IP address:',
	'confirmaccount-submit'  => 'Confirm',
	'confirmaccount-needreason' => 'You must provide a reason in the comment box below.',
	'confirmaccount-acc'     => 'Account request confirmed successfully; created new user account [[User:$1]].',
	'confirmaccount-rej'     => 'Account request rejected successfully.',
	'confirmaccount-summary' => 'Creating user page with biography of new user.',
	'confirmaccount-welc'    => "'''Welcome to ''{{SITENAME}}''!''' We hope you will contribute much and well. 
	You'll probably want to read [[{{NS:PROJECT}}:Getting started|Getting started]]. Again, welcome and have fun!",
	'confirmaccount-wsum'    => 'Welcome!',
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
	'confirmaccount-email-body5' => 'Before your request for an account "$1" can be accepted on {{SITENAME}} 
	you must first provide some additional information.

$2

There may be contact lists on site that you can use if you want to know more about user account policy.',
);

$wgConfirmAccountMessages['ar'] = array(
	'requestaccount'              => 'طلب حساب',
	'requestaccount-text'         => '\'\'\'أكمل و ابعث الاستمارة التالية لطلب حساب\'\'\'. 
	
	تأكد أولا من قراءة [[{{NS:PROJECT}}:Terms of Service|شروط الخدمة]] قبل طلب حساب.
	
	متى تمت الموافقة على الحساب, سيتم إرسال رسالة إخطار إليك و الحساب سيصبح قابلا للاستخدام في 
	[[Special:Userlogin]].',
	'requestaccount-dup'          => '\'\'\'ملاحظة: أنت مسجل الدخول بالفعل بحساب مسجل.\'\'\'',
	'requestaccount-legend1'      => 'حساب المستخدم:',
	'requestaccount-legend2'      => 'معلومات شخصية:',
	'requestaccount-legend3'      => 'معلومات أخرى:',
	'requestaccount-acc-text'     => 'سيتم إرسال رسالة تأكيد إلى عنوان بريدك الإلكتروني متى تم بعث هذا الطلب. من فضلك استجب عن طريق الضغط 
	على وصلة التأكيد المعطاة في البريد الإلكتروني. أيضا، كلمة السر الخاصة بك سيتم إرسالها إليك عبر البريد الإلكتروني عندما يتم إنشاء حسابك.',
	'requestaccount-ext-text'     => 'المعلومات التالية سرية و سيتم استخدامها فقط لهذا الطلب. 
ربما تريد أن تكتب معلومات الاتصال كرقم تليفون للمساعدة في تأكيد الهوية.',
	'requestaccount-bio-text'     => 'سيرتك الشخصية ستعرض كالمحتوى الافتراضي لصفحة المستخدم الخاصة بك. حاول تضمين 
	أية شهادات. تأكد من ارتياحك لنشر هذه المعلومات. اسمك يمكن تغييره بواسطة [[Special:Preferences]].',
	'requestaccount-real'         => 'الاسم الحقيقي:',
	'requestaccount-same'         => '(مثل الاسم الحقيقي)',
	'requestaccount-email'        => 'عنوان البريد الإلكتروني:',
	'requestaccount-bio'          => 'السيرة الشخصية:',
	'requestaccount-attach'       => 'استكمال أو السيرة الذاتية (اختياري):',
	'requestaccount-notes'        => 'ملاحظات إضافية:',
	'requestaccount-urls'         => 'قائمة مواقع الويب، إن وجدت (افصل بسطور جديدة):',
	'requestaccount-agree'        => 'يجب أن تثبت أن اسمك الحقيقي صحيح و أنك توافق على شروط خدمتنا.',
	'requestaccount-inuse'        => 'اسم المستخدم مستعمل بالفعل في طلب حساب قيد الانتظار',
	'requestaccount-tooshort'     => 'سيرتك يجب أن تتكون على الأقل من $1 كلمة.',
	'requestaccount-exts'         => 'نوع الملف المرفق غير مسموح به.',
	'requestaccount-resub'        => 'ملف سيرتك الذاتية/استكمالك يجب أن يتم إعادة اختياره لأسباب أمنية. اترك الحقل فارغا 
	لو كنت لم تعد تريد إضافة واحد.',
	'requestaccount-tos'          => 'لقد قرأت و أوافق على الالتزام بشروط خدمة {{SITENAME}}.',
	'requestaccount-submit'       => 'طلب حساب',
	'requestaccount-sent'         => 'طلبك للحساب تم إرساله بنجاح و هو بانتظار المراجعة الآن.',
	'request-account-econf'       => 'عنوان بريدك الإلكتروني تم تأكيده وسيتم عرضه كما هو في 
طلب حسابك.',
	'requestaccount-email-subj'   => '{{SITENAME}} تأكيد عنوان البريد الإلكتروني من',
	'requestaccount-email-body'   => 'شخص ما، على الأرجح أنت من عنوان الأيبي $1, طلب حساب "$2" بعنوان البريد الإلكتروني هذا على {{SITENAME}}.

لتأكيد أن هذا الحساب ينتمي إليك فعلا على {{SITENAME}}، افتح هذه الوصلة في متصفحك:

$3

لو أن الحساب تم إنشاؤه، فقط أنت سيتم إرسال كلمة السر إليه. لو أن هذا *ليس* أنت، لا تتبع الوصلة. 
كود التأكيد سينتهي في $4.',
	'acct_request_throttle_hit'   => 'عذرا، لقد طلبت بالفعل $1 حساب. لا يمكنك عمل المزيد من الطلبات.',
	'requestaccount-loginnotice'  => 'للحصول على حساب، يجب عليك \'\'\'[[Special:RequestAccount|طلب واحد]]\'\'\'.',
	'confirmaccounts'             => 'تأكيد طلبات الحسابات',
	'confirmaccount-list'         => 'بالأسفل قائمة بطلبات الحسابات قيد الانتظار. 
	الحسابات التي تمت الموافقة عليها سيتم إنشاؤها و إزالتها من هذه القائمة. الحسابات المرفوضة سيتم ببساطة حذفها من هذه 
القائمة.',
	'confirmaccount-list2'        => 'بالأسفل قائمة بطلبات الحسابات المرفوضة حديثا و التي ربما يتم حذفها تلقائيا 
	عندما يكون عمرها عدة أيام. مازال بالإمكان الموافقة عليهم كحسابات، و لكنك ربما ترغب في استشارة الإداري الرافض 
قبل فعل هذا.',
	'confirmaccount-text'         => 'هذا طلب حساب قيد الانتظار في \'\'\'{{SITENAME}}\'\'\'. 
	راجعه بحرص و لو دعت الحاجة, أكد, كل المعلومات بالأسفل. لاحظ أنه يمكنك اختيار إنشاء الحساب باسم مستخدم آخر 
	. استخدم هذا فقط لتجنب 	الاصطدامات مع الأسماء الأخرى.
	
لو تركت ببساطة هذه الصفحة بدون تأكيد أو رفض الحساب, سيبقى قيد الانتظار.',
	'confirmaccount-none'         => 'لا توجد حاليا طلبات حساب قيد الانتظار.',
	'confirmaccount-none2'        => 'لا توجد حاليا طلبات حسابات مرفوضة حديثا.',
	'confirmaccount-badid'        => 'لا يوجد طلب قيد الانتظار يوافق الرقم المعطى. ربما يكون قد تمت معالجته.',
	'confirmaccount-back'         => 'عرض قائمة الحسابات قيد الانتظار',
	'confirmaccount-back2'        => 'عرض قائمة الحسابات المرفوضة حديثا',
	'confirmaccount-name'         => 'اسم المستخدم',
	'confirmaccount-real'         => 'الاسم',
	'confirmaccount-real-q'       => 'الاسم',
	'confirmaccount-email'        => 'البريد الإلكتروني',
	'confirmaccount-email-q'      => 'البريد الإلكتروني',
	'confirmaccount-bio'          => 'السيرة',
	'confirmaccount-bio-q'        => 'السيرة الشخصية',
	'confirmaccount-attach'       => 'الاستكمال/السيرة الذاتية:',
	'confirmaccount-notes'        => 'ملاحظات إضافية:',
	'confirmaccount-urls'         => 'قائمة مواقع الويب:',
	'confirmaccount-review'       => 'قبول/رفض',
	'confirmaccount-confirm'      => 'استخدم الأزرار بالأسفل لقبول هذا الطلب أو رفضه.',
	'confirmaccount-econf'        => '(تم تأكيده)',
	'confirmaccount-reject'       => '(تم رفضه بواسطته [[User:$1|$1]] في $2)',
	'confirmaccount-held'         => '(تم التعليم "قيد الانتظار" بواسطة [[User:$1|$1]] في $2)',
	'confirmaccount-create'       => 'قبول (إنشاب الحساب)',
	'confirmaccount-deny'         => 'رفض (إزالة من القائمة)',
	'confirmaccount-hold'         => 'انتظر',
	'confirmaccount-spam'         => 'سبام (لا ترسل البريد الإلكتروني)',
	'confirmaccount-reason'       => 'تعليق (سيضم في البريد الإلكتروني):',
	'confirmaccount-ip'           => 'عنوان الأيبي:',
	'confirmaccount-submit'       => 'تأكيد',
	'confirmaccount-needreason'   => 'يجب أن تحدد سببا في صندوق التعليق بالأسفل.',
	'confirmaccount-acc'          => 'طلب الحساب تم تأكيده بنجاح؛ أنشأ حسابا جديدا [[User:$1]].',
	'confirmaccount-rej'          => 'طلب الحساب تم رفضه بنجاح.',
	'confirmaccount-summary'      => 'إنشاء صفحة المستخدم مع سيرة المستخدم الجديد.',
	'confirmaccount-welc'         => '\'\'\'مرحبا إلى \'\'{{SITENAME}}\'\'!\'\'\' نأمل أن تساهم كثيرا وجيدا. 
	على الأرجح ستريد قراءة [[{{NS:PROJECT}}:Getting started|البداية]]. مجددا، مرحبا و استمتع! 
	<nowiki>~~~~</nowiki>',
	'confirmaccount-wsum'         => 'مرحبا!',
	'confirmaccount-email-subj'   => '{{SITENAME}} طلب حساب',
	'confirmaccount-email-body'   => 'طلبك لحساب تمت الموافقة عليه في {{SITENAME}}.

اسم الحساب: $1

كلمة السر: $2

لمتطلبات السرية ستضطر إلى تغيير كلمة السر الخاصة بك عند أول دخول. للدخول، من فضلك اذهب إلى 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2'  => 'طلبك لحساب تمت الموافقة عليه في {{SITENAME}}.

اسم الحساب: $1

كلمة السر: $2

$3

لمتطلبات السرية ستضطر إلى تغيير كلمة السر الخاصة بك عند أول دخول. للدخول، من فضلك اذهب إلى 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3'  => 'عذرا, طلبك لحساب "$1" تم رفضه في {{SITENAME}}.

هناك عدة طرق لحدوث هذا. ربما تكون لم تملأ الاستمارة بشكل صحيح, أو لم توفر الطول اللازم في ردودك, أو فشلت في موافاة بعد بنود السياسة. ربما تكون هناك قوائم اتصال على الموقع يمكنك استخدامها لو كنت تريد معرفة المزيد حول سياسة حساب المستخدم.',
	'confirmaccount-email-body4'  => 'عذرا, طلبك لحساب "$1" تم رفضه في {{SITENAME}}.

$2

ربما تكون هناك قوائم اتصال على الموقع يمكنك استخدامها لو كنت تريد معرفة المزيد حول سياسة حساب المستخدم.',
	'confirmaccount-email-body5'  => 'قبل أن يتم قبول طلبك للحساب "$1" في {{SITENAME}} 
	يجب أن توفر أولا بعض المعلومات الإضافية.

$2

ربما تكون هناك قوائم اتصال في الموقع يمكنك استخدامها لو أردت أن تعرف المزيد حول سياسة حساب المستخدم.',
);

$wgConfirmAccountMessages['bcl'] = array(
	'requestaccount-legend2'       => 'Personal na impormasyon',
	'requestaccount-legend3'       => 'Ibang impormasyon',
	'requestaccount-real'         => 'Totoong pangaran:',
	'requestaccount-same'         => '(pareho sa  totoong pangaran)',
	'confirmaccount-real'         => 'Pangaran',
	'confirmaccount-submit'        => 'Kompermaron',
	'confirmaccount-wsum'         => 'Dagos!',
);

// German translations (by Rrosenfeld)
$wgConfirmAccountMessages['de'] = array(
	# Request account page
	'requestaccount'          => 'Benutzerkonto beantragen',
	'requestaccount-text'     => '\'\'\'Fülle das folgende Formular aus und schick es ab, um ein Benutzerkonto zu beantragen\'\'\'. 

	Bitte lies zunächst die [[{{NS:PROJECT}}:Nutzungsbedingungen|Nutzungsbedingungen]] bevor du ein Benutzerkonto beantragst.

	Sobald das Konto bestätigt wurde, wirst du per E-Mail benachrichtigt und du kannst dich unter „[[{{ns:special}}:Userlogin|Anmelden]]“ einloggen.',
	'requestaccount-dup'      => '\'\'\'Achtung: Du bist bereits mit einem registrierten Benutzerkonto eingeloggt.\'\'\'',
	'requestaccount-legend1'  => 'Benutzerkonto',
	'requestaccount-legend2'  => 'Persönliche Informationen',
	'requestaccount-legend3'  => 'Weitere Informationen',
	'requestaccount-acc-text' => 'An deine E-Mail-Adresse wird nach dem Absenden dieses Formulars eine Bestätigungsmail geschickt. 
	Bitte reagiere darauf, indem du auf den in dieser Mail enthaltenen Bestätigungs-Link klickst. Sobald dein Konto angelegt wurde,
	wird dir dein Passwort per E-Mail zugeschickt.',
	'requestaccount-ext-text' => 'Die folgenden Informationen werden vertraulich behandelt und ausschließlich für diesen Antrag
	verwendet. Du kannst Kontakt-Angaben wie eine Telefonnummer machen, um die Bearbeitung deines Antrags zu vereinfachen.',
	'requestaccount-bio-text' => "Deine Biographie wird als initialer Inhalt deiner Benutzerseite gespeichert. Versuche alle nötigen
	Empfehlungen zu erwähnen, aber stelle sicher, dass du die Informationen auch wirklich veröffentlichen möchtest. Du kannst deinen
	Namen unter „[[{{ns:special}}:preferences|Einstellungen]]“ ändern.",
	'requestaccount-real'     => 'Realname:',
	'requestaccount-same'     => '(wie der Realname)',
	'requestaccount-email'    => 'E-Mail-Adresse:',
	'requestaccount-bio'      => 'Persönliche Biographie:',
	'requestaccount-attach'   => 'Lebenslauf (optional):',
	'requestaccount-notes'    => 'Zusätzliche Angaben:',
	'requestaccount-urls'     => 'Liste von Webseiten (durch Zeilenumbrüche getrennt):',
	'requestaccount-agree'    => 'Du musst bestätigen, dass Dein Realname korrekt ist und du die Benutzerbedingungen akzeptierst.',
	'requestaccount-inuse'    => 'Der Benutzername ist bereits in einem anderen Benutzerantrag in Verwendung.',
	'requestaccount-tooshort' => 'Deine Biographie sollte mindestens $1 Worte lang sein.',
	'requestaccount-exts'     => 'Der Dateityp des Anhangs ist nicht erlaubt.',
	'requestaccount-resub'    => 'Die Datei mit deinem Lebenslauf muss aus Sicherheitsgründen neu ausgewählt werden.
	Lasse das Feld leer, wenn du keinen Lebenslauf mehr anfügen möchtest.',
	'requestaccount-tos'      => 'Ich habe die [[{{NS:PROJECT}}:Benutzungsbedingungen|Benutzungsbedingungen]] von {{SITENAME}} gelesen und akzeptiere sie.
	Ich bestätige, dass der Name, den ich unter „Realname“ angegeben habe, mein wirklicher Name ist.',
	'requestaccount-submit'   => 'Benutzerkonto beantragen',
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
	'requestaccount-loginnotice' => 'Um ein neues Benutzerkonto zu erhalten, musst du es \'\'\'[[{{ns:special}}:RequestAccount|beantragen]]\'\'\'.',

	# Confirm account page
	'confirmaccounts'        => 'Benutzerkonto-Anträge bestätigen', 
	'confirmaccount-list'    => 'Unten findest du eine Liste von noch zu bearbeitenden Benutzerkonto-Anträgen.
	Bestätigte Konten werden angelegt und aus der Liste entfernt. Abgelehnte Konten werden einfach aus der Liste gelöscht.',
	'confirmaccount-text'    => 'Dies ist ein Antrag auf ein Benutzerkonto bei \'\'\'{{SITENAME}}\'\'\'. Prüfe alle unten
	stehenden Informationen gründlich und bestätige die Informationen wenn möglich. Bitte beachte, dass du den Zugang bei Bedarf unter
	einem anderen Benutzernamen anlegen kannst. Du solltest dies nur nutzen, um Kollisionen mit anderen Namen zu vermeiden.

	Wenn du diese Seite verlässt, ohne das Konto zu bestätigen oder abzulehnen, wird der Antrag offen stehen bleiben.',
	'confirmaccount-none'    => 'Momentan gibt es keine offenen Benutzeranträge.',
	'confirmaccount-none2'   => 'Momentan gibt es keine kürzlich abgelehnten Benutzeranträge.',
	'confirmaccount-badid'   => 'Momentan gibt es keinen Benutzerantrag zur angegebenen ID. Möglicherweise wurde er bereits bearbeitet.',
	'confirmaccount-back'    => 'Liste der offenen Anträge ansehen',
	'confirmaccount-back2'   => 'Liste der kürzlich abgelehnten Anträge ansehen',
	'confirmaccount-name'    => 'Benutzername',
	'confirmaccount-real'    => 'Name:',
	'confirmaccount-real-q'  => 'Name',
	'confirmaccount-email'   => 'E-Mail:',
	'confirmaccount-email-q' => 'E-Mail',
	'confirmaccount-bio'     => 'Biographie:',
	'confirmaccount-bio-q'   => 'Biographie',
	'confirmaccount-attach'  => 'Lebenslauf:',
	'confirmaccount-urls'    => 'Liste der Webseiten:',
	'confirmaccount-nourls'  => '(Nichts angegeben)',
	'confirmaccount-review'  => 'Bestätigen/Ablehnen',
	'confirmaccount-confirm' => 'Benutze die folgende Auswahl, um den Antrag zu akzeptieren, abzulehnen oder noch zu warten.',
	'confirmaccount-econf'   => '(bestätigt)',
	'confirmaccount-reject'  => '(abgelehnt durch [[User:$1|$1]] am $2)',
	'confirmaccount-held'    => '(markiert als „abwarten“ durch [[User:$1|$1]] am $2)',
	'confirmaccount-create'  => 'Bestätigen (Konto anlegen)',
	'confirmaccount-deny'    => 'Ablehnen (Antrag löschen)',
	'confirmaccount-hold'    => 'Markiert als „abwarten“',
	'confirmaccount-reason'  => 'Begründung (wird in die Mail an den Antragsteller eingefügt):',
	'confirmaccount-ip'      => 'IP-Addresse:',
	'confirmaccount-submit'  => 'Abschicken',
	'confirmaccount-needreason' => 'Du musst eine Begründung eingeben.',
	'confirmaccount-acc'     => 'Benutzerantrag erfolgreich bestätigt; Benutzer [[{{ns:User}}:$1]] wurde angelegt.',
	'confirmaccount-rej'     => 'Benutzerantrag wurde abgelehnt.',
	'confirmaccount-summary' => 'Erzeuge Benutzerseite mit der Biographie des neuen Benutzers.',
	'confirmaccount-welc'    => "'''Willkommen bei ''{{SITENAME}}''!''' Wir hoffen, dass du viele gute Informationen beisteuerst.
	Möglicherweise möchtest Du zunächst [[{{NS:PROJECT}}:Erste Schritte|Erste Schritte]]. Nochmal: Willkommen und hab' Spaß!~",
	'confirmaccount-wsum'    => 'Willkommen!',
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
	'confirmaccount-email-body3' => 'Leider wurde dein Antrag auf ein Benutzerkonto „$1“ 
bei {{SITENAME}} abgelehnt.

Dies kann viele Gründe haben. Möglicherweise hast du das Antragsformular
nicht richtig ausgefüllt, hast nicht genügend Angaben gemacht oder hast
die Anforderungen auf andere Weise nicht erfüllt.

Möglicherweise gibt es auf der Seite Kontaktadressen, an die du dich wenden
kannst, wenn du mehr über die Anforderungen wissen möchtest.',
	'confirmaccount-email-body4' => 'Leider wurde dein Antrag auf ein Benutzerkonto „$1“ 
bei {{SITENAME}} abgelehnt.

$2

Möglicherweise gibt es auf der Seite Kontaktadressen, an die du dich wenden
kannst, wenn du mehr über die Anforderungen wissen möchtest.',
'confirmaccount-email-body5' => 'Bevor deine Anfrage für das Benutzerkonto „$1“ von {{SITENAME}} akzeptiert werden kann, 
       musst du zusätzliche Informationen übermitteln.

$2

Möglicherweise gibt es auf der Seite Kontaktadressen, an die du dich wenden
kannst, wenn du mehr über die Anforderungen wissen möchtest.',
);

$wgConfirmAccountMessages['ext'] = array(
	'requestaccount-legend1'       => 'Cuenta d´usuáriu',
	'requestaccount-legend2'       => 'Enhormación presonal',
	'requestaccount-legend3'       => 'Mas enhormación',
	'requestaccount-real'         => 'Nombri verdaeru:',
	'confirmaccount-name'         => 'Nombri d´usuáriu',
	'confirmaccount-real'         => 'Nombri',
	'confirmaccount-wsum'         => 'Bienviniu!',
);

# French translation by Bertrand GRONDIN
$wgConfirmAccountMessages['fr'] = array(
	# Request account page
	'requestaccount'          => 'Demande de compte utilisateur',
	'requestaccount-text'      => '\'\'\'Remplissez et envoyez le formulaire ci-dessous pour demander un compte d’utilisateur.\'\'\'. 
	
	Assurez-vous que vous ayez déjà lu [[{{NS:PROJECT}}:Conditions d’utilisation|les conditions d’utilisation]] avant de faire votre demande de compte.
	
	Une fois que le compte est accepté, vous recevrez un courrier électronique vous notifiant que votre compte pourra être utilisé sur
	[[Special:Userlogin]].',
	'requestaccount-dup'      => '\'\'\'Note : Vous êtes déjà sur une session avec un compte enregistré.\'\'\'',
	'requestaccount-legend1'   => 'Compte utilisateur',
	'requestaccount-legend2'   => 'Informations personnelles',
	'requestaccount-legend3'   => 'Autres informations',
	'requestaccount-acc-text'  => 'Un message de confirmation sera envoyé à votre adresse électronique une fois que la demande aura été envoyée. Dans le courrier reçu, cliquez sur le lien correspondant à la confirmation de votre demande. Aussi, un mot de passe sera envoyé par courriel quand votre compte sera créé.',
	'requestaccount-ext-text'  => 'L’information suivante reste privée et ne pourra être utilisée que pour cette requête. 
	Vous avez la possibilité de lister des contact tel qu’un numéro de téléphone pour obtenir une assistance pour confirmer votre identité.',
	'requestaccount-bio-text' => "Votre biographie sera mise par défaut sur votre page utilisateur. Essayez d’y mettre vos recommandations. Assurez-vous que vous pouvez diffuser sans crainte les informations. Votre nom peut être changé en utilisant [[Special:Preferences]].",
	'requestaccount-real'     => 'Nom réel :',
	'requestaccount-same'     => '(Nom figurant dans votre état-civil)',
	'requestaccount-email'    => 'Adresse électronique :',
	'requestaccount-bio'      => 'Biographie personnelle:',
	'requestaccount-attach'   => 'CV/Résumé (facultatif)',
	'requestaccount-exts'	  => 'Le téléchargement des fichiers joints n’est pas permis.',
	'requestaccount-notes'    => 'Notes supplémentaires :',
	'requestaccount-urls'     => 'Liste des sites web. En cas de plusieurs sites (séparez-les par une nouvelle ligne) :',
	'requestaccount-agree'    => 'Vous devez certifier que votre nom réel soit correct que vous acceptiez les conditions d’utilisations du service.',
	'requestaccount-inuse'    => 'Le nom d’utilisateur est déjà utilisé dans une requête en cours d’approbation.',
	'requestaccount-tooshort' => 'Votre biographie doit avoir au moins $1 mots.',
	'requestaccount-resub'    => 'Votre fichier de CV/r�sum� doit �tre s�lectionn� une nouvelle fois pour des raisons de s�curit�. Laissez le champ vierge si vous de d�sirez plus le joindre.',
	'requestaccount-tos'      => 'J’ai lu et j’accepte de respecter les termes concernant les conditions d’utilisation des services de {{SITENAME}}.',
	'requestaccount-correct'  => 'Je certifie que le nom que j’ai inscrit dans « Nom réel » est bien le mien.',
	'requestaccount-submit'    => 'Demande de compte utilisateur.',
	'requestaccount-sent'     => 'Votre demande de compte utilisateur a été envoyée avec succès et a été mise dans la liste d’attente d’approbation.',
	'request-account-econf'   => 'Votre adresse courrielle a été confirmée et sera listée telle quelle dans votre demande de compte.',
	'requestaccount-email-subj' => '{{SITENAME}} confirmation d’adresse courriel.',
	'requestaccount-email-body' => 'Quelqu’un, vous probablement, a formulé, depuis l’adresse IP $1, une demande de compte utilisateur "$2" avec cette adresse courriel sur {{SITENAME}}.

Pour confirmer que ce compte vous appartient réelement sur {{SITENAME}}, vous êtes prié d’ouvrir ce lien dans votre navigateur :

$3

Votre mot de passe vous sera envoyé uniquement si votre compte est créé. Si tel n’était pas le cas, n’utilisez pas ce lien.
Ce code de confirmation expirera le $4.',

	'acct_request_throttle_hit' => "Désolé, vous avec demandé $1 comptes. Vous ne pouvez plus faire de demande.",
	
	# Add to Special:Login
	'requestaccount-loginnotice' => 'Pour obtenir un compte utilisateur, vous devez en faire \'\'\'[[Special:RequestAccount|la demande]]\'\'\'.',
	
	# Confirm account page
	'confirmaccounts'       => 'Demande de confirmation de comptes', 
	'confirmaccount-list'    => 'Voici, ci-dessous, la liste des comptes en attente d’approbation.
	Les comptes acceptés seront créés et retirés de cette liste. Les comptes rejetés seront tout simplement supprimé de cette même liste.',
	'confirmaccount-list2'    => 'Voir la liste des comptes récemment rejetés lesquels seront supprimés automatiquement après quelques jours. Ils peuvent encore être approuvés, aussi vous pouvez consulter les rejets avant de le faire.',
	'confirmaccount-text'    => 'Voici une demande en cours pour un compte utilisateur sur \'\'\'{{SITENAME}}\'\'\'. Attention, vérifier et, si nécessaire, confirmez toutes les information ci-dessous. Notez que vous pouvez choisir de créer un compte sous un autre nom. Faites ceci uniquement pour éviter des conflits avec d’autres noms.

	Si vous quittez cette page sans confirmer ou rejeter cette demande, elle sera toujours mise en attente.',
	'confirmaccount-none'    => 'Il n’a pas actuellement de demande d’approbation en cours.',
	'confirmaccount-none2'   => 'Il n’y a pas actuellement de rejet de demande de comptes.',
	'confirmaccount-badid'  => 'Il n’y a aucune demande en cours correspondant à l’ID indiquée. Il est possible qu‘il ait subi une maintenance.',
	'confirmaccount-back'   => 'Voir la liste des demandes en cours',
	'confirmaccount-back2'  => 'Voir la liste des comptes rejetés récemment.',
	'confirmaccount-name'   => 'Nom d’utilisateur',
	'confirmaccount-real'   => 'Nom :',
	'confirmaccount-real-q'   => 'Nom',
	'confirmaccount-email'  => 'Courriel :',
	'confirmaccount-email-q'  => 'Courriel',
	'confirmaccount-bio'    => 'Biographie :',
	'confirmaccount-bio-q'    => 'Biographie',
	'confirmaccount-attach' =>'Résumé/CV :',
	'confirmaccount-notes'   => 'Notes supplémentaires :',
	'confirmaccount-urls'   => 'Liste des site web :',
	'confirmaccount-nourls' => '(Aucun site)',
	'confirmaccount-review' => 'Approbation/Rejet',
	'confirmaccount-confirm' => 'Utilisez les boutons ci-dessous pour accepter ou rejeter la demande.',
	'confirmaccount-econf'  => '(confirmé)',
	'confirmaccount-reject' => '(rejeté par [[User:$1|$1]] le $2)',
	'confirmaccount-create'  => 'Approbation (crée le compte)',
	'confirmaccount-deny'    => 'Rejet (supprime le compte)',
	'confirmaccount-reason' => 'Commentaire (figurera dans le courriel) :',
	'confirmaccount-submit'  => 'Confirmation',
	'confirmaccount-acc'    => 'La demande de compte a été confirmée avec succès ; création du nouvel utilisateur [[User:$1]].',
	'confirmaccount-rej'    => 'La demande a été rejetée avec succès.',
	'confirmaccount-summary' => 'Création de la page utilisateur avec sa biographie.',
	'confirmaccount-welc'   => "'''Bienvenue sur ''{{SITENAME}}'' !''' Nous espérons que vous contribuerez beaucoup et bien. 
	Vous désirerez, peut-être, lire [[{{NS:PROJECT}}:Comment débuter|comment bien débuter]]. Bienvenue encore et bonne contributions.
	~~~~",
	'confirmaccount-wsum'   => 'Bienvenue !',
	'confirmaccount-email-subj' => '{{SITENAME}} demande de compte',
	'confirmaccount-held' => 'Marqué « détenu » par [[User:$1|$1]] sur $2',
	'confirmaccount-hold' => 'Détenu',
	'confirmaccount-ip' => 'Adresse IP',
	'confirmaccount-needreason' => 'Vous devez indiquer un motif dans le cadre ci-après.',
	'confirmaccount-spam' => 'Spam (n’envoyez pas de courriel)',
	'confirmaccount-email-body' => 'Votre demande de compte a été acceptée sur {{SITENAME}}.

Nom du compte utilisateur : $1

Mot de passe : $2

Pour des raisons de sécurité, vous devrez changer votre mot de passe lors de votre première connexion. Pour vous connectez, allez sur
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'Votre demande de compte utilisateur a été acceptée sur {{SITENAME}}.

Nom du compte utilisateur : $1

Mot de passe: $2

$3

Pour des raisons de sécurité, vous devrez changer votre mot de passe lors de votre première connexion. Pour vous connectez, allez sur 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'Désolé, votre demande de compte utilisateur "$1" a été rejetée sur {{SITENAME}}.

Plusieurs raisons peuvent expliquer ce cas de figure. Il est possible que vous ayez mal rempli le formulaire, ou que vous n’ayez pas indiqué suffisamment d’informations dans vos réponses. Il est encore possible que vous ne remplissiez pas les critères d’éligibilité pour obtenir votre compte. Il est possible d’être sur la liste des contact si vous désirez mieux connaître les conditions requises.',
	'confirmaccount-email-body4' => 'Désolé, votre demande de compte utilisateur "$1" a été rejetée sur {{SITENAME}}.

$2

Il est possible d’être sur la liste des contacts afin de mieux connaître les critères pour pouvoir s’inscrire.',
	'confirmaccount-email-body5' => 'Avant que votre requête pour le compte « $1 » puisse être acceptée sur {{SITENAME}} 
	Vous devez produire quelques informations suplémentaires.

$2

Ceci permet d’être sur la liste des contacts du site si vous désirez en savoir plus sur les règles concernant les comptes.',

);

$wgConfirmAccountMessages['gl'] = array(
	'requestaccount'              => 'Solicitar unha conta',
	'requestaccount-text'         => '\'\'\'Complete e envíe o formulario seguinte para solicitar unha conta de usuario\'\'\'.

	Asegúrese de ter lido primeiro as [[{{NS:PROJECT}}:Terms of Service|Condicións de Servizo]] antes de solicitar unha conta.

	Unha vez que se aprobe a conta recibirá unha mensaxe de notificación por correo electrónico e poderá usar a conta en
	[[Special:Userlogin]].',
	'requestaccount-dup'          => '\'\'\'Nota: Xa está no sistema cunha conta rexistrada.\'\'\'',
	'requestaccount-legend1'      => 'Conta de usuario',
	'requestaccount-legend2'      => 'Información persoal',
	'requestaccount-legend3'      => 'Información adicional',
	'requestaccount-acc-text'     => 'Enviaráselle unha mensaxe de confirmación ao seu enderezo de correo electrónico unha vez enviada esta solicitude. Responda premendo
	na ligazón de confirmación que lle aparecerá no correo electrónico. Así mesmo, enviaráselle o seu contrasinal cando se cree a conta.',
	'requestaccount-ext-text'     => 'A información seguinte mantense como reservada e só se usará para esta solicitude.
	Pode querer listar contactos, como un número de teléfono, para axudar a identificar a confirmación.',
	'requestaccount-bio-text'     => 'A súa biografía aparecerá como contido predefinido da súa páxina de usuario. Tente incluír
	credenciais. Asegúrese de non ter problema coa publicación desa información. O seu nome pódese cambiar mediante [[Special:Preferences]].',
	'requestaccount-real'         => 'Nome real:',
	'requestaccount-same'         => '(o mesmo que o nome real)',
	'requestaccount-email'        => 'Enderezo de correo electrónico:',
	'requestaccount-bio'          => 'Biografía persoal:',
	'requestaccount-attach'       => 'Curriculum Vitae (opcional):',
	'requestaccount-notes'        => 'Notas adicionais:',
	'requestaccount-urls'         => 'Lista de sitios web, de habelos, (separados cun parágrafo novo):',
	'requestaccount-agree'        => 'Debe certificar que o seu nome real é correcto e que está de acordo coas nosas Condicións de Servizo.',
	'requestaccount-inuse'        => 'Este nome de usuario xa se usou nunha solicitude de conta aínda pendente.',
	'requestaccount-tooshort'     => 'A súa biografía debe ter un mínimo de $1 palabras.',
	'requestaccount-exts'         => 'Non se permite este tipo de ficheiro como anexo.',
	'requestaccount-resub'        => 'Ten que volver a seleccionar o ficheiro do seu curriculum vitae por razóns de seguranza. Deixe o campo en branco
	se non o quere incluír máis.',
	'requestaccount-tos'          => 'Lin e estou de acordo en respectar as [[{{NS:PROJECT}}:Terms of Service|Condicións de Servizo]] de {{SITENAME}}. 
	O nome especificado como "Nome real" é, efectivamente, o meu propio nome real.',
	'requestaccount-submit'       => 'Solicitar unha conta',
	'requestaccount-sent'         => 'Enviouse sen problemas a súa solicitude de conta e agora está pendente de exame.',
	'request-account-econf'       => 'Confirmouse o seu enderezo de correo electrónico e listarase como tal na súa
	solicitude de conta.',
	'requestaccount-email-subj'   => 'Confirmación de enderezo de correo electrónico de {{SITENAME}}',
	'requestaccount-email-body'   => 'Alguén, probabelmente vostede desde o enderezo IP $1, solicitou unha
conta "$2" con este enderezo de correo electrónico en {{SITENAME}}.

Para confirmar que esta conta lle pertence a vostede en {{SITENAME}}, abra esta ligazón no seu navegador:

$3

Se se crea a conta, só vostede recibirá o contrasinal. Se *non* se trata de vostede, non siga a ligazón.
Este código de confirmación caducará o $4.',
	'acct_request_throttle_hit'   => 'Perdón, xa solicitou $1 contas. Non pode facer máis solicitudes.',
	'requestaccount-loginnotice'  => 'Para obter unha conta de usuario ten que \'\'\'[[Special:RequestAccount|solicitar unha]]\'\'\'.',
	'confirmaccounts'             => 'Confirmar solicitudes de contas',
	'confirmaccount-list'         => 'Abaixo aparece unha listaxe de contas pendentes de aprobación.
	As contas aprobadas crearanse e eliminaranse desta listaxe. As contas rexeitadas simplemente eliminaranse desta listaxe.',
	'confirmaccount-list2'        => 'Abaixo aparece unha listaxe con solicitudes de contas rexeitadas recentemente que poden eliminarse automaticamente
	unha vez que teñan varios días. Poden aínda ser aceptadas como contas, aínda que pode ser mellor que consulte primeiro
	co administrador que as rexeitou antes de facelo.',
	'confirmaccount-text'         => 'Esta é unha solicitude pendente dunha conta de usuario en \'\'\'{{SITENAME}}\'\'\'. Examínea
	coidadosamente e, se é necesario, confirme toda a información que aparece. Observe que pode escoller crear a conta
	cun nome diferente. Use isto só para evitar conflitos con outros nomes.

	Se simplemente deixa esta páxina sen confirmar ou rexeitar esta solicitude, ficará como pendente.',
	'confirmaccount-none'         => 'Non existen solicitudes de contas pendentes neste momento.',
	'confirmaccount-none2'        => 'Non existen solicitudes de contas rexeitadas recentemente neste momento.',
	'confirmaccount-badid'        => 'Non existe unha solicitude pendente que corresponda co ID fornecido. Pode que xa fose examinada.',
	'confirmaccount-back'         => 'Ver a lista de contas pendentes',
	'confirmaccount-back2'        => 'Ver a lista de contas rexeitadas recentemente',
	'confirmaccount-name'         => 'Nome de usuario',
	'confirmaccount-real'         => 'Nome:',
	'confirmaccount-real-q'       => 'Nome',
	'confirmaccount-email'        => 'Correo electrónico:',
	'confirmaccount-email-q'      => 'Correo electrónico',
	'confirmaccount-bio'          => 'Biografía:',
	'confirmaccount-bio-q'        => 'Biografía',
	'confirmaccount-attach'       => 'Curriculum Vitae:',
	'confirmaccount-notes'        => 'Notas adicionais:',
	'confirmaccount-urls'         => 'Lista de sitios web:',
	'confirmaccount-review'       => 'Aprovar/Rexeitar',
	'confirmaccount-confirm'      => 'Use os botóns de embaixo para aceptar ou rexeitar esta solicitude.',
	'confirmaccount-econf'        => '(confirmada)',
	'confirmaccount-reject'       => '(rexeitada por [[User:$1|$1]] en $2)',
	'confirmaccount-create'       => 'Aceptar (crear a conta)',
	'confirmaccount-deny'         => 'Rexeitar (eliminar da listaxe)',
	'confirmaccount-spam'         => 'Spam (non enviar correo electrónico)',
	'confirmaccount-reason'       => 'Comentario (incluirase na mensaxe de correo electrónico):',
	'confirmaccount-ip'           => 'Enderezo IP:',
	'confirmaccount-submit'       => 'Confirmar',
	'confirmaccount-needreason'   => 'Debe incluír un motivo na caixa de comentarios de embaixo.',
	'confirmaccount-acc'          => 'Confirmouse sen problemas a solicitude de conta; creouse a nova conta de usuario [[User:$1]].',
	'confirmaccount-rej'          => 'Rexeitouse sen problemas a solicitude de conta.',
	'confirmaccount-summary'      => 'A crear a páxina de usuario coa biografía do novo usuario.',
	'confirmaccount-welc'         => '\'\'\'Reciba a benvida a \'\'{{SITENAME}}\'\'!\'\'\' Esperamos que contribúa moito e ben.
	Será ben que lea [[{{NS:PROJECT}}:Getting started|Como comezar]]. De novo, reciba a nosa benvida e divírtase!',
	'confirmaccount-wsum'         => 'Reciba a nosa benvida!',
	'confirmaccount-email-subj'   => 'solicitude de conta en {{SITENAME}}',
	'confirmaccount-email-body'   => 'Aprobouse a súa solicitude de conta en {{SITENAME}}.

Nome da conta: $1

Contrasinal: $2

Por razóns de seguranza terá que mudar o contrasinal a primeira vez que se rexistre. Para rexistrarse,
vaia a {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2'  => 'Aprobouse a súa solicitude de conta en {{SITENAME}}.

Nome da conta: $1

Contrasinal: $2

$3

Por razóns de seguranza terá que mudar o contrasinal a primeira vez que se rexistre. Para rexistrarse,
vaia a {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3'  => 'Perdón, pero a súa solicitude de conta $1 foi rexeitada en {{SITENAME}}.

Isto pode deberse a varias causas. Pode que non enchese o formulario correctamente, non respondese na extensión
adecuada ou non cumprise con algún outro criterio. Pode que existan listaxes de contacto no sitio que poida
usar se quere saber máis acerca da política de contas de usuario.',
	'confirmaccount-email-body4'  => 'Perdón, pero a súa solicitude de conta "$1" foi rexeitada en {{SITENAME}}.

$2

Poden existir listaxes de contacto no sitio que pode usar se quere saber máis acerca da política de contas de usuario.',
);

$wgConfirmAccountMessages['hsb'] = array(
	'requestaccount'              => 'Wužiwarske konto sej žadać',
	'requestaccount-text'         => '\'\'\'Wupjelń slědowacy formular a wotesćel jón, zo by wužiwarske konto požadał\'\'\'. 

	Prošu přečitaj najprjedy [[{{NS:PROJECT}}:Terms of Service|wužiwanske wuměnjenja]], prjedy hač požadaš wužiwarske konto.

Tak ruče kaž konto je so potwjerdźiło, dóstaš powesć přez mejlku a móžeš so pod "[[{{ns:special}}:Userlogin|Konto wutworić abo so přizjewić]]" přizjewić.',
	'requestaccount-dup'          => '\'\'\'Kedźbu: Sy hižo ze zregistrowanym wužiwarskim kontom přizjewjeny.\'\'\'',
	'requestaccount-legend1'      => 'Wužiwarske konto:',
	'requestaccount-legend2'      => 'Wosobinske informacije:',
	'requestaccount-legend3'      => 'Dalše informacije',
	'requestaccount-acc-text'     => 'K twojej e-mejlowej adresy budźe so po wotesłanju tutoho formulara wobkrućenska mejlka słać. Prošu wotmołw na to přez kliknjenje na wobkrućenski wotkaz, kotryž mejlka wobsahuje. Tak ruče kaž twoje konto je wutworjene, so ći twoje hesło připósćele.',
	'requestaccount-ext-text'     => 'Ze slědowacymi informacijemi so dowěrliwje wobchadźa a jenož za tute požadne wužiwa. Móžeš kontaktowe informacije, kaž na př. telefonowe čisło, podać, zo by wobdźěłowanje swojeho požadanja zjednorił.',
	'requestaccount-bio-text'     => 'Twoja biografija so jako spočatny wobsah twojeje wužiwarskeje strony składuje. Spytaj wšě trěbne doporučenja naspomnić, ale zawěsć, zo chceš te informacije woprawdźe wozjewić. Móžeš swoje wužiwarske mjeno pod "[[{{ns:special}}:Preferences|Nastajenja]]" změnić.',
	'requestaccount-real'         => 'Woprawdźite mjeno:',
	'requestaccount-same'         => '(kaž woprawdźite mjeno)',
	'requestaccount-email'        => 'E-mejlowa adresa:',
	'requestaccount-bio'          => 'Wosobinska biografija:',
	'requestaccount-attach'       => 'Žiwjenjoběh',
	'requestaccount-notes'        => 'Přidatne podaća:',
	'requestaccount-urls'         => 'Lisćina webowych sydłow (přez linkowe łamanja wotdźělene)',
	'requestaccount-agree'        => 'Dyrbiš potwjerdźić, zo twoje woprawdźite mjeno je korektne a wužiwarske wuměnjenja akceptuješ.',
	'requestaccount-inuse'        => 'Wužiwarske mjeno so hižo w druhim kontowym požadanju wužiwa.',
	'requestaccount-tooshort'     => 'Twoja biografija dyrbi znajmjeńša $1 słowow dołho być.',
	'requestaccount-exts'         => 'Datajowy typ přiwěška je njedowoleny.',
	'requestaccount-resub'        => 'Twoja žiwjenjoběhowa dataja dyrbi so z přičinow wěstoty znowa wubrać. Wostaj polo prózdne, jeli hižo nochceš tajku zapřijimać.',
	'requestaccount-tos'          => 'Sym wužiwarske wuměnjenja strony {{SITENAME}} přečitał a budu do nich dźeržeć.',
	'requestaccount-submit'       => 'Wužiwarske konto sej žadać',
	'requestaccount-sent'         => 'Twoje kontowe požadanje  bu wuspěšnje wotpósłane a dyrbi so nětko přepruwować.',
	'request-account-econf'       => 'Twoja e-mejlowa adresa bu wobkrućena a budźe so w twojim kontowym požadanju nalistować.',
	'requestaccount-email-subj'   => '{{SITENAME}} Pruwowanje e-mejloweje adresy',
	'requestaccount-email-body'   => 'Něštó z IP-adresu $1, snano ty, je pola {{SITENAME}} wužiwarske konto "$2" z twojej e-mejlowej adresu požadał.

Zo by wobkrućił, zo woprawdźe ty sy tute konto pola {{SITENAME}} požadał, wočiń prošu slědowacy wotkaz we swojim wobhladowaku:

$3

Hdyž je so wužiwarske konto wutworiło, dóstanješ dalšu mejlku z hesłom.

Jeli *njej*sy wužiwarske konto požadał, njewočiń prošu tutón wotkaz!

Tutón wobkrućenski kod budźe w $4 płaciwy.',
	'acct_request_throttle_hit'   => 'Sy hižo $1 wužiwarskich kontow požadał, njemóžeš sej we wokomiku dalše konta žadać.',
	'requestaccount-loginnotice'  => 'Zo by wužiwarske konto dóstał, dyrbiš wo nje \'\'\'[[{{ns:special}}:RequestAccount|prosyć]]\'\'\'.',
	'confirmaccounts'             => 'Kontowe požadanja potwjerdźić',
	'confirmaccount-list'         => 'Deleka je lisćina wužiwarskich požadanjow, kotrež čakaja na přizwolenje. Potwjerdźene konta budu so wutworjeć a z lisćiny wotstronjeć. Wotpokazane konta so prosće z lisćiny šmórnu.',
	'confirmaccount-list2'        => 'Deleka je lisćina tuchwilu wotpokazanych kontowych požadanjow, kotrež hodźa so awtomatisce po někotrych dnjach šmórnyć. Móža so hišće za konta přizwolić, byrnjež ty najprjedy administratora konsultował, kiž je wotpokaza, prjedy hač činiš to.',
	'confirmaccount-text'         => 'To je njerozsudźene požadanje za wužiwarskim kontom pola \'\'\'{{SITENAME}}\'\'\'. Pruwuj wšě deleka stejace informacije dokładnje a potwjerdź je. Prošu wobkedźbuj, zo móžeš konto, jeli trjeba, pod druhim wužiwarskim mjenom wutworić. Wužij to jenož, zo by kolizije z druhimi mjenami wobešoł.

Jeli tutu stronu prosće wopušćeš, bjeztoho zo by konto potwjerdźił abo wotpokazał, budźe požadanje njerozsudźene wostać.',
	'confirmaccount-none'         => 'Tuchwilu njerozsudźene wužiwarske požadanja njejsu.',
	'confirmaccount-none2'        => 'Tuchwilu njedawno wotpokazane wužiwarske požadanja njejsu.',
	'confirmaccount-badid'        => 'Tuchwilu požadane k podatemu ID. Snano bu hižo sčinjene.',
	'confirmaccount-back'         => 'Lisćinu njerozsudźenych požadanjow wobhladać',
	'confirmaccount-back2'        => 'Lisćinu njedawno wotpokazanych požadanjow wobhladać',
	'confirmaccount-name'         => 'Wužiwarske mjeno',
	'confirmaccount-real'         => 'Mjeno',
	'confirmaccount-real-q'       => 'Mjeno',
	'confirmaccount-email'        => 'E-mejl',
	'confirmaccount-email-q'      => 'E-mejl',
	'confirmaccount-bio'          => 'Biografija',
	'confirmaccount-bio-q'        => 'Biografija',
	'confirmaccount-attach'       => 'Žiwjenjoběh:',
	'confirmaccount-notes'        => 'Přidatne přispomnjenki:',
	'confirmaccount-urls'         => 'Lisćina webowych sydłow:',
	'confirmaccount-review'       => 'Dowolić/Wotpokazać',
	'confirmaccount-confirm'      => 'Wužij tłóčatka deleka, zo by požadanje akceptował abo wotpokazał.',
	'confirmaccount-econf'        => '(potwjerdźene)',
	'confirmaccount-reject'       => '(wot [[Wužiwar:$1|$1]] na $2 wotpokazany)',
	'confirmaccount-held'         => '(wot [[User:$1|$1]] on $2 jako "čakacy" markěrowany)',
	'confirmaccount-create'       => 'Akceptować (Konto wutworić)',
	'confirmaccount-deny'         => 'Wotpokazać (Požadanje wotstronić)',
	'confirmaccount-hold'         => 'Čakać dać',
	'confirmaccount-spam'         => 'Spam (njesćel mejlku)',
	'confirmaccount-reason'       => 'Komentar (budźe so do mejlki k próstwarjej zasunyć):',
	'confirmaccount-ip'           => 'IP-adresa',
	'confirmaccount-submit'       => 'Potwjerdźić',
	'confirmaccount-needreason'   => 'Dyrbiš deleka w komentarowym polu přičinu podać.',
	'confirmaccount-acc'          => 'Požadanje za kontom bu wuspěšnje wobkrućene; konto za wužiwarja [[{{ns:User}}:$1]] bu wutworjene.',
	'confirmaccount-rej'          => 'Požadanje za kontom bu wotpokazane.',
	'confirmaccount-summary'      => 'Wutworja so wužiwarska strona z biografiju noweho wužiwarja.',
	'confirmaccount-welc'         => '\'\'\'Witaj do \'\'{{SITENAME}}\'\'!\'\'\' Nadźijemy so, zo dodaš wjele dobrych přinoškow.
	Snano chceš najprjedy [[Pomoc:Prěnje kroki|Prěnje kroki]] čitać. Hišće raz: Witaj a wjele wjesela! 
	[[User:Michawiki|Michawiki]] 17:08, 24 September 2007 (UTC)',
	'confirmaccount-wsum'         => 'Witaj!',
	'confirmaccount-email-subj'   => '{{SITENAME}} Požadanje za wužiwarskim kontom',
	'confirmaccount-email-body'   => 'Twoje požadanje za wužiwarskim kontom bu na {{SITENAME}} schwalene.

Wužiwarske mjeno: $1

Hesło: $2

Z přičinow wěstoty, měł ty swoje hesło při prěnim přizjewjenju na kóždy pad změnić. Zo by přizjewił, dźi přosu na stronu {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2'  => 'Twoje požadanje za wužiwarskim kontom pola {{SITENAME}} bu schwalene.

Wužiwarske mjeno: $1

Hesło: $2

$3

Z přičinow wěstoty měł ty swoje hesło při prěnim přizjewjenu nak kóďy pad změnić. Zo by přizjewil, dźi prošu na stronu {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3'  => 'Bohužel bu twoje požadanje za wužiwarskim kontom "$1" pola {{SITENAME}} wotpokazane.

To móže wjele přičinow měć. Snano njejsy formular korektnje wupjelnił, njejsy dosć podaćow činił abo njejsy druhe kriterije spjelnił.

Snano je na stronje kontaktowe adresy, na kotrež móžeš so wobroćić, jeli chceš wjace wo žadanjach wědźeć.',
	'confirmaccount-email-body4'  => 'Bohužel bu twoje požadanje za wužiwarskim kontom "$1" na {{SITENAME}} wotpokazane.

$2

Snano su na sydle kontaktowe adresy, na kotrež so móžeš wobroćeć, jeli chceš wjace wo žadanjach wužiwarskich kontow wědźeć.',
	'confirmaccount-email-body5'  => 'Prjedy hač konto "$1" požadaš, kotrež hodźi so na {{SITENAME}} akceptować, dyrbiš najprjedy někotre přidatne informacije podać.

$2

Snano su kontaktowe lisćiny na sydle, kotrež móžeš wužiwać, jeli chceš wjace wo prawidłach za wužiwarske konta wědźeć.',
);

$wgConfirmAccountMessages['la'] = array(
	'requestaccount-real'         => 'Nomen verum:',
	'requestaccount-same'         => '(aequus ad nomine vero)',
	'confirmaccount-name'         => 'Nomen usoris',
	'confirmaccount-real'         => 'Nomen',
	'confirmaccount-wsum'         => 'Salve!',
);

$wgConfirmAccountMessages['nl'] = array(
	'requestaccount'              => 'Gebruiker aanvragen',
	'requestaccount-text'         => '\'\'\'Vul het onderstaande formulier in en stuur het op om een gebruiker aan te vragen\'\'\'. 
	
	Zorg ervoor dat u eerst de [[{{NS:PROJECT}}:Terms of Service|Voorwaarden]] leest voordat u een gebruiker aanvraagt.
	
	Als uw gebruiker is goedgekeurd, krijgt u een e-mail en daarna kunt u aanmelden via [[Special:Userlogin]].',
	'requestaccount-dup'          => '\'\'\'Note bene: U bent al aangemeld met een geregistreede gebruiker.\'\'\'',
	'requestaccount-legend1'      => 'Gebruiker',
	'requestaccount-legend2'      => 'Persoonlijke informatie',
	'requestaccount-legend3'      => 'Overige informatie',
	'requestaccount-acc-text'     => 'U ontvangt een e-mailbevestiging als uw verzoek is ontvangen. Reageer daar alstublieft op 
	door de klikken op de bevesitigngslink die in de e-mail staat. U krijgt een wachtwoord als uw gebruiker is aangemaakt.',
	'requestaccount-ext-text'     => 'De volgende informatie wordt vertrouwelijk behandeld en wordt alleen gebruikt voor dit verzoek. 
	U kunt contactgegevens zoals een telefoonummer opgeven om te helpen bij het vaststellen van uw identiteit.',
	'requestaccount-bio-text'     => 'Uw biografie wordt opgenomen in uw gebruikerspagina. Probeer uw belangrijkste gegevens 
	op te nemen. Zorg ervoor dat u achter het publiceren van dergelijke informatie staat. U kunt uw naam wijzigen via uw [[Special:Preferences|voorkeuren]].',
	'requestaccount-real'         => 'Uw naam:',
	'requestaccount-same'         => '(gelijk aan uw naam)',
	'requestaccount-email'        => 'E-mailadres:',
	'requestaccount-bio'          => 'Persoonlijke biografie:',
	'requestaccount-attach'       => 'CV (optioneel):',
	'requestaccount-notes'        => 'Opmerkingen:',
	'requestaccount-urls'         => 'Lijst van websites, als van toepassing (iedere site op een aparte regel):',
	'requestaccount-agree'        => 'U moet aangegeven dat uw naam juist is en dat u akkoord gaat met de Voorwaarden.',
	'requestaccount-inuse'        => 'De gebruiker is al bekend in een aanvraagprocedure.',
	'requestaccount-tooshort'     => 'Uw biografie moet tenminste $1 woorden bevatten.',
	'requestaccount-exts'         => 'Bestandstype van de bijlage is niet toegestaan.',
	'requestaccount-resub'        => 'Uw CV-bestand moet herselecteerd worden voor veiligheidsredenen. Laat het veld open als u geen bestand meer wil bijvoegen.',
	'requestaccount-tos'          => 'Ik heb de Voorwaarden van {{SITENAME}} gelezen en ga ermee akkoord.',
	'requestaccount-submit'       => 'Gebruiker aanvragen',
	'requestaccount-sent'         => 'Uw gebruikersaanvraag is verstuurd en wacht op review.',
	'request-account-econf'       => 'Uw e-mailadres is bevestigd en wordt in uw gebruikersaanvraag opgenomen.',
	'requestaccount-email-subj'   => '{{SITENAME}} bevestiging e-mailadres',
	'requestaccount-email-body'   => 'Iemand, waarschijnlijk u, heeft vanaf  IP-adres $1 op {{SITENAME}} een verzoek gedaan
voor het aanmaken van gebruiker "$2" met dit e-mailadres.

Open de onderstaande link in uw browser om te bevestigen dat deze gebruiker op {{SITENAME}} daadwerkelijk bij u hoort:

$3

Als de gebruiker is aangemaakt krijgt alleen u een e-mail met het wachtwoord. Als de aanvraag niet van u afkomstig is, volg de link dan *niet*. 
Deze bevestigingse-mail verloop op $4.',
	'acct_request_throttle_hit'   => 'Sorry, maar u heeft al $1 gebruikersverzoeken gedaan. U kunt geen nieuwe verzoeken meer uitbrengen.',
	'requestaccount-loginnotice'  => 'Om een gebruiker te krijgen, moet u \'\'\'[[Special:RequestAccount|een verzoek doen]]\'\'\'.',
	'confirmaccounts'             => 'Gebruikersverzoeken bevestigen',
	'confirmaccount-list'         => 'Hieronder staan de gebruikersverzoeken die op afhandeling wachten. 
	Voor goedgekeurde gebruikersverzoeken worden gebruikers aangemaakt en dat verzoek komt niet langer voor in deze lijst. 
	Afgewezen gebruikersverzoeken worden van de lijst verwijderd.',
	'confirmaccount-list2'        => 'Hieronder staan recentelijk afgewezen gebruikersverzoeken die die over een aantal dagen
	automatisch worden verwijderd. Ze kunnen nog steeds goedgekeurd worden, hoewel het verstandig is voorafgaand contact te
	zoeken met de beheerder die het verzoek heeft afgewezen.',
	'confirmaccount-text'         => 'Dit is een openstaand gebruikersverzoek voor \'\'\'{{SITENAME}}\'\'\'. Beoordeel het
	alstublieft zorgvuldig en bevestig, als nodig, alle onderstaande informatie. U kunt een gebruiker aanmaken met een andere
	naam. Doe dit alleen als er mogelijk verwarring kan optreden met andere gebruikersnamen.
	
	Als u deze pagina verlaat zonder het gebruikersverzoek te bevestigen of af te wijzen, dan blijft het open staan.',
	'confirmaccount-none'         => 'Er zijn op dit moment geen openstaande gebruikersverzoeken.',
	'confirmaccount-none2'        => 'Er zijn op het moment geen recent afgewezen gebruikersverzoeken.',
	'confirmaccount-badid'        => 'Er is geen openstaand gebruikersverzoeken voor het opgegeven ID. Wellicht is het al afgehandeld.',
	'confirmaccount-back'         => 'Bekijk openstaande gebruikersverzoeken',
	'confirmaccount-back2'        => 'Bekijk recent afgewezen verzoeken',
	'confirmaccount-name'         => 'Gebruikersnaam',
	'confirmaccount-real'         => 'Naam',
	'confirmaccount-real-q'       => 'Naam',
	'confirmaccount-email'        => 'E-mail',
	'confirmaccount-email-q'      => 'E-mail',
	'confirmaccount-bio'          => 'Biografie',
	'confirmaccount-bio-q'        => 'Biografie',
	'confirmaccount-attach'       => 'CV (informatie over u):',
	'confirmaccount-notes'        => 'Extra toevoegingen:',
	'confirmaccount-urls'         => 'Lijst met websites:',
	'confirmaccount-review'       => 'toegelaten/afgewezen',
	'confirmaccount-confirm'      => 'Gebruik de onderUse the buttons below to accept this request or deny it.',
	'confirmaccount-econf'        => '(bevestigd)',
	'confirmaccount-reject'       => '(afgewezen door [[User:$1|$1]] op $2)',
	'confirmaccount-held'         => '(als "uitgesteld" aangemerkt door [[User:$1|$1]] op $2)',
	'confirmaccount-create'       => 'Toelaten (gebruiker aanmaken)',
	'confirmaccount-deny'         => 'Afwijzen (verwijderen)',
	'confirmaccount-hold'         => 'Uitstellen',
	'confirmaccount-spam'         => 'Spam (geen e-mail sturen)',
	'confirmaccount-reason'       => 'Opmerking (zal worden toegevoegd aan de email):',
	'confirmaccount-ip'           => 'IP-adres:',
	'confirmaccount-submit'       => 'Bevestigen',
	'confirmaccount-needreason'   => 'U moet een reden geven in het onderstaande veld.',
	'confirmaccount-acc'          => 'Gebruikersverzoek goedgekeurd. De gebruiker [[User:$1]] is aangemaakt.',
	'confirmaccount-rej'          => 'Gebruikersverzoek afgewezen.',
	'confirmaccount-summary'      => 'Er wordt een gebruikerspagina gemaakt met de biografie van de nieuwe gebruiker.',
	'confirmaccount-welc'         => '\'\'\'Welkom bij \'\'{{SITENAME}}\'\'!\'\'\' We hopen dat u veel goed bijdragen levert. 
	Waarschijnlijk wilt u kennis nemen van [[{{NS:PROJECT}}:Getting started|Eerste stappen]]. Nogmaals, welkom en veel plezier! 
	~~~~',
	'confirmaccount-wsum'         => 'Welkom!',
	'confirmaccount-email-subj'   => '{{SITENAME}} gebruikersverzoek',
	'confirmaccount-email-body'   => 'Uw gebruikersverzoek op {{SITENAME}} is goedgekeurd.

Gebruiker: $1

Wachtwoord: $2

Om beveiligingsredenen dient u uw wachtwoord bij de eerste keer aanmelden te wijzigen. Aanmelden kan via 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2'  => 'Uw gebruikersverzoek op {{SITENAME}} is goedekeurd.

Gebruikersnaam: $1

Wachtwoord: $2

$3

Om beveiligingsredenen dient u uw wachtwoord bij de eerste keer aanmelden te wijzigen. Aanmelden kan via 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3'  => 'Sorry, uw gebruikersverzoek voor "$1" op {{SITENAME}} is afgewezen.

Dit kan meerdere oorzaken hebben. Mogelijk heeft u het formulier niet volledig ingevuld, waren uw antwoorden 
onvoldoende compleet, of heeft u om een andere reden niet voldaan aan de eisen. Op de site staan mogelijk 
lijsten met contactgegevens als u meer wilt weten over het gebruikersbeleid.',
	'confirmaccount-email-body4'  => 'Sorry, uw gebruikersverzoek voor "$1" op {{SITENAME}} is afgewezen.

$2

Op de site staan mogelijk lijsten met contactgegevens als u meer wilt weten over het gebruikersbeleid.',
	'confirmaccount-email-body5'  => 'Voordat uw aanvraag voor een account "$1" aanvaard kan worden op {{SITENAME}},
	moet u eerst extra informatie geven.

$2

Er kunnen contacteerlijsten zijn die u kan gebruiken als u meer wil te weten komen over het beleid van gebruikersaccounts.',
);


$wgConfirmAccountMessages['oc'] = array(
	'requestaccount-legend1'       => 'Compte d\'utilizaire:',
	'requestaccount-legend2'       => 'Informacion personala:',
	'requestaccount-legend3'       => 'Autra informacion:',
	'requestaccount-real'         => 'Nom vertadièr:',
	'requestaccount-email'        => 'Adreça electronica:',
	'confirmaccount-name'         => 'Nom d\'utilizaire',
	'confirmaccount-real'         => 'Nom',
);

$wgConfirmAccountMessages['pl'] = array(
	'acct_request_throttle_hit'   => 'Przepraszamy, zamówiłeś (-aś) już o $1 kont. Nie możesz wykonać więcej zamówień.',
	'confirmaccount-email'        => 'E-mail:',
	'confirmaccount-email-q'      => 'E-mail',
	'confirmaccount-ip'           => 'Adres IP:',
);

$wgConfirmAccountMessages['pms'] = array(
	'requestaccount'              => 'Ciamé un cont',
	'requestaccount-text'         => '\'\'\'Ch\'a completa e ch\'a manda sta domanda-sì për ciamé ch\'a-j deurbo sò cont utent\'\'\'. Per piasì, ch\'a varda d\'avej present le [[{{NS:PROJECT}}:Condission ëd servissi|Condission ëd servissi]], anans che deurb-se un cont. Na vira che \'l cont a sia aprovà, a l\'arseivrà na notìfica për pòsta eletrònica e sò cont a sarà bon da dovré a l\'adrëssa [Special:Userlogin]].',
	'requestaccount-dup'          => '\'\'\'Ch\'a ten-a present: al moment a l\'é già andrinta al sistema ën dovrand un cont registrà.\'\'\'',
	'requestaccount-legend1'      => 'Cont utent',
	'requestaccount-legend2'      => 'Anformassion personaj',
	'requestaccount-legend3'      => 'Àotre anformassion',
	'requestaccount-acc-text'     => 'A soa adrëssa ëd pòsta eletrònica a-i rivërà un messagi, na vira che sta domanda a la sia mandà. Per piasì, ch\'a n\'arsponda ën dand-ie un colp col rat ansima a l\'aniura ch\'a treuva ant ël messagi. Ëdcò soa ciav a sarà recapità për pòsta eletrònica, na vira che sò cont a sia creà.',
	'requestaccount-ext-text'     => 'St\'anformassion-sì as ten privà e as dòvra mach për sta question-sì. S\'a veul a peul buté dij contat coma un nùmer ëd telèfono për giuté a identifichesse sensa dubi.',
	'requestaccount-bio-text'     => 'Soa biografìa a sarà buta coma contnù base për soa pàgine utent. S\'a peul, ch\'a buta soe credensiaj, cole ch\'a sio. Ch\'a varda mach però dë buté dj\'anformassion ch\'a-j da gnun fastudi publiché. An tute le manere, a peul sempe cambiesse \'d nòm ën dovrand l\'adrëssa [[Special:Preferences]].',
	'requestaccount-real'         => 'Nòm vèir:',
	'requestaccount-same'         => '(istess che sò nòm vèir)',
	'requestaccount-email'        => 'Adrëssa ëd pòsta eletrònica:',
	'requestaccount-bio'          => 'Biografìa personal:',
	'requestaccount-attach'       => 'Curriculum vitae (opsional):',
	'requestaccount-notes'        => 'Nòte adissionaj:',
	'requestaccount-urls'         => 'Lista ëd sit ant sla Ragnà, s\'a-i n\'a-i é (buté un për riga):',
	'requestaccount-agree'        => 'A venta ch\'a sertìfica che sò nòm vèir a l\'é giust e ch\'a l\'é d\'acòrdi con nòstre Condission ëd Servissi.',
	'requestaccount-inuse'        => 'Stë stranòm-sì a l\'é già dovrà ant na domanda ch\'a la speta d\'esse aprovà.',
	'requestaccount-tooshort'     => 'Soa biografìa a l\'ha dë esse longa almanch $1 paròle.',
	'requestaccount-exts'         => 'Sta sòrt d\'archivi as peul pa tachesse.',
	'requestaccount-resub'        => 'Për na question ëd sigurëssa a venta torna ch\'a selession-a l\'archivi ëd sò Curriculum Vitae. Ch\'a lassa pura ël camp veujd s\'a veul pì nen butelo.',
	'requestaccount-tos'          => 'I l\'hai lesù le [[{{NS:PROJECT}}:Terms of Service|Condission ëd Servissi]] ëd {{SITENAME}} e i son d\'acòrdi d\'osserveje. Ël nòm ch\'i l\'hai butà sot a "Nòm vèir" a l\'é mè nòm da bon.',
	'requestaccount-submit'       => 'Fé domanda për ël cont',
	'requestaccount-sent'         => 'Soa domanda dë deurb-se un cont a l\'é staita arseivùa e a la speta d\'esse aprovà.',
	'request-account-econf'       => 'Soa adrëssa ëd pòsta eletrònica a l\'é staita confermà e a la sarà listà coma bon-a an soa domanda dë deurbe \'l cont.',
	'requestaccount-email-subj'   => 'Arcesta ëd conferma d\'adrëssa ëd pòsta eletrònica da {{SITENAME}}',
	'requestaccount-email-body'   => 'Cheidun, ch\'a l\'é belfé ch\'a sia chiel/chila, da \'nt l\'adrëssa IP $1 a l\'ha ciamà dë deurbe un cont antestà a "$2" ansima a {{SITENAME}} e a l\'ha lassà st\'adrëssa ëd pòsta eletrònica-sì. Për confermé che ës cont ansima a {{SITENAME}} a sarìa sò da bon, për piasì ch\'a deurba ant sò navigator st\'anliura-sì: $3 

Quand ël cont a vnirà creà, soa la ciav a sarà mandà mach a st\'adrëssa-sì. Se për cas a fussa PA stait chiel/chila a fé la domanda, a basta ch\'a n\'arsponda nen d\'autut. Ës còdes ëd conferma-sì a scad dël $4.',
	'acct_request_throttle_hit'   => 'A l\'ha gia ciamà $1 cont. Për darmagi ant ës moment-sì i podoma nen aceté dj\'àotre domande da chiel/chila.',
	'requestaccount-loginnotice'  => 'Për deurb-se un sò cont utent, a venta \'\'\'[[Special:RequestAccount|ch<nowiki>\'</nowiki>a në ciama un]]\'\'\'.',
	'confirmaccounts'             => 'Conferma dle domande ëd cont neuv da deurbe',
	'confirmaccount-list'         => 'Ambelessì sota a-i é na lista ëd domanda ch\'a speto d\'esse aprovà. Ij cont aprovà a saran creà e peuj gavà via da \'n sta lista. Ij cont arfudà a saran mach dëscancelà da \'nt la lista.',
	'confirmaccount-list2'        => 'Ambelessì sota a-i é na lista ëd coint ch\'a son stait arfudà ant j\'ùltim temp, e ch\'a l\'é belfé ch\'a ven-o scancelà n\'aotomàtich na vira ch\'a sia passa-ie chèich dì dal giudissi negativ. Ën vorend as peulo anco\' sempe aprovesse bele che adess, ma miraco un a veul sente l\'aministrator ch\'a l\'ha arfudaje, anans che fé che fé.',
	'confirmaccount-text'         => 'A-i é na domanda duvèrta për deurbe un cont utent a \'\'\'{{SITENAME}}\'\'\'. Për piasì, ch\'a varda lòn ch\'a lé e se a fa da manca ch\'a conferma j\'anformassion ambelessì sota. Ch\'a ten-a present ch\'a peul decide dë creé ël cont con në stranòm diferent da col ciamà, se col-lì a fussa già dovrà da cheidun d\'àotr. S\'a va via da sta pàgina-sì sensa pijé ëd decision a-i riva gnente, la domanda a la resta duvèrta.',
	'confirmaccount-none'         => '(nen fornì)',
	'confirmaccount-none2'        => 'A-i é gnun-a domanda arfudà ch\'a la sia anco\' registrà',
	'confirmaccount-badid'        => 'A-i é gnun-a domanda duvèrta ch\'a-j corisponda a l\'identificativ ch\'a l\'ha butà. A peul esse ch\'a la sia già staita tratà da cheidun d\'àotr.',
	'confirmaccount-back'         => 'Vardé la lista dle domande duvèrte',
	'confirmaccount-back2'        => 'Vardé la lista dle domande arfudà ant j\'ùltim temp',
	'confirmaccount-name'         => 'Stranòm',
	'confirmaccount-real'         => 'Nòm:',
	'confirmaccount-real-q'       => 'Nòm',
	'confirmaccount-email'        => 'Adrëssa ëd pòsta eletrònica:',
	'confirmaccount-email-q'      => 'Adrëssa ëd pòsta eletrònica',
	'confirmaccount-bio'          => 'Biografìa:',
	'confirmaccount-bio-q'        => 'Biografìa',
	'confirmaccount-attach'       => 'Curriculum Vitae:',
	'confirmaccount-notes'        => 'Nòte adissionaj:',
	'confirmaccount-urls'         => 'Lista ëd sit ant sla Ragnà:',
	'confirmaccount-review'       => 'Aprové/Arfudé',
	'confirmaccount-confirm'      => 'Ch\'a dòvra j\'opsion ambelessì sota për aprové, arfudé ò lassé an coa la domanda:',
	'confirmaccount-econf'        => '(confermà)',
	'confirmaccount-reject'       => '(arfudà da [[User:$1|$1]] dël $2)',
	'confirmaccount-held'         => '(marcà "an coa" da [[User:$1|$1]] dël $2)',
	'confirmaccount-create'       => 'Aceté (deurbe \'l cont)',
	'confirmaccount-deny'         => 'Arfudé (e gavé da \'nt la lista)',
	'confirmaccount-hold'         => 'Lassé an coa',
	'confirmaccount-spam'         => 'Rumenta ëd reclam (mand-je nen pòsta)',
	'confirmaccount-reason'       => 'Coment (a-i resta andrinta al messagi postal):',
	'confirmaccount-ip'           => 'Adrëssa IP:',
	'confirmaccount-submit'       => 'Confermé',
	'confirmaccount-needreason'   => 'A venta specifiché na rason ant ël quàder ëd coment ambelessì sota.',
	'confirmaccount-acc'          => 'Conferma dla domanda andaita a bonfin; a l\'é dorbusse ël cont utent [[User:$1]].',
	'confirmaccount-rej'          => 'Arfud dla domanda andait a bonfin.',
	'confirmaccount-summary'      => 'I soma antramentr ch\'i foma na neuva pàgina utent con la biografìa dl\'utent neuv.',
	'confirmaccount-welc'         => '\'\'Bin ëvnù/a  an \'\'{{SITENAME}}\'\'!\'\'\' I speroma d\'arsèive sò contribut e deje bon servissi. Miraco a peul ess-je d\'agiut lese la session [[{{NS:PROJECT}}:Getting started|Amprende a travajé da zero]]. N\'àotra vira, bin ëvnù/a e tante bele còse!',
	'confirmaccount-wsum'         => 'Bin ëvnù/a!',
	'confirmaccount-email-subj'   => 'Domanda dë deurbe un cont neuv ansima a {{SITENAME}}',
	'confirmaccount-email-body'   => 'Soa domanda dë deurbe un cont neuv ansima a {{SITENAME}} a l\'é staita aprovà. Stranòm: $1 Ciav: $2 

Për na question ëd sigurëssa a fa da manca che un as cambia soa ciav la prima vira ch\'a rintra ant ël sistema. Për rintré, për piasì ch\'a vada a l\'adrëssa {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2'  => 'Soa domanda dë deurbe un cont neuv ansima a {{SITENAME}} a l\'é staita aprovà. Stranòm: $1 Ciav: $2 $3 

Për na question ëd sigurëssa un a venta ch\'as cambia soa ciav la prima vira ch\'a rintra ant ël sistema. Për rintré, për piasì ch\'a vada a l\'adrëssa {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3'  => 'Për darmagi soa domanda dë deurbe un cont ciamà "$1" ansima a {{SITENAME}} a l\'é staita bocià. A-i son vàire rason përchè sossì a peula esse rivà. A peul esse ch\'a l\'abia pa compilà giust la domanda, che soe arspòste a sio staite tròp curte, ò pura che an chèich àotra manera a l\'abia falì da rintré ant ël criteri d\'aprovassion. A peul esse che ant sël sit a sio specificà dle liste postaj ch\'a peul dovré për ciamé pì d\'anformassion ansima ai criteri d\'aprovassion dovrà.',
	'confirmaccount-email-body4'  => 'Për darmagi soa domanda dë deurbe un cont ciamà "$1" ansima a Betawiki a l\'é staita bocià. $2 A peul esse che ant sël sit a sio specificà dle liste postaj ch\'a peul dovré për ciamé pì d\'anformassion ansima ai criteri d\'aprovassion dovrà.',
	'confirmaccount-email-body5'  => 'Anans che soa domanda dë deurbe un cont ciamà "$1" ansima a {{SITENAME}} a peula esse acetà, a dovrìa lassene dj\'anformassion adissionaj. $2 A peul esse che ant sël sit a sio specificà dle liste postaj ch\'a peul dovré për ciamé pì d\'anformassion ansima ai criteri d\'aprovassion dovrà.',
);

$wgConfirmAccountMessages['rm'] = array(
	'confirmaccount-name'         => 'Num d\'utilisader',
	'confirmaccount-real'         => 'Num:',
	'confirmaccount-real-q'       => 'Num',
);

$wgConfirmAccountMessages['sk'] = array(
	'requestaccount'              => 'Vyžiadať účet',
	'requestaccount-text'         => '\'\'\'Vyplnením a odoslaním nasledovného formulára vyžiadate používateľský účet\'\'\'. Uistite sa, že ste si pred vyžiadaním účtu najskôr prečítali [[{{NS:PROJECT}}:Podmienky použitia|Podmienky použitia]]. Keď bude účet schválený, príde vám emailom oznámenie a bude možné prihlásiť sa na [[Special:Userlogin]].',
	'requestaccount-dup'          => '\'\'\'Pozn.: Už ste prihlásený ako zaregistrovaný používateľ.\'\'\'',
	'requestaccount-legend1'      => 'Používateľský účet',
	'requestaccount-legend2'      => 'Osobné informácie',
	'requestaccount-legend3'      => 'Ostatné informácie',
	'requestaccount-acc-text'     => 'Na vašu emailovú adresu bude po odoslaní žiadosti zaslaná potvrdzujúca správa. Prosím, reagujte na ňu kliknutím na odkaz v nej. Potom ako bude váš účet vytvorený, dostanete emailom heslo k nemu.',
	'requestaccount-ext-text'     => 'Nasledovné informácie budú držané v tajnosti a použijú sa iba na účel tejto žiadosti. Možno budete chcieť uviesť kontakty ako telefónne číslo, ktoré môžu pomôcť pri potvrdení.',
	'requestaccount-bio-text'     => 'Vaša biografia bude prvotným obsahom vašej používateľskej stránky. Pokúste sa uviesť všetky referencie. Zvážte, či ste ochotní zverejniť tieto informácie. Vaše meno je možné zmeniť pomocou [[Special:Preferences]].',
	'requestaccount-real'         => 'Skutočné meno:',
	'requestaccount-same'         => '(rovnaké ako skutočné meno)',
	'requestaccount-email'        => 'Emailová adresa:',
	'requestaccount-bio'          => 'Osobná biografia:',
	'requestaccount-notes'        => 'Ďalšie poznámky:',
	'requestaccount-urls'         => 'Zoznam webstránok, ak nejaké sú (jednu na každý riadok):',
	'requestaccount-agree'        => 'Musíte osvedčiť, že vaše skutočné meno je správne a že súhlasíte s našimi Podmienkami použitia.',
	'requestaccount-inuse'        => 'Používateľské meno už bolo vyžiadané v prebiehajúcej žiadosti o účet.',
	'requestaccount-tooshort'     => 'Vaša biografia musí mať aspoň $1 slov.',
	'requestaccount-tos'          => 'Prečítal som a súhlasím, že budem dodržiavať [[{{NS:PROJECT}}:Podmienky používania služby|Podmienky používania služby]] {{GRAMMAR:genitív|{{SITENAME}}}}. Meno, ktoré som uviedol ako „Skutočné meno“ je naozaj moje občianske meno.',
	'requestaccount-submit'       => 'Požiadať o účet',
	'requestaccount-sent'         => 'Vaša žiadosť o účet bola úspešne odoslaná a teraz sa čaká na jej kontrolu.',
	'request-account-econf'       => 'Vaša emailová adresa bola potvrdená a v takomto tvare sa uvedie vo vašej žiadosti o účet.',
	'requestaccount-email-subj'   => 'potvrdenie e-mailovej adresy pre {{GRAMMAR:akuzatív|{{SITENAME}}}}',
	'requestaccount-email-body'   => 'Niekto, pravdepodobne vy z IP adresy $1, zaregistroval účet
"$2" s touto e-mailovou adresou na {{GRAMMAR:lokál|{{SITENAME}}}}.

Pre potvrdenie, že tento účet skutočne patrí vám a pre aktivovanie
e-mailových funkcií na {{GRAMMAR:lokál|{{SITENAME}}}}, otvorte tento odkaz vo vašom prehliadači:

$3

Ak ste to *neboli* vy, neotvárajte odkaz. Tento potvrdzovací kód
vyprší o $4.',
	'acct_request_throttle_hit'   => 'Prepáčte, už ste požiadali o vytvorenie $1 účtov. Nemôžete ich odoslať viac žiadostí.',
	'requestaccount-loginnotice'  => 'Aby ste dostali používateľský účet, musíte \'\'\'[[Special:RequestAccount|oň požiadať]]\'\'\'.',
	'confirmaccounts'             => 'Potvrdiť žiadosti o účet',
	'confirmaccount-list'         => 'Nižšie je zoznam žiadostí o účet, ktoré čakajú na schválenie. Schválené účty budú vytvorené a odstránené z tohoto zoznamu. Odmietnuté účty budú jednoducho odstránené z tohoto zoznamu.',
	'confirmaccount-list2'        => 'Nižšie je zoznam nedávno odmietnutých žiadostí o účet, ktoré môžu byť automaticky odstránené po niekoľkých dňoch. Ešte stále ich môžete schváliť a vytvoriť z nich platné účty, hoci by ste sa mali predtým, než tak učiníte, poradiť so správcom, ktorý ich odmietol.',
	'confirmaccount-text'         => 'Toto je žiadosť o používateľský účet na \'\'\'{{GRAMMAR:lokál|{{SITENAME}}}}\'\'\' v štádiu spracovania. Pozorne ju skontrolujte a ak treba, overte všetky dolu uvedené informácie. Máte tiež možnosť vytvoriť účet pod odlišným používateľským menom, to však používajte iba na odstránenie konfliktov s inými menami. Ak jednoducho opustíte túto stránku bez toho, aby ste ju schválili alebo odmietli, zostane v štádiu spracovania.',
	'confirmaccount-none'         => 'Momentálne nie sú žiadne nespracované žiadosti o účet.',
	'confirmaccount-none2'        => 'Momentálne nie sú žiadne odmietnuté žiadosti o účet.',
	'confirmaccount-badid'        => 'Neexistuje žiadna nespracovaná žiadosť o účet zodpovedajúca zadanému ID. Je možné, že už bola spracovaná.',
	'confirmaccount-back'         => 'Zobraziť zoznam nespracovaných účtov',
	'confirmaccount-back2'        => 'Zobraziť zoznam nedávno odmietnutých účtov',
	'confirmaccount-name'         => 'Používateľské meno',
	'confirmaccount-real'         => 'Meno:',
	'confirmaccount-real-q'       => 'Meno',
	'confirmaccount-email'        => 'Email:',#identical but defined
	'confirmaccount-email-q'      => 'Email',#identical but defined
	'confirmaccount-bio'          => 'Biografia:',
	'confirmaccount-bio-q'        => 'Biografia',
	'confirmaccount-notes'        => 'Ďalšie poznámky:',
	'confirmaccount-urls'         => 'Zoznam webstránok:',
	'confirmaccount-nourls'       => '(žiadne neboli poskytnuté)',
	'confirmaccount-review'       => 'Schváliť/odmietnuť',
	'confirmaccount-confirm'      => 'Tlačidlami nižšie môžete prijať alebo odmietnuť túto žiadosť.',
	'confirmaccount-econf'        => '(potvrdený)',
	'confirmaccount-reject'       => '(odmietol [[User:$1|$1]] $2)',
	'confirmaccount-create'       => 'Prijať (vytvoriť účet)',
	'confirmaccount-deny'         => 'Odmietnuť (odstrániť žiadosť)',
	'confirmaccount-reason'       => 'Komentár (bude súčasťou emailu email):',
	'confirmaccount-submit'       => 'Potvrdiť',
	'confirmaccount-acc'          => 'Žiadosť o účet bola úspešne potvrdená; bol vytvorený nový používateľský účet [[User:$1]].',
	'confirmaccount-rej'          => 'Žiadosť o účet bola úspešne odmietnutá.',
	'confirmaccount-summary'      => 'Vytvára sa používateľská stránka s biografiou nového používateľa.',
	'confirmaccount-welc'         => '\'\'\'Vitajte v \'\'{{GRAMMAR:lokál|{{SITENAME}}}}\'\'!\'\'\' Dúfame, že budete prispievať vo veľkom množstve a kvalitne. Pravdepodobne si budete chcieť prečítať [[{{NS:PROJECT}}:Začíname|Začíname]]. Tak ešte raz vitajte a bavte sa!',
	'confirmaccount-wsum'         => 'Vitajte!',
	'confirmaccount-email-subj'   => 'žiadosť o účet {{GRAMMAR:genitív|{{SITENAME}}}}',
	'confirmaccount-email-body'   => 'Vaša žiadosť o účet na {{GRAMMAR:lokál|{{SITENAME}}}} bola schválená. Názov účtu: $1 Heslo: $2 Z bezpečnostných dôvodov si budete musieť pri prvom prihlásení svoje heslo zmeniť. Teraz sa môžete prihlásiť na {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2'  => 'Vaša žiadosť o účet na {{GRAMMAR:lokál|{{SITENAME}}}} bola schválená. Názov účtu: $1 Heslo: $2 $3 Z bezpečnostných dôvodov si budete musieť pri prvom prihlásení svoje heslo zmeniť. Teraz sa môžete prihlásiť na {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3'  => 'Je nám ľúto, ale vaša žiadosť o účet „$1“ na {{GRAMMAR:lokál|{{SITENAME}}}} bola zamietnutá. Je niekoľko dôvodov, prečo sa to mohlo stať. Buď ste nevyplnili formulár správne, neposkytli ste požadovanú dĺžku vašich odpovedí alebo inak ste nesplnili kritériá. Ak sa chcete dozvedieť viac o politike tvorby účtov, na tejto stránke môžete nájsť kontakty.',
	'confirmaccount-email-body4'  => 'Je nám ľúto, ale vaša žiadosť o účet „$1“ na {{GRAMMAR:lokál|{{SITENAME}}}} bola zamietnutá. Ak sa chcete dozvedieť viac o politike tvorby účtov, na tejto stránke môžete nájsť kontakty.',
);

$wgConfirmAccountMessages['yue'] = array(
	# Request account page
	'requestaccount'          => '請求戶口',
	'requestaccount-text'      => '\'\'\'完成並遞交下面嘅表格去請求一個用戶戶口\'\'\'。 
	
	請確認你響請求一個戶口之前，先讀過[[{{NS:PROJECT}}:服務細則|服務細則]]。
	
	一旦個戶口批准咗，你將會收到一個電郵通知訊息，噉個戶口就可以響[[Special:Userlogin]]度用。',
	'requestaccount-dup'      => '\'\'\'留意: 你已經登入咗做一個已經註冊咗嘅戶口。\'\'\'',
	'requestaccount-legend1'   => '用戶戶口',
	'requestaccount-legend2'   => '個人資料',
	'requestaccount-legend3'   => '其它資料',
	'requestaccount-acc-text'  => '當完成請求時，一封確認訊息會發到你嘅電郵地址。
	請響封電郵度撳個確認連結去回應佢。同時，當你個戶口開咗之後，你戶口個密碼將會電郵畀你。',
	'requestaccount-ext-text'  => '下面嘅資料會保密，而且只係會用響呢次請求度。 
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
	'requestaccount-submit'    => '請求戶口',
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
	'requestaccount-loginnotice' => '要拎一個用戶戶口，你一定要\'\'\'[[Special:RequestAccount|請求一個]]\'\'\'。',
	
	# Confirm account page
	'confirmaccounts'       => '確認戶口請求', 
	'confirmaccount-list'    => '下面係等緊批准嘅用戶請求一覽。 
	已經批准嘅戶口將會建立同埋響呢個表度拎走。拒絕咗嘅用戶將會就噉響呢個表度拎走。',
	'confirmaccount-list2'    => '下面係一個先前拒絕過嘅戶口請求，可能會響幾日之後刪除。
	佢哋仍舊可以批准去開一個戶口，但係響你做之前請問吓拒絕嘅管理員先。',
	'confirmaccount-text'    => '呢個係響\'\'\'{{SITENAME}}\'\'\'度等候請求戶口嘅一版。
	請小心去睇過，有需要嘅話，就要確認埋佢下面全部嘅資料。
	要留意嘅係你可以用另一個用戶名去開一個戶口。只係同其他嘅名有衝突嗰陣先至去做。
	
	如果你無確認或者拒絕呢個請求，就噉留低呢版嘅話，佢就會維持等候狀態。',
	'confirmaccount-none'    => '現時無未決定嘅請求。',
	'confirmaccount-none2'   => '現時無最近拒絕嘅戶口請求。',
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
	'confirmaccount-confirm' => '用下面嘅掣去批准或拒絕呢個請求。',
	'confirmaccount-econf'  => '(已批准)',
	'confirmaccount-reject' => '(響$2被[[User:$1|$1]]拒絕)',
	'confirmaccount-create'  => '接受 (開戶口)',
	'confirmaccount-deny'    => '拒絕 (反列示)',
	'confirmaccount-reason' => '註解 (會用響封電郵度):',
	'confirmaccount-submit'  => '確認',
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
	'requestaccount-text'      => '\'\'\'完成并递交以下的表格去请求一个用户账户\'\'\'。 
	
	请确认您在请求一个账户之前，先读过[[{{NS:PROJECT}}:服务细则|服务细则]]。
	
	一旦该账户获得批准，您将会收到一个电邮通知信息，该账户就可以在[[Special:Userlogin]]中使用。',
	'requestaccount-dup'      => '\'\'\'注意: 您已经登入成一个已注册的账户。\'\'\'',
	'requestaccount-legend1'   => '用户账户',
	'requestaccount-legend2'   => '个人资料',
	'requestaccount-legend3'   => '其它资料',
	'requestaccount-acc-text'  => '当完成请求时，一封确认信息会发到您的电邮地址。
	请在该封电邮中点击确认连结去反应它。同时，当您的账户被创建后，您账户的个密码将会电邮给您。',
	'requestaccount-ext-text'  => '以下的资料将会保密，而且只是会用在这次请求中。 
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
	'requestaccount-submit'    => '请求账户',
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
	'requestaccount-loginnotice' => '要取得个用户账户，您一定要\'\'\'[[Special:RequestAccount|请求一个]]\'\'\'。',
	
	# Confirm account page
	'confirmaccounts'       => '确认户口请求', 
	'confirmaccount-list'    => '以下是正在等候批准的用户请求列表。 
	已经批准的账户将会创建以及在这个列表中移除。已拒绝的用户将只会在这个表中移除。',
	'confirmaccount-list2'   => '以下是一个先前拒绝过的帐口请求，可能会在数日后删除。
	它们仍旧可以批准创建一个账户，但是在您作之前请先问拒绝该账户的管理员。',
	'confirmaccount-text'    => '这个是在\'\'\'{{SITENAME}}\'\'\'中等候请求账户的页面。
	请小心阅读，有需要的话，就要同时确认它下面的全部资料。
	要留意的是您可以用另一个用户名字去创建一个账户。只有其他的名字有冲突时才需要去作。
	
	如果你无确认或者拒绝这个请求，只留下这页面的话，它便会维持等候状态。',
	'confirmaccount-none'    => '现时没有未决定的请求。',
	'confirmaccount-none2'   => '现时没有最近拒绝的账户请求。',
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
	'confirmaccount-confirm' => '用以下的按钮去批准或拒绝这个请求。',
	'confirmaccount-econf'  => '(已批准)',
	'confirmaccount-reject' => '(于$2被[[User:$1|$1]]拒绝)',
	'confirmaccount-create'  => '接受 (创建账户)',
	'confirmaccount-deny'    => '拒绝 (反列示)',
	'confirmaccount-reason' => '注解 (在电邮中使用):',
	'confirmaccount-submit'  => '确认',
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
	'requestaccount-text'      => '\'\'\'完成並遞交以下的表格去請求一個用戶帳戶\'\'\'。 
	
	請確認您在請求一個帳戶之前，先讀過[[{{NS:PROJECT}}:服務細則|服務細則]]。
	
	一旦該帳戶獲得批准，您將會收到一個電郵通知訊息，該帳戶就可以在[[Special:Userlogin]]中使用。',
	'requestaccount-dup'      => '\'\'\'注意: 您已經登入成一個已註冊的帳戶。\'\'\'',
	'requestaccount-legend1'   => '用戶帳戶',
	'requestaccount-legend2'   => '個人資料',
	'requestaccount-legend3'   => '其它資料',
	'requestaccount-acc-text'  => '當完成請求時，一封確認訊息會發到您的電郵地址。
	請在該封電郵中點擊確認連結去回應它。同時，當您的帳戶被創建後，您帳戶的個密碼將會電郵給您。',
	'requestaccount-ext-text'  => '以下的資料將會保密，而且只是會用在這次請求中。 
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
	'requestaccount-submit'    => '請求帳戶',
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
	'requestaccount-loginnotice' => '要取得個用戶帳戶，您一定要\'\'\'[[Special:RequestAccount|請求一個]]\'\'\'。',
	
	# Confirm account page
	'confirmaccounts'       => '確認戶口請求', 
	'confirmaccount-list'    => '以下是正在等候批准的用戶請求列表。 
	已經批准的帳戶將會創建以及在這個列表中移除。已拒絕的用戶將只會在這個表中移除。',
	'confirmaccount-list2'   => '以下是一個先前拒絕過的帳口請求，可能會在數日後刪除。
	它們仍舊可以批准創建一個帳戶，但是在您作之前請先問拒絕該帳戶的管理員。',
	'confirmaccount-text'    => '這個是在\'\'\'{{SITENAME}}\'\'\'中等候請求帳戶的頁面。
	請小心閱讀，有需要的話，就要同時確認它下面的全部資料。
	要留意的是您可以用另一個用戶名字去創建一個帳戶。只有其他的名字有衝突時才需要去作。
	
	如果你無確認或者拒絕這個請求，只留下這頁面的話，它便會維持等候狀態。',
	'confirmaccount-none'    => '現時沒有未決定的請求。',
	'confirmaccount-none2'   => '現時沒有最近拒絕的帳戶請求。',
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
	'confirmaccount-confirm' => '用以下的按鈕去批准或拒絕這個請求。',
	'confirmaccount-econf'  => '(已批准)',
	'confirmaccount-reject' => '(於$2被[[User:$1|$1]]拒絕)',
	'confirmaccount-create'  => '接受 (創建帳戶)',
	'confirmaccount-deny'    => '拒絕 (反列示)',
	'confirmaccount-reason' => '註解 (在電郵中使用):',
	'confirmaccount-submit'  => '確認',
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
