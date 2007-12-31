<?php
/**
 * Internationalisation file for ConfirmAccount extension.
 *
 * @addtogroup Extensions
*/

$messages = array();

$messages['en'] = array(
	# Request account page
	'requestaccount'           => 'Request account',
	'requestaccount-text'      => '\'\'\'Complete and submit the following form to request a user account\'\'\'. 
	
	Make sure that you first read the [[{{MediaWiki:Requestaccount-page}}|Terms of Service]] before requesting an account.
	
	Once the account is approved, you will be emailed a notification message and the account will be usable at 
	[[Special:Userlogin]].',
	'requestaccount-page'      => '{{ns:project}}:Terms of Service',
	'requestaccount-dup'       => '\'\'\'Note: You already are logged in with a registered account.\'\'\'',
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
	'requestaccount-reqtype'  => 'Position:',
	'requestaccount-level-0'  => 'author',
	'requestaccount-level-1'  => 'editor',
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
	'requestaccount-tos'      => 'I have read and agree to abide by the [[{{MediaWiki:Requestaccount-page}}|Terms of Service]] of {{SITENAME}}. 
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
	'requestaccount-email-subj-admin' => '{{SITENAME}} account request',
	'requestaccount-email-body-admin' => 'The account "$1" has request an account and is waiting for confirmation. 
	The e-mail address has been confirmed. You can confirm the request here "$2".',

	'acct_request_throttle_hit' => "Sorry, you have already requested $1 accounts. You can't make any more requests.",
	
	# Add to Special:Login
	'requestaccount-loginnotice' => 'To obtain a user account, you must \'\'\'[[Special:RequestAccount|request one]]\'\'\'.',
	
	# Confirm account page
	'confirmaccounts'         => 'Confirm account requests', 
	'confirmaccount-maintext' => '\'\'\'This page is used to confirm pending account requests at \'\'{{SITENAME}}\'\'\'\'\'.
	
Each account request queue consists of three subqueues, one for open request, one for those that have been put on 
hold by other administrators pending further information, and another for recently rejected requests.	
	
When responding to a request, carefully review it and, if needed, confirm the information contain therein. 
Your actions will be privately logged. You are also expected to review any activity that takes place here aside 
from what you do yourself.', 
	'confirmaccount-list'     => 'Below is a list of account requests awaiting approval. 
	Approved accounts will be created and removed from this list. Rejected accounts will simply be deleted from this 
	list.',
	'confirmaccount-list2'    => 'Below is a list recently rejected account requests which may automatically be deleted 
	once several days old. They can still be approved into accounts, though you may want to first consult the rejecting 
	admin before doing so.',
	'confirmaccount-text'     => 'This is a pending request for a user account at \'\'\'{{SITENAME}}\'\'\'. 
	
	Carefully review the below information. If you are approving this request, use the position dropdown to set the 
	account status of the user. Edits made to the the application biography will not affect any permanent credential
	storage. Note that you can choose to create the account under a different username. Use this only to avoid 
	collisions with other names.
	
	If you simply leave this page without confirming or denying this request, it will remain pending.',
	'confirmaccount-none-o'   => 'There are currently no open pending account requests in this list.',
	'confirmaccount-none-h'   => 'There are currently no held pending account requests in this list.',
	'confirmaccount-none-r'   => 'There are currently no recently rejected account requests in this list.',
	'confirmaccount-real-q'   => 'Name',
	'confirmaccount-email-q'  => 'Email',
	'confirmaccount-bio-q'    => 'Biography',
	'confirmaccount-back'     => 'View open pending account list',
	'confirmaccount-back2'    => 'View recently rejected account list',
	'confirmaccount-showheld' => 'View held pending account list',
	'confirmaccount-review'   => 'Review',
	'confirmaccount-types'    => 'Select an account confirmation queue from below:',
	'confirmaccount-all'      => '(show all queues)',
	'confirmaccount-type'     => 'Selected queue:',
	'confirmaccount-type-0'   => 'prospective authors',
	'confirmaccount-type-1'   => 'prospective editors',
	'confirmaccount-q-open'   => 'open requests',
	'confirmaccount-q-held'   => 'held requests',
	'confirmaccount-q-rej'    => 'recently rejected requests',
	
	'confirmaccount-badid'    => 'There is no pending request corresponding to the given ID. It may have already been handled.',
	'confirmaccount-legend1'  => 'User account',
	'confirmaccount-legend2'  => 'Personal information',
	'confirmaccount-legend3'  => 'Other information',
	'confirmaccount-name'     => 'Username',
	'confirmaccount-real'     => 'Name:',
	'confirmaccount-email'    => 'Email:',
	'confirmaccount-reqtype'  => 'Position:',
	'confirmaccount-pos-0'    => 'author',
	'confirmaccount-pos-1'    => 'editor',
	'confirmaccount-bio'      => 'Biography:',
	'confirmaccount-attach'   => 'Resume/CV:',
	'confirmaccount-notes'    => 'Additional notes:',
	'confirmaccount-urls'     => 'List of websites:',
	'confirmaccount-none-p'   => '(not provided)',
	'confirmaccount-confirm'  => 'Use the options below to accept, deny, or hold this request:',
	'confirmaccount-econf'    => '(confirmed)',
	'confirmaccount-reject'   => '(rejected by [[User:$1|$1]] on $2)',
	'confirmaccount-rational' => 'Rationale given to applicant:',
	'confirmaccount-noreason' => '(none)',
	'confirmaccount-held'     => '(marked "on hold" by [[User:$1|$1]] on $2)',
	'confirmaccount-create'   => 'Accept (create account)',
	'confirmaccount-deny'     => 'Reject (delist)',
	'confirmaccount-hold'     => 'Hold',
	'confirmaccount-spam'     => 'Spam (don\'t send email)',
	'confirmaccount-reason'   => 'Comment (will be included in email):',
	'confirmaccount-ip'       => 'IP address:',
	'confirmaccount-submit'   => 'Confirm',
	'confirmaccount-needreason' => 'You must provide a reason in the comment box below.',
	'confirmaccount-canthold' => 'This request is already either on hold or deleted.',
	'confirmaccount-acc'     => 'Account request confirmed successfully; created new user account [[User:$1]].',
	'confirmaccount-rej'     => 'Account request rejected successfully.',
	'confirmaccount-viewing' => '(currently being viewed by [[User:$1|$1]])',
	'confirmaccount-summary' => 'Creating user page with biography of new user.',
	'confirmaccount-welc'    => "'''Welcome to ''{{SITENAME}}''!''' We hope you will contribute much and well. 
	You'll probably want to read the [[{{MediaWiki:Helppage}}|help pages]]. Again, welcome and have fun!",
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

	'usercredentials'        => 'User credentials',
	'usercredentials-leg'    => 'Lookup confirmed credentials for a user',
	'usercredentials-user'   => 'Username:',
	'usercredentials-text'   => 'Below are the validated credentials of the selected user account.',
	'usercredentials-leg1'   => 'User account',
	'usercredentials-leg2'   => 'Personal information',
	'usercredentials-leg3'   => 'Other information',
	'usercredentials-email'  => 'Email:',
	'usercredentials-real'   => 'Real name:',
	'usercredentials-bio'    => 'Biography:',
	'usercredentials-attach' => 'Resume/CV:',
	'usercredentials-notes'  => 'Additional notes:',
	'usercredentials-urls'   => 'List of websites:',
	'usercredentials-ip'     => 'Original IP address:',
	'usercredentials-badid'  => 'No credentials found for this user. Check that the name is spelled correctly.',
);

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'requestaccount'             => 'طلب حساب',
	'requestaccount-text'        => "'''أكمل وابعث الاستمارة التالية لطلب حساب'''. 
	
	تأكد أولا من قراءة [[{{MediaWiki:Requestaccount-page}}|شروط الخدمة]] قبل طلب حساب.
	
	متى تمت الموافقة على الحساب، سيتم إرسال رسالة إخطار إليك والحساب سيصبح قابلا للاستخدام في 
	[[Special:Userlogin]].",
	'requestaccount-page'        => '{{ns:project}}:شروط الخدمة',
	'requestaccount-dup'         => "'''ملاحظة: أنت مسجل الدخول بالفعل بحساب مسجل.'''",
	'requestaccount-legend1'     => 'حساب المستخدم',
	'requestaccount-legend2'     => 'معلومات شخصية',
	'requestaccount-legend3'     => 'معلومات أخرى',
	'requestaccount-acc-text'    => 'سيتم إرسال رسالة تأكيد إلى عنوان بريدك الإلكتروني متى تم بعث هذا الطلب. من فضلك استجب عن طريق الضغط 
	على وصلة التأكيد المعطاة في البريد الإلكتروني. أيضا، كلمة السر الخاصة بك سيتم إرسالها إليك عبر البريد الإلكتروني عندما يتم إنشاء حسابك.',
	'requestaccount-ext-text'    => 'المعلومات التالية سرية وسيتم استخدامها فقط لهذا الطلب. 
ربما تريد أن تكتب معلومات الاتصال كرقم تليفون للمساعدة في تأكيد الهوية.',
	'requestaccount-bio-text'    => 'سيرتك الشخصية ستعرض كالمحتوى الافتراضي لصفحة المستخدم الخاصة بك. حاول تضمين 
	أية شهادات. تأكد من ارتياحك لنشر هذه المعلومات. اسمك يمكن تغييره بواسطة [[Special:Preferences]].',
	'requestaccount-real'        => 'الاسم الحقيقي:',
	'requestaccount-same'        => '(مثل الاسم الحقيقي)',
	'requestaccount-email'       => 'عنوان البريد الإلكتروني:',
	'requestaccount-reqtype'     => 'الموضع:',
	'requestaccount-level-0'     => 'مؤلف',
	'requestaccount-level-1'     => 'محرر',
	'requestaccount-bio'         => 'السيرة الشخصية:',
	'requestaccount-attach'      => 'استكمال أو السيرة الذاتية (اختياري):',
	'requestaccount-notes'       => 'ملاحظات إضافية:',
	'requestaccount-urls'        => 'قائمة مواقع الويب، إن وجدت (افصل بسطور جديدة):',
	'requestaccount-agree'       => 'يجب أن تثبت أن اسمك الحقيقي صحيح و أنك توافق على شروط خدمتنا.',
	'requestaccount-inuse'       => 'اسم المستخدم مستعمل بالفعل في طلب حساب قيد الانتظار',
	'requestaccount-tooshort'    => 'سيرتك يجب أن تتكون على الأقل من $1 كلمة.',
	'requestaccount-exts'        => 'نوع الملف المرفق غير مسموح به.',
	'requestaccount-resub'       => 'ملف سيرتك الذاتية/استكمالك يجب أن يتم إعادة اختياره لأسباب أمنية. اترك الحقل فارغا 
	لو كنت لم تعد تريد إضافة واحد.',
	'requestaccount-tos'         => 'لقد قرأت و أوافق على الالتزام بشروط خدمة {{SITENAME}}.',
	'requestaccount-submit'      => 'طلب حساب',
	'requestaccount-sent'        => 'طلبك للحساب تم إرساله بنجاح وهو بانتظار المراجعة الآن.',
	'request-account-econf'      => 'عنوان بريدك الإلكتروني تم تأكيده وسيتم عرضه كما هو في 
طلب حسابك.',
	'requestaccount-email-subj'  => '{{SITENAME}} تأكيد عنوان البريد الإلكتروني من',
	'requestaccount-email-body'  => 'شخص ما، على الأرجح أنت من عنوان الأيبي $1، طلب حساب "$2" بعنوان البريد الإلكتروني هذا على {{SITENAME}}.

لتأكيد أن هذا الحساب ينتمي إليك فعلا على {{SITENAME}}، افتح هذه الوصلة في متصفحك:

$3

لو أن الحساب تم إنشاؤه، فقط أنت سيتم إرسال كلمة السر إليه. لو أن هذا *ليس* أنت، لا تتبع الوصلة. 
كود التأكيد سينتهي في $4.',
	'acct_request_throttle_hit'  => 'عذرا، لقد طلبت بالفعل $1 حساب. لا يمكنك عمل المزيد من الطلبات.',
	'requestaccount-loginnotice' => "للحصول على حساب، يجب عليك '''[[Special:RequestAccount|طلب واحد]]'''.",
	'confirmaccounts'            => 'تأكيد طلبات الحسابات',
	'confirmaccount-maintext'    => "'''هذه الصفحة تستخدم لتأكيد طلبات الحساب قيد الانتظار في ''{{SITENAME}}'''''.

كل طابور طلب حساب يتكون من ثلاثة طوابير فرعية، واحد للطلبات المفتوحة، واحد لتلك التي تم وضعها قيد الانتظار بواسطة الإداريين الآخرين بانتظار المزيد من المعلومات، وآخر للطلبات المرفوضة حديثا.

عند الرد على طلب، راجعه بحرص، عند الحاجة، تأكد من المعلومات الموجودة فيه.  
أفعالك ستسجل بسرية. أنت أيضا يتوقع منك أن تراجع أي نشاط يحدث هنا بخلاف ما تفعله بنفسك.",
	'confirmaccount-list'        => 'بالأسفل قائمة بطلبات الحسابات قيد الانتظار. 
	الحسابات التي تمت الموافقة عليها سيتم إنشاؤها وإزالتها من هذه القائمة. الحسابات المرفوضة سيتم ببساطة حذفها من هذه 
القائمة.',
	'confirmaccount-list2'       => 'بالأسفل قائمة بطلبات الحسابات المرفوضة حديثا والتي ربما يتم حذفها تلقائيا 
	عندما يكون عمرها عدة أيام. مازال بالإمكان الموافقة عليهم كحسابات، ولكنك ربما ترغب في استشارة الإداري الرافض 
قبل فعل هذا.',
	'confirmaccount-text'        => "هذا طلب حساب قيد الانتظار في '''{{SITENAME}}'''. 
	راجعه بحرص و لو دعت الحاجة، أكد، كل المعلومات بالأسفل. لاحظ أنه يمكنك اختيار إنشاء الحساب باسم مستخدم آخر 
	. استخدم هذا فقط لتجنب	الاصطدامات مع الأسماء الأخرى.
	
لو تركت ببساطة هذه الصفحة بدون تأكيد أو رفض الحساب، سيبقى قيد الانتظار.",
	'confirmaccount-none-o'      => 'لا توجد حاليا طلبات حساب قيد الانتظار مفتوحة في هذه القائمة.',
	'confirmaccount-none-h'      => 'لا توجد حاليا طلبات حساب قيد الانتظار محجوزة في هذه القائمة.',
	'confirmaccount-none-r'      => 'لا توجد حاليا طلبات حساب مرفوضة حديثا في هذه القائمة.',
	'confirmaccount-real-q'      => 'الاسم',
	'confirmaccount-email-q'     => 'البريد الإلكتروني',
	'confirmaccount-bio-q'       => 'السيرة الشخصية',
	'confirmaccount-back'        => 'عرض قائمة الحسابات قيد الانتظار',
	'confirmaccount-back2'       => 'عرض قائمة الحسابات المرفوضة حديثا',
	'confirmaccount-showheld'    => 'عرض قائمة الحسابات قيد الانتظار',
	'confirmaccount-review'      => 'قبول/رفض',
	'confirmaccount-types'       => 'اختر طابور تأكيد حساب من الأسفل:',
	'confirmaccount-all'         => '(عرض كل الطوابير)',
	'confirmaccount-type'        => 'الطابور المختار:',
	'confirmaccount-type-0'      => 'مؤلفون سابقون',
	'confirmaccount-type-1'      => 'محررون سابقون',
	'confirmaccount-q-open'      => 'طلبات مفتوحة',
	'confirmaccount-q-held'      => 'طلبات قيد الانتظار',
	'confirmaccount-q-rej'       => 'طلبات مرفوضة حديثا',
	'confirmaccount-badid'       => 'لا يوجد طلب قيد الانتظار يوافق الرقم المعطى. ربما يكون قد تمت معالجته.',
	'confirmaccount-legend1'     => 'حساب مستخدم',
	'confirmaccount-legend2'     => 'معلومات شخصية',
	'confirmaccount-legend3'     => 'معلومات أخرى',
	'confirmaccount-name'        => 'اسم المستخدم',
	'confirmaccount-real'        => 'الاسم:',
	'confirmaccount-email'       => 'البريد الإلكتروني:',
	'confirmaccount-reqtype'     => 'الموضع:',
	'confirmaccount-pos-0'       => 'مؤلف',
	'confirmaccount-pos-1'       => 'محرر',
	'confirmaccount-bio'         => 'السيرة الشخصية:',
	'confirmaccount-attach'      => 'الاستكمال/السيرة الذاتية:',
	'confirmaccount-notes'       => 'ملاحظات إضافية:',
	'confirmaccount-urls'        => 'قائمة مواقع الويب:',
	'confirmaccount-none-p'      => '(غير متوفرة)',
	'confirmaccount-confirm'     => 'استخدم الأزرار بالأسفل لقبول هذا الطلب أو رفضه.',
	'confirmaccount-econf'       => '(تم تأكيده)',
	'confirmaccount-reject'      => '(تم رفضه بواسطته [[User:$1|$1]] في $2)',
	'confirmaccount-rational'    => 'السبب المعطى للمتقدم:',
	'confirmaccount-noreason'    => '(لا شيء)',
	'confirmaccount-held'        => '(تم التعليم "قيد الانتظار" بواسطة [[User:$1|$1]] في $2)',
	'confirmaccount-create'      => 'قبول (إنشاب الحساب)',
	'confirmaccount-deny'        => 'رفض (إزالة من القائمة)',
	'confirmaccount-hold'        => 'انتظر',
	'confirmaccount-spam'        => 'سبام (لا ترسل البريد الإلكتروني)',
	'confirmaccount-reason'      => 'تعليق (سيضم في البريد الإلكتروني):',
	'confirmaccount-ip'          => 'عنوان الأيبي:',
	'confirmaccount-submit'      => 'تأكيد',
	'confirmaccount-needreason'  => 'يجب أن تحدد سببا في صندوق التعليق بالأسفل.',
	'confirmaccount-canthold'    => 'هذا الطلب بالفعل إما قيد الانتظار أو محذوف.',
	'confirmaccount-acc'         => 'طلب الحساب تم تأكيده بنجاح؛ أنشأ حسابا جديدا [[User:$1]].',
	'confirmaccount-rej'         => 'طلب الحساب تم رفضه بنجاح.',
	'confirmaccount-viewing'     => '(حاليا يتم مراجعته بواسطة [[User:$1|$1]])',
	'confirmaccount-summary'     => 'إنشاء صفحة المستخدم مع سيرة المستخدم الجديد.',
	'confirmaccount-welc'        => "'''مرحبا إلى ''{{SITENAME}}''!''' نأمل أن تساهم كثيرا وجيدا. 
	على الأرجح ستريد قراءة [[{{MediaWiki:Helppage}}|البداية]]. مجددا، مرحبا واستمتع!",
	'confirmaccount-wsum'        => 'مرحبا!',
	'confirmaccount-email-subj'  => '{{SITENAME}} طلب حساب',
	'confirmaccount-email-body'  => 'طلبك لحساب تمت الموافقة عليه في {{SITENAME}}.

اسم الحساب: $1

كلمة السر: $2

لمتطلبات السرية ستضطر إلى تغيير كلمة السر الخاصة بك عند أول دخول. للدخول، من فضلك اذهب إلى 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'طلبك لحساب تمت الموافقة عليه في {{SITENAME}}.

اسم الحساب: $1

كلمة السر: $2

$3

لمتطلبات السرية ستضطر إلى تغيير كلمة السر الخاصة بك عند أول دخول. للدخول، من فضلك اذهب إلى 
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'عذرا, طلبك لحساب "$1" تم رفضه في {{SITENAME}}.

هناك عدة طرق لحدوث هذا. ربما تكون لم تملأ الاستمارة بشكل صحيح، أو لم توفر الطول اللازم في ردودك، أو فشلت في موافاة بعد بنود السياسة. ربما تكون هناك قوائم اتصال على الموقع يمكنك استخدامها لو كنت تريد معرفة المزيد حول سياسة حساب المستخدم.',
	'confirmaccount-email-body4' => 'عذرا، طلبك لحساب "$1" تم رفضه في {{SITENAME}}.

$2

ربما تكون هناك قوائم اتصال على الموقع يمكنك استخدامها لو كنت تريد معرفة المزيد حول سياسة حساب المستخدم.',
	'confirmaccount-email-body5' => 'قبل أن يتم قبول طلبك للحساب "$1" في {{SITENAME}} 
	يجب أن توفر أولا بعض المعلومات الإضافية.

$2

ربما تكون هناك قوائم اتصال في الموقع يمكنك استخدامها لو أردت أن تعرف المزيد حول سياسة حساب المستخدم.',
	'usercredentials'            => 'مؤهلات المستخدم',
	'usercredentials-leg'        => 'ابحث عن المؤهلات المؤكدة لمستخدم',
	'usercredentials-user'       => 'اسم المستخدم:',
	'usercredentials-text'       => 'بالأسفل المؤهلات المؤكدة لحساب المستخدم المختار.',
	'usercredentials-leg1'       => 'حساب مستخدم',
	'usercredentials-leg2'       => 'معلومات شخصية',
	'usercredentials-leg3'       => 'معلومات أخرى',
	'usercredentials-email'      => 'البريد الإلكتروني:',
	'usercredentials-real'       => 'الاسم الحقيقي:',
	'usercredentials-bio'        => 'السيرة الشخصية:',
	'usercredentials-attach'     => 'استكمال/سيرة شخصية:',
	'usercredentials-notes'      => 'ملاحظات إضافية:',
	'usercredentials-urls'       => 'قائمة مواقع الويب:',
	'usercredentials-ip'         => 'عنوان الأيبي الأصلي:',
	'usercredentials-badid'      => 'لا مؤهلات تم العثور عليها لهذا المستخدم. تأكد من أن الاسم مكتوب بطريقة صحيحة.',
);

$messages['bcl'] = array(
	'requestaccount-legend2'       => 'Personal na impormasyon',
	'requestaccount-legend3'       => 'Ibang impormasyon',
	'requestaccount-real'         => 'Totoong pangaran:',
	'requestaccount-same'         => '(pareho sa  totoong pangaran)',
	'confirmaccount-real'         => 'Pangaran',
	'confirmaccount-submit'        => 'Kompermaron',
	'confirmaccount-wsum'         => 'Dagos!',
);

/** Bulgarian (Български)
 * @author DCLXVI
 */
$messages['bg'] = array(
	'requestaccount-page'        => '{{ns:project}}:Условия за ползване',
	'requestaccount-dup'         => "'''Забележка: Вече сте влезли с регистрирана потребителска сметка.'''",
	'requestaccount-legend1'     => 'Потребителска сметка',
	'requestaccount-legend2'     => 'Лични данни',
	'requestaccount-legend3'     => 'Друга информация',
	'requestaccount-real'        => 'Име и фамилия:',
	'requestaccount-same'        => '(съвпада с името)',
	'requestaccount-email'       => 'Електронна поща:',
	'requestaccount-notes'       => 'Допълнителни бележки:',
	'requestaccount-submit'      => 'Изпращане на заявката',
	'requestaccount-loginnotice' => "За да получите потребителска сметка, необходимо е да '''[[Special:RequestAccount|изпратите заявка]]'''.",
	'confirmaccount-real-q'      => 'Име',
	'confirmaccount-legend1'     => 'Потребителска сметка',
	'confirmaccount-name'        => 'Потребителско име',
	'confirmaccount-real'        => 'Име:',
	'confirmaccount-email'       => 'Електронна поща:',
	'confirmaccount-pos-0'       => 'автор',
	'confirmaccount-pos-1'       => 'редактор',
	'confirmaccount-notes'       => 'Допълнителни бележки:',
	'confirmaccount-urls'        => 'Списък с уебсайтове:',
	'confirmaccount-reject'      => '(отказана от [[Потребител:$1|$1]] на $2)',
	'confirmaccount-held'        => '(отбелязана "за изчакване" от [[Потребител:$1|$1]] на $2)',
	'confirmaccount-hold'        => 'Задържане',
	'confirmaccount-ip'          => 'IP адрес:',
	'usercredentials-leg1'       => 'Потребителска сметка',
	'usercredentials-leg2'       => 'Лична информация',
	'usercredentials-leg3'       => 'Друга информация',
	'usercredentials-email'      => 'Електронна поща:',
	'usercredentials-real'       => 'Име и фамилия:',
	'usercredentials-bio'        => 'Биография:',
	'usercredentials-notes'      => 'Допълнителни бележки:',
);

$messages['br'] = array(
	'confirmaccount-email-q'      => 'Postel',
);

// German translations (by Rrosenfeld)
$messages['de'] = array(
	# Request account page
	'requestaccount'          => 'Benutzerkonto beantragen',
	'requestaccount-text'     => '\'\'\'Fülle das folgende Formular aus und schick es ab, um ein Benutzerkonto zu beantragen\'\'\'. 

	Bitte lies zunächst die [[{{MediaWiki:Requestaccount-page}}|Nutzungsbedingungen]] bevor du ein Benutzerkonto beantragst.

	Sobald das Konto bestätigt wurde, wirst du per E-Mail benachrichtigt und du kannst dich unter „[[{{ns:special}}:Userlogin|Anmelden]]“ einloggen.',
	'requestaccount-page'     => '{{ns:project}}:Nutzungsbedingungen',
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
	'requestaccount-tos'      => 'Ich habe die [[{{MediaWiki:Requestaccount-page}}|Benutzungsbedingungen]] von {{SITENAME}} gelesen und akzeptiere sie.
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
	'confirmaccounts'           => 'Benutzerkonto-Anträge bestätigen', 
	'confirmaccount-list'       => 'Unten findest du eine Liste von noch zu bearbeitenden Benutzerkonto-Anträgen.
	Bestätigte Konten werden angelegt und aus der Liste entfernt. Abgelehnte Konten werden einfach aus der Liste gelöscht.',
	'confirmaccount-text'       => 'Dies ist ein Antrag auf ein Benutzerkonto bei \'\'\'{{SITENAME}}\'\'\'. Prüfe alle unten
	stehenden Informationen gründlich und bestätige die Informationen wenn möglich. Bitte beachte, dass du den Zugang bei Bedarf unter
	einem anderen Benutzernamen anlegen kannst. Du solltest dies nur nutzen, um Kollisionen mit anderen Namen zu vermeiden.

	Wenn du diese Seite verlässt, ohne das Konto zu bestätigen oder abzulehnen, wird der Antrag offen stehen bleiben.',
	'confirmaccount-none-o'     => 'Momentan gibt es keine offenen Benutzeranträge auf dieser Liste.',
	'confirmaccount-none-h'     => 'Momentan gibt es keine Anträge im „abwarten“-Status auf dieser Liste.',
	'confirmaccount-none-r'     => 'Momentan gibt es keine kürzlich abgelehnten Benutzeranträge auf dieser Liste.',
	'confirmaccount-badid'      => 'Momentan gibt es keinen Benutzerantrag zur angegebenen ID. Möglicherweise wurde er bereits bearbeitet.',
	'confirmaccount-back'       => 'Liste der offenen Anträge ansehen',
	'confirmaccount-back2'      => 'Liste der kürzlich abgelehnten Anträge ansehen',
	'confirmaccount-showheld'   => 'Liste der Anträge auf „abwarten“-Status anzeigen',
	'confirmaccount-name'       => 'Benutzername',
	'confirmaccount-real'       => 'Name:',
	'confirmaccount-real-q'     => 'Name',
	'confirmaccount-email'      => 'E-Mail:',
	'confirmaccount-email-q'    => 'E-Mail',
	'confirmaccount-bio'        => 'Biographie:',
	'confirmaccount-bio-q'      => 'Biographie',
	'confirmaccount-attach'     => 'Lebenslauf:',
	'confirmaccount-urls'       => 'Liste der Webseiten:',
	'confirmaccount-none-p'     => '(Nichts angegeben)',
	'confirmaccount-review'     => 'Bestätigen/Ablehnen',
	'confirmaccount-confirm'    => 'Benutze die folgende Auswahl, um den Antrag zu akzeptieren, abzulehnen oder noch zu warten.',
	'confirmaccount-econf'      => '(bestätigt)',
	'confirmaccount-reject'     => '(abgelehnt durch [[User:$1|$1]] am $2)',
	'confirmaccount-held'       => '(markiert als „abwarten“ durch [[User:$1|$1]] am $2)',
	'confirmaccount-create'     => 'Bestätigen (Konto anlegen)',
	'confirmaccount-deny'       => 'Ablehnen (Antrag löschen)',
	'confirmaccount-hold'       => 'Markiert als „abwarten“',
	'confirmaccount-reason'     => 'Begründung (wird in die Mail an den Antragsteller eingefügt):',
	'confirmaccount-ip'         => 'IP-Addresse:',
	'confirmaccount-submit'     => 'Abschicken',
	'confirmaccount-needreason' => 'Du musst eine Begründung eingeben.',
	'confirmaccount-canthold'   => 'Dieser Antrag wurde bereits als „abwarten“ markiert oder gelöscht.',
	'confirmaccount-acc'        => 'Benutzerantrag erfolgreich bestätigt; Benutzer [[{{ns:User}}:$1]] wurde angelegt.',
	'confirmaccount-rej'        => 'Benutzerantrag wurde abgelehnt.',
	'confirmaccount-summary'    => 'Erzeuge Benutzerseite mit der Biographie des neuen Benutzers.',
	'confirmaccount-welc'       => "'''Willkommen bei ''{{SITENAME}}''!''' Wir hoffen, dass du viele gute Informationen beisteuerst.
	Möglicherweise möchtest Du zunächst die [[{{MediaWiki:Helppage}}|Ersten Schritte]] lesen. Nochmal: Willkommen und hab' Spaß!~",
	'confirmaccount-wsum'       => 'Willkommen!',
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

$messages['el'] = array(
	'requestaccount-legend1'      => 'Λογαριασμός χρήστη',
	'requestaccount-legend2'      => 'Προσωπικές πληροφορίες',
	'requestaccount-legend3'      => 'Άλλες πληροφορίες',
	'requestaccount-real'         => 'Πραγματικό όνομα:',
	'requestaccount-email'        => 'Διεύθυνση ηλεκτρονικού ταχυδρομείου:',
	'requestaccount-bio'          => 'Προσωπική βιογραφία:',
	'confirmaccount-name'         => 'Όνομα χρήστη',
	'confirmaccount-real'         => 'Όνομα:',
	'confirmaccount-real-q'       => 'Όνομα',
	'confirmaccount-email'        => 'Ηλεκτρονικό Ταχυδρομείο:',
	'confirmaccount-email-q'      => 'Ηλεκτρονικό Ταχυδρομείο:',
	'confirmaccount-bio'          => 'Βιογραφία:',
	'confirmaccount-bio-q'        => 'Βιογραφία',
	'confirmaccount-urls'         => 'Λίστα των ιστοσελίδων:',
	'confirmaccount-create'       => 'Αποδοχή (Δημιουργία λογαριασμού)',
	'confirmaccount-ip'           => 'διεύθυνση ΙΡ:',
	'confirmaccount-wsum'         => 'Καλός ήρθατε!',
);

$messages['ext'] = array(
	'requestaccount-legend1'       => 'Cuenta d´usuáriu',
	'requestaccount-legend2'       => 'Enhormación presonal',
	'requestaccount-legend3'       => 'Mas enhormación',
	'requestaccount-real'         => 'Nombri verdaeru:',
	'confirmaccount-name'         => 'Nombri d´usuáriu',
	'confirmaccount-real'         => 'Nombri',
	'confirmaccount-wsum'         => 'Bienviniu!',
);

/** French (Français)
 * @author Grondin
 * @author Sherbrooke
 * @author SPQRobin
 * @author Dereckson
 */
$messages['fr'] = array(
	'requestaccount'             => 'Demande de compte utilisateur',
	'requestaccount-text'        => "'''Remplissez et envoyez le formulaire ci-dessous pour demander un compte d’utilisateur.'''. 
	
	Assurez-vous que vous ayez déjà lu [[{{MediaWiki:Requestaccount-page}}|les conditions d’utilisation]] avant de faire votre demande de compte.
	
	Une fois que le compte est accepté, vous recevrez un courrier électronique vous notifiant que votre compte pourra être utilisé sur
	[[Special:Userlogin]].",
	'requestaccount-page'        => "{{ns:project}}:Conditions d'utilisation",
	'requestaccount-dup'         => "'''Note : Vous êtes déjà sur une session avec un compte enregistré.'''",
	'requestaccount-legend1'     => 'Compte utilisateur',
	'requestaccount-legend2'     => 'Informations personnelles',
	'requestaccount-legend3'     => 'Autres informations',
	'requestaccount-acc-text'    => 'Un message de confirmation sera envoyé à votre adresse électronique une fois que la demande aura été envoyée. Dans le courrier reçu, cliquez sur le lien correspondant à la confirmation de votre demande. Aussi, un mot de passe sera envoyé par courriel quand votre compte sera créé.',
	'requestaccount-ext-text'    => 'L’information suivante reste privée et ne pourra être utilisée que pour cette requête. 
	Vous avez la possibilité de lister des contacts tels qu’un numéro de téléphone pour obtenir une assistance pour confirmer votre identité.',
	'requestaccount-bio-text'    => 'Votre biographie sera mise par défaut sur votre page utilisateur. Essayez d’y mettre vos recommandations. Assurez-vous que vous pouvez diffuser sans crainte les informations. Votre nom peut être changé en utilisant [[Special:Preferences]].',
	'requestaccount-real'        => 'Nom réel :',
	'requestaccount-same'        => '(nom figurant dans votre état civil)',
	'requestaccount-email'       => 'Adresse électronique :',
	'requestaccount-reqtype'     => 'Situation :',
	'requestaccount-level-0'     => 'auteur',
	'requestaccount-level-1'     => 'éditeur',
	'requestaccount-bio'         => 'Biographie personnelle:',
	'requestaccount-attach'      => 'CV/Résumé (facultatif)',
	'requestaccount-notes'       => 'Notes supplémentaires :',
	'requestaccount-urls'        => "Liste des sites Web. S'il y en a plusieurs, séparez-les par un saut de ligne :",
	'requestaccount-agree'       => 'Vous devez certifier que votre nom réel est correct et que vous acceptez les conditions d’utilisations du service.',
	'requestaccount-inuse'       => 'Le nom d’utilisateur est déjà utilisé dans une requête en cours d’approbation.',
	'requestaccount-tooshort'    => 'Votre biographie doit avoir au moins {{PLURAL:$1|$1 mot|$1 mots}}.',
	'requestaccount-exts'        => 'Le téléchargement des fichiers joints n’est pas permis.',
	'requestaccount-resub'       => 'Votre fichier de CV/résumé doit être sélectionné une nouvelle fois pour des raisons de sécurité. Laissez le champ vierge si vous ne désirez plus le joindre.',
	'requestaccount-tos'         => 'J’ai lu et j’accepte de respecter les [[{{MediaWiki:Requestaccount-page}}|termes concernant les conditions d’utilisation des services]] de {{SITENAME}}.',
	'requestaccount-submit'      => 'Demande de compte utilisateur.',
	'requestaccount-sent'        => 'Votre demande de compte utilisateur a été envoyée avec succès et a été mise dans la liste d’attente d’approbation.',
	'request-account-econf'      => 'Votre adresse courriel a été confirmée et sera listée telle quelle dans votre demande de compte.',
	'requestaccount-email-subj'  => '{{SITENAME}} confirmation d’adresse courriel.',
	'requestaccount-email-body'  => 'Quelqu’un, vous probablement, a formulé, depuis l’adresse IP $1, une demande de compte utilisateur « $2 » avec cette adresse courriel sur {{SITENAME}}.

Pour confirmer que ce compte vous appartient réelement sur {{SITENAME}}, vous êtes prié d’ouvrir ce lien dans votre navigateur Web :

$3

Votre mot de passe vous sera envoyé uniquement si votre compte est créé. Si tel n’était pas le cas, n’utilisez pas ce lien.
Ce code de confirmation expire le $4.',
	'acct_request_throttle_hit'  => 'Désolé, vous avec demandé $1 comptes. Vous ne pouvez plus faire de demande.',
	'requestaccount-loginnotice' => "Pour obtenir un compte utilisateur, vous devez en faire '''[[Special:RequestAccount|la demande]]'''.",
	'confirmaccounts'            => 'Demande de confirmation de comptes',
	'confirmaccount-maintext'    => "'''Cette page est utilisée pour confirmer les demandes de compte utilisateur sur ''{{SITENAME}}'''''.

Chaque demande de compte utilisateur consiste en trois sous-listes : une pour les demandes non traitées, une pour les comptes réservés dans l'attente de plus amples informations, et une dernière pour les comptes récemments rejetés.

Lors de la réponse à une demande, vérifier la attentivement et, le cas échéant, confirmez les informations qui y sont mentionnées. Vos actions seront inscrites séparément dans un journal. Vous pouvez aussi attendre la vérification de chaque activité qui prendront de la place séparément par rapport à ce que vous ferez vous-même.",
	'confirmaccount-list'        => 'Voici, ci-dessous, la liste des comptes en attente d’approbation. Les comptes acceptés seront créés et retirés de cette liste. Les comptes rejetés seront supprimés de cette même liste.',
	'confirmaccount-list2'       => 'Voir la liste des comptes récemment rejetés lesquels seront supprimés automatiquement après quelques jours. Ils peuvent encore être approuvés, aussi vous pouvez consulter les rejets avant de le faire.',
	'confirmaccount-text'        => "Voici une demande en cours pour un compte utilisateur sur '''{{SITENAME}}'''.

Vérifiez soigneusement toutes les informations ci-dessous. Si vous approuvez cette demande, utiliser la liste des situations à donner à l'utilisateur. Les éditions faites pour les biographies de l'application n'affecteront pas les références permanentes déjà stockées.

Notez que vous pouvez choisir de créer un compte sous un autre nom. Faites ceci uniquement pour éviter des conflits avec d’autres.

Si vous quittez cette page sans confirmer ou rejeter cette demande, elle sera toujours mise en attente.",
	'confirmaccount-none-o'      => "Il n'y a actuellement aucune demande de compte utilisateur en cours dans cette liste.",
	'confirmaccount-none-h'      => "Il n'y a actuellement aucune réservation de compte utilisateur en cours dans cette liste.",
	'confirmaccount-none-r'      => "Il n'y a actuellement aucun rejet récent de demande de compte utilisateur dans cette liste.",
	'confirmaccount-real-q'      => 'Nom',
	'confirmaccount-email-q'     => 'Courriel',
	'confirmaccount-bio-q'       => 'Biographie',
	'confirmaccount-back'        => 'Voir la liste des demandes en cours',
	'confirmaccount-back2'       => 'Voir la liste des comptes rejetés récemment.',
	'confirmaccount-showheld'    => 'Voir la liste des comptes réservés en cours de traitement',
	'confirmaccount-review'      => 'Approbation/Rejet',
	'confirmaccount-types'       => "Sélectionnez un compte dans la liste d'attente ci-dessous :",
	'confirmaccount-all'         => "(Voir toutes les listes d'attente)",
	'confirmaccount-type'        => "Liste d'attente sélectionnée :",
	'confirmaccount-type-0'      => 'auteurs éventuels',
	'confirmaccount-type-1'      => 'éditeurs éventuels',
	'confirmaccount-q-open'      => 'demandes faites',
	'confirmaccount-q-held'      => 'demandes mises en attente',
	'confirmaccount-q-rej'       => 'demandes rejetées récemment',
	'confirmaccount-badid'       => 'Il n’y a aucune demande en cours correspondant à l’ID indiqué. Il est possible qu‘il ait subi une maintenance.',
	'confirmaccount-legend1'     => 'Compte utilisateur',
	'confirmaccount-legend2'     => 'Informations personnelles',
	'confirmaccount-legend3'     => 'Autres informations',
	'confirmaccount-name'        => 'Nom d’utilisateur',
	'confirmaccount-real'        => 'Nom :',
	'confirmaccount-email'       => 'Courriel :',
	'confirmaccount-reqtype'     => 'Situation :',
	'confirmaccount-pos-0'       => 'auteur',
	'confirmaccount-pos-1'       => 'éditeur',
	'confirmaccount-bio'         => 'Biographie :',
	'confirmaccount-attach'      => 'CV/Résumé :',
	'confirmaccount-notes'       => 'Notes supplémentaires :',
	'confirmaccount-urls'        => 'Liste des site web :',
	'confirmaccount-none-p'      => '(non pourvu)',
	'confirmaccount-confirm'     => 'Utilisez les boutons ci-dessous pour accepter ou rejeter la demande.',
	'confirmaccount-econf'       => '(confirmé)',
	'confirmaccount-reject'      => '(rejeté par [[User:$1|$1]] le $2)',
	'confirmaccount-rational'    => 'Motif donné au candidat',
	'confirmaccount-noreason'    => '(néant)',
	'confirmaccount-held'        => 'Marqué « réservé » par [[User:$1|$1]] sur $2',
	'confirmaccount-create'      => 'Approbation (crée le compte)',
	'confirmaccount-deny'        => 'Rejet (supprime le compte)',
	'confirmaccount-hold'        => 'Réservé',
	'confirmaccount-spam'        => 'Pourriel (n’envoyez pas de courriel)',
	'confirmaccount-reason'      => 'Commentaire (figurera dans le courriel) :',
	'confirmaccount-ip'          => 'Adresse IP',
	'confirmaccount-submit'      => 'Confirmation',
	'confirmaccount-needreason'  => 'Vous devez indiquer un motif dans le cadre ci-après.',
	'confirmaccount-canthold'    => 'Cette requête est déjà, soit prise en compte, soit supprimée.',
	'confirmaccount-acc'         => 'La demande de compte a été confirmée avec succès ; création du nouvel utilisateur [[User:$1]].',
	'confirmaccount-rej'         => 'La demande a été rejetée avec succès.',
	'confirmaccount-viewing'     => "(actuellement en train d'être visionné par [[User:$1|$1]])",
	'confirmaccount-summary'     => 'Création de la page utilisateur avec sa biographie.',
	'confirmaccount-welc'        => "'''Bienvenue sur ''{{SITENAME}}'' !''' Nous espérons que vous contribuerez beaucoup et bien. 
	Vous désirerez, peut-être, lire [[{{MediaWiki:Helppage}}|comment bien débuter]]. Bienvenue encore et bonne contributions.
	~~~~",
	'confirmaccount-wsum'        => 'Bienvenue !',
	'confirmaccount-email-subj'  => '{{SITENAME}} demande de compte',
	'confirmaccount-email-body'  => 'Votre demande de compte a été acceptée sur {{SITENAME}}.

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
	'confirmaccount-email-body3' => 'Désolé, votre demande de compte utilisateur « $1 » a été rejetée sur {{SITENAME}}.

Plusieurs raisons peuvent expliquer ce cas de figure. Il est possible que vous ayez mal rempli le formulaire, ou que vous n’ayez pas indiqué suffisamment d’informations dans vos réponses. Il est encore possible que vous ne remplissiez pas les critères d’éligibilité pour obtenir votre compte. Il est possible d’être sur la liste des contact si vous désirez mieux connaître les conditions requises.',
	'confirmaccount-email-body4' => 'Désolé, votre demande de compte utilisateur « $1 » a été rejetée sur {{SITENAME}}.

$2

Il est possible d’être sur la liste des contacts afin de mieux connaître les critères pour pouvoir s’inscrire.',
	'confirmaccount-email-body5' => 'Avant que votre requête pour le compte « $1 » ne puisse être acceptée sur {{SITENAME}}, vous devez produire quelques informations suplémentaires.

$2

Ceci permet d’être sur la liste des contacts du site, si vous désirez en savoir plus sur les règles concernant les comptes.',
	'usercredentials'            => "Références de l'utilisateur",
	'usercredentials-leg'        => "Vérification confirmée des références d'un utilisateur.",
	'usercredentials-user'       => "Nom d'utilisateur :",
	'usercredentials-text'       => 'Ci-dessous figurent les justificatifs validés pour le compte utilisateur sélectionné.',
	'usercredentials-leg1'       => 'Compte utilisateur',
	'usercredentials-leg2'       => 'Informations personnelles',
	'usercredentials-leg3'       => 'Autres informations',
	'usercredentials-email'      => 'Courriel :',
	'usercredentials-real'       => 'Nom réel :',
	'usercredentials-bio'        => 'Biographie :',
	'usercredentials-attach'     => 'CV/Résumé :',
	'usercredentials-notes'      => 'Notes supplémentaires :',
	'usercredentials-urls'       => 'Liste des sites internet :',
	'usercredentials-ip'         => 'Adresse IP initiale :',
	'usercredentials-badid'      => 'Aucune référence de trouvée pour cet utilisateur. Véfifiez que le nom soit bien rédigé.',
);

$messages['frp'] = array(
	'requestaccount'              => 'Demanda de compto utilisator',
	'requestaccount-text'         => '\'\'\'Rempléd et emmandâd lo formulèro ce-desot por demandar un compto utilisator.\'\'\'
	
	Assurâd-vos que vos éd ja liesu les [[{{MediaWiki:Requestaccount-page}}|condicions d’usâjo]] devant que fâre voutra demanda de compto.
	
	Un côp que lo compto est accèptâ, vos recevréd un mèl vos notifient que voutron compto porrat étre utilisâ dessus
	[[Special:Userlogin]].',
	'requestaccount-page'         => '{{ns:project}}:Condicions d’usâjo',
	'requestaccount-dup'          => '\'\'\'Nota : vos éte ja sur una sèssion avouéc un compto enregistrâ.\'\'\'',
	'requestaccount-legend1'      => 'Compto utilisator',
	'requestaccount-legend2'      => 'Enformacions a sè',
	'requestaccount-legend3'      => 'Ôtres enformacions',
	'requestaccount-acc-text'     => 'Un mèssâjo de confirmacion serat emmandâ a voutra adrèce èlèctronica un côp que la demanda arat étâ emmandâ. Dens lo mèl reçu, clicâd sur lo lim corrèspondent a la confirmacion de voutra demanda. Et pués, un mot de pâssa serat emmandâ per mèl quand voutron compto serat crèâ.',
	'requestaccount-ext-text'     => 'L’enformacion siuventa réste privâ et porrat étre utilisâ ren que por ceta requéta. 
	Vos avéd la possibilitât de listar des contactes tâl qu’un numerô de tèlèfone por obtegnir una assistance por confirmar voutra identitât.',
	'requestaccount-bio-text'     => 'Voutra biografia serat betâ per dèfôt sur voutra pâge utilisator. Tâchiéd d’y betar voutres recomandacions. Assurâd-vos que vos pouede difusar sen crenta les enformacions. Voutron nom pôt étre changiê en utilisent [[Special:Preferences]].',
	'requestaccount-real'         => 'Veré nom :',
	'requestaccount-same'         => '(nom figurent dens voutron ètat civilo)',
	'requestaccount-email'        => 'Adrèce èlèctronica :',
	'requestaccount-bio'          => 'Biografia a sè :',
	'requestaccount-attach'       => 'CV/Rèsumâ (u chouèx) :',
	'requestaccount-notes'        => 'Notes suplèmentères :',
	'requestaccount-urls'         => 'Lista des setos Malyâjo. S’y at plusiors, sèparâd-los per un sôt de legne :',
	'requestaccount-agree'        => 'Vos dête cèrtifiar que voutron veré nom est corrèct et que vos accèptâd les condicions d’usâjo du sèrviço.',
	'requestaccount-inuse'        => 'Lo nom d’utilisator est ja utilisâ dens una requéta en cors d’aprobacion.',
	'requestaccount-tooshort'     => 'Voutra biografia dêt avêr u muens {{PLURAL:$1|$1 mot|$1 mots}}.',
	'requestaccount-exts'         => 'Lo tèlèchargement des fichiérs juents est pas pèrmês.',
	'requestaccount-resub'        => 'Voutron fichiér de CV/rèsumâ dêt étre sèlèccionâ un côp de ples por des rêsons de sècuritât. Lèssiéd lo champ vouedo se vos dèsirâd pas més l’apondre.',
	'requestaccount-tos'          => 'J/y’é liesu et j/y’accèpto de rèspèctar los tèrmos regardent les [[{{MediaWiki:Requestaccount-page}}|condicions d’usâjo]] des sèrviços de {{SITENAME}}. 
	Lo nom que j/y’é endicâ dens lo champ « Veré nom » est verément mon nom pèrsonèl.',
	'requestaccount-submit'       => 'Demanda de compto utilisator.',
	'requestaccount-sent'         => 'Voutra demanda de compto utilisator at étâ emmandâ avouéc reusséta et at étâ betâ dens la lista d’atenta d’aprobacion.',
	'request-account-econf'       => 'Voutra adrèce de mèl at étâ confirmâ et serat listâ tâla qu’el est dens voutra demanda de compto.',
	'requestaccount-email-subj'   => '{{SITENAME}} confirmacion d’adrèce de mèl.',
	'requestaccount-email-body'   => 'Quârqu’un, probâblament vos, at formulâ, dês l’adrèce IP $1, una demanda de compto utilisator « $2 » dessus {{SITENAME}} avouéc ceta adrèce de mèl.

Por confirmar que cél compto dessus {{SITENAME}} est verément a vos, vos éte preyê d’uvrir ceti lim dens voutron navigator Malyâjo :

$3

Voutron mot de pâssa vos serat emmandâ solament se voutron compto est crèâ. Se tâl ére *pas* lo câs, utilisâd pas ceti lim. 
Ceti code de confirmacion èxpire lo $4.',
	'acct_request_throttle_hit'   => 'Dèsolâ, vos éd ja demandâ $1 comptos. Vos pouede pas més nen fâre la demanda.',
	'requestaccount-loginnotice'  => 'Por obtegnir un compto utilisator, vos dête nen fâre la \'\'\'[[Special:RequestAccount|demanda]]\'\'\'.',
	'confirmaccounts'             => 'Demanda de confirmacion de comptos',
	'confirmaccount-list'         => 'Vê-que, ce-desot, la lista des comptos en atenta d’aprobacion. Los comptos accèptâs seront crèâs et reteriês de ceta lista. Los comptos refusâs seront suprimâs de ceta méma lista.',
	'confirmaccount-name'         => 'Nom d’utilisator',
	'confirmaccount-real'         => 'Nom :',
	'confirmaccount-real-q'       => 'Nom',
	'confirmaccount-email'        => 'Mèl :',
	'confirmaccount-email-q'      => 'Mèl',
	'confirmaccount-bio'          => 'Biografia :',
	'confirmaccount-bio-q'        => 'Biografia',
	'confirmaccount-attach'       => 'CV/Rèsumâ :',
	'confirmaccount-notes'        => 'Notes suplèmentères :',
	'confirmaccount-urls'         => 'Lista des setos Malyâjo :',
	'confirmaccount-none-p'       => '(pas porvu)',
	'confirmaccount-review'       => 'Aprobacion/Refus',
	'confirmaccount-econf'        => '(confirmâ)',
);

/** Galician (Galego)
 * @author Xosé
 * @author Alma
 * @author SPQRobin
 */
$messages['gl'] = array(
	'requestaccount'             => 'Solicitar unha conta',
	'requestaccount-text'        => "'''Complete e envíe o formulario seguinte para solicitar unha conta de usuario'''.

	Asegúrese de ter lido primeiro as [[{{MediaWiki:Requestaccount-page}}|Condicións de Servizo]] antes de solicitar unha conta.

	Unha vez que se aprobe a conta recibirá unha mensaxe de notificación por correo electrónico e poderá usar a conta en
	[[Special:Userlogin]].",
	'requestaccount-page'        => '{{ns:project}}:Condicións de Servizo',
	'requestaccount-dup'         => "'''Nota: Xa está no sistema cunha conta rexistrada.'''",
	'requestaccount-legend1'     => 'Conta de usuario',
	'requestaccount-legend2'     => 'Información persoal',
	'requestaccount-legend3'     => 'Información adicional',
	'requestaccount-acc-text'    => 'Enviaráselle unha mensaxe de confirmación ao seu enderezo de correo electrónico unha vez enviada esta solicitude. Responda premendo
	na ligazón de confirmación que lle aparecerá no correo electrónico. Así mesmo, enviaráselle o seu contrasinal cando se cree a conta.',
	'requestaccount-ext-text'    => 'A información seguinte mantense como reservada e só se usará para esta solicitude.
	Pode querer listar contactos, como un número de teléfono, para axudar a identificar a confirmación.',
	'requestaccount-bio-text'    => 'A súa biografía aparecerá como contido predefinido da súa páxina de usuario. Tente incluír
	credenciais. Asegúrese de non ter problema coa publicación desa información. O seu nome pódese cambiar mediante [[Special:Preferences]].',
	'requestaccount-real'        => 'Nome real:',
	'requestaccount-same'        => '(o mesmo que o nome real)',
	'requestaccount-email'       => 'Enderezo de correo electrónico:',
	'requestaccount-bio'         => 'Biografía persoal:',
	'requestaccount-attach'      => 'Curriculum Vitae (opcional):',
	'requestaccount-notes'       => 'Notas adicionais:',
	'requestaccount-urls'        => 'Listaxe de sitios web, de habelos, (separados cun parágrafo novo):',
	'requestaccount-agree'       => 'Debe certificar que o seu nome real é correcto e que está de acordo coas nosas Condicións de Servizo.',
	'requestaccount-inuse'       => 'Este nome de usuario xa se usou nunha solicitude de conta aínda pendente.',
	'requestaccount-tooshort'    => 'A súa biografía debe ter un mínimo de $1 palabras.',
	'requestaccount-exts'        => 'Non se permite este tipo de ficheiro como anexo.',
	'requestaccount-resub'       => 'Ten que volver a seleccionar o ficheiro do seu curriculum vitae por razóns de seguranza. Deixe o campo en branco
	se non o quere incluír máis.',
	'requestaccount-tos'         => 'Lin e estou de acordo en respectar as [[{{MediaWiki:Requestaccount-page}}|Condicións de Servizo]] de {{SITENAME}}. 
	O nome especificado como "Nome real" é, efectivamente, o meu propio nome real.',
	'requestaccount-submit'      => 'Solicitar unha conta',
	'requestaccount-sent'        => 'Enviouse sen problemas a súa solicitude de conta e agora está pendente de exame.',
	'request-account-econf'      => 'Confirmouse o seu enderezo de correo electrónico e listarase como tal na súa
	solicitude de conta.',
	'requestaccount-email-subj'  => 'Confirmación de enderezo de correo electrónico de {{SITENAME}}',
	'requestaccount-email-body'  => 'Alguén, probabelmente vostede desde o enderezo IP $1, solicitou unha
conta "$2" con este enderezo de correo electrónico en {{SITENAME}}.

Para confirmar que esta conta lle pertence a vostede en {{SITENAME}}, abra esta ligazón no seu navegador:

$3

Se se crea a conta, só vostede recibirá o contrasinal. Se *non* se trata de vostede, non siga a ligazón.
Este código de confirmación caducará o $4.',
	'acct_request_throttle_hit'  => 'Sentímolo, xa solicitou $1 contas. Non pode facer máis solicitudes.',
	'requestaccount-loginnotice' => "Para obter unha conta de usuario ten que '''[[Special:RequestAccount|solicitar unha]]'''.",
	'confirmaccounts'            => 'Confirmar solicitudes de contas',
	'confirmaccount-list'        => 'Abaixo aparece unha listaxe de contas pendentes de aprobación.
	As contas aprobadas crearanse e eliminaranse desta listaxe. As contas rexeitadas simplemente eliminaranse desta listaxe.',
	'confirmaccount-list2'       => 'Abaixo aparece unha listaxe con solicitudes de contas rexeitadas recentemente que poden eliminarse automaticamente
	unha vez que teñan varios días. Poden aínda ser aceptadas como contas, aínda que pode ser mellor que consulte primeiro
	co administrador que as rexeitou antes de facelo.',
	'confirmaccount-text'        => "Esta é unha solicitude pendente dunha conta de usuario en '''{{SITENAME}}'''. Examínea
	coidadosamente e, se é necesario, confirme toda a información que aparece. Observe que pode escoller crear a conta
	cun nome diferente. Use isto só para evitar conflitos con outros nomes.

	Se simplemente deixa esta páxina sen confirmar ou rexeitar esta solicitude, ficará como pendente.",
	'confirmaccount-none-o'      => 'Neste momento non hai peticións de contas pendentes nesta listaxe.',
	'confirmaccount-none-h'      => 'Actualmente non hai solicitudes pendentes a ter en conta nesta listaxe.',
	'confirmaccount-none-r'      => 'Actualmente non hai contas rexeitas recentemente nesta listaxe.',
	'confirmaccount-real-q'      => 'Nome',
	'confirmaccount-email-q'     => 'Correo electrónico',
	'confirmaccount-bio-q'       => 'Biografía',
	'confirmaccount-back'        => 'Ver a listaxe de contas pendentes',
	'confirmaccount-back2'       => 'Ver a listaxe de contas rexeitadas recentemente',
	'confirmaccount-showheld'    => 'Ver as contas pendentes de ter en conta na listaxe',
	'confirmaccount-review'      => 'Aprobar/Rexeitar',
	'confirmaccount-badid'       => 'Non existe unha solicitude pendente que corresponda co ID fornecido. Pode que xa fose examinada.',
	'confirmaccount-name'        => 'Nome de usuario',
	'confirmaccount-real'        => 'Nome:',
	'confirmaccount-email'       => 'Correo electrónico:',
	'confirmaccount-bio'         => 'Biografía:',
	'confirmaccount-attach'      => 'Curriculum Vitae:',
	'confirmaccount-notes'       => 'Notas adicionais:',
	'confirmaccount-urls'        => 'Listaxe de sitios web:',
	'confirmaccount-none-p'      => '(non fornecido)',
	'confirmaccount-confirm'     => 'Use os botóns de embaixo para aceptar, rexeitar ou deixar en suspenso esta solicitude:',
	'confirmaccount-econf'       => '(confirmada)',
	'confirmaccount-reject'      => '(rexeitada por [[User:$1|$1]] en $2)',
	'confirmaccount-held'        => '(marcada "en suspenso" por [[User:$1|$1]] en $2)',
	'confirmaccount-create'      => 'Aceptar (crear a conta)',
	'confirmaccount-deny'        => 'Rexeitar (eliminar da listaxe)',
	'confirmaccount-spam'        => 'Spam (non enviar correo electrónico)',
	'confirmaccount-reason'      => 'Comentario (incluirase na mensaxe de correo electrónico):',
	'confirmaccount-ip'          => 'Enderezo IP:',
	'confirmaccount-submit'      => 'Confirmar',
	'confirmaccount-needreason'  => 'Debe incluír un motivo na caixa de comentarios de embaixo.',
	'confirmaccount-acc'         => 'Confirmouse sen problemas a solicitude de conta; creouse a nova conta de usuario [[User:$1]].',
	'confirmaccount-rej'         => 'Rexeitouse sen problemas a solicitude de conta.',
	'confirmaccount-summary'     => 'A crear a páxina de usuario coa biografía do novo usuario.',
	'confirmaccount-welc'        => "'''Reciba a benvida a ''{{SITENAME}}''!''' Esperamos que contribúa moito e ben.
	Será ben que lea [[{{MediaWiki:Helppage}}|Como comezar]]. De novo, reciba a nosa benvida e divírtase!",
	'confirmaccount-wsum'        => 'Reciba a nosa benvida!',
	'confirmaccount-email-subj'  => 'solicitude de conta en {{SITENAME}}',
	'confirmaccount-email-body'  => 'Aprobouse a súa solicitude de conta en {{SITENAME}}.

Nome da conta: $1

Contrasinal: $2

Por razóns de seguranza terá que mudar o contrasinal a primeira vez que se rexistre. Para rexistrarse,
vaia a {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'Aprobouse a súa solicitude de conta en {{SITENAME}}.

Nome da conta: $1

Contrasinal: $2

$3

Por razóns de seguranza terá que mudar o contrasinal a primeira vez que se rexistre. Para rexistrarse,
vaia a {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'Sentímolo, pero a súa solicitude de conta $1 foi rexeitada en {{SITENAME}}.

Isto pode deberse a varias causas. Pode que non enchese o formulario correctamente, non respondese na extensión
adecuada ou non cumprise con algún outro criterio. Pode que existan listaxes de contacto no sitio que poida
usar se quere saber máis acerca da política de contas de usuario.',
	'confirmaccount-email-body4' => 'Sentímolo, pero a súa solicitude de conta "$1" foi rexeitada en {{SITENAME}}.

$2

Poden existir listaxes de contacto no sitio que pode usar se quere saber máis acerca da política de contas de usuario.',
	'confirmaccount-email-body5' => 'Antes de que se poida aceptar a súa solicitude dunha conta para "$1" en {{SITENAME}}
	ten que fornecer algunhas informacións adicionais.

$2

Poden existir listaxes de contacto no sitio que poida usar se quere saber máis acerca da nosa política de contas de usuario.',
);

/** Gujarati (ગુજરાતી)
 * @author Aksi great
 */
$messages['gu'] = array(
	'requestaccount-legend2' => 'વ્યક્તિગત માહિતી',
	'requestaccount-legend3' => 'અન્ય માહિતી',
	'requestaccount-real'    => 'સાચુ નામ:',
);

/** Croatian (Hrvatski)
 * @author SpeedyGonsales
 * @author Dnik
 */
$messages['hr'] = array(
	'requestaccount-legend2'  => 'Osobne informacije',
	'requestaccount-legend3'  => 'Ostale informacije',
	'requestaccount-real'     => 'Pravo ime:',
	'confirmaccount-none-h'   => 'Nema zahtjeva u popisu čekanja.',
	'confirmaccount-none-r'   => 'Nema nedavno odbijenih zahtjeva na popisu.',
	'confirmaccount-badid'    => 'Nema zahtjeva koji ima dani ID. Najvjerojatnije je zahtjev već obrađen.',
	'confirmaccount-back'     => 'Vidi popis zahtjeva za suradnički račun',
	'confirmaccount-back2'    => 'Vidi popis nedavno odbijenih zahtjeva',
	'confirmaccount-showheld' => 'Vidi popis zahtjeva na čekanju',
	'confirmaccount-name'     => 'Suradničko ime',
	'confirmaccount-real'     => 'Ime:',
	'confirmaccount-real-q'   => 'Ime',
	'confirmaccount-email-q'  => 'E-pošta (e-mail)',
	'confirmaccount-bio'      => 'Biografija:',
	'confirmaccount-bio-q'    => 'Biografija',
	'confirmaccount-attach'   => 'Biografija/CV:',
	'confirmaccount-notes'    => 'Dodatne bilješke:',
	'confirmaccount-urls'     => 'Popis web stranica:',
	'confirmaccount-none-p'   => '(nije naveden)',
	'confirmaccount-review'   => 'Potvrdi/odbij',
	'confirmaccount-econf'    => '(potvrđen)',
	'confirmaccount-reject'   => '(zahtjev odbio [[User:$1|$1]] dana $2)',
	'confirmaccount-create'   => 'Prihvati zahtjev (otvori suradnički račun)',
	'confirmaccount-deny'     => 'Odbij (i skini s popisa)',
	'confirmaccount-hold'     => 'Zadrži',
);

$messages['hsb'] = array(
	'requestaccount'              => 'Wužiwarske konto sej žadać',
	'requestaccount-text'         => '\'\'\'Wupjelń slědowacy formular a wotesćel jón, zo by wužiwarske konto požadał\'\'\'. 

	Prošu přečitaj najprjedy [[{{MediaWiki:Requestaccount-page}}|wužiwanske wuměnjenja]], prjedy hač požadaš wužiwarske konto.

Tak ruče kaž konto je so potwjerdźiło, dóstaš powěsć přez mejlku a móžeš so pod "[[{{ns:special}}:Userlogin|Konto wutworić abo so přizjewić]]" přizjewić.',
	'requestaccount-page'         => '{{ns:project}}:Wužiwanske wuměnjenja',
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
	'confirmaccount-none-o'       => 'Tuchwilu žane wotewrjene kontowe požadanja w tutej lisćinje njejsu.',
	'confirmaccount-none-h'       => 'Tuchwilu žane kontowe požadanja w tutej lisćinje w čakanskej sekli njejsu.',
	'confirmaccount-none-r'       => 'Tuchwilu žane runje wotpokazane kontowe požadanja w tutej lisćinje njejsu.',
	'confirmaccount-badid'        => 'Tuchwilu požadane k podatemu ID. Snano bu hižo sčinjene.',
	'confirmaccount-back'         => 'Lisćinu njerozsudźenych požadanjow wobhladać',
	'confirmaccount-back2'        => 'Lisćinu njedawno wotpokazanych požadanjow wobhladać',
	'confirmaccount-showheld'     => 'Lisćina wotewrjenych kontow pokazać',
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
	'confirmaccount-none-p'       => '(njepodaty)',
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
	'confirmaccount-canthold'     => 'Tute požadanje je pak hižo čakanskej sekli pak wušmórnjene.',
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

$messages['io'] = array(
	'confirmaccount-wsum'         => 'Bonveno!',
);

$messages['la'] = array(
	'requestaccount-real'         => 'Nomen verum:',
	'requestaccount-same'         => '(aequus ad nomine vero)',
	'confirmaccount-name'         => 'Nomen usoris',
	'confirmaccount-real'         => 'Nomen',
	'confirmaccount-wsum'         => 'Salve!',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'requestaccount-legend1' => 'Benotzerkonto',
	'requestaccount-legend2' => 'Perséinlech Informatiounen',
	'requestaccount-legend3' => 'Aner Informatiounen',
	'requestaccount-real'    => 'Richtege Numm:',
	'requestaccount-email'   => 'E-mail-Adress:',
	'requestaccount-bio'     => 'Peréinlech Biographie:',
	'confirmaccount-name'    => 'Benotzernumm',
	'confirmaccount-real'    => 'Numm:',
	'confirmaccount-real-q'  => 'Numm',
	'confirmaccount-email'   => 'E-mail:',
	'confirmaccount-email-q' => 'E-mail',
	'confirmaccount-bio'     => 'Biographie:',
	'confirmaccount-bio-q'   => 'Biographie',
);

/** Dutch (Nederlands)
 * @author SPQRobin
 * @author Siebrand
 * @author Annabel
 */
$messages['nl'] = array(
	'requestaccount'             => 'Gebruiker aanvragen',
	'requestaccount-text'        => "'''Vul het onderstaande formulier in en stuur het op om een gebruiker aan te vragen'''. 
	
	Zorg ervoor dat u eerst de [[{{MediaWiki:Requestaccount-page}}|Voorwaarden]] leest voordat u een gebruiker aanvraagt.
	
	Als uw gebruiker is goedgekeurd, krijgt u een e-mail en daarna kunt u aanmelden via [[Special:Userlogin]].",
	'requestaccount-page'        => '{{ns:project}}:Voorwaarden',
	'requestaccount-dup'         => "'''Let op: U bent al aangemeld met een geregistreede gebruiker.'''",
	'requestaccount-legend1'     => 'Gebruiker',
	'requestaccount-legend2'     => 'Persoonlijke informatie',
	'requestaccount-legend3'     => 'Overige informatie',
	'requestaccount-acc-text'    => 'U ontvangt een e-mailbevestiging als uw verzoek is ontvangen. Reageer daar alstublieft op 
	door de klikken op de bevesitigngslink die in de e-mail staat. U krijgt een wachtwoord als uw gebruiker is aangemaakt.',
	'requestaccount-ext-text'    => 'De volgende informatie wordt vertrouwelijk behandeld en wordt alleen gebruikt voor dit verzoek. 
	U kunt contactgegevens zoals een telefoonummer opgeven om te helpen bij het vaststellen van uw identiteit.',
	'requestaccount-bio-text'    => 'Uw biografie wordt opgenomen in uw gebruikerspagina. Probeer uw belangrijkste gegevens 
	op te nemen. Zorg ervoor dat u achter het publiceren van dergelijke informatie staat. U kunt uw naam wijzigen via uw [[Special:Preferences|voorkeuren]].',
	'requestaccount-real'        => 'Uw naam:',
	'requestaccount-same'        => '(gelijk aan uw naam)',
	'requestaccount-email'       => 'E-mailadres:',
	'requestaccount-reqtype'     => 'Positie:',
	'requestaccount-level-0'     => 'auteur',
	'requestaccount-level-1'     => 'redacteur',
	'requestaccount-bio'         => 'Persoonlijke biografie:',
	'requestaccount-attach'      => 'CV (optioneel):',
	'requestaccount-notes'       => 'Opmerkingen:',
	'requestaccount-urls'        => 'Lijst van websites, als van toepassing (iedere site op een aparte regel):',
	'requestaccount-agree'       => 'U moet aangegeven dat uw naam juist is en dat u akkoord gaat met de Voorwaarden.',
	'requestaccount-inuse'       => 'De gebruiker is al bekend in een aanvraagprocedure.',
	'requestaccount-tooshort'    => 'Uw biografie moet tenminste $1 woorden bevatten.',
	'requestaccount-exts'        => 'Bestandstype van de bijlage is niet toegestaan.',
	'requestaccount-resub'       => 'Uw CV-bestand moet herselecteerd worden voor veiligheidsredenen. Laat het veld open als u geen bestand meer wil bijvoegen.',
	'requestaccount-tos'         => 'Ik heb de [[{{MediaWiki:Requestaccount-page}}|Voorwaarden]] van {{SITENAME}} gelezen en ga ermee akkoord.
De naam die ik heb opgegeven onder "Echte naam" is inderdaad mijn eigen echte naam',
	'requestaccount-submit'      => 'Gebruiker aanvragen',
	'requestaccount-sent'        => 'Uw gebruikersaanvraag is verstuurd en wacht om nagekeken te worden.',
	'request-account-econf'      => 'Uw e-mailadres is bevestigd en wordt in uw gebruikersaanvraag opgenomen.',
	'requestaccount-email-subj'  => '{{SITENAME}} bevestiging e-mailadres',
	'requestaccount-email-body'  => 'Iemand, waarschijnlijk u, heeft vanaf  IP-adres $1 op {{SITENAME}} een verzoek gedaan
voor het aanmaken van gebruiker "$2" met dit e-mailadres.

Open de onderstaande link in uw browser om te bevestigen dat deze gebruiker op {{SITENAME}} daadwerkelijk bij u hoort:

$3

Als de gebruiker is aangemaakt krijgt alleen u een e-mail met het wachtwoord. Als de aanvraag niet van u afkomstig is, volg de link dan *niet*. 
Deze bevestigingse-mail verloop op $4.',
	'acct_request_throttle_hit'  => 'Sorry, maar u heeft al $1 gebruikersverzoeken gedaan. U kunt geen nieuwe verzoeken meer uitbrengen.',
	'requestaccount-loginnotice' => "Om een gebruiker te krijgen, moet u '''[[Special:RequestAccount|een verzoek doen]]'''.",
	'confirmaccounts'            => 'Gebruikersverzoeken bevestigen',
	'confirmaccount-list'        => 'Hieronder staan de gebruikersverzoeken die op afhandeling wachten. 
	Voor goedgekeurde gebruikersverzoeken worden gebruikers aangemaakt en dat verzoek komt niet langer voor in deze lijst. 
	Afgewezen gebruikersverzoeken worden van de lijst verwijderd.',
	'confirmaccount-list2'       => 'Hieronder staan recentelijk afgewezen gebruikersverzoeken die die over een aantal dagen
	automatisch worden verwijderd. Ze kunnen nog steeds goedgekeurd worden, hoewel het verstandig is voorafgaand contact te
	zoeken met de beheerder die het verzoek heeft afgewezen.',
	'confirmaccount-text'        => "Dit is een openstaand gebruikersverzoek voor '''{{SITENAME}}'''. Beoordeel het
	alstublieft zorgvuldig en bevestig, als nodig, alle onderstaande informatie. U kunt een gebruiker aanmaken met een andere
	naam. Doe dit alleen als er mogelijk verwarring kan optreden met andere gebruikersnamen.
	
	Als u deze pagina verlaat zonder het gebruikersverzoek te bevestigen of af te wijzen, dan blijft het open staan.",
	'confirmaccount-none-o'      => 'Er zijn momenteel geen openstaande gebruikersaanvragen in deze lijst.',
	'confirmaccount-none-h'      => 'Er zijn momenteel geen uitgestelde gebruikersaanvragen in deze lijst.',
	'confirmaccount-none-r'      => 'Er zijn momenteel geen recent afgewezen gebruikersaanvragen in deze lijst.',
	'confirmaccount-real-q'      => 'Naam',
	'confirmaccount-email-q'     => 'E-mail',
	'confirmaccount-bio-q'       => 'Biografie',
	'confirmaccount-back'        => 'Openstaande gebruikersverzoeken bekijken',
	'confirmaccount-back2'       => 'Recent afgewezen verzoeken bekijken',
	'confirmaccount-showheld'    => 'Lijst met uitgestelde gebruikersaanvragen bekijken',
	'confirmaccount-review'      => 'toegelaten/afgewezen',
	'confirmaccount-badid'       => 'Er is geen openstaand gebruikersverzoeken voor het opgegeven ID. Wellicht is het al afgehandeld.',
	'confirmaccount-name'        => 'Gebruikersnaam',
	'confirmaccount-real'        => 'Naam',
	'confirmaccount-email'       => 'E-mail',
	'confirmaccount-bio'         => 'Biografie',
	'confirmaccount-attach'      => 'CV (informatie over u):',
	'confirmaccount-notes'       => 'Extra toevoegingen:',
	'confirmaccount-urls'        => 'Lijst met websites:',
	'confirmaccount-none-p'      => '(niet opgegeven)',
	'confirmaccount-confirm'     => 'Gebruik de onderstaande opties om dit verzoek te aanvaarden, negeren, of uit te stellen:',
	'confirmaccount-econf'       => '(bevestigd)',
	'confirmaccount-reject'      => '(afgewezen door [[User:$1|$1]] op $2)',
	'confirmaccount-held'        => '(als "uitgesteld" aangemerkt door [[User:$1|$1]] op $2)',
	'confirmaccount-create'      => 'Toelaten (gebruiker aanmaken)',
	'confirmaccount-deny'        => 'Afwijzen (verwijderen)',
	'confirmaccount-hold'        => 'Uitstellen',
	'confirmaccount-spam'        => 'Spam (geen e-mail sturen)',
	'confirmaccount-reason'      => 'Opmerking (zal worden toegevoegd aan de email):',
	'confirmaccount-ip'          => 'IP-adres:',
	'confirmaccount-submit'      => 'Bevestigen',
	'confirmaccount-needreason'  => 'U moet een reden geven in het onderstaande veld.',
	'confirmaccount-canthold'    => 'Dit verzoek heeft al de status uitgesteld of verwijderd.',
	'confirmaccount-acc'         => 'Gebruikersverzoek goedgekeurd. De gebruiker [[User:$1]] is aangemaakt.',
	'confirmaccount-rej'         => 'Gebruikersverzoek afgewezen.',
	'confirmaccount-viewing'     => '(op dit ogenblik bekeken door [[User:$1|$1]])',
	'confirmaccount-summary'     => 'Er wordt een gebruikerspagina gemaakt met de biografie van de nieuwe gebruiker.',
	'confirmaccount-welc'        => "'''Welkom bij ''{{SITENAME}}''!''' We hopen dat u veel goed bijdragen levert. 
	Waarschijnlijk wilt u de [[{{MediaWiki:Helppage}}|hulppagina's]] lezen. Nogmaals, welkom en veel plezier! 
	~~~~",
	'confirmaccount-wsum'        => 'Welkom!',
	'confirmaccount-email-subj'  => '{{SITENAME}} gebruikersverzoek',
	'confirmaccount-email-body'  => 'Uw gebruikersverzoek op {{SITENAME}} is goedgekeurd.

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
	'confirmaccount-email-body5' => 'Voordat uw aanvraag voor een account "$1" aanvaard kan worden op {{SITENAME}},
	moet u eerst extra informatie geven.

$2

Er kunnen contacteerlijsten zijn die u kan gebruiken als u meer wil te weten komen over het beleid van gebruikersaccounts.',
);

/** Occitan (Occitan)
 * @author Cedric31
 * @author SPQRobin
 */
$messages['oc'] = array(
	'requestaccount'             => "Demanda de compte d'utilizaire",
	'requestaccount-text'        => "'''Emplenatz e mandatz lo formulari çaijós per demandar un compte d’utilizaire.'''. Asseguratz-vos qu'avètz ja legit [[{{MediaWiki:Requestaccount-page}}|las condicions d’utilizacion]] abans de far vòstra demanda de compte. Un còp que lo compte es acceptat, recebretz un corrièr electronic que vos notificarà que vòstre compte poirà èsser utilizat sus [[Special:Userlogin]].",
	'requestaccount-page'        => "{{ns:project}}:Condicions d'utilizacion",
	'requestaccount-dup'         => "'''Nòta : Sètz ja sus una session amb un compte enregistrat.'''",
	'requestaccount-legend1'     => "Compte d'utilizaire:",
	'requestaccount-legend2'     => 'Informacions personalas',
	'requestaccount-legend3'     => 'Autra informacion:',
	'requestaccount-acc-text'    => 'Un messatge de confirmacion serà mandat a vòstra adreça electronica una còp que la demanda serà estada mandada. Dins lo corrièr recebut, clicatz sul ligam correspondent a la confirmacion de vòstra demanda. E mai, senhal serà mandat per corrièr electronic quand vòstre compte serà creat.',
	'requestaccount-ext-text'    => 'L’informacion seguenta demòra privada e poirà èsser utilizada que per aquesta requèsta. Avètz la possibilitat de far la lista dels contactes coma un numèro de telèfon per obténer una assistància per confirmar vòstra identitat.',
	'requestaccount-bio-text'    => "Vòstra biografia serà mesa per defaut sus vòstra pagina d'utilizaire. Ensajatz d’i metre vòstras recomandacions. Asseguratz-vos que podètz difusir sens crenta las informacions. Vòstre nom pòt èsser cambiat en utilizant [[Special:Preferences]].",
	'requestaccount-real'        => 'Nom vertadièr:',
	'requestaccount-same'        => '(nom figurant dins vòstre estat civil)',
	'requestaccount-email'       => 'Adreça electronica:',
	'requestaccount-bio'         => 'Biografia personala:',
	'requestaccount-attach'      => 'CV/Resumit (facultatiu)',
	'requestaccount-notes'       => 'Nòtas suplementàrias :',
	'requestaccount-urls'        => "Lista dels sites Web. Se n'i a mantun, separatz-los per un saut de linha :",
	'requestaccount-agree'       => 'Devètz certificar que vòstre nom vertadièr es corrècte e acceptatz las condicions d’utilizacions del servici.',
	'requestaccount-inuse'       => 'Lo nom d’utilizaire es ja utilizat dins una requèsta en cors d’aprobacion.',
	'requestaccount-tooshort'    => 'Vòstra biografia deu aver al mens {{PLURAL:$1|$1 mot|$1 mots}}.',
	'requestaccount-exts'        => 'Lo telecargament dels fiquièrs junts es pas permés.',
	'requestaccount-resub'       => 'Vòstre fiquièr de CV/resumit deu èsser seleccionat un còp de mai per de rasons de seguretat. Daissatz lo camp void se desiratz pas mai lo jonher.',
	'requestaccount-tos'         => 'Ai legit e accèpti de respectar los [[{{MediaWiki:Requestaccount-page}}|tèrmes concernent las condicions d’utilizacion dels servicis]] de {{SITENAME}}.',
	'requestaccount-submit'      => "Demanda de compte d'utilizaire.",
	'requestaccount-sent'        => "Vòstra demanda de compte d'utilizaire es estada mandada amb succès e es estada mesa dins la lista d’espèra d’aprobacion.",
	'request-account-econf'      => 'Vòstra adreça de corrièr electronic es estada confirmada e serà listada tala coma es dins vòstra demanda de compte.',
	'requestaccount-email-subj'  => '{{SITENAME}} confirmacion d’adreça de corrièr electronic.',
	'requestaccount-email-body'  => "Qualqu’un, probablament vos, a formulat, dempuèi l’adreca IP $1, una demanda de compte d'utilizaire « $2 » amb aquesta adreça de corrièr electronic sus {{SITENAME}}. Per confirmar qu'aqueste compte vos aparten vertadièrament sus {{SITENAME}}, sètz pregat de dobrir aqueste ligam dins vòstre navegaira Web : $3 Vòstre senhal vos serà mandat unicament se vòstre compte es creat. Se èra pas lo cas, utilizatz pas aqueste ligam. Aqueste còdi de confirmacion expira lo $4.",
	'acct_request_throttle_hit'  => 'O planhem, avètz demandat $1 comptes. Podètz pas far mai de demanda',
	'requestaccount-loginnotice' => "Per obténer un compte d'utilizaire, devètz ne far '''[[Special:RequestAccount|la demanda]]'''.",
	'confirmaccounts'            => 'Demanda de confirmacion de comptes',
	'confirmaccount-list'        => "Vaquí, çaijós, la lista dels comptes en espèra d’aprobacion. Los comptes acceptats seràn creats e levats d'aquesta lista. Los comptes regetats seràn suprimits d'aquesta meteissa lista.",
	'confirmaccount-list2'       => "Veire la lista dels comptes recentament regetats losquals seràn suprimits automaticament aprèp qualques jorns. Pòdon encara èsser aprobats, e mai podètz consultar los regets abans d'o far.",
	'confirmaccount-text'        => "Vaquí una demanda en cors per un compte d'utilizaire sus '''{{SITENAME}}'''. Atencion, verificatz e, se fe mestièr, confirmatz totas las informacions çaijós. Notatz que podètz causir de crear un compte jos un autre nom. Fasetz aquò unicament per evitar de conflictes amb d’autres noms. Se quitatz aquesta pagina sens confirmar o rejetar aquesta demanda, serà totjorn mesa en espèra.",
	'confirmaccount-none-o'      => "Actualament i a pas cap de demanda de compte d'utilizaire en cors dins aquesta lista.",
	'confirmaccount-none-h'      => "Actualament i a pas cap de reservacion de compte d'utilizaire en cors dins aquesta lista.",
	'confirmaccount-none-r'      => "Actualament i a pas cap de regèt recent de demanda de compte d'utilizaire dins aquesta lista.",
	'confirmaccount-badid'       => 'I a pas cap de demanda en cors correspondent a l’ID indicat. Es possible que aja subit una mantenença.',
	'confirmaccount-back'        => 'Veire la lista de las demandas en cors',
	'confirmaccount-back2'       => 'Veire la lista dels comptes regetats recentament.',
	'confirmaccount-showheld'    => 'Vejatz la lista dels comptes reservats en cors de tractament',
	'confirmaccount-name'        => "Nom d'utilizaire",
	'confirmaccount-real'        => 'Nom',
	'confirmaccount-real-q'      => 'Nom',
	'confirmaccount-email'       => 'Corrièr electronic:',
	'confirmaccount-email-q'     => 'Corrièr electronic',
	'confirmaccount-bio'         => 'Biografia:',
	'confirmaccount-bio-q'       => 'Biografia',
	'confirmaccount-attach'      => 'CV/Resumit :',
	'confirmaccount-notes'       => 'Nòtas suplementàrias :',
	'confirmaccount-urls'        => 'Lista dels sites web :',
	'confirmaccount-none-p'      => '(pas provesit)',
	'confirmaccount-review'      => 'Aprobacion/Regèt',
	'confirmaccount-confirm'     => 'Utilizatz los botons çaijós per acceptar o regetar la demanda.',
	'confirmaccount-econf'       => '(confirmat)',
	'confirmaccount-reject'      => '(regetat per [[User:$1|$1]] lo $2)',
	'confirmaccount-held'        => 'Marcat « detengut » per [[User:$1|$1]] sus $2',
	'confirmaccount-create'      => 'Aprobacion (crea lo compte)',
	'confirmaccount-deny'        => 'Regèt (suprimís lo compte)',
	'confirmaccount-hold'        => 'Detengut',
	'confirmaccount-spam'        => 'Spam (mandetz pas de corrièr electronic)',
	'confirmaccount-reason'      => 'Comentari (figurarà dins lo corrièr electronic) :',
	'confirmaccount-ip'          => 'Adreça IP:',
	'confirmaccount-submit'      => 'Confirmacion',
	'confirmaccount-needreason'  => 'Devètz indicar un motiu dins lo quadre çai aprèp.',
	'confirmaccount-canthold'    => 'Aquesta requèsta es ja, siá presa en compte, siá suprimida.',
	'confirmaccount-acc'         => "La demanda de compte es estada confirmada amb succès ; creacion de l'utilizaire novèl [[User:$1]].",
	'confirmaccount-rej'         => 'La demanda es estada regetada amb succès.',
	'confirmaccount-summary'     => "Creacion de la pagina d'utilizaire amb sa biografia.",
	'confirmaccount-welc'        => "'''Benvenguda sus ''{{SITENAME}}'' !''' Esperam que contribuiretz fòrça e plan. Desiraratz, benlèu, legir [[{{NS:PROJECT}}:Cossí amodar|cossí plan amodar]]. Benvenguda encara e bona contribucions.",
	'confirmaccount-wsum'        => 'Benvenguda !',
	'confirmaccount-email-subj'  => '{{SITENAME}} demanda de compte',
	'confirmaccount-email-body'  => "Vòstra demanda de compte es estada acceptada sus {{SITENAME}}. Nom del compte d'utilizaire : $1 Senhal : $2 Per de rasons de seguretat, deuretz cambiar vòstre senhal al moment de vòstra primièra connexion. Per vos connectar, anatz sus {{fullurl:Special:Userlogin}}.",
	'confirmaccount-email-body2' => "Vòstra demanda de compte d'utilizaire es estada acceptada sus {{SITENAME}}. Nom del compte d'utilizaire : $1 Senhal: $2 $3 Per de rasons de seguretat, deuretz cambiar vòstre senhal al moment de vòstra primièra connexion. Per vos connectar, anatz sus {{fullurl:Special:Userlogin}}.",
	'confirmaccount-email-body3' => 'O planhem, vòstra demanda de compte d\'utilizaire "$1" es estada regetada sus {{SITENAME}}. Mantuna rason pòdon explicar aqueste cas de figura. Es possible que ajatz mal emplenat lo formulari, o que ajatz pas indicat sufisentament d’informacions dins vòstras responsas. Es encara possible que emplenetz pas los critèris d’eligibilitat per obténer vòstre compte. Es possible d’èsser sus la liste dels contactes se desiratz conéisser melhor las condicions requesas.',
	'confirmaccount-email-body4' => 'O planhem, vòstra demanda de compte d\'utilizaire "$1" es estada regetada sus {{SITENAME}}. $2 Es possible d’èsser sus la lista dels contactes per conéisser melhor los critèris per poder s’inscriure.',
	'confirmaccount-email-body5' => 'Abans que vòstra requèsta pel compte « $1 » pòsca èsser acceptada sus {{SITENAME}}, devètz produire qualques informacions suplementàrias. $2 Aquò permetís d’èsser sus la lista dels contactes del site, se desiratz ne saber mai sus las règlas concernent los comptes.',
);

$messages['pl'] = array(
	'acct_request_throttle_hit'   => 'Przepraszamy, zamówiłeś (-aś) już o $1 kont. Nie możesz wykonać więcej zamówień.',
	'confirmaccount-email'        => 'E-mail:',
	'confirmaccount-email-q'      => 'E-mail',
	'confirmaccount-ip'           => 'Adres IP:',
);

/** Piemontèis (Piemontèis)
 * @author Bèrto 'd Sèra
 * @author SPQRobin
 */
$messages['pms'] = array(
	'requestaccount'             => 'Ciamé un cont',
	'requestaccount-text'        => "'''Ch'a completa e ch'a manda sta domanda-sì për ciamé ch'a-j deurbo sò cont utent'''. Per piasì, ch'a varda d'avej present le [[{{MediaWiki:Requestaccount-page}}|Condission ëd servissi]], anans che deurb-se un cont. Na vira che 'l cont a sia aprovà, a l'arseivrà na notìfica për pòsta eletrònica e sò cont a sarà bon da dovré a l'adrëssa [Special:Userlogin]].",
	'requestaccount-dup'         => "'''Ch'a ten-a present: al moment a l'é già andrinta al sistema ën dovrand un cont registrà.'''",
	'requestaccount-legend1'     => 'Cont utent',
	'requestaccount-legend2'     => 'Anformassion personaj',
	'requestaccount-legend3'     => 'Àotre anformassion',
	'requestaccount-acc-text'    => "A soa adrëssa ëd pòsta eletrònica a-i rivërà un messagi, na vira che sta domanda a la sia mandà. Per piasì, ch'a n'arsponda ën dand-ie un colp col rat ansima a l'aniura ch'a treuva ant ël messagi. Ëdcò soa ciav a sarà recapità për pòsta eletrònica, na vira che sò cont a sia creà.",
	'requestaccount-ext-text'    => "St'anformassion-sì as ten privà e as dòvra mach për sta question-sì. S'a veul a peul buté dij contat coma un nùmer ëd telèfono për giuté a identifichesse sensa dubi.",
	'requestaccount-bio-text'    => "Soa biografìa a sarà buta coma contnù base për soa pàgine utent. S'a peul, ch'a buta soe credensiaj, cole ch'a sio. Ch'a varda mach però dë buté dj'anformassion ch'a-j da gnun fastudi publiché. An tute le manere, a peul sempe cambiesse 'd nòm ën dovrand l'adrëssa [[Special:Preferences]].",
	'requestaccount-real'        => 'Nòm vèir:',
	'requestaccount-same'        => '(istess che sò nòm vèir)',
	'requestaccount-email'       => 'Adrëssa ëd pòsta eletrònica:',
	'requestaccount-bio'         => 'Biografìa personal:',
	'requestaccount-attach'      => 'Curriculum vitae (opsional):',
	'requestaccount-notes'       => 'Nòte adissionaj:',
	'requestaccount-urls'        => "Lista ëd sit ant sla Ragnà, s'a-i n'a-i é (buté un për riga):",
	'requestaccount-agree'       => "A venta ch'a sertìfica che sò nòm vèir a l'é giust e ch'a l'é d'acòrdi con nòstre Condission ëd Servissi.",
	'requestaccount-inuse'       => "Stë stranòm-sì a l'é già dovrà ant na domanda ch'a la speta d'esse aprovà.",
	'requestaccount-tooshort'    => "Soa biografìa a l'ha dë esse longa almanch $1 paròle.",
	'requestaccount-exts'        => "Sta sòrt d'archivi as peul pa tachesse.",
	'requestaccount-resub'       => "Për na question ëd sigurëssa a venta torna ch'a selession-a l'archivi ëd sò Curriculum Vitae. Ch'a lassa pura ël camp veujd s'a veul pì nen butelo.",
	'requestaccount-tos'         => "I l'hai lesù le [[{{MediaWiki:Requestaccount-page}}|Condission ëd Servissi]] ëd {{SITENAME}} e i son d'acòrdi d'osserveje. Ël nòm ch'i l'hai butà sot a \"Nòm vèir\" a l'é mè nòm da bon.",
	'requestaccount-submit'      => 'Fé domanda për ël cont',
	'requestaccount-sent'        => "Soa domanda dë deurb-se un cont a l'é staita arseivùa e a la speta d'esse aprovà.",
	'request-account-econf'      => "Soa adrëssa ëd pòsta eletrònica a l'é staita confermà e a la sarà listà coma bon-a an soa domanda dë deurbe 'l cont.",
	'requestaccount-email-subj'  => "Arcesta ëd conferma d'adrëssa ëd pòsta eletrònica da {{SITENAME}}",
	'requestaccount-email-body'  => "Cheidun, ch'a l'é belfé ch'a sia chiel/chila, da 'nt l'adrëssa IP \$1 a l'ha ciamà dë deurbe un cont antestà a \"\$2\" ansima a {{SITENAME}} e a l'ha lassà st'adrëssa ëd pòsta eletrònica-sì. Për confermé che ës cont ansima a {{SITENAME}} a sarìa sò da bon, për piasì ch'a deurba ant sò navigator st'anliura-sì: \$3 

Quand ël cont a vnirà creà, soa la ciav a sarà mandà mach a st'adrëssa-sì. Se për cas a fussa PA stait chiel/chila a fé la domanda, a basta ch'a n'arsponda nen d'autut. Ës còdes ëd conferma-sì a scad dël \$4.",
	'acct_request_throttle_hit'  => "A l'ha gia ciamà $1 cont. Për darmagi ant ës moment-sì i podoma nen aceté dj'àotre domande da chiel/chila.",
	'requestaccount-loginnotice' => "Për deurb-se un sò cont utent, a venta '''[[Special:RequestAccount|ch<nowiki>'</nowiki>a në ciama un]]'''.",
	'confirmaccounts'            => 'Conferma dle domande ëd cont neuv da deurbe',
	'confirmaccount-list'        => "Ambelessì sota a-i é na lista ëd domanda ch'a speto d'esse aprovà. Ij cont aprovà a saran creà e peuj gavà via da 'n sta lista. Ij cont arfudà a saran mach dëscancelà da 'nt la lista.",
	'confirmaccount-list2'       => "Ambelessì sota a-i é na lista ëd coint ch'a son stait arfudà ant j'ùltim temp, e ch'a l'é belfé ch'a ven-o scancelà n'aotomàtich na vira ch'a sia passa-ie chèich dì dal giudissi negativ. Ën vorend as peulo anco' sempe aprovesse bele che adess, ma miraco un a veul sente l'aministrator ch'a l'ha arfudaje, anans che fé che fé.",
	'confirmaccount-text'        => "A-i é na domanda duvèrta për deurbe un cont utent a '''{{SITENAME}}'''. Për piasì, ch'a varda lòn ch'a lé e se a fa da manca ch'a conferma j'anformassion ambelessì sota. Ch'a ten-a present ch'a peul decide dë creé ël cont con në stranòm diferent da col ciamà, se col-lì a fussa già dovrà da cheidun d'àotr. S'a va via da sta pàgina-sì sensa pijé ëd decision a-i riva gnente, la domanda a la resta duvèrta.",
	'confirmaccount-real-q'      => 'Nòm',
	'confirmaccount-email-q'     => 'Adrëssa ëd pòsta eletrònica',
	'confirmaccount-bio-q'       => 'Biografìa',
	'confirmaccount-back'        => 'Vardé la lista dle domande duvèrte',
	'confirmaccount-back2'       => "Vardé la lista dle domande arfudà ant j'ùltim temp",
	'confirmaccount-review'      => 'Aprové/Arfudé',
	'confirmaccount-badid'       => "A-i é gnun-a domanda duvèrta ch'a-j corisponda a l'identificativ ch'a l'ha butà. A peul esse ch'a la sia già staita tratà da cheidun d'àotr.",
	'confirmaccount-name'        => 'Stranòm',
	'confirmaccount-real'        => 'Nòm:',
	'confirmaccount-email'       => 'Adrëssa ëd pòsta eletrònica:',
	'confirmaccount-bio'         => 'Biografìa:',
	'confirmaccount-attach'      => 'Curriculum Vitae:',
	'confirmaccount-notes'       => 'Nòte adissionaj:',
	'confirmaccount-urls'        => 'Lista ëd sit ant sla Ragnà:',
	'confirmaccount-confirm'     => "Ch'a dòvra j'opsion ambelessì sota për aprové, arfudé ò lassé an coa la domanda:",
	'confirmaccount-econf'       => '(confermà)',
	'confirmaccount-reject'      => '(arfudà da [[User:$1|$1]] dël $2)',
	'confirmaccount-held'        => '(marcà "an coa" da [[User:$1|$1]] dël $2)',
	'confirmaccount-create'      => "Aceté (deurbe 'l cont)",
	'confirmaccount-deny'        => "Arfudé (e gavé da 'nt la lista)",
	'confirmaccount-hold'        => 'Lassé an coa',
	'confirmaccount-spam'        => 'Rumenta ëd reclam (mand-je nen pòsta)',
	'confirmaccount-reason'      => 'Coment (a-i resta andrinta al messagi postal):',
	'confirmaccount-ip'          => 'Adrëssa IP:',
	'confirmaccount-submit'      => 'Confermé',
	'confirmaccount-needreason'  => 'A venta specifiché na rason ant ël quàder ëd coment ambelessì sota.',
	'confirmaccount-acc'         => "Conferma dla domanda andaita a bonfin; a l'é dorbusse ël cont utent [[User:$1]].",
	'confirmaccount-rej'         => 'Arfud dla domanda andait a bonfin.',
	'confirmaccount-summary'     => "I soma antramentr ch'i foma na neuva pàgina utent con la biografìa dl'utent neuv.",
	'confirmaccount-welc'        => "''Bin ëvnù/a  an ''{{SITENAME}}''!''' I speroma d'arsèive sò contribut e deje bon servissi. Miraco a peul ess-je d'agiut lese la session [[{{MediaWiki:Helppage}}|Amprende a travajé da zero]]. N'àotra vira, bin ëvnù/a e tante bele còse!",
	'confirmaccount-wsum'        => 'Bin ëvnù/a!',
	'confirmaccount-email-subj'  => 'Domanda dë deurbe un cont neuv ansima a {{SITENAME}}',
	'confirmaccount-email-body'  => "Soa domanda dë deurbe un cont neuv ansima a {{SITENAME}} a l'é staita aprovà. Stranòm: $1 Ciav: $2 

Për na question ëd sigurëssa a fa da manca che un as cambia soa ciav la prima vira ch'a rintra ant ël sistema. Për rintré, për piasì ch'a vada a l'adrëssa {{fullurl:Special:Userlogin}}.",
	'confirmaccount-email-body2' => "Soa domanda dë deurbe un cont neuv ansima a {{SITENAME}} a l'é staita aprovà. Stranòm: $1 Ciav: $2 $3 

Për na question ëd sigurëssa un a venta ch'as cambia soa ciav la prima vira ch'a rintra ant ël sistema. Për rintré, për piasì ch'a vada a l'adrëssa {{fullurl:Special:Userlogin}}.",
	'confirmaccount-email-body3' => "Për darmagi soa domanda dë deurbe un cont ciamà \"\$1\" ansima a {{SITENAME}} a l'é staita bocià. A-i son vàire rason përchè sossì a peula esse rivà. A peul esse ch'a l'abia pa compilà giust la domanda, che soe arspòste a sio staite tròp curte, ò pura che an chèich àotra manera a l'abia falì da rintré ant ël criteri d'aprovassion. A peul esse che ant sël sit a sio specificà dle liste postaj ch'a peul dovré për ciamé pì d'anformassion ansima ai criteri d'aprovassion dovrà.",
	'confirmaccount-email-body4' => 'Për darmagi soa domanda dë deurbe un cont ciamà "$1" ansima a Betawiki a l\'é staita bocià. $2 A peul esse che ant sël sit a sio specificà dle liste postaj ch\'a peul dovré për ciamé pì d\'anformassion ansima ai criteri d\'aprovassion dovrà.',
	'confirmaccount-email-body5' => 'Anans che soa domanda dë deurbe un cont ciamà "$1" ansima a {{SITENAME}} a peula esse acetà, a dovrìa lassene dj\'anformassion adissionaj. $2 A peul esse che ant sël sit a sio specificà dle liste postaj ch\'a peul dovré për ciamé pì d\'anformassion ansima ai criteri d\'aprovassion dovrà.',
);

$messages['pt'] = array(
	'requestaccount'              => 'Requerer conta',
	'requestaccount-legend1'      => 'Conta de utilizador',
	'requestaccount-legend2'      => 'Informação pessoal',
	'requestaccount-legend3'      => 'Outra informação',
	'requestaccount-real'         => 'Nome real:',
	'requestaccount-same'         => '(igual ao nome real)',
	'requestaccount-bio'          => 'Biografia pessoal:',
	'requestaccount-attach'       => 'Curriculum Vitae (opcional):',
	'requestaccount-notes'        => 'Notas adicionais:',
	'requestaccount-tooshort'     => 'A sua biografia tem que ter pelo menos $1 palavras.',
	'requestaccount-exts'         => 'O tipo de ficheiro do anexo não é permitido.',
	'requestaccount-submit'       => 'Requerer conta',
	'requestaccount-email-subj'   => 'Confirmação de endereço de email para {{SITENAME}}',
	'confirmaccounts'             => 'Confirmar requerimentos de conta',
	'confirmaccount-real'         => 'Nome:',
	'confirmaccount-real-q'       => 'Nome',
	'confirmaccount-bio'          => 'Biografia:',
	'confirmaccount-bio-q'        => 'Biografia',
	'confirmaccount-notes'        => 'Notas adicionais:',
	'confirmaccount-review'       => 'Aprovar/Rejeitar',
	'confirmaccount-econf'        => '(confirmado)',
	'confirmaccount-ip'           => 'Endereço IP:',
	'confirmaccount-submit'       => 'Confirmar',
	'confirmaccount-wsum'         => 'Bem-vindo!',
);

$messages['rm'] = array(
	'confirmaccount-name'         => 'Num d\'utilisader',
	'confirmaccount-real'         => 'Num:',
	'confirmaccount-real-q'       => 'Num',
);

/** Russian (Русский)
 * @author .:Ajvol:.
 */
$messages['ru'] = array(
	'requestaccount'            => 'Запрос учётной записи',
	'requestaccount-text'       => "'''Заполните и отправьте следующую форму запроса учётной записи.'''
	
	Перед подачей запроса, пожалуйста, прочитайте [[{{MediaWiki:Requestaccount-page}}|Условия предоставления услуг]].
	
	После того, как учётная запись будет подтверждена, вам придёт уведомление по электронной почте, можно будет 
	[[Special:Userlogin|представиться системе]].",
	'requestaccount-page'       => '{{ns:project}}:Условия предоставления услуг',
	'requestaccount-dup'        => "'''Примечание: вы уже представились системе с зарегистрированной учётной записи.'''",
	'requestaccount-legend1'    => 'Учётная запись участника',
	'requestaccount-legend2'    => 'Личные сведения',
	'requestaccount-legend3'    => 'Другая информация',
	'requestaccount-ext-text'   => 'Следующая информация будет сохранена в секрете и будет использована только для обработки данного запроса.
	Вы можете перечислить способы связи, например, номер телефона, чтобы помочь в подтверждении идентичности.',
	'requestaccount-bio-text'   => 'Ваша биография будет по умолчанию помещена на вашу личную страницу. Попробуйте включить какие-либо полномочия. Убедитесь, что вы не против публикации этой информации. Ваше имя может быть изменено с помощью настроек [[Special:Preferences]].',
	'requestaccount-real'       => 'Настоящее имя:',
	'requestaccount-same'       => '(такая же как и настоящее имя)',
	'requestaccount-email'      => 'Электронная почта:',
	'requestaccount-bio'        => 'Личная биография:',
	'requestaccount-attach'     => 'Резюме (необязательно):',
	'requestaccount-agree'      => 'Вы должны подтвердить, что ваше настоящее имя указано правильно и вы согласны с нашими Условиями предоставления услуг.',
	'requestaccount-inuse'      => 'Имя участника уже указано в одном из запросов на учётную запись.',
	'requestaccount-tooshort'   => 'Ваша биография должна содержать не менее $1 слов.',
	'requestaccount-exts'       => 'Присоединение данного типа файлов запрещено.',
	'requestaccount-resub'      => 'В целях безопасности, ваш файл с резюме должен быть заменён. Оставьте поле пустым,
	если вы не желаете отправлять резюме.',
	'requestaccount-tos'        => 'Я прочитал и соглшаюсь следовать [[{{MediaWiki:Requestaccount-page}}|Условиям предоставления услуг]] проекта {{SITENAME}}.
	Имя, которое я указал в поле «Настоящее имя», действительно является моим настоящим именем.',
	'requestaccount-submit'     => 'Запросить учётную запись',
	'requestaccount-sent'       => 'Ваш запрос на получение учётной записи был успешно отправлен и теперь ожидает обработки.',
	'request-account-econf'     => 'Ваш адрес электронной почты был подтверждён и будет указан в вашем запросе учётной записи.',
	'requestaccount-email-subj' => '{{SITENAME}}: подтверждение по эл. почте',
	'requestaccount-email-body' => 'Кто-то (вероятно, вы) с IP-адреса $1 запросил на сайте {{SITENAME}},
учётную запись «$2» и указал данный адрес электронной почты.

Чтобы подтвердить, что это учётная запись на сервере {{SITENAME}} действительно принадлежит вам,
откройте следующую ссылку в браузере:

$3

После создания учётной записи, только вам может быть отправлен пароль.
Если к вам данное сообщение *не* относится — не переходите по ссылке.

Этот код активации прекратит действие $4.',
);

/** Slovak (Slovenčina)
 * @author Helix84
 * @author SPQRobin
 */
$messages['sk'] = array(
	'requestaccount'             => 'Vyžiadať účet',
	'requestaccount-text'        => "'''Vyplnením a odoslaním nasledovného formulára vyžiadate používateľský účet'''. Uistite sa, že ste si pred vyžiadaním účtu najskôr prečítali [[{{MediaWiki:Requestaccount-page}}|Podmienky použitia]]. Keď bude účet schválený, príde vám emailom oznámenie a bude možné prihlásiť sa na [[Special:Userlogin]].",
	'requestaccount-page'        => '{{ns:project}}:Podmienky použitia',
	'requestaccount-dup'         => "'''Pozn.: Už ste prihlásený ako zaregistrovaný používateľ.'''",
	'requestaccount-legend1'     => 'Používateľský účet',
	'requestaccount-legend2'     => 'Osobné informácie',
	'requestaccount-legend3'     => 'Ostatné informácie',
	'requestaccount-acc-text'    => 'Na vašu emailovú adresu bude po odoslaní žiadosti zaslaná potvrdzujúca správa. Prosím, reagujte na ňu kliknutím na odkaz v nej. Potom ako bude váš účet vytvorený, dostanete emailom heslo k nemu.',
	'requestaccount-ext-text'    => 'Nasledovné informácie budú držané v tajnosti a použijú sa iba na účel tejto žiadosti. Možno budete chcieť uviesť kontakty ako telefónne číslo, ktoré môžu pomôcť pri potvrdení.',
	'requestaccount-bio-text'    => 'Vaša biografia bude prvotným obsahom vašej používateľskej stránky. Pokúste sa uviesť všetky referencie. Zvážte, či ste ochotní zverejniť tieto informácie. Vaše meno je možné zmeniť pomocou [[Special:Preferences]].',
	'requestaccount-real'        => 'Skutočné meno:',
	'requestaccount-same'        => '(rovnaké ako skutočné meno)',
	'requestaccount-email'       => 'Emailová adresa:',
	'requestaccount-bio'         => 'Osobná biografia:',
	'requestaccount-attach'      => 'Resumé alebo CV (nepovinné):',
	'requestaccount-notes'       => 'Ďalšie poznámky:',
	'requestaccount-urls'        => 'Zoznam webstránok, ak nejaké sú (jednu na každý riadok):',
	'requestaccount-agree'       => 'Musíte osvedčiť, že vaše skutočné meno je správne a že súhlasíte s našimi Podmienkami použitia.',
	'requestaccount-inuse'       => 'Používateľské meno už bolo vyžiadané v prebiehajúcej žiadosti o účet.',
	'requestaccount-tooshort'    => 'Vaša biografia musí mať aspoň $1 slov.',
	'requestaccount-exts'        => 'Tento typ prílohy nie je povolený.',
	'requestaccount-resub'       => 'Váš súbor s CV/resumé je potrebné z bezpečnostných dôvodov znova vybrať. nechajte pole prázdne
	ak ste sa rozhodli žiadny nepriložiť.',
	'requestaccount-tos'         => 'Prečítal som a súhlasím, že budem dodržiavať [[{{MediaWiki:Requestaccount-page}}|Podmienky používania služby]] {{GRAMMAR:genitív|{{SITENAME}}}}. Meno, ktoré som uviedol ako „Skutočné meno“ je naozaj moje občianske meno.',
	'requestaccount-submit'      => 'Požiadať o účet',
	'requestaccount-sent'        => 'Vaša žiadosť o účet bola úspešne odoslaná a teraz sa čaká na jej kontrolu.',
	'request-account-econf'      => 'Vaša emailová adresa bola potvrdená a v takomto tvare sa uvedie vo vašej žiadosti o účet.',
	'requestaccount-email-subj'  => 'potvrdenie e-mailovej adresy pre {{GRAMMAR:akuzatív|{{SITENAME}}}}',
	'requestaccount-email-body'  => 'Niekto, pravdepodobne vy z IP adresy $1, zaregistroval účet
"$2" s touto e-mailovou adresou na {{GRAMMAR:lokál|{{SITENAME}}}}.

Pre potvrdenie, že tento účet skutočne patrí vám a pre aktivovanie
e-mailových funkcií na {{GRAMMAR:lokál|{{SITENAME}}}}, otvorte tento odkaz vo vašom prehliadači:

$3

Ak ste to *neboli* vy, neotvárajte odkaz. Tento potvrdzovací kód
vyprší o $4.',
	'acct_request_throttle_hit'  => 'Prepáčte, už ste požiadali o vytvorenie $1 účtov. Nemôžete ich odoslať viac žiadostí.',
	'requestaccount-loginnotice' => "Aby ste dostali používateľský účet, musíte '''[[Special:RequestAccount|oň požiadať]]'''.",
	'confirmaccounts'            => 'Potvrdiť žiadosti o účet',
	'confirmaccount-list'        => 'Nižšie je zoznam žiadostí o účet, ktoré čakajú na schválenie. Schválené účty budú vytvorené a odstránené z tohoto zoznamu. Odmietnuté účty budú jednoducho odstránené z tohoto zoznamu.',
	'confirmaccount-list2'       => 'Nižšie je zoznam nedávno odmietnutých žiadostí o účet, ktoré môžu byť automaticky odstránené po niekoľkých dňoch. Ešte stále ich môžete schváliť a vytvoriť z nich platné účty, hoci by ste sa mali predtým, než tak učiníte, poradiť so správcom, ktorý ich odmietol.',
	'confirmaccount-text'        => "Toto je žiadosť o používateľský účet na '''{{GRAMMAR:lokál|{{SITENAME}}}}''' v štádiu spracovania. Pozorne ju skontrolujte a ak treba, overte všetky dolu uvedené informácie. Máte tiež možnosť vytvoriť účet pod odlišným používateľským menom, to však používajte iba na odstránenie konfliktov s inými menami. Ak jednoducho opustíte túto stránku bez toho, aby ste ju schválili alebo odmietli, zostane v štádiu spracovania.",
	'confirmaccount-none-o'      => 'Momentálne nie sú v tomto zozname žiadne čakajúce žiadosti na vytvorenie účtu.',
	'confirmaccount-none-h'      => 'Momentálne nie sú v tomto zozname žiadne pozastavené žiadosti na vytvorenie účtu.',
	'confirmaccount-none-r'      => 'Momentálne nie sú v tomto zozname žiadne zamietnuté žiadosti na vytvorenie účtu.',
	'confirmaccount-real-q'      => 'Meno',
	'confirmaccount-email-q'     => 'Email',
	'confirmaccount-bio-q'       => 'Biografia',
	'confirmaccount-back'        => 'Zobraziť zoznam nespracovaných účtov',
	'confirmaccount-back2'       => 'Zobraziť zoznam nedávno odmietnutých účtov',
	'confirmaccount-showheld'    => 'Zobraziť zoznam účtov čakajúcich na schválenie',
	'confirmaccount-review'      => 'Schváliť/odmietnuť',
	'confirmaccount-badid'       => 'Neexistuje žiadna nespracovaná žiadosť o účet zodpovedajúca zadanému ID. Je možné, že už bola spracovaná.',
	'confirmaccount-name'        => 'Používateľské meno',
	'confirmaccount-real'        => 'Meno:',
	'confirmaccount-email'       => 'Email:',
	'confirmaccount-bio'         => 'Biografia:',
	'confirmaccount-attach'      => 'Resumé/CV:',
	'confirmaccount-notes'       => 'Ďalšie poznámky:',
	'confirmaccount-urls'        => 'Zoznam webstránok:',
	'confirmaccount-none-p'      => '(neposkytnuté)',
	'confirmaccount-confirm'     => 'Tlačidlami nižšie môžete prijať alebo odmietnuť túto žiadosť.',
	'confirmaccount-econf'       => '(potvrdený)',
	'confirmaccount-reject'      => '(odmietol [[User:$1|$1]] $2)',
	'confirmaccount-held'        => '(používateľ [[User:$1|$1]] $2 označenil ako „pozastavené“)',
	'confirmaccount-create'      => 'Prijať (vytvoriť účet)',
	'confirmaccount-deny'        => 'Odmietnuť (odstrániť žiadosť)',
	'confirmaccount-hold'        => 'Pozastaviť',
	'confirmaccount-spam'        => 'Spam (neposielať email)',
	'confirmaccount-reason'      => 'Komentár (bude súčasťou emailu email):',
	'confirmaccount-ip'          => 'IP adresa:',
	'confirmaccount-submit'      => 'Potvrdiť',
	'confirmaccount-needreason'  => 'Do komentára dolu musíte napísať dôvod.',
	'confirmaccount-canthold'    => 'Táto žiadosť je už buď pozdržaná alebo zmazaná.',
	'confirmaccount-acc'         => 'Žiadosť o účet bola úspešne potvrdená; bol vytvorený nový používateľský účet [[User:$1]].',
	'confirmaccount-rej'         => 'Žiadosť o účet bola úspešne odmietnutá.',
	'confirmaccount-summary'     => 'Vytvára sa používateľská stránka s biografiou nového používateľa.',
	'confirmaccount-welc'        => "'''Vitajte v ''{{GRAMMAR:lokál|{{SITENAME}}}}''!''' Dúfame, že budete prispievať vo veľkom množstve a kvalitne. Pravdepodobne si budete chcieť prečítať [[{{MediaWiki:Helppage}}|Začíname]]. Tak ešte raz vitajte a bavte sa!",
	'confirmaccount-wsum'        => 'Vitajte!',
	'confirmaccount-email-subj'  => 'žiadosť o účet {{GRAMMAR:genitív|{{SITENAME}}}}',
	'confirmaccount-email-body'  => 'Vaša žiadosť o účet na {{GRAMMAR:lokál|{{SITENAME}}}} bola schválená. Názov účtu: $1 Heslo: $2 Z bezpečnostných dôvodov si budete musieť pri prvom prihlásení svoje heslo zmeniť. Teraz sa môžete prihlásiť na {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'Vaša žiadosť o účet na {{GRAMMAR:lokál|{{SITENAME}}}} bola schválená. Názov účtu: $1 Heslo: $2 $3 Z bezpečnostných dôvodov si budete musieť pri prvom prihlásení svoje heslo zmeniť. Teraz sa môžete prihlásiť na {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'Je nám ľúto, ale vaša žiadosť o účet „$1“ na {{GRAMMAR:lokál|{{SITENAME}}}} bola zamietnutá. Je niekoľko dôvodov, prečo sa to mohlo stať. Buď ste nevyplnili formulár správne, neposkytli ste požadovanú dĺžku vašich odpovedí alebo inak ste nesplnili kritériá. Ak sa chcete dozvedieť viac o politike tvorby účtov, na tejto stránke môžete nájsť kontakty.',
	'confirmaccount-email-body4' => 'Je nám ľúto, ale vaša žiadosť o účet „$1“ na {{GRAMMAR:lokál|{{SITENAME}}}} bola zamietnutá. Ak sa chcete dozvedieť viac o politike tvorby účtov, na tejto stránke môžete nájsť kontakty.',
	'confirmaccount-email-body5' => 'Predtým, než bude možné vašu žiadosť o účet „$1“ na {{GRAMMAR:lokál|{{SITENAME}}}} možné prijať 
	musíte poskytnúť ďalšie informácie.

$2

Na stránke môže byť uvedený zoznam kontaktov, ktorý môžete použiť ak sa chcete dozvedieť viac o politike používateľských účtov.',
);

$messages['ss'] = array(
	'confirmaccount-real'         => 'Ligama:',
	'confirmaccount-real-q'       => 'Ligama',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$messages['stq'] = array(
	'requestaccount'             => 'Benutserkonto fräigje',
	'requestaccount-text'        => "'''Fäl dät foulgjende Formular uut un ferseend dät, uum n Benutserkonto tou fräigjen'''. 

	Läs eerste do [[{{MediaWiki:Requestaccount-page}}|Nutsengsbedingengen]] eer du n Benutserkonto fräigest.

	Sobolde dät Konto bestäätiged wuude, krichst du per E-Mail Bescheed un du koast die unner „[[{{ns:special}}:Userlogin|Anmäldje]]“ ienlogje.",
	'requestaccount-page'        => '{{ns:project}}:Nutsengsbedingengen',
	'requestaccount-dup'         => "'''Oachtenge: Du bäst al mäd n registrierd Benutserkonto ienlogged.'''",
	'requestaccount-legend1'     => 'Benutserkonto',
	'requestaccount-legend2'     => 'Persöönelke Informatione',
	'requestaccount-legend3'     => 'Wiedere Informatione',
	'requestaccount-acc-text'    => 'An dien E-Mail-Adresse wäd ätter dät Ouseenden fon dit Formular ne Bestäätigengsmail soand. 
Reagier deerap, wan du ap ju in ju Mail äntheeldene Bestäätigengsferbiendenge klikst.
Sobolde n dien Konto anlaid wuude,
wäd die dien Paaswoud per E-Mail tousoand.',
	'requestaccount-ext-text'    => 'Do foulgjende Informatione wäide fertjouelk behanneld un bloot foar dissen Andraach
ferwoand. Dd koast Kontakt-Angoawen as ne Telefonnummer moakje, uum ju Beoarbaidenge fon din Andraach eenfacher tou moakjen.',
	'requestaccount-bio-text'    => 'Dien Biographie wäd as initioale Inhoold fon dien Benutsersiede spiekerd. Fersäik aal do nöödige Referenzen tou ärwäänen, man staal sicher, dät du do Informatione wuddelk eepentelk bekoand moakje moatest. Du koast din Noome unner „[[{{ns:special}}:preferences|Ienstaalengen]]“ annerje.',
	'requestaccount-real'        => 'Realname:',
	'requestaccount-same'        => '(as die Realname)',
	'requestaccount-email'       => 'E-Mail-Adresse:',
	'requestaccount-bio'         => 'Persöönelke Biographie:',
	'requestaccount-attach'      => 'Lieuwensloop (optional):',
	'requestaccount-notes'       => 'Bietoukuumende Angoawen:',
	'requestaccount-urls'        => 'Lieste fon Websieden (truch Riegenuumbreeke tränd):',
	'requestaccount-agree'       => 'Du moast bestäätigje, dät din Realname so gjucht is un du do Benutserbedingengen akzeptierst.',
	'requestaccount-inuse'       => 'Die Benutsernoome is al in n uur Benutserandraach in Ferweendenge.',
	'requestaccount-tooshort'    => 'Dien Biographie schuul mindestens $1 Woude loang weese.',
	'requestaccount-exts'        => 'Die Doatäityp fon dän Anhong is nit ferlööwed.',
	'requestaccount-resub'       => 'Ju Doatäi mäd din Lieuwensloop mout uut Sicherhaidsgruunden näi uutwääld wäide.
Läit dät Fäild loos, wan du naan Lieuwensloop moor anföigje moatest.',
	'requestaccount-tos'         => 'Iek hääbe do [[{{MediaWiki:Requestaccount-page}}|Benutsengsbedingengen]] fon {{SITENAME}} leesen un akzeptierje do.
Iek bestäätigje, dät die Noome, dän iek unner „Realname“ ounroat hääbe, min wuddelke Noome is.',
	'requestaccount-submit'      => 'Fräigje uum n Benutserkonto',
	'requestaccount-sent'        => 'Dien Andraach wuude mäd Ärfoulch fersoand un mout nu noch wröiged wäide.',
	'request-account-econf'      => 'Dien E-Mail-Adresse wuude bestäätiged un wäd nu as sodoane in dien  Account-Froage fierd.',
	'requestaccount-email-subj'  => '{{SITENAME}} E-Mail-Adressen Wröich',
	'requestaccount-email-body'  => 'Wäl mäd ju IP-Adresse $1, muugelkerwiese du, häd bie {{SITENAME}} uum dät Benutserkonto "$2" mäd dien E-Mail Adresse fräiged.

Uum tou bestäätigjen, dät wuddelk du uum dit Konto bie {{SITENAME}} fräiged hääst, eepenje foulgjende Ferbiendenge in din Browser:

$3

Wan dät Benutserkonto moaked wuude, krichst du ne E-Mail mäd dät Paaswoud.

Wan du *nit* uum dät Benutserkonto fräiged hääst, eepenje ju Ferbiendenge nit!

Disse Bestäätigengscode wäd uum $4 uungultich.',
	'acct_request_throttle_hit'  => 'Du hääst al $1 uum Benutserkonten fräiged, du koast apstuuns neen wiedere fräigje.',
	'requestaccount-loginnotice' => "Uum n näi Benutserkonto tou kriegen, moast du 
der uum '''[[{{ns:special}}:RequestAccount|fräigje]]'''.",
	'confirmaccounts'            => 'Benutserkonto-Froagen bestäätigje',
	'confirmaccount-list'        => 'Hier unner finst du ne Lieste fon noch tou beoarbaidjen Benutserkonto-Froagen.
Bestäätigede Konten wäide anlaid un uut ju Lieste wächhoald. Ouliende Konten wäide eenfach uut ju Lieste läsked.',
	'confirmaccount-text'        => "Dit is n Andraach ap n Benutserkonto bie '''{{SITENAME}}'''. Wröigje aal hier unner stoundene Informatione gruundelk un bestäätigje do Informatione wan muugelk. Beoachtje, dät du dän Tougong bie Bedarf unner 
n uur Benutsernoome anlääse koast. Du schuust dät bloot nutsje, uum Kollisione mäd uur Noomen tou fermieden.

Wan du disse Siede ferlätst, sunner dät Konto tou bestäätigjen of outoulienen, dan blift die Andraach eepen stounde.",
	'confirmaccount-none-o'      => 'Apstuuns rakt et neen eepene Benutserandraage ap disse Lieste.',
	'confirmaccount-none-h'      => 'Apstuuns rakt et neen Andraage in dän „outäiwe“-Stoatus ap disse Lieste.',
	'confirmaccount-none-r'      => 'Apstuuns rakt et neen knu ouliende Benutserandraage ap disse Lieste.',
	'confirmaccount-real-q'      => 'Noome',
	'confirmaccount-email-q'     => 'E-Mail',
	'confirmaccount-bio-q'       => 'Biographie',
	'confirmaccount-back'        => 'Lieste fon do eepene Andraage ankiekje',
	'confirmaccount-back2'       => 'Lieste fon do knu ouliende Andraage ankiekje',
	'confirmaccount-showheld'    => 'Lieste fon do Andraage ap „outäiwe“-Stoatus anwiese',
	'confirmaccount-review'      => 'Bestäätigje/Ouliene',
	'confirmaccount-badid'       => 'Apstuuns rakt et neen Benutserandraach tou ju anroate ID. Muugelkerwiese wuude hie al beoarbaided.',
	'confirmaccount-name'        => 'Benutsernoome',
	'confirmaccount-real'        => 'Noome:',
	'confirmaccount-email'       => 'E-Mail:',
	'confirmaccount-bio'         => 'Biographie:',
	'confirmaccount-attach'      => 'Lieuwensloop:',
	'confirmaccount-urls'        => 'Lieste fon do Websieden:',
	'confirmaccount-none-p'      => '(Niks ounroat)',
	'confirmaccount-confirm'     => 'Benutsje ju foulgjende Uutwoal, uum dän Andraach tou akzeptierjen, outoulienen of noch tou täiwen.',
	'confirmaccount-econf'       => '(bestäätiged)',
	'confirmaccount-reject'      => '(ouliend truch [[User:$1|$1]] ap n $2)',
	'confirmaccount-held'        => '(markierd as „outäiwe“ truch [[User:$1|$1]] ap n $2)',
	'confirmaccount-create'      => 'Bestäätigje (Konto anlääse)',
	'confirmaccount-deny'        => 'Ouliene (Andraach läskje)',
	'confirmaccount-hold'        => 'Markierd as „outäiwe“',
	'confirmaccount-reason'      => 'Begruundenge (wäd in ju Mail an dän Andraachstaaler ienföiged):',
	'confirmaccount-ip'          => 'IP-Addresse:',
	'confirmaccount-submit'      => 'Ouseende',
	'confirmaccount-needreason'  => 'Du moast ne Begruundenge ounreeke.',
	'confirmaccount-canthold'    => 'Disse Froage wuude al as „outäiwe“ markierd of läsked.',
	'confirmaccount-acc'         => 'Benutserandraach mäd Ärfoulch bestäätiged; Benutser [[{{ns:User}}:$1]] wuude anlaid.',
	'confirmaccount-rej'         => 'Benutserandraach wuude ouliend.',
	'confirmaccount-summary'     => 'Moak Benutsersiede mäd ju Biographie fon dän näie Benutser.',
	'confirmaccount-welc'        => "'''Wäilkuumen bie ''{{SITENAME}}''!''' Wie hoopje, dät du fuul goude Informatione biedrächst.
	Muugelkerwiese moatest du eerste do [[{{MediaWiki:Helppage}}|Eerste Stappe]] leese. Nochmoal: Wäilkuumen un hääb Spoas!~",
	'confirmaccount-wsum'        => 'Wäilkuumen!',
	'confirmaccount-email-subj'  => '{{SITENAME}} Froage uum n Benutserkonto',
	'confirmaccount-email-body'  => 'Dien Froage uum n Benutserkonto bie {{SITENAME}} wuude bestäätiged.

Benutsernoome: $1

Paaswoud: $2

Uut Sicherhaidsgruunden schuust du dien Paaswoud uunbedingd bie dät eerste
Ienlogjen annerje. Uum die ientoulogjen gungst du ap ju Siede
{{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body2' => 'Dien Froage uum n Benutserkonto bie {{SITENAME}} wuude bestäätiged. 

Benutsernoome: $1 

Paaswoud: $2 

Uut Sicherhaidsgruunden schuust du dien Paaswoud uunbedingd bie dät eerste Ienlogjen annerje. Uum die ientoulogjen gungst du ap ju Siede {{fullurl:Special:Userlogin}}.',
	'confirmaccount-email-body3' => 'Spietelk wuude dien Froage uum n Benutserkonto „$1“ 
bie {{SITENAME}} ouliend.

Dit kon fuul Gruunde hääbe. Muugelkerwiese hääst du dät Froageformular
nit gjucht uutfäld, hääst nit genöigjend Angoawen moaked of hääst
do Anfoarderengen ap uur Wiese nit uutfierd.',
	'confirmaccount-email-body4' => 'Spietelk wuude dien Froage uum n Benutserkonto „$1“ 
bie {{SITENAME}} ouliend.

$2

Muugelkerwiese rakt dät ap ju Siede Kontaktadressen, an do du die weende
koast, wan du moor uut do Anfoarderengen wiete moatest.',
	'confirmaccount-email-body5' => 'Eer dien Anfroage foar dät Benutserkonto „$1“ fon {{SITENAME}} akzeptierd wäide kon,
       moast du bietoukuumende Informatione touseende.

$2

Muugelkerwiese rakt et ap ju Siede Kontaktadressen, an do du die weende
koast, wan du moor uur do Anfoarderengen wiete moatest.

Bevor deine Anfrage für das Benutzerkonto „$1“ von {{SITENAME}} akzeptiert werden kann, 
       musst du zusätzliche Informationen übermitteln.',
);

$messages['yue'] = array(
	# Request account page
	'requestaccount'          => '請求戶口',
	'requestaccount-text'      => '\'\'\'完成並遞交下面嘅表格去請求一個用戶戶口\'\'\'。 
	
	請確認你響請求一個戶口之前，先讀過[[{{MediaWiki:Requestaccount-page}}|服務細則]]。
	
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
	你可能會去睇吓[[{{MediaWiki:Helppage}}|開始]]。再一次歡迎你！ 
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

$messages['zh-hans'] = array(
	# Request account page
	'requestaccount'          => '请求账户',
	'requestaccount-text'      => '\'\'\'完成并递交以下的表格去请求一个用户账户\'\'\'。 
	
	请确认您在请求一个账户之前，先读过[[{{MediaWiki:Requestaccount-page}}|服务细则]]。
	
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
	您可能会去参看[[{{MediaWiki:Helppage}}|开始]]。再一次欢迎你！ 
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

$messages['zh-hant'] = array(
	# Request account page
	'requestaccount'          => '請求帳戶',
	'requestaccount-text'      => '\'\'\'完成並遞交以下的表格去請求一個用戶帳戶\'\'\'。 
	
	請確認您在請求一個帳戶之前，先讀過[[{{MediaWiki:Requestaccount-page}}|服務細則]]。
	
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
	您可能會去參看[[{{MediaWiki:Helppage}}|開始]]。再一次歡迎你！ 
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

$messages['zh'] = $messages['zh-hans'];
$messages['zh-cn'] = $messages['zh-hans'];
$messages['zh-hk'] = $messages['zh-hant'];
$messages['zh-sg'] = $messages['zh-hans'];
$messages['zh-tw'] = $messages['zh-hant'];
$messages['zh-yue'] = $messages['yue'];
