<?php

$messages = array();

$messages['en'] = array(
		'extensiondistributor' => 'Download MediaWiki extension',
		'extensiondistributor-desc' => 'Extension for distributing snapshot archives of extensions',
		'extdist-not-configured' => 'Please configure $wgExtDistList and $wgExtDistArchiveAPI',
		'extdist-list-missing' => 'Unable to fetch extension list!',
		'extdist-no-such-extension' => 'No such extension "$1"',
		'extdist-no-such-version' => 'The extension "$1" does not exist in the version "$2".',
		'extdist-choose-extension' => 'Select which extension you want to download:',
		'extdist-submit-extension' => 'Continue',
		'extdist-choose-version' => 'You are downloading the <b>$1</b> extension.

Select your MediaWiki version.

Most extensions work across multiple versions of MediaWiki, so if your MediaWiki version is not here, or if you have a need for the latest extension features, try using the current version.',
		'extdist-no-versions' => 'The selected extension ($1) is not available in any version!',
		'extdist-submit-version' => 'Continue',
		'extdist-created' => "A snapshot of version <b>$2</b> of the <b>$1</b> extension for MediaWiki <b>$3</b> has been created. Your download should start automatically in 5 seconds.

The URL for this snapshot is:
:$4
It may be used for immediate download to a server, but please do not bookmark it, since the contents will not be updated, and it may be deleted at a later date.

The tar archive should be extracted into your extensions directory. For example, on a unix-like OS:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

On Windows, you can use [http://www.7-zip.org/ 7-zip] to extract the files.

If your wiki is on a remote server, extract the files to a temporary directory on your local computer, and then upload '''all''' of the extracted files to the extensions directory on the server.

After you have extracted the files, you will need to register the extension in LocalSettings.php. The extension documentation should have instructions on how to do this.

If you have any questions about this extension distribution system, please go to [[Extension talk:ExtensionDistributor]].",
		'extdist-want-more' => 'Get another extension',
		'extdist-tar-error' => 'Unable to fetch archive URL from archive API.',
);

/** Message documentation (Message documentation)
 * @author Aotake
 * @author Jon Harald Søby
 * @author Purodha
 * @author Shirayuki
 * @author The Evil IP address
 * @author Александр Сигачёв
 */
$messages['qqq'] = array(
	'extensiondistributor' => '{{doc-special|ExtensionDistributor}}
{{Identical|Download}}',
	'extensiondistributor-desc' => '{{desc|name=Extension Distributor|url=http://www.mediawiki.org/wiki/Extension:ExtensionDistributor}}',
	'extdist-not-configured' => '{{doc-important|Do not translate <code>$wgExtDistList</code> and <code>$wgExtDistArchiveAPI</code>.}}',
	'extdist-list-missing' => 'Used as error message in [[Special:ExtensionDistributor]].',
	'extdist-no-such-extension' => "This message indicates the extension doesn't exist in the extensions list. Parameters:
* $1 - extension name",
	'extdist-no-such-version' => "This message indicates the specified version of the extension doesn't exist. Parameters:
* $1 - extension name
* $2 - version number of the extension",
	'extdist-choose-extension' => 'Used as intro message in [[Special:ExtensionDistributor]].

This message is followed by the Extension Selector form.',
	'extdist-submit-extension' => '{{Identical|Continue}}',
	'extdist-choose-version' => 'This message is followed by the select box which enables to select a MediaWiki version.

Parameters:
* $1 - extension name',
	'extdist-no-versions' => 'Parameters:
* $1 - extension name',
	'extdist-submit-version' => '{{Identical|Continue}}',
	'extdist-created' => 'Followed by the link text {{msg-mw|Extdist-want-more}}.

Parameters:
* $1 - extension name
* $2 - revision number (SHA1, 7 characters)
* $3 - branch name. e.g. master, REL1_21, REL1_20
* $4 - URL which points to the .tar.gz file
* $5 - filename of the .tar.gz file',
	'extdist-want-more' => 'Used as link text in [[Special:ExtensionDistributor]].

This message follows the Download icon.',
	'extdist-tar-error' => 'Used as error message in [[Special:ExtensionDistributor]], when downloading an extension.',
);

/** Afrikaans (Afrikaans)
 * @author Naudefj
 * @author පසිඳු කාවින්ද
 */
$messages['af'] = array(
	'extensiondistributor' => 'Laai MediaWiki-uitbreiding af',
	'extensiondistributor-desc' => 'Uitbreiding vir die verspreiding van die momentopname argiewe van uitbreidings',
	'extdist-not-configured' => 'Stel asseblief $wgExtDistList en $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Die uitbreiding "$1" bestaan nie',
	'extdist-choose-extension' => 'Kies die uitbreiding wat jy wil aflaai:',
	'extdist-submit-extension' => 'Gaan voort',
	'extdist-submit-version' => 'Gaan voort',
	'extdist-want-more' => "Laai nog 'n uitbreiding af",
	'extdist-tar-error' => 'TAR stuur die volgende kode terug $1:', # Fuzzy
);

/** Gheg Albanian (Gegë)
 * @author Mdupont
 */
$messages['aln'] = array(
	'extensiondistributor' => 'Shkarko extension MediaWiki',
	'extensiondistributor-desc' => 'Extension për shpërndarjen e arkivave fotografi e shtesave',
	'extdist-not-configured' => 'Ju lutem, konfiguroni $wgExtDistList dhe $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Jo zgjatje e tillë "$1"',
	'extdist-no-such-version' => 'Zgjatja "$1" nuk ekziston në versionin e "$2".',
);

/** Arabic (العربية)
 * @author Meno25
 * @author OsamaK
 */
$messages['ar'] = array(
	'extensiondistributor' => 'تنزيل امتداد ميدياويكي',
	'extensiondistributor-desc' => 'امتداد لتوزيع أرشيفات ملتقطة للامتدادات',
	'extdist-not-configured' => 'من فضلك اضبط $wgExtDistList و $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'لا امتداد كهذا "$1"',
	'extdist-no-such-version' => 'الامتداد "$1" لا يوجد في النسخة "$2".',
	'extdist-choose-extension' => 'اختر أي امتدات تريد تنزيله:',
	'extdist-submit-extension' => 'استمرار',
	'extdist-choose-version' => 'أنت تقوم بتنزيل امتداد <b>$1</b>.

اختر نسخة ميدياويكي الخاصة بك.

معظم الامتدادات تعمل خلال نسخ متعددة من ميدياويكي، لذا إذا كانت نسخة ميدياويكي الخاصة بك ليست هنا، أو لو كانت لديك حاجة لأحدث خواص الامتداد، حاول استخدام النسخة الحالية.',
	'extdist-no-versions' => 'الامتداد المختار ($1) غير متوفر في أي نسخة!',
	'extdist-submit-version' => 'استمرار',
	'extdist-created' => "لقطة من النسخة <b>$2</b> من الامتداد <b>$1</b> لميدياويكي <b>$3</b> تم إنشاؤها. تحميلك ينبغي أن يبدأ تلقائيا خلال 5 ثوان.

المسار لهذه اللقطة هو:
:$4
ربما يستخدم للتحميل الفوري لخادم، لكن من فضلك لا تستخدمه كمفضلة، حيث أن المحتويات لن يتم تحديثها، وربما يتم حذفها في وقت لاحق.

أرشيف التار ينبغي أن يتم استخراجه إلى مجلد امتداداتك. على سبيل المثال، على نظام تشغيل شبيه بيونكس:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

على ويندوز، يمكنك استخدام [http://www.7-zip.org/ 7-زيب] لاستخراج الملفات.

لو أن الويكي الخاص بك على خادم بعيد، استخرج الملفات إلى مجلد مؤقت على حاسوبك المحلي، ثم ارفع '''كل''' الملفات المستخرجة إلى مجلد الامتدادات على الخادم.

بعد استخراجك للملفات، ستحتاج إلى تسجيل الامتداد في LocalSettings.php. وثائق الامتداد ينبغي أن تحتوي على التعليمات عن كيفية عمل هذا.

لو كانت لديك أية أسئلة حول نظام توزيع الامتدادات هذا، من فضلك اذهب إلى [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'الحصول على امتداد آخر',
	'extdist-tar-error' => 'تار أرجع كود خروج $1:', # Fuzzy
);

/** Egyptian Spoken Arabic (مصرى)
 * @author Meno25
 * @author Reedy
 */
$messages['arz'] = array(
	'extensiondistributor' => 'تنزيل امتداد ميدياويكي',
	'extensiondistributor-desc' => 'امتداد لتوزيع أرشيفات ملتقطة للامتدادات',
	'extdist-not-configured' => 'من فضلك اضبط $wgExtDistList و $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'لا امتداد كهذا "$1"',
	'extdist-no-such-version' => 'الامتداد "$1" لا يوجد فى النسخة "$2".',
	'extdist-choose-extension' => 'اختر أى امتدات تريد تنزيله:',
	'extdist-submit-extension' => 'استمر',
	'extdist-choose-version' => 'أنت تقوم بتنزيل امتداد <b>$1</b>.

اختر نسخة ميدياويكى الخاصة بك.

معظم الامتدادات تعمل خلال نسخ متعددة من ميدياويكى، لذا إذا كانت نسخة ميدياويكى الخاصة بك ليست هنا، أو لو كانت لديك حاجة لأحدث خواص الامتداد، حاول استخدام النسخة الحالية.',
	'extdist-no-versions' => 'الامتداد المختار ($1) غير متوفر فى أى نسخة!',
	'extdist-submit-version' => 'استمرار',
	'extdist-created' => "لقطة من النسخة <b>$2</b> من الامتداد <b>$1</b> لميدياويكى <b>$3</b> تم إنشاؤها. تحميلك ينبغى أن يبدأ تلقائيا خلال 5 ثوان.

المسار لهذه اللقطة هو:
:$4
ربما يستخدم للتحميل الفورى لخادم، لكن من فضلك لا تستخدمه كمفضلة، حيث أن المحتويات لن يتم تحديثها، وربما يتم حذفها فى وقت لاحق.

أرشيف التار ينبغى أن يتم استخراجه إلى مجلد امتداداتك. على سبيل المثال، على نظام تشغيل شبيه بيونكس:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

على ويندوز، يمكنك استخدام [http://www.7-zip.org/ 7-زيب] لاستخراج الملفات.

لو أن الويكى الخاص بك على خادم بعيد، استخرج الملفات إلى مجلد مؤقت على حاسوبك المحلى، ثم ارفع '''كل''' الملفات المستخرجة إلى مجلد الامتدادات على الخادم.

بعد استخراجك للملفات، ستحتاج إلى تسجيل الامتداد فى LocalSettings.php. وثائق الامتداد ينبغى أن تحتوى على التعليمات عن كيفية عمل هذا.

لو كانت لديك أية أسئلة حول نظام توزيع الامتدادات هذا، من فضلك اذهب إلى [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'الحصول على امتداد آخر',
	'extdist-tar-error' => 'تار أرجع كود خروج $1:', # Fuzzy
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'extensiondistributor' => 'Descargar estensión de MediaWiki',
	'extensiondistributor-desc' => "Estensión pa distribuir archivos de instantánees d'estensiones",
	'extdist-not-configured' => 'Por favor configura $wgExtDistList y $wgExtDistArchiveAPI',
	'extdist-list-missing' => "¡Nun se pudo traer la llista d'estensiones!",
	'extdist-no-such-extension' => 'Nun esiste la estensión «$1»',
	'extdist-no-such-version' => 'La estensión «$1» nun esiste na versión «$2».',
	'extdist-choose-extension' => 'Seleiciona la estensión que quies descargar:',
	'extdist-submit-extension' => 'Siguir',
	'extdist-choose-version' => "Tas descargando la estensión <b>$1</b>.

Seleiciona la to versión de MediaWiki.

La mayor parte de les estensiones funcionen con múltiples versiones de Mediawiki, de mou que si la to versión de Mediawiki nun ta equí, o si necesites les caberes carauterístiques de les estensiones. trata d'usar la versión actual.",
	'extdist-no-versions' => '¡La estensión seleicionada ($1) nun ta disponible en denguna versión!',
	'extdist-submit-version' => 'Siguir',
	'extdist-created' => "Creóse una instantánea de la versión <b>$2</b> de la estensión <b>$1</b> de MediaWiki <b>$3</b>. La descarga tendría de comenzar de mou automáticu en 5 segundos.

La URL d'esta instantánea ye:
:$4
Pue usase pa la descarga nel intre a un sirvidor; pero nun la guardes nun marcador, porque'l conteníu nun s'anovará, y pue desaniciase nuna fecha posterior.

L'archivu tar tendría d'estrayese nel direutoriu d'estensiones. Por exemplu, nun sistema operativu tipu Unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

En Windows, pues usar [http://www.7-zip.org/ 7-zip] pa estrayer los ficheros.

Si la to wiki ta nun sirvidor remotu, estrái los ficheros nun direutoriu temporal del to ordenador, y llueu xube '''tolos''' ficheros estrayíos al direutoriu d'estensiones del sirvidor.

Después d'estrayer los ficheros, necesitarás rexistrar la estensión en LocalSettings.php. La documentación de la estensión debería tener instrucciones de cómo facelo.

Si tienes cualesquier entruga tocante a esti sistema de distribución d'estensiones, por favor visita [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Descargar otra estensión',
	'extdist-tar-error' => "Nun se pudo traer la URL del archivu dende la API d'archivu.",
);

/** Bashkir (башҡортса)
 * @author Assele
 * @author Haqmar
 */
$messages['ba'] = array(
	'extensiondistributor' => 'MediaWiki киңәйеүҙәрен күсереп алырға',
	'extensiondistributor-desc' => 'Киңәйеүҙәр менән дистрибутивты күсереп алыу өсөн киңәйеү',
	'extdist-not-configured' => 'Зинһар, $wgExtDistList һәм $wgExtDistArchiveAPI көйләгеҙ',
	'extdist-no-such-extension' => '"$1" киңәйеүе юҡ',
	'extdist-no-such-version' => '"$1" киңәйеүенең "$2" өлгөһө юҡ',
	'extdist-choose-extension' => 'Күсереп алыу өсөн киңәйеү һайлағыҙ:',
	'extdist-submit-extension' => 'Дауам итергә',
	'extdist-choose-version' => 'Һеҙ <b>$1</b> киңәйеүен күсереп алаһығыҙ.

MediaWiki өлгөгөҙҙө һайлағыҙ.

Киңәйеүҙәрҙең күбеһе төрлө MediaWiki өлгөләре менән эшләй, шуға күрә әгәр һеҙҙең MediaWiki өлгөһө бында күрһәтелмәһә, йәки һеҙгә һуңғы киңәйеү өлгөһөнөң мөмкинлектәре кәрәкһә, ағымдағы өлгөнө ҡулланып ҡарағыҙ.',
	'extdist-no-versions' => 'Һайланған киңәйеүҙе ($1) бер өлгөлә лә алып булмай!',
	'extdist-submit-version' => 'Дауам итергә',
	'extdist-created' => "MediaWiki өсөн <b>$1</b> киңәйеүенең <b>$2</b> өлгөһөнөң <b>$3</b> күсермәһе булдырылды. Күсереп алыу 5 секундтан үҙенән-үҙе башланырға тейеш.

Был күсермәнең URL адресы:
:$4
Был адрес серверға туранан-тура күсереп алыу өсөн ҡулланыла ала, әммә, зинһар, был һылтанманы Һайланғандарға өҫтәмәгеҙ, сөнки эстәлек яңырмаясаҡ, һәм һуңыраҡ юйылыуы ихтимал.

Tar-архив һеҙҙең киңәйеүҙәр директорияһына бушатылырға тейеш. Мәҫәлән unix-ҡа оҡшаш ОС-лар өсөн:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Windows-та файлдарҙы бушатыу өсөн, һеҙ [http://www.7-zip.org/ 7-zip] программаһын ҡуллана алаһығыҙ.

Әгәр викилар алыҫтағы серверҙа урынлашҡан булһа, файлдарҙы урындағы компьютерҙың ваҡытлы директорияһына бушатығыҙ һәм '''бөтә''' бушатылған файлдарҙы серверҙағы киңәйеүҙәр директорияһына тейәгеҙ.

Файлдарҙы бушатҡандан һуң, һеҙгә был киңәйеүҙе LocalSettings.php файлында теркәргә кәрәк буласаҡ. Киңәйеүҙең документтарында быны нисек эшләргә кәрәклеге тураһында күрһәтмә булырға тейеш.

Әгәр һеҙҙең был киңәйеүҙе таратыу системаһы тураһында һорауҙарығыҙ булһа, зинһар, [[Extension talk:ExtensionDistributor]] битен ҡарағыҙ.",
	'extdist-want-more' => 'Башҡа киңәйеү алырға',
	'extdist-tar-error' => 'Tar $1 коды ҡайтарҙы:', # Fuzzy
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
 * @author EugeneZelenko
 * @author Jim-by
 * @author Red Winged Duck
 * @author Reedy
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'extensiondistributor' => 'Загрузіць пашырэньне MediaWiki',
	'extensiondistributor-desc' => 'Пашырэньне для распаўсюджваньня архіваў пашырэньняў',
	'extdist-not-configured' => 'Калі ласка, задайце $wgExtDistList і $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Не ўдалося атрымаць сьпіс пашырэньняў!',
	'extdist-no-such-extension' => 'Пашырэньне «$1» не існуе',
	'extdist-no-such-version' => 'Вэрсія «$2» пашырэньня «$1» ня знойдзеная.',
	'extdist-choose-extension' => 'Выберыце, якое пашырэньне Вы жадаеце загрузіць:',
	'extdist-submit-extension' => 'Працягваць',
	'extdist-choose-version' => 'Вы загружаеце пашырэньне <b>$1</b>.

Выберыце сваю вэрсію MediaWiki.

Большасьць пашырэньняў працуе зь некалькімі вэрсіямі MediaWiki, таму, калі тут няма Вашай вэрсіі MediaWiki, альбо Вам патрабуюцца магчымасьці апошняй вэрсіі, паспрабуйце апошнюю вэрсію.',
	'extdist-no-versions' => 'Выбранае пашырэньне ($1) не даступнае ні ў якой вэрсіі!',
	'extdist-submit-version' => 'Працягваць',
	'extdist-created' => "Быў створаны здымак вэрсіі <b>$2</b> пашырэньня <b>$1</b> MediaWiki <b>$3</b>. Загрузка пачнецца аўтаматычна праз 5 сэкундаў.

Спасылка на здымак:
:$4
Спасылку можна выкарыстоўваць для неадкладнай загрузкі на сэрвэр, але, калі ласка, не занатоўвайце яе, таму што зьмест ня будзе абнаўляцца і можа быць выдалены празь некаторы час.

Tar-архіў неабходна распакаваць у дырэкторыю пашырэньня. Напрыклад, у Unix-падобных сыстэмах гэта будзе выглядаць так:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

У сыстэмах Windows, для распакоўкі Вы можаце выкарыстоўваць праграму [http://www.7-zip.org/ 7-zip].

Калі Вашая вікі знаходзіцца на аддаленым сэрвэры, распакуйце файлы ў часовую дырэкторыю на Вашым кампутары, і потым загрузіце '''ўсе''' распакаваныя файлы ў дырэкторыю пашырэньня на сэрвэры.

Пасьля распакоўкі файлаў, Вам трэба зарэгістраваць пашырэньне ў LocalSettings.php. Дакумэнтацыя пашырэньня павінна ўтрымліваць інструкцыю, як гэта зрабіць.

Калі Вы маеце якія-небудзь пытаньні пра сыстэму ўсталяваньня пашырэньня, калі ласка, задайце іх на старонцы [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Атрымаць іншае пашырэньне',
	'extdist-tar-error' => 'Не ўдалося атрымаць архіўны URL з API архіва.',
);

/** Bulgarian (български)
 * @author DCLXVI
 * @author Turin
 */
$messages['bg'] = array(
	'extensiondistributor' => 'Сваляне на разширения за MediaWiki',
	'extdist-not-configured' => 'Необходимо е да се настроят $wgExtDistList и $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Няма такова разширение „$1“',
	'extdist-no-such-version' => 'Разширението „$1“ не съществува във версия „$2“.',
	'extdist-choose-extension' => 'Изберете разширение, което желаете да свалите:',
	'extdist-submit-extension' => 'Продължаване',
	'extdist-choose-version' => 'На път сте да изтеглите разширението <b>$1</b>.

Изберете вашата версия на MediaWiki.

Повечето разширения работят на много версии на MediaWiki, затова ако вашата версия на MediaWiki я няма или искате най-новите възможности на разширението, опитайте да използвате текущата версия.',
	'extdist-no-versions' => 'Избраното разширение ($1) не е налично в никоя версия!',
	'extdist-submit-version' => 'Продължаване',
	'extdist-tar-error' => 'Tar върна код за грешка $1:', # Fuzzy
);

/** Bengali (বাংলা)
 * @author Bellayet
 * @author Wikitanvir
 */
$messages['bn'] = array(
	'extensiondistributor' => 'মিডিয়াউইকি এক্সটেনশন ডাউনলোড করুন',
	'extdist-submit-extension' => 'অগ্রসর হোন',
	'extdist-submit-version' => 'অগ্রসর হোন',
);

/** Breton (brezhoneg)
 * @author Fohanno
 * @author Fulup
 * @author Gwendal
 * @author Y-M D
 */
$messages['br'] = array(
	'extensiondistributor' => 'Pellgargañ an astenn MediaWiki',
	'extensiondistributor-desc' => 'Astenn evit dasparzh dielloù en ur mare bennak eus an astennoù',
	'extdist-not-configured' => 'Mar plij keflunit $wgExtDistList ha $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'N\'eus ket eus an astenn "$1"',
	'extdist-no-such-version' => 'N\'eus ket eus an astenn "$1" en doare "$2".',
	'extdist-choose-extension' => "Dibabit peseurt astenn ho peus c'hoant pellgargañ :",
	'extdist-submit-extension' => "Kenderc'hel",
	'extdist-choose-version' => "Emaoc'h o pellgargañ an astenn <b>$1</b>.

Dibabit ho stumm MediaWiki.

Al lod vrasañ eus an astennoù a  ya en-dro war stumm disheñvel MediaWiki. Neuze ma n'emañ ket ho stumm amañ, pe m'hoc'h eus ezhomm arc'hweladurioù ziwezhañ an astenn, klaskit implijout ar stumm a-vremañ.",
	'extdist-no-versions' => 'Dizimplijadus eo an astenn bet dibabet ($1) e stumm ebet !',
	'extdist-submit-version' => "Kenderc'hel",
	'extdist-created' => "Krouet ez eus bet un eilad prim eus ar stumm <b>$2</b> eus <b>$1</b> an astenn evit MediaWiki <b>$3</b>. Ho pellgargadenn a zlefe kregiñ a-benn 5 eilenn.

Url an eilad prim zo :
:$4
Gallout a ra bezañ implijet evit pellgargañ diouzhtu diwar ur servijer, met na enrollit ket anezhañ en ho sinedoù peogwir ne vo ket hizivaet an danvez hag e c'hall bezañ dilamet a-c'houdevezh.

An diell tar a vo eztennet e kavlec'h hoc'h astennoù. Da skouer, en ur reizhiad evel Unix :

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Gant Windows, e c'hallit implijout [http://www.7-zip.org/ 7-zip] evit eztennañ ar restroù.

M'emañ ho wiki war ur servijer a-bell, eztennit ar restroù en ur c'havlec'h padennek en hoc'h urzhiataer lec'hel, ha da c'houde ezporzhiit '''holl''' ar restroù eztennet da gavlec'h an astennoù war ar servijer.

Goude bezañ eztennet ar restroù, ho po ezhomm da enrollañ an astenn e LocalSettings.php. Teulliadur an astenn a zlefe bezañ ennañ kuzulioù war an doare d'en ober.

M'hoc'h eus goulennoù diwar-benn reizhiad dasparzh an astennoù-mañ, kit war [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Tapout un astenn all',
	'extdist-tar-error' => "Tar en deus adtroet ar c'hod dont er-maez $1 :", # Fuzzy
);

/** Bosnian (bosanski)
 * @author CERminator
 */
$messages['bs'] = array(
	'extensiondistributor' => 'Učitaj MediaWiki proširenje',
	'extensiondistributor-desc' => 'Proširenja za raspodjelu snapshot arhiva za ekstenzije',
	'extdist-not-configured' => 'Molimo da podesite $wgExtDistList i $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Nema takve ekstenzije "$1"',
	'extdist-no-such-version' => 'Proširenje "$1" ne postoji u verziji "$2".',
	'extdist-choose-extension' => 'Odaberite koje proširenje želite da učitate:',
	'extdist-submit-extension' => 'Nastavi',
	'extdist-choose-version' => 'Skidate proširenje <b>$1</b>.

Odaberite Vašu verziju MediaWikija.

Većina proširenja radi na mnogim verzijama MediaWikija, pa ako se Vaša verzija MediaWikija ne nalazi ovdje, ili ako vam je potrebna za najnovije funkcije proširenja, pokušajte koristiti trenutnu verziju.',
	'extdist-no-versions' => 'Odabrano proširenje ($1) nije dostupno u nijednoj verziji!',
	'extdist-submit-version' => 'Nastavi',
	'extdist-created' => "Napravljen je prikaz verzije <b>$2</b> od proširenja <b>$1</b> za MediaWiki <b>$3</b>. Vaše preuzimanje će otpočeti automatski za 5 sekundi.

URL za ovaj prikaz je:
:$4
Možete ga koristiti za direktno preuzimanje sa servera, ali ga ne stavljajte u favorite, pošto mu se sadržaj neće ažurirati, a možete ga obrisati kasnije.

Tar arhiva bi se trebala otpakovati u Vaš direktorij za proširenja. Na primjer, na OS-u poput Unixa:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Na Windowsu, možete koristiti [http://www.7-zip.org/ 7-zip] za otpakiranje datoteka.

Ako je Vaš wiki na udaljenom serveru, otpakujte datoteke u privremeni direktorij na Vašem računaru, zatim postavite '''sve''' otpakovane datoteke u direktorij za proširenja na serveru.

Nakon što otpakujete datoteke, morat ćete registrovati proširenje u LocalSettings.php. Dokumentacija proširenja bi trebala imati detaljna objašnjenja kako se ovo radi.

Ako imate nekih pitanja oko ovog sistema distribucije proširenja, molimo pogledajte [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Nađi slijedeće proširenje',
	'extdist-tar-error' => "Program ''tar'' je vratio izlazni kod $1:", # Fuzzy
);

/** Catalan (català)
 * @author Paucabot
 * @author Solde
 */
$messages['ca'] = array(
	'extensiondistributor' => 'Descarrega una extensió de Mediawiki',
	'extensiondistributor-desc' => 'Extensió per distribuir arxius actualitzats de les extensions',
	'extdist-not-configured' => 'Per favor, configurau $wgExtDistList i $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'No existeix l\'extensió "$1"',
	'extdist-no-such-version' => 'L\'extensió "$1" no existeix en la versió "$2"',
	'extdist-choose-extension' => 'Seleccionau quina extensió voleu descarregar:',
	'extdist-submit-extension' => 'Continua',
	'extdist-choose-version' => "Estau descarregant l'extensió <b>$1</b>.

Seleccionau la vostra versió del Mediawiki.

La majoria d'extensions funcionen a les diferents versions de Mediawiki, així que si la vostra versió de Mediawiki no és aquí o si necessitau les darreres funcionalitats de l'extensió, provau d'usar la versió actual.",
	'extdist-no-versions' => "L'extensió seleccionada ($1) no està disponible en cap versió.",
	'extdist-submit-version' => 'Continua',
	'extdist-want-more' => 'Descarrega una altra extensió',
	'extdist-tar-error' => "L'ordre tar ha retornat un codi de sortida $1:", # Fuzzy
);

/** Chechen (нохчийн)
 * @author Умар
 */
$messages['ce'] = array(
	'extdist-submit-extension' => 'Кхин дӀа',
	'extdist-submit-version' => 'Кхин дӀа',
);

/** Czech (čeština)
 * @author Matěj Grabovský
 * @author Mormegil
 */
$messages['cs'] = array(
	'extensiondistributor' => 'Stáhnout rozšíření MediaWiki',
	'extensiondistributor-desc' => 'Rozšíření pro distribuci archivů rozšíření',
	'extdist-not-configured' => 'Prosím, nastavte $wgExtDistList a $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Nepodařilo se načíst seznam rozšíření!',
	'extdist-no-such-extension' => 'Rozšíření „$1” neexistuje',
	'extdist-no-such-version' => 'Rozšíření „$1” neexistuje ve verzi „$2”',
	'extdist-choose-extension' => 'Vyberte, které rozšíření chcete stáhnout:',
	'extdist-submit-extension' => 'Pokračovat',
	'extdist-choose-version' => 'Stahujete rozšíření <b>$1</b>.

Vyberte verzi MediaWiki.

Většina rozšíření funguje na více verzích MediaWiki, takže pokud tu vaše verze MediaWiki není uvedena nebo potřebujete nejnovější vlastnosti rozšíření, zkuste použít aktuální verzi.',
	'extdist-no-versions' => 'Zvolené rozšíření ($1) není dostupné v žádné verzi!',
	'extdist-submit-version' => 'Pokračovat',
	'extdist-created' => "Balíček rozšíření <b>$1</b> ve verzi <b>$2</b> pro MediaWiki <b>$3</b> byl vytvořen. Jeho stahování by se mělo automaticky spustit za pět sekund.

Adresa tohoto balíčku je:
: $4
Můžete si odtud nyní balíček stáhnout, ale laskavě si tuto adresu nikam neukládejte, protože obsah odkazovaného souboru nebude aktualizován a soubor může být později smazán.

Tento tar si rozbalte do adresáře <code>extensions</code>. Na operačních systémech na bázi Unixu například:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Na Windows můžete balíček rozbalit pomocí programu [http://www.7-zip.org/ 7-zip].

Pokud vaše wiki běží na vzdáleném serveru, rozbalte si archiv do nějakého dočasného adresáře na lokálním počítači a poté nahrajte '''všechny''' rozbalené soubory do adresáře <code>extensions</code> na vzdáleném serveru.

Po rozbalení souborů budete muset rozšíření zaregistrovat v souboru <code>LocalSettings.php</code>. Podrobnější informace by měla obsahovat dokumentace k rozšíření.

Případné dotazy k tomuto systému distribuce rozšíření můžete klást na stránce [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Stáhnout jiné rozšíření',
	'extdist-tar-error' => 'Z archivního API se nepodařilo načíst URL archivu.',
);

/** Danish (dansk)
 * @author Peter Alberti
 */
$messages['da'] = array(
	'extensiondistributor' => 'Hent MediaWikiudvidelse',
	'extdist-not-configured' => 'Venligst indstil $wgExtDistList og $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Ingen udvidelse ved navn "$1"',
	'extdist-no-such-version' => 'Udvidelsen "$1" findes ikke i versionen "$2".',
	'extdist-choose-extension' => 'Vælg den udvidelse, du ønsker at hente:',
	'extdist-submit-extension' => 'Fortsæt',
	'extdist-submit-version' => 'Fortsæt',
	'extdist-want-more' => 'Hent en anden udvidelse',
	'extdist-tar-error' => 'Tar gav returkoden $1:', # Fuzzy
);

/** German (Deutsch)
 * @author Als-Holder
 * @author Kghbln
 * @author Metalhead64
 * @author Raimond Spekking
 * @author Umherirrender
 */
$messages['de'] = array(
	'extensiondistributor' => 'MediaWiki-Erweiterungen herunterladen',
	'extensiondistributor-desc' => 'Ermöglicht das Herunterladen von MediaWiki-Erweiterungen',
	'extdist-not-configured' => 'Bitte konfiguriere die Parameter <code>$wgExtDistList</code> und <code>$wgExtDistArchiveAPI</code>.',
	'extdist-list-missing' => 'Erweiterungsliste konnte nicht abgerufen werden!',
	'extdist-no-such-extension' => 'Die Erweiterung „$1“ ist nicht vorhanden.',
	'extdist-no-such-version' => 'Die Erweiterung „$1“ ist in der Version „$2“ nicht vorhanden.',
	'extdist-choose-extension' => 'Bitte wähle eine Erweiterung zum Herunterladen aus:',
	'extdist-submit-extension' => 'Weiter',
	'extdist-choose-version' => 'Du kannst gleich die MediaWiki-Erweiterung <b>$1</b> herunterladen.

Bitte wähle zunächst die von dir genutzte MediaWiki-Version.

Die meisten Erweiterungen funktionieren mit vielen MediaWiki-Versionen. Sofern deine MediaWiki-Version hier nicht aufgeführt ist oder du die neuesten Funktionen einer Erweiterung nutzen möchtest, versuche es mit der aktuellen Entwicklerversion (master). Beachte allerdings, dass diese noch Softwarefehler enthalten könnte.',
	'extdist-no-versions' => 'Die gewählte Erweiterung ($1) ist in keiner Version verfügbar!',
	'extdist-submit-version' => 'Weiter',
	'extdist-created' => "Ein Schnappschuss der Version <b>$2</b> der MediaWiki-Erweiterung <b>$1</b> wurde erstellt (MediaWiki-Version <b>$3</b>). Das Herunterladen startet automatisch nach 5 Sekunden.

Die URL für den Schnappschuss lautet:
:$4
Die URL ist allerdings nur zum sofortigen Herunterladen gedacht. Speichere sie daher nicht als Lesezeichen ab, da der Dateiinhalt nicht aktualisiert wird und zudem zu einem späteren Zeitpunkt gelöscht sein kann.

Das Tar-Archiv muss in das Installationsverzeichnis für die Erweiterungen entpackt werden. Auf einem Unix-ähnlichen Betriebssystem wird dies wie folgt gemacht:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Unter Windows kannst du das Programm [http://www.7-zip.org/ 7-zip] zum Entpacken der Dateien verwenden.

Sofern dein Wiki auf einem entfernten Server läuft, entpacke die Dateien zunächst in ein temporäres Verzeichnis auf deinem lokalen Computer und lade dann '''alle''' entpackten Dateien auf den entfernten Server in das Installationsverzeichnis für die Erweiterungen hoch.

Nachdem du die Dateien entpackt hast, musst du die Erweiterung noch in der Datei <code>LocalSettings.php</code> registrieren. Die Dokumentation zur jeweiligen Erweiterung sollte eine Anleitung hierzu enthalten.

Sofern du Fragen und Anmerkungen zu diesem System zur Verteilung von Erweiterungen hast, nutze bitte diese [[Extension talk:ExtensionDistributor|Diskussionsseite]].",
	'extdist-want-more' => 'Eine weitere Erweiterung herunterladen',
	'extdist-tar-error' => 'Die Archiv-URL konnte nicht von der Archiv-API abgerufen werden.',
);

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Imre
 * @author Kghbln
 * @author MichaelFrey
 * @author Umherirrender
 */
$messages['de-formal'] = array(
	'extdist-not-configured' => 'Bitte konfigurieren Sie die Parameter <code>$wgExtDistList</code> und <code>$wgExtDistArchiveAPI</code>.',
	'extdist-choose-extension' => 'Bitte wählen Sie eine Erweiterung zum Herunterladen aus:',
	'extdist-choose-version' => 'Sie können gleich die MediaWiki-Erweiterung <b>$1</b> herunterladen.

Bitte wählen Sie zunächst die von Ihnen genutzte MediaWiki-Version.

Die meisten Erweiterungen funktionieren mit vielen MediaWiki-Versionen. Sofern Ihre MediaWiki-Version hier nicht aufgeführt ist oder Sie die neuesten Funktionen einer Erweiterung nutzen möchten, versuchen Sie es mit der aktuellen Entwicklerversion (master). Beachten Sie allerdings, dass diese noch Softwarefehler enthalten könnte.',
	'extdist-created' => "Ein Schnappschuss der Version <b>$2</b> der MediaWiki-Erweiterung <b>$1</b> wurde erstellt (MediaWiki-Version <b>$3</b>). Das Herunterladen startet automatisch nach 5 Sekunden.

Die URL für den Schnappschuss lautet:
:$4
Die URL ist allerdings nur zum sofortigen Herunterladen gedacht. Speichern Sie sie daher nicht als Lesezeichen ab, da der Dateiinhalt nicht aktualisiert wird und zudem zu einem späteren Zeitpunkt gelöscht sein kann.

Das Tar-Archiv muss in das Installationsverzeichnis für die Erweiterungen entpackt werden. Auf einem Unix-ähnlichen Betriebssystem wird dies wie folgt gemacht:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Unter Windows können Sie das Programm [http://www.7-zip.org/ 7-zip] zum Entpacken der Dateien verwenden.

Sofern Ihr Wiki auf einem entfernten Server läuft, entpacken Sie die Dateien zunächst in ein temporäres Verzeichnis auf Ihrem lokalen Computer und laden Sie dann '''alle''' entpackten Dateien auf den entfernten Server in das Installationsverzeichnis für die Erweiterungen hoch.

Nachdem Sie die Dateien entpackt haben, müssen Sie die Erweiterung noch in der Datei <code>LocalSettings.php</code> registrieren. Die Dokumentation zur jeweiligen Erweiterung sollte eine Anleitung hierzu enthalten.

Sofern Sie Fragen und Anmerkungen zu diesem System zur Verteilung von Erweiterungen haben, nutzen Sie bitte diese [[Extension talk:ExtensionDistributor|Diskussionsseite]].",
);

/** Zazaki (Zazaki)
 * @author Aspar
 * @author Erdemaslancan
 * @author Gorizon
 * @author Mirzali
 * @author Reedy
 * @author Xoser
 */
$messages['diq'] = array(
	'extensiondistributor' => 'Extensiyonê MediyaWikiyî bar bike',
	'extensiondistributor-desc' => 'Ekstensiyon ke ser ekstesiyonê vila kerdişî arşivê snapshotî',
	'extdist-not-configured' => 'Kerem ke $wgExtDistList u $wgExtDistArchiveAPI awan ke',
	'extdist-list-missing' => 'Derganeya listi néşa biyaro!',
	'extdist-no-such-extension' => '"$1" name dı oleken çıniyo',
	'extdist-no-such-version' => 'Versiyonê "$2"î de ekstensiyonê "$1"î çini yo',
	'extdist-choose-extension' => 'Ekstensiyon ke ti wazeno bar bike ey weçine:',
	'extdist-submit-extension' => 'Dewam ke',
	'extdist-choose-version' => 'Şımaye olekene  <b>$1</b>i ronane

Versiyonê MedyaWikiyi weçinê.

Zaf olekene versiyonê MedyaWikiyi de xebıtyeni, eke versiyonê MedyaWikiyi yê şıma tiya de çıniyo, versiyonê rocaneyi fına karfiyê.',
	'extdist-no-versions' => 'Ektensiyonan ($1) ke ti weçina versiyanan bînan de çini yo!',
	'extdist-submit-version' => 'Dewam ke',
	'extdist-created' => "qey yew lehza esayişê parçeyê <b>$1</b>i u versiyonê <b>$2</b>i MediaWiki <b>$3</b> vıraziya. gani war ardışê şıma zerreyê panc deqiqe de bı otomatik destpêbıkero.

esayişê URLyi yê lehzayek:
:$4
no, qey war ardışê pêşkeşwaneki şuxuliyeno labele muhtewa rocane nêbena u ihtimalê hewnakerdışi zi esto nê sebeban ra işaretê cayan têarê mekerê.

arşiwê tari gani bıveciyo parçeya rêzbiyayişi. misal, sistemê karkerdışê tipê unix'an de:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Windows de, qey vetışê dosyayan şıma eşkêni [http://www.7-zip.org/ 7-zip] bışuxulni.

Eke wikiya şıma yew pêşkeşwano dûr de ya, dosyayanê xo compiterê xo u dıma '''heme''' dosyayê veteyan parçeya rêzkerdışê compiteri de kopya bıkerê.

badê vetışê dosyayan, parçe LocalSettings.php'de gani qeyd bıbo. dokumantasyonê parçeyi raye mocnena şıma.

Eke no sistem de yew problemê şıma bıbo, kerem kerê şêrê [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Yewna oleken bigere',
	'extdist-tar-error' => "Kodê arşiv da URL' ra URL",
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'extensiondistributor' => 'Rozšyrjenje MediaWiki ześěgnuś',
	'extensiondistributor-desc' => 'Rozšyrjenje za rozdźělowanje archiwow rozšyrjenjow',
	'extdist-not-configured' => 'Pšosym konfigurěruj $wgExtDistList a $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Lisćina rozšyrjenjow njedajo se wobstaraś!',
	'extdist-no-such-extension' => 'Rozšyrjenje "$1" njeeksistěrujo',
	'extdist-no-such-version' => 'Rozšyrjenje "$1" njeeksistěrujo we wersiji "$2".',
	'extdist-choose-extension' => 'Wubjeŕ rozšyrjenje, kótarež coš ześěgnuś:',
	'extdist-submit-extension' => 'Dalej',
	'extdist-choose-version' => 'Ześěgujoš rozšyrjenje <b>$1</b>.

Wubjeŕ swóju wersiju MediaWiki.

Nejwěcej rozšyrjenjow funkcioněrujo w někotarych wersijach MediaWiki, jolic stakim twója wersija MediaWiki njejo how abo trjebaš nejnowše funkcije rozšyrjenja, wopytaj aktualnu wersiju wužywaś.',
	'extdist-no-versions' => 'Wubrane rozšyrjenje ($1) njestoj k dispoziciji we wšych wersijach!',
	'extdist-submit-version' => 'Dalej',
	'extdist-created' => "Foto wobglědowaka wersije <b>$2</b> rozšyrjenja <b>$1</b> za MediaWiki <b>$3</b> jo se napórał. Twójo ześěgnjenje by měło za 5 sekundow awtomatiski startowaś.

URL za toś to foto wobglědowaka jo:
:$4
Dataja wužywa se, aby se ned ześěgnuła na serwer, ale pšosym njeskładuj ju ako załožk, dokulaž se wopśimjeśe njezaktualizěrujo a wóna móžo se pózdźej wulašowaś.

Tar-archiw by měł se do twójego zapisa rozšyrjenjow rozpakowaś. Na pśikład na uniksowych źěłowych systemach:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Na Windowsu móžoš [http://www.7-zip.org/ 7-zip] wužywaś, aby rozpakował dataje.

Jolic twój wiki jo na zdalonem serwerje, rozpakuj dataje do nachylnego zapisa na swójom lokalnem licadle a nagraj pótom '''wše''' rozpakowane dataje do zapisa rozšyrjenjow na serwerje.

Za tym, az sy rozpakował dataje, musyš rozšyrjenje w dataji localSettings.php registrěrowaś. Dokumentacija rozšyrjenja by měła instrukcije wopśimjeś, kak se dajo cyniś.

Jolic maš pšašanja wo toś tom systemje rozdźělowanja rozšyrjenjow, źi pšosym k [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Druge rozšyrjenje wobstaraś',
	'extdist-tar-error' => 'Archiw URL njedajo se z archiwa API ekstrahěrowaś.',
);

/** Greek (Ελληνικά)
 * @author Dead3y3
 * @author Geraki
 * @author Glavkos
 * @author Omnipaedista
 * @author Protnet
 * @author Reedy
 */
$messages['el'] = array(
	'extensiondistributor' => 'Κατέβασμα επέκτασης Mediawiki',
	'extensiondistributor-desc' => 'Επέκταση για τη διανομή στιγμιοτύπων επεκτάσεων',
	'extdist-not-configured' => 'Παρακαλώ ρυθμίστε τα $wgExtDistList και $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Δεν υπάρχει επέκταση "$1"',
	'extdist-no-such-version' => 'Η επέκταση "$1" δεν υπάρχει στην έκδοση "$2".',
	'extdist-choose-extension' => 'Επιλέξτε ποια επέκταση θέλετε να κατεβάσετε:',
	'extdist-submit-extension' => 'Συνέχεια',
	'extdist-choose-version' => 'Κατεβάζετε την επέκταση <b>$1</b>.

Επιλέξτε την έκδοση του MediaWiki σας.

Οι περισσότερες επεκτάσεις λειτουργούν μεταξύ πολλαπλών εκδόσεων του MediaWiki, οπότε αν η έκδοση του MediaWiki σας δεν είναι εδώ ή αν έχετε ανάγκη τα τελευταία χαρακτηριστικά της επέκτασης, δοκιμάστε την τρέχουσα έκδοση.',
	'extdist-no-versions' => 'Η επιλεγμένη επέκταση ($1) δεν είναι διαθέσιμη σε καμία έκδοση!',
	'extdist-submit-version' => 'Συνέχεια',
	'extdist-created' => "Ένα στιγμιότυπο της έκδοσης <b>$2</b> της επέκτασης <b>$1</b> για το MediaWiki <b>$3</b> έχει δημιουργηθεί. Η λήψη σας θα πρέπει να ξεκινήσει αυτόματα σε 5 δευτερόλεπτα.

Το URL για αυτό το στιγμιότυπο είναι:
:$4
Μπορεί να χρησιμοποιηθεί για άμεση λήψη σε έναν εξυπηρετητή, αλλά παρακαλώ μην το βάλετε στους σελιδοδείκτες σας, αφού τα περιεχόμενα δεν θα ενημερωθούν, και μπορεί να διαγραφεί σε μια μεταγενέστερη ημερομηνία.

Το συμπιεσμένο αρχείο tar θα πρέπει να αποσυμπιεστεί στον κατάλογο επεκτάσεων σας. Για παράδειγμα, σε ένα unix-οειδές λειτουργικό σύστημα:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Στα Windows, μπορείτε να χρησιμοποιήσετε το πρόγραμμα [http://www.7-zip.org/ 7-zip] για να αποσυμπιέσετε τα αρχεία.

Αν το wiki σας είναι σε έναν απομακρυσμένο εξυπηρετητή, αποσυμπιέστε τα αρχεία σε έναν προσωρινό κατάλογο στον τοπικό σας υπολογιστή, και μετά επιφορτώστε '''όλα''' τα αποσυμπιεσμένα αρχεία στον κατάλογο επεκτάσεων στον εξυπηρετητή.

Αφότου αποσυμπιέσετε τα αρχεία, θα χρειαστεί να εγγράψετε την επέκταση στο αρχείο LocalSettings.php. Η τεκμηρίωση της επέκτασης θα πρέπει να έχει οδηγίες για το πως να το κάνετε.

Αν έχετε ερωτήσεις για αυτό το σύστημα διανομής επεκτάσεων, παρακαλώ πηγαίνετε στη σελίδα [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Άλλη επέκταση',
	'extdist-tar-error' => 'To Tar επέστρεψε κωδικό εξόδου $1:', # Fuzzy
);

/** Esperanto (Esperanto)
 * @author Mihxil
 * @author Yekrats
 */
$messages['eo'] = array(
	'extensiondistributor' => 'Elŝuti kromprogramon por MediaWiki',
	'extensiondistributor-desc' => 'Kromprogramo por distribui statikajn arkivojn de kromprogramoj',
	'extdist-not-configured' => 'Bonvolu konfiguri $wgExtDistList kaj $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Kromprogramo "$1" ne ekzistas',
	'extdist-no-such-version' => 'La kromprogramo "$1" ne ekzistas en la versio "$2".',
	'extdist-choose-extension' => 'Elektu kiun kromprogramon tiun vi volas elŝuti.',
	'extdist-submit-extension' => 'Daŭri',
	'extdist-choose-version' => 'Vi elŝutas la <b>$1</b> kromprogramon.

Elektu vian MediaWiki-version.

Pliparto de kromprogramoj funkcias trans pluraj versioj de MediaWiki, do se via MediaWiki-versio ne estas trovebla cxi tie, aux se vi bezonas la plej novajn ecojn, provu uzi la plej lastan version.',
	'extdist-no-versions' => 'La elektita kromprogramo ($1) ne estas havebla en iu ajn versio!',
	'extdist-submit-version' => 'Daŭri',
	'extdist-created' => "Statika kopio de versio <b>$2</b> de la <b>$1</b> kromprogramo por MediaWiki <b>$3</b> estis kreita. Via elŝuto komenciĝos aŭtomate post 5 sekundoj.

La URL-o por ĉi tiu statika kopio estas:
:$4
Ĝi estas uzebla por tuja elŝuto al servilo, sed bonvolu ne aldoni legosignon al ĝi, ĉar la enhavo ne estos ĝisdata, kaj ĝi eble estos forigita je posta dato.

La tar-arkivo estu eltirita en vian kromprograman dosierujon. Ekz-e, en Unikseca OS:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Per Vindozo, vi povas utiligi [http://www.7-zip.org/ 7-zip] por eltiri la dosierojn.

Se via vikio estas en ekstera servilo, eltiru la dosierojn al provizora dosierujo en via loka komputilo, kaj poste alŝutu '''ĉiujn''' eltiritajn dosierojn al la kromprograma dosierujo en la servilo.

Eltirinte la dosierojn, vi devos registri la kromprogramon en LocalSettings.php. La kromprograma dokumentado havu la instrukciojn kiel fari tion.

Se vi havas iujn ajn demandojn pri ĉi tiu kromprograma distribuada sistemo, bonvolu iri al [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Akiri pluan kromprogramon',
	'extdist-tar-error' => 'Tar donis elirkodon $1:', # Fuzzy
);

/** Spanish (español)
 * @author Armando-Martin
 * @author Bernardom
 * @author Crazymadlover
 * @author Fitoschido
 * @author Imre
 * @author Pertile
 * @author Platonides
 * @author Remember the dot
 * @author Sanbec
 */
$messages['es'] = array(
	'extensiondistributor' => 'Descargar extensión MediaWiki',
	'extensiondistributor-desc' => 'Extensión para la distribución de archivos de instantáneas de las extensiones',
	'extdist-not-configured' => 'Por favor configure $wgExtDistList y $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'No se pudo recuperar la lista de extensiones.',
	'extdist-no-such-extension' => 'No existe la extensión «$1»',
	'extdist-no-such-version' => 'la extensión "$1" no existe en la versión "$2".',
	'extdist-choose-extension' => 'Seleccione qué extensión desea descargar:',
	'extdist-submit-extension' => 'Continuar',
	'extdist-choose-version' => 'Estás descargando la extensión <b>$1</b>.

Selecciona tu versión MediaWiki.

La mayoría de extensiones funcionan a través de múltiples versiones de Mediawiki, entonces si tu versión Mediawiki no está aquí, o si necesitas las últimas características de las extensiones. trata de usar la versión actual.',
	'extdist-no-versions' => 'La extensión seleccionada ($1) no esta disponible en ninguna versión!',
	'extdist-submit-version' => 'Continuar',
	'extdist-created' => "Se ha creado una instantánea de la versión <b>$2</b> de la extensión <b>$1</b> para MediaWiki <b>$3</b>. Tu descarga debería comenzar automáticamente en 5 segundos.

La URL de esta instantánea es:
:$4
Puede ser usada para una descarga inmediata a un servidor, pero no la almacene como marcador, ya que los contenidos no serán actualizados, y pueden ser borrados en una fecha posterior.

El archivo tar debería ser extraído dentro de tu carpeta de extensiones. Por ejemplo, en un sistema operativo tipo Unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

En Windows, Puedes usar [http://www.7-zip.org/ 7-zip] para extraer los archivos.

Si tu wiki está en un servidor remoto, extrae el archivo a un directorio temporal en tu ordenador, y luego carga '''todos''' los archivos extraídos al directorio de extensiones en el servidor.

Después de extraer los archivos, necesitarás registrar la extensión en LocalSettings.php. La documentación de la extensión deberían tener instrucciones de cómo hacerlo.

Si tienes cualquier duda sobre este sistema de distribución de extensiones, por favor ve a [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Obtener otra extensión',
	'extdist-tar-error' => 'Tar ha devuelto el código de salida $1:', # Fuzzy
);

/** Estonian (eesti)
 * @author Avjoska
 * @author Ker
 * @author Pikne
 */
$messages['et'] = array(
	'extensiondistributor' => 'MediaWiki-laienduse allalaadimine',
	'extensiondistributor-desc' => 'Võimaldab jagada laienduste hetktõmmiste arhiivi.',
	'extdist-no-such-extension' => 'Laiendus "$1" puudub',
	'extdist-no-such-version' => 'Versioonis "$2" puudub laiendus "$1".',
	'extdist-choose-extension' => 'Vali laiendus, mida soovid alla laadida:',
	'extdist-submit-extension' => 'Jätka',
	'extdist-choose-version' => 'Laadid alla laiendust <b>$1</b>.

Vali oma MediaWiki versioon.

Suurem osa laiendusi töötab erinevate MediaWiki versioonidega. Kui sinu MediaWiki versiooni pole siin või sa vajad laienduse uusimaid funktsioone, proovi kasutada praegust versiooni.',
	'extdist-no-versions' => 'Valitud laiendusest $1 pole saadaval ühtegi versiooni!',
	'extdist-submit-version' => 'Jätka',
	'extdist-want-more' => 'Hangi teine laiendus',
);

/** Basque (euskara)
 * @author An13sa
 */
$messages['eu'] = array(
	'extensiondistributor' => 'MediaWiki luzapena jaitsi',
	'extdist-submit-extension' => 'Jarraitu',
	'extdist-submit-version' => 'Jarraitu',
	'extdist-want-more' => 'Beste luzapen bat hartu',
);

/** Persian (فارسی)
 * @author Ebraminio
 * @author Huji
 * @author Leyth
 * @author Mjbmr
 * @author Reza1615
 * @author Wayiran
 * @author ZxxZxxZ
 */
$messages['fa'] = array(
	'extensiondistributor' => 'بارگیری افزونهٔ مدیاویکی',
	'extensiondistributor-desc' => 'افزونه‌ای برای انتشار بایگانی‌های لحظه‌ای از افزونه‌ها',
	'extdist-not-configured' => 'لطفاً ‎$‎wgExtDistTarDir و ‎$wgExtDistArchiveAPI را تنظیم کنید',
	'extdist-list-missing' => 'قادر به تهیهٔ فهرست افزونه‌ها نیست!',
	'extdist-no-such-extension' => 'افزونه‌ای به نام «$1» وجود ندارد',
	'extdist-no-such-version' => 'افزونهٔ «$1» در نسخهٔ «$2» وجود ندارد.',
	'extdist-choose-extension' => 'افزونه‌ای را که می‌خواهید بارگیری کنید انتخاب کنید:',
	'extdist-submit-extension' => 'ادامه',
	'extdist-choose-version' => 'شما در حال بارگیری افزونهٔ <b>$1</b> هستید.

نسخهٔ مدیاویکی خود را انتخاب کنید.

بیشتر افزونه‌ها با نسخه‌های مختلف مدیاویکی کار می‌کنند، پس اگر نسخهٔ مدیاویکی شما اینجا نیست، یا اگر می‌خواهید از آخرین امکانات افزونه استفاده کنید، نسخهٔ فعلی را استفاده کنید.',
	'extdist-no-versions' => 'افزونهٔ انتخاب شده ($1) برای هیچ کدام از نسخه‌ها در دسترس نیست!',
	'extdist-submit-version' => 'ادامه',
	'extdist-created' => "یک عکس‌فوری از نسخهٔ <b>$2</b> افزونهٔ <b>$1</b> برای مدیاویکی <b>$3</b> ایجاد شده است. بارگیری شما باید تا ۵ ثانیه به صورت خودکار آغاز گردد.

نشانی این عکس فوری این است:
:$4
ممکن است به‌منظور بارگیری آنی به یک کارساز (سرور) استفاده شود، اما لطفاً آن را بوکمارک نکنید، چراکه محتویات به‌روزرسانی نخواهند شد و شاید در تاریخی بعدتر پاک شوند.

بایگانی tar باید در دایرکتوری افزونه‌هایتان استخراج شود. برای مثال، در سامانه‌عامل‌های مانند یونیکس:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

در ویندوز، می‌توانید از [http://www.7-zip.org/ 7-zip] برای استخراج پرونده‌ها استفاده کنید.

اگر ویکی شما یک کارساز ازراه‌دور است، پرونده‌ها را در یک دایرکتوری موقتی در رایانهٔ محلی‌تان استخراج کنید، و سپس '''همهٔ''' پرونده‌های استخراج‌شده را به دایرکتوری افزونه‌ها در سرور بارگذاری کنید.

پس از آنکه پرونده‌ها را استخراج کردید، لازم است افزونه را در LocalSettings.php ثبت کنید. توضیحات افزونه باید این دستورالعمل که چطور این را انجام دهیم را داشته باشد.

در صورتی که هرگونه پرسشی دربارهٔ سامانهٔ توزیع این افزونه دارید، لطفاً به [[Extension talk:ExtensionDistributor]] بروید.",
	'extdist-want-more' => 'دریافت در قالبی دیگر',
	'extdist-tar-error' => 'قادر به تهیهٔ بایگانی نشانی اینترنتی از ای‌پی‌آی بایگانی نیست.',
);

/** Finnish (suomi)
 * @author Crt
 * @author Nedergard
 * @author Nike
 * @author Str4nd
 * @author VezonThunder
 * @author ZeiP
 */
$messages['fi'] = array(
	'extensiondistributor' => 'Lataa MediaWikin laajennus',
	'extensiondistributor-desc' => 'Laajennus laajennusten tilannevedosarkistojen jakelulle.',
	'extdist-not-configured' => 'Aseta $wgExtDistList ja $wgExtDistArchiveAPI.',
	'extdist-list-missing' => 'Laajennusluetteloa ei voitu hakea!',
	'extdist-no-such-extension' => 'Laajennusta ”$1” ei löydy',
	'extdist-no-such-version' => 'Laajennus ”$1” ei sisälly versioon ”$2”.',
	'extdist-choose-extension' => 'Valitse mitkä laajennukset haluat ladata:',
	'extdist-submit-extension' => 'Jatka',
	'extdist-choose-version' => 'Olet lataamassa laajennusta <b>$1</b>.

Valitse MediaWikisi versio.

Useimmat laajennukset toimivat useiden MediaWikin versioiden välillä. Jos MediaWikisi versiota ei ole täällä tai tarvitset viimeisimpiä ominaisuuksia laajennuksesta, kokeile nykyistä versiota.',
	'extdist-no-versions' => 'Valitusta laajennuksesta ($1) ei ole saatavilla yhtään versiota!',
	'extdist-submit-version' => 'Jatka',
	'extdist-created' => "Tilannevedos laajennuksen <b>$1</b> versiosta <b>$2</b> MediaWikin versiolle <b>$3</b> on luotu. Latauksesi pitäisi alkaa automaattisesti viiden sekunnin kuluttua.

URL-osoite tälle tilannevedokselle on
:$4
Osoitetta voi käyttää välittömään lataukseen palvelimelle, mutta älä lisää sitä kirjanmerkkeihisi, koska sen sisältö ei päivity ja se saatetaan poistaa.

Tar-paketti on purettava extensions-hakemistoon. Esimerkiksi unix-tyylisessä käyttöjärjestelmässä se tapahtuu seuraavalla komennolla:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Windowsissa voit käyttää [http://www.7-zip.org/ 7-zip]-ohjelmaa tiedostojen purkamiseen.

Jos wikisi on etäpalvelimella, pura tiedostot paikallisen tietokoneen väliaikaishakemistoon ja lähetä sen jälkeen '''kaikki''' puretut tiedostot palvelimen extensions-hakemistoon.

Kun olet purkanut tiedostot, laajennus on rekisteröitävä LocalSettings.php-tiedostoon. Laajennuksen ohjeissa pitäisi löytyä rekisteröintiohjeet.

Jos sinulla on kysymyksiä jakelujärjestelmästä, siirry sivulle [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Hae toinen laajennus',
	'extdist-tar-error' => 'Tar-ohjelman suoritus päättyi paluuarvoon $1:', # Fuzzy
);

/** French (français)
 * @author Crochet.david
 * @author Gomoko
 * @author Grondin
 * @author IAlex
 * @author McDutchie
 * @author Sherbrooke
 * @author Urhixidur
 * @author Verdy p
 * @author Wyz
 */
$messages['fr'] = array(
	'extensiondistributor' => 'Télécharger l’extension MediaWiki',
	'extensiondistributor-desc' => 'Extension pour la distribution des archives photographiques des extensions',
	'extdist-not-configured' => 'Veuillez configurer $wgExtDistList et $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Impossible d’analyser la liste d’extensions!',
	'extdist-no-such-extension' => 'Aucune extension « $1 »',
	'extdist-no-such-version' => 'L’extension « $1 » n’existe pas dans la version « $2 ».',
	'extdist-choose-extension' => 'Sélectionnez l’extension que vous voulez télécharger :',
	'extdist-submit-extension' => 'Continuer',
	'extdist-choose-version' => 'Vous êtes en train de télécharger l’extension <b>$1</b>.

Sélectionnez votre version de MediaWiki.

La plupart des extensions tourne sur différentes versions de MediaWiki. Aussi, si votre version n’est pas présente ici, ou si vous avez besoin des dernières fonctionnalités de l’extension, essayez d’utiliser la version courante.',
	'extdist-no-versions' => 'L’extension sélectionnée ($1) n’est disponible dans aucune version !',
	'extdist-submit-version' => 'Continuer',
	'extdist-created' => "Une copie instantanée de la version <b>$2</b> de l’extension <b>$1</b> pour MediaWiki <b>$3</b> a été créée. Votre téléchargement devrait commencer automatiquement dans 5 secondes.

L’adresse de cette copie est :
: $4
Elle peut être utilisée pour un téléchargement immédiat vers un serveur, mais évitez de l’inscrire dans vos signets, puisque son contenu ne sera pas mis à jour et peut être effacé à une date ultérieure.

L’archive tar devrait être extraite dans votre répertoire <code>extensions</code>. Par exemple sur un système semblable à Unix :

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Sous Windows, vous pouvez utiliser [http://www.7-zip.org/ 7-zip] pour extraire les fichiers.

Si votre wiki est hébergé sur un serveur distant, extrayez les fichiers dans un répertoire temporaire de votre ordinateur local, puis téléversez-les '''tous''' dans le répertoire extensions du serveur.

Une fois les fichiers extraits, il vous faudra enregistrer l’extension dans <code>LocalSettings.php</code>. La documentation de l’extension devrait contenir un guide d’installation expliquant comment procéder.

Si vous avez des questions concernant ce système de distribution des extensions, veuillez consulter [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Obtenir une autre extension',
	'extdist-tar-error' => "Impossible d’analyser l’URL d'archive de l’API d'archive.",
);

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'extensiondistributor' => 'Tèlèchargiér l’èxtension MediaWiki',
	'extensiondistributor-desc' => 'Èxtension por la distribucion de les arch·ives fotografiques de les èxtensions.',
	'extdist-not-configured' => 'Volyéd configurar $wgExtDistList et $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Gins d’èxtension « $1 »',
	'extdist-no-such-version' => 'L’èxtension « $1 » ègziste pas dens la vèrsion « $2 ».',
	'extdist-choose-extension' => 'Chouèsésséd l’èxtension que vos voléd tèlèchargiér :',
	'extdist-submit-extension' => 'Continuar',
	'extdist-choose-version' => 'Vos éte aprés tèlèchargiér l’èxtension <b>$1</b>.

Chouèsésséd voutra vèrsion de MediaWiki.

La plepârt de les èxtensions tôrne sur difèrentes vèrsions de MediaWiki. Avouéc, se voutra vèrsion est pas presenta ique, ou ben se vos avéd fôta de les dèrriéres fonccionalitâts de l’èxtension, tâchiéd d’utilisar la vèrsion d’ora.',
	'extdist-no-versions' => 'L’èxtension chouèsia ($1) est pas disponibla dens gins de vèrsion !',
	'extdist-submit-version' => 'Continuar',
	'extdist-created' => "Una copia drêta de la vèrsion <b>$2</b> de l’èxtension <b>$1</b> por MediaWiki <b>$3</b> at étâ fêta. Voutron tèlèchargement devrêt comenciér ôtomaticament dens 5 secondes.

L’adrèce de ceta copia est :
:$4
Pôt étre utilisâ por un tèlèchargement drêt de vers un sèrvor, mas èvitâd de l’enscrire dens voutros mârca-pâges, puésque son contegnu serat pas betâ a jorn et pués pôt étre suprimâ a una dâta futura.

Les arch·ives tar devriant étre èxtrètes dens voutron rèpèrtouèro <code>èxtensions</code>. Per ègzemplo sur un sistèmo semblâblo a UNIX :

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Desot Windows, vos pouede utilisar [http://www.7-zip.org/ 7-zip] por èxtrère los fichiérs.

Se voutron vouiqui est hèbèrgiê sur un sèrvor distant, èxtreséd los fichiérs dens un rèpèrtouèro temporèro de voutron ordenator local, et pués tèlèchargiéd-los '''tôs''' dens lo rèpèrtouèro <code>èxtensions</code> du sèrvor.

Un côp los fichiérs èxtrèts, vos fôdrat encartar l’èxtension dens <code>LocalSettings.php</code>. La documentacion de l’èxtension devrêt contegnir un guido d’enstalacion qu’èxplique coment procèdar.

Se vos avéd des quèstions sur cél sistèmo de distribucion de les èxtensions, volyéd vêre [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Avêr una ôtra èxtension',
	'extdist-tar-error' => 'Tar at retornâ lo code de sortia $1 :', # Fuzzy
);

/** Friulian (furlan)
 * @author Klenje
 */
$messages['fur'] = array(
	'extdist-submit-extension' => 'Va indevant',
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'extensiondistributor' => 'Descargar a extensión MediaWiki',
	'extensiondistributor-desc' => 'Extensión para distribuír arquivos fotográficos de extensións',
	'extdist-not-configured' => 'Por favor, configure $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Non se puido obter a lista de extensións!',
	'extdist-no-such-extension' => 'Non existe a extensión "$1"',
	'extdist-no-such-version' => 'A extensión "$1" non existe na versión "$2".',
	'extdist-choose-extension' => 'Seleccione a extensión que queira descargar:',
	'extdist-submit-extension' => 'Continuar',
	'extdist-choose-version' => 'Está descargando a extensión <b>$1</b>.

Seleccione a súa versión de MediaWiki.

A maioría das extensións traballan con múltiples versións de MediaWiki, polo que se a súa versión de MediaWiki non está aquí, ou se precisa características da última extensión, probe a usar a versión actual.',
	'extdist-no-versions' => 'A extensión seleccionada ($1) non está dispoñible en ningunha versión!',
	'extdist-submit-version' => 'Continuar',
	'extdist-created' => "Creouse unha fotografía da versión <b>$2</b> da extensión <b>$1</b> de MediaWiki <b>$3</b>. A súa descarga debería comezar automaticamente en 5 segundos.

O enderezo URL desta fotografía é:
:$4
Poderá ser usada para descargala inmediatamente a un servidor, pero, por favor, non a engada á lista dos seus favoritos mentres o contido non estea actualizado. Poderá tamén ser eliminada nuns días.

O arquivo tar deberá ser extraído no seu directorio de extensións. Por exemplo, nun sistema beseado no UNIX:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

No Windows, pode usar [http://www.7-zip.org/ 7-zip] para extraer os ficheiros.

Se o seu wiki está nun servidor remoto, extraia os ficheiros nun directorio temporal no seu computador e logo cargue '''todos''' os ficheiros extraídos no directorio de extensións do servidor.

Despois de extraer os ficheiros, necesitará rexistrar a extensión en LocalSettings.php. A documentación da extensión deberá ter instrucións de como facer isto.

Se ten algunha dúbida ou pregunta acerca do sistema de distribución das extensións, por favor, vaia a [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Obter outra extensión',
	'extdist-tar-error' => 'Non se puido obter o enderezo URL do arquivo desde o arquivo da API.',
);

/** Ancient Greek (Ἀρχαία ἑλληνικὴ)
 * @author Crazymadlover
 * @author Omnipaedista
 */
$messages['grc'] = array(
	'extdist-submit-extension' => 'Συνεχίζειν',
	'extdist-submit-version' => 'Συνεχίζειν',
);

/** Swiss German (Alemannisch)
 * @author Als-Holder
 */
$messages['gsw'] = array(
	'extensiondistributor' => 'MediaWiki-Erwyterige abelade',
	'extensiondistributor-desc' => 'Erwyterig fir d Verteilig vu Schnappschuss-Archiv vu Erwyterige',
	'extdist-not-configured' => 'Bitte konfigurier $wgExtDistList un $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'D Erwyterig „$1“ git s nit',
	'extdist-no-such-version' => 'D Erwyterig „$1“ git s nit in dr Version „$2“.',
	'extdist-choose-extension' => 'Bitte wähl e Erwyterig uus zum Abelade:',
	'extdist-submit-extension' => 'Wyter',
	'extdist-choose-version' => 'Du ladsch d <b>$1</b>-Erwyterig abe.

Bitte wähl Dyyni MediaWiki-Version.

Di meischte Erwyterige schaffe mit vyyle MediaWiki-Versione zämme. Wänn Dyyni MediaWiki-Version doo nit ufgfiert isch oder Du di nejschte Fähigkeite vu dr Eryterig witt nutze, no versuech s mit dr aktuälle Version.',
	'extdist-no-versions' => 'Di gwählt Erwyterig ($1) git s nit in allene Versione!',
	'extdist-submit-version' => 'Wyter',
	'extdist-created' => "E Schnappschuss vu dr Version <b>$2</b> vu dr MediaWiki-Erwyterig <b>$1</b> isch aagleit wore (MediaWiki-Version <b>$3</b>). S Abelade fangt automatisch in 5 Sekunde aa.

D URL fir dr Schnappschuss isch:
:$4
D URL isch nume zum sofortige Abelade dänkt, bitte spychere si nit as Läsezeiche ab, wel dr Dateiinhalt nit aktualisiert wird un speter cha glescht wäre.

S Tar-Archiv sott in s Erwyterigs-Verzeichnis uuspackt wäre. Uf eme Unix-ähnlige Betriebssystem mit:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Unter Windows chasch s Programm [http://www.7-zip.org/ 7-zip] zum Uuspacke vu dr Dateie neh.

Wänn Dyy Wiki uf eme entfärnte Server lauft, no pack d Dateie in e temporär Verzeichnis uf Dyynem lokale Computer uus un lad deno '''alli''' uuspackte Dateie uf dr entfärnt Server uffe.

Wänn Du d Dateie uuspackt hesch, muesch d Erwyterig in dr <code>LocalSettings.php</code> regischtriere. In dr Dokumentation zue dr Erwyterig sott s a Aaleitig derzue haa.

Wänn Du Froge hesch zue däm Erwyterigs-Verteil-Syschtem, no gang bitte uf d Syte [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'No ne Erwyterig hole',
	'extdist-tar-error' => 'S Tar-Programm het dr Beändigungscode $1 gliferet:', # Fuzzy
);

/** Hebrew (עברית)
 * @author Amire80
 * @author Rotem Liss
 */
$messages['he'] = array(
	'extensiondistributor' => 'הורדת הרחבה של מדיה־ויקי',
	'extensiondistributor-desc' => 'הרחבה להפצת קבצים מכווצים של הרחבות',
	'extdist-not-configured' => 'אנא הגדירו את $wgExtDistList ואת $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'לא ניתן לאחזר את רשימת ההרחבות!',
	'extdist-no-such-extension' => 'אין הרחבה בשם "$1"',
	'extdist-no-such-version' => 'ההרחבה "$1" אינה קיימת בגרסה "$2".',
	'extdist-choose-extension' => 'בחרו איזו הרחבה תרצו להוריד:',
	'extdist-submit-extension' => 'המשך',
	'extdist-choose-version' => 'אתם מורידים את ההרחבה <b>$1</b>.

אנא בחרו את גרסת מדיה־ויקי שאתם משתמשים בה.

רוב ההרחבות עובדות בגרסאות מרובות של מדיה־ויקי, לכן אם גרסת מדיה־ויקי שאתם משתמשים בה אינה מופיעה כאן, או אם אתם צריכים את התכונות האחרונות שנוספו להרחבה, נסו להשתמש בגרסה הנוכחית.',
	'extdist-no-versions' => 'ההרחבה שנבחרה ($1) אינה זמינה בשום גרסה!',
	'extdist-submit-version' => 'המשך',
	'extdist-created' => "נוצר קובץ היטל של גרסה <b>$2</b> של ההרחבה <b>$1</b> עבור מדיה־ויקי <b>$3</b>. ההורדה אמורה להתחיל אוטומטית בעוד 5 שניות.

הכתובת של קובץ זה היא:
:$4
ניתן להשתמש בה להורדה מידית לשרת, אבל אנא אל תוסיפו אותה לסימניות הדפדפן, כיוון שתוכנה לא יעודכן, וכיוון שייתכן שהיא תימחק מאוחר יותר.

יש לחלץ את קובץ ה־tar לתוך תיקיית ההרחבות שלכם. לדוגמה, במערכת הפעלה דמוית יוניקס:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

בחלונות, אפשר להשתמש בתוכנת [http://www.7-zip.org/ 7-zip] לחילוץ הקבצים.

אם אתר הוויקי שלכם נמצא בשרת מרוחק, חלצו את הקבצים לתוך תיקייה זמנית במחשב המקומי שלכם, ואז העלו את '''כל''' הקבצים שחולצו לתיקיית ההרחבות בשרת.

לאחר שחילצתם את הקבצים, תצטרכו לרשום את ההרחבה בקובץ LocalSettings.php. תיעוד ההרחבה אמור לכלול הנחיות כיצד לעשות זאת.

אם יש לכם שאלות כלשהן על מערכת הפצת ההרחבות הזו, אנא עברו לדף [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'הורדת הרחבה נוספת',
	'extdist-tar-error' => 'לא ניתן לאחזר את כתובת הארכיון מה־API של הארכיונים.',
);

/** Hindi (हिन्दी)
 * @author Ansumang
 * @author Siddhartha Ghai
 */
$messages['hi'] = array(
	'extensiondistributor' => 'डाउनलोड़ मीडियाविकि एक्सटेंशन',
	'extensiondistributor-desc' => 'एक्सटेंशन स्नैपशॉट अभिलेखागार वितरण के लिए एक्सटेंशन',
	'extdist-not-configured' => 'कृपया $wgExtDistList और $wgExtDistArchiveAPI कॉन्फ़िगर करें',
	'extdist-no-such-extension' => 'कोई ऐसे एक्सटेंशन "$1" नहीं',
	'extdist-no-such-version' => 'एक्सटैन्शन "$1" "$2" संस्करण में मौजूद नहीं ।',
	'extdist-choose-extension' => 'कौनसी एक्सटैन्शन डाउनलोड़ करना चाहते हैं चुने:',
	'extdist-submit-extension' => 'जारी रखें',
	'extdist-choose-version' => 'आप डाउनलोड कर रहे हैं <b>$1</b> एक्सटेंशन ।

अपने मीडियाविकि संस्करण चुनें ।

अधिकांश एक्सटेंशन मीडियाविकि के एकाधिक संस्करणों में कम करते हैं, तो यदि आपके मीडियाविकि संस्करण यहाँ नहीं है, या यदि आपको नवीनतम विस्तार सुविधाओं की जरूरत है, वर्तमान संस्करण का उपयोग करें ।',
	'extdist-submit-version' => 'जारी रखें',
	'extdist-want-more' => 'अन्य एक्सटेन्शन पाएँ',
	'extdist-tar-error' => 'पुरालेख ए॰पी॰आई से पुरालेख यू॰आर॰एल नहीं नहीं पाया जा सका।',
);

/** Croatian (hrvatski)
 * @author Ex13
 * @author Herr Mlinka
 * @author Roberta F.
 * @author SpeedyGonsales
 */
$messages['hr'] = array(
	'extensiondistributor' => 'Snimi MediaWiki ekstenziju',
	'extensiondistributor-desc' => 'Ekstenzija za distribuciju inačica arhiva ekstenzija',
	'extdist-not-configured' => 'Molimo konfigurirajte $wgExtDistList i $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Nema takve ekstenziju "$1"',
	'extdist-no-such-version' => 'Ekstenzija "$1" ne postoji u inačici "$2".',
	'extdist-choose-extension' => 'Odaberite koju ekstenziju želite preuzeti:',
	'extdist-submit-extension' => 'Nastavi',
	'extdist-choose-version' => 'Preuzimate ekstenziju <b>$1</b>.

Izaberite vašu inačicu MedijaWikija.

Većina ekstenzija će raditi na više (ili svim) inačicama MedijaWikija, pa ako vaša inačica MedijaWikija nije ovdje, ili ako imate potrebu za najnovijim značajkama, pokušajte koristiti trenutnu inačicu.',
	'extdist-no-versions' => 'Odabrana ekstenzija ($1) nije dostupna u nijednoj inačici!',
	'extdist-submit-version' => 'Nastavi',
	'extdist-created' => 'Kreirana je snimka inačice <b>$2</b> ekstenzije <b>$1</b> MedijaWikija inačice <b>$3</b>. Vaše preuzimanje počinje za 5 sekundi.

URL snimke je:
:$4
Taj URL može biti rabljen za preuzimanje s poslužitelja, no molimo nemojte ga čuvati jer se sadržaj ne osvježava i moguće je njegovo brisanje s vremenom.

Tar arhivu trebalo bi raspakirati u vaš direktorij za ekstenzije. Na primjer, na unixoidnim operacijskim sustavima:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Na Windowsima možete rabiti [http://www.7-zip.org/ 7-zip] za raspakiravanje arhive.

Ukoliko je vaš wiki na udaljenom poslužitelju, raspakirajte datoteke u privremeni direktorij lokalno i potom ih sve snimite u direktorij za ekstenzije na poslužitelju.

Nakon što se raspakirali arhivu, potrebno je uključiti ekstenziju u LocalSettings.php datoteci. Dokumentacije ekstenzije opisuje taj postupak.

Ukoliko imate pitanja u svezi sustava distribucije ekstenzija, pogledajte ovu stranicu: [[Extension talk:ExtensionDistributor]].',
	'extdist-want-more' => 'Dohvati drugu ekstenziju',
	'extdist-tar-error' => 'Tar je vratio izlazni kod $1:', # Fuzzy
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'extensiondistributor' => 'Rožsěrjenje za MediaWiki sćahnyć',
	'extensiondistributor-desc' => 'Rozšěrjenje za rozdźělenje archiwow njejapkich fotow rozšěrjenjow',
	'extdist-not-configured' => 'Prošu konfiguruj $wgExtDistList a $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Lisćina rozšěrjenjow njeda so wobstarać!',
	'extdist-no-such-extension' => 'Rozšěrjenje "$1" njeeksistuje',
	'extdist-no-such-version' => 'Rozšěrjenje "$1" we wersiji "$2" njeeksistuje.',
	'extdist-choose-extension' => 'Wubjer, kotre rozšěrjenje chceš sćahnyć:',
	'extdist-submit-extension' => 'Dale',
	'extdist-choose-version' => 'Sćahuješ rozšěrjenje <b>$1</b>.

Wubjer swoju wersiju MediaWiki.

Najwjace rozšěrjenjow funguje přez wjacore wersije MediaWiki, jeli twoja wersija tuž tu njeje abo trjebaš najnowše funkcije rozšěrjenja, spytaj aktualnu wersiju wužiwać.',
	'extdist-no-versions' => 'Wubrane rozšěrjenje ($1) w žanej wersiji k dispoziciji njesteji!',
	'extdist-submit-version' => 'Dale',
	'extdist-created' => "Foto wobrazowki wersije <b>$2</b> rozšěrjenja <b>$1</b> wersije MediaWiki <b>$3</b> je so wutworił. Twoje sćehnjenje dyrbjało za 5 sekundow awtomatisce startować.

URL za tute foto wobrazowki je:
:$4
Hodźi so za hnydomniše sćehnjenje do serwera wužiwać, ale prošu njeskładuj jón jako zapołožku, dokelž wobsah so njezaktualizuje a móhł so pozdźîso zničił.

Tar-archiw měł so do twojeho zapisa rozšěrjenjow wupakować, na přikład na uniksowym dźěłowym systemje:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Na Windowsu móžeš [http://www.7-zip.org/ 7-zip] wužiwać, zo by dataje wupakował.

Jeli twój wiki je na nazdalnym serwerje, wupakuj dataje do nachwilneho zapisa na swojim lokalnym ličaku, a nahraj potom '''wšě''' wupakowane dataje do zapisa rozšěrjenjow na serwerje.

Po tym zo sy dataje wupakował, dyrbiš rozšěrjenje w dataji LocalSettings.php registrować. Dokumentacija rozšěrjenja dyrbjała instrukcije wobsahować, kak móžeš to činić.

Jeli maš prašenja wo systemje rozdźělowanja rozšěrjenjow, prošu dźi k [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Dalše rozšěrjenje wobstarać',
	'extdist-tar-error' => 'Archiw URL njeda so z archiwa API ekstrahować.',
);

/** Hungarian (magyar)
 * @author Dani
 * @author Dj
 * @author Glanthor Reviol
 * @author Reedy
 */
$messages['hu'] = array(
	'extensiondistributor' => 'MediaWiki-kigészítők letöltése',
	'extensiondistributor-desc' => 'Kiegészítő kiegészítőcsomagok terjesztéséhez',
	'extdist-not-configured' => 'Kérlek állítsd be a $wgExtDistList és a $wgExtDistArchiveAPI értékeit',
	'extdist-no-such-extension' => 'Nincs „$1” nevű kiegészítő',
	'extdist-no-such-version' => 'A(z) „$1” kiterjesztés nem létezik a(z) „$2” verzióban.',
	'extdist-choose-extension' => 'Válaszd ki, melyik kiterjesztést szeretnéd letölteni:',
	'extdist-submit-extension' => 'Folytatás',
	'extdist-choose-version' => 'Éppen a(z) <b>$1</b> kiterjesztést töltöd le.

Válaszd ki a MediaWiki verziót.

A legtöbb kiterjesztés működik a MediaWiki több verziójával, így ha az általad használt MediaWiki verzió nincs itt, vagy ha szükséged van a kiterjesztés legújabb funkcióira, próbáld az aktuális verziót használni.',
	'extdist-no-versions' => 'A választott kiterjesztés ($1) nem érhető el semmilyen verzióban!',
	'extdist-submit-version' => 'Folytatás',
	'extdist-created' => "A(z) <b>$1</b> MediaWiki <b>$3</b> kiterjesztés <b>$2</b> verziójának pillanatfelvétele elkészült. A letöltés automatikusan megkezdődik 5 másodpercen belül.

A pillanatfelvétel URL-je:
:$4
Használható a szerverről való azonnali letöltésre, de kérlek ne tedd el a könyvjelzőid közé, mert a tartalma nem fog frissülni, és lehet hogy később törölve lesz.

A tar tömörítvényt a kiterjesztéseid könyvtárába kell kicsomagolni. Példa unix-szerű operációs rendszeren:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Windowson használhatod a [http://www.7-zip.org/ 7-zip]-et a fájlok kibontásához.

Ha a wikid egy távoli szerveren van, bontsd ki a fájlokat egy ideiglenes könyvtárba a helyi számítógépeden, majd tölds fel '''az összes''' kitömörített fájlt a szerver kiterjesztések könyvtárába.

Miután kibontottad a fájlokat, regisztrálnod kell a kiterjesztést a LocalSettings.php-ben. Erről a kiterjesztés dokumentációjának kell bővebb útmutatást adnia.

Ha bármi kérdésed van a kiterjesztésterjesztő rendszerrel kapcsolatban, keresd fel az [[Extension talk:ExtensionDistributor]] lapot.",
	'extdist-want-more' => 'Másik kiterjesztés letöltése',
	'extdist-tar-error' => 'A tar által adott visszatérési kód $1:', # Fuzzy
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'extensiondistributor' => 'Discargar extension MediaWiki',
	'extensiondistributor-desc' => 'Extension pro distribuer archivos actualisate de extensiones',
	'extdist-not-configured' => 'Per favor configura $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Impossibile obtener le lista de extensiones.',
	'extdist-no-such-extension' => 'Non existe un extension "$1"',
	'extdist-no-such-version' => 'Le extension "$1" non existe in le version "$2".',
	'extdist-choose-extension' => 'Selige le extension a discargar:',
	'extdist-submit-extension' => 'Continuar',
	'extdist-choose-version' => 'Tu va discargar le extension <b>$1</b>.

Per favor selige tu version de MediaWiki.

Le majoritate del extensiones functiona trans versiones de MediaWiki, ergo si tu version de MediaWiki non es presente, o si tu ha besonio del ultime functionalitate de extensiones, prova usar le version actual.',
	'extdist-no-versions' => 'Le extension seligite ($1) non es disponibile in alcun version!',
	'extdist-submit-version' => 'Continuar',
	'extdist-created' => "Un instantaneo del version <b>$2</b> del extension <b>$1</b> pro MediaWiki <b>$3</b> ha essite create.
Le discargamento debe comenciar automaticamente post 5 secundas.

Le adresse URL de iste instantaneo es:
:$4
Es possibile usar iste adresse pro discargamento immediate verso un servitor, sed per favor non adde lo al lista de favoritos, post que le contento non essera actualisate, e illo pote esser delite plus tarde.

Le archivo tar debe esser extrahite in tu directorio de extensiones. Per exemplo, in un systema de operation de typo Unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

In Windows, tu pote usar [http://www.7-zip.org/ 7-zip] pro extraher le files.

Si tu wiki es situate in un servitor remote, extrahe le files in un directorio temporari in tu computator local, e postea incarga '''tote''' le files extrahite verso le directorio de extensiones in le servitor.

Quando tu ha extrahite le files, tu debe registrar le extension in LocalSettings.php. Le documentation del extension deberea continer instructiones explicante como facer lo.

Si tu ha questiones super iste systema de distribution de extensiones, per favor visita [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Obtener un altere extension',
	'extdist-tar-error' => 'Impossibile obtener le URL de archivo per medio del API de archivo.',
);

/** Indonesian (Bahasa Indonesia)
 * @author Bennylin
 * @author Farras
 * @author Irwangatot
 * @author IvanLanin
 * @author Kenrick95
 */
$messages['id'] = array(
	'extensiondistributor' => 'Unduh pengaya MediaWiki',
	'extensiondistributor-desc' => 'Ekstensi untuk mendistribusikan arsip snapshot ekstensi',
	'extdist-not-configured' => 'Silakan mengkonfigurasi $wgExtDistList dan $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Tidak ada ekstensi "$1"',
	'extdist-no-such-version' => '

Ekstensi "$1" tidak ada dalam versi "$2".',
	'extdist-choose-extension' => '

Pilih ekstensi yang ingin Anda unduh:',
	'extdist-submit-extension' => 'Lanjutkan',
	'extdist-choose-version' => 'Anda mengunduh  <b>$1</b> ekstensi.

Pilih versi MediaWiki anda.

Kebanyakan ekstensi bekerja di beberapa versi program MediaWiki, jadi jika versi MediaWiki Anda tidak ada di sini, atau jika Anda membutuhkan fitur ekstensi terbaru, coba gunakan versi terbaru.',
	'extdist-no-versions' => 'Ekstensi terpilih ($1) tidak tersedia di versi mana pun!',
	'extdist-submit-version' => 'Lanjutkan',
	'extdist-created' => "Sebuah versi cuplikan <b>$2</b> dari ekstensi <b>$1</b> untuk MediaWiki <b>$3</b> telah dibuat. Unduhan Anda akan dimulai secara otomatis dalam 5 detik.

URL untuk cuplikan ini adalah:
:$4
Tautan ini dapat digunakan untuk mengunduh langsung ke server, tetapi jangan tandai karena isinya tidak akan diperbarui dan dapat dihapus di kemudian hari.

Arsip tar harus diekstrak ke direktori ekstensi Anda. Sebagai contoh, pada sistem operasi keluarga UNIX:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Pada Windows, Anda dapat menggunakan [http://www.7-zip.org/ 7-zip] untuk mengekstrak file.

Jika wiki Anda di server jauh, ekstrak berkas ke direktori sementara pada komputer lokal Anda, dan kemudian unggah '''semua''' berkas yang diekstrak ke direktori ekstensi pada server.

Setelah mengekstrak berkas, Anda harus mendaftarkan ekstensi di LocalSettings.php. Dokumentasi ekstensi seharusnya memberikan petunjuk tentang cara untuk melakukan hal ini.

Jika Anda memiliki pertanyaan tentang sistem distribusi ekstensi ini, silakan tuju ke [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => '

Dapatkan ekstensi lain',
	'extdist-tar-error' => 'Tidak mampu mendapatkan URL arsip dari API arsip.',
);

/** Italian (italiano)
 * @author Beta16
 * @author Darth Kule
 * @author McDutchie
 * @author Melos
 * @author Nemo bis
 */
$messages['it'] = array(
	'extensiondistributor' => 'Scarica estensione MediaWiki',
	'extensiondistributor-desc' => 'Estensione per distribuire archivi snapshot delle estensioni',
	'extdist-not-configured' => 'Configura $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-list-missing' => "Impossibile recuperare l'elenco delle estensioni!",
	'extdist-no-such-extension' => 'Nessuna estensione "$1"',
	'extdist-no-such-version' => 'L\'estensione "$1" non esiste nella versione "$2".',
	'extdist-choose-extension' => 'Seleziona quale estensione intendi scaricare:',
	'extdist-submit-extension' => 'Continua',
	'extdist-choose-version' => "Stai scaricando l'estensione <b>$1</b>.

Seleziona la tua versione di MediaWiki.

Molte estensioni funzionano su più versioni di MediaWiki, quindi se la tua versione di MediaWiki non è qui o hai bisogno delle ultime funzioni dell'estensione, prova a usare l'ultima versione.",
	'extdist-no-versions' => "L'estensione selezionata ($1) non è disponibile in alcuna versione!",
	'extdist-submit-version' => 'Continua',
	'extdist-created' => "Un'istantanea della versione <b>$2</b> dell'estensione <b>$1</b> per MediaWiki <b>$3</b> è stata creata. Il tuo download dovrebbe partire automaticamente fra 5 secondi.

L'URL per questa istantanea è:
:$4
Può essere usato per scaricare immediatamente dal server, ma non aggiungerlo ai preferiti poiché il contenuto non sarà aggiornato e il collegamento potrebbe essere rimosso successivamente.

L'archivio tar dovrebbe essere estratto nella tua directory delle estensioni. Per esempio, su un sistema operativo di tipo Unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Su Windows puoi usare [http://www.7-zip.org/ 7-zip] per estrarre i file.

Se la tua wiki si trova su un server remoto, estrai i file in una cartella temporanea sul tuo computer locale e in seguito carica '''tutti''' i file estratti nella directory delle estensioni sul server.

Dopo che hai estratto i file, avrai bisogno di registrare l'estensione in LocalSettings.php. Il manuale dell'estensione dovrebbe contenere le istruzioni su come farlo.

Se hai qualche domanda riguardo al sistema di distribuzione di questa estensione vedi [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => "Prendi un'altra estensione",
	'extdist-tar-error' => "Impossibile recuperare l'URL dell'archivio dall'archivio API.",
);

/** Japanese (日本語)
 * @author Aotake
 * @author Fryed-peach
 * @author Marine-Blue
 * @author Ohgi
 * @author Shirayuki
 * @author Whym
 */
$messages['ja'] = array(
	'extensiondistributor' => 'MediaWiki 拡張機能のダウンロード',
	'extensiondistributor-desc' => '拡張機能のスナップショットのアーカイブを配布するための拡張機能',
	'extdist-not-configured' => '$wgExtDistList および $wgExtDistArchiveAPI の設定を行ってください',
	'extdist-list-missing' => '拡張機能一覧を取得できません!',
	'extdist-no-such-extension' => '「$1」という拡張機能はありません',
	'extdist-no-such-version' => '拡張機能「$1」にバージョン「$2」は存在しません。',
	'extdist-choose-extension' => 'ダウンロードしたい拡張機能を選択してください:',
	'extdist-submit-extension' => '続行',
	'extdist-choose-version' => '<b>$1</b> 拡張機能をダウンロードしようとしています。

ご使用中の MediaWiki のバージョンを選択してください。

多くの拡張機能は複数のバージョンで動作しますが、ご使用中の MediaWiki のバージョンが一覧にない場合、または拡張機能の最新の機能が必要な場合は、最新版をお試しください。',
	'extdist-no-versions' => '選択した拡張機能 ($1) はどのバージョンでも利用できません!',
	'extdist-submit-version' => '選択',
	'extdist-created' => "MediaWiki <b>$3</b> の拡張機能 <b>$1</b> バージョン <b>$2</b> のスナップショットが作成されました。5秒後、自動的にダウンロードが開始されます。

このスナップショットのURLは次の通りです:
:$4
コンテンツのアップデートに対応できないため、また、ファイルは数日後に削除される可能性があるため、今すぐダウンロードし、このアドレスをブックマークしないでください。

tar アーカイブは拡張機能ディレクトリに展開してください。Unix 系の OS では、下記のようにします。

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Windowsでは[http://www.7-zip.org/ 7-zip]がアーカイブの展開に利用できます。

ウィキを遠隔サーバーに設置している場合、ローカルコンピューターの一時ディレクトリにアーカイブを展開し、アーカイブに含まれていた'''すべての'''ファイルをサーバー上の拡張機能ディレクトリへアップロードしてください。

ファイルをすべて展開したら、その拡張機能を LocalSettings.php へ登録する必要があります。具体的な作業手順は各拡張機能のドキュメントで解説されています。

この拡張機能の配布システムに何かご質問がある場合は、[[Extension talk:ExtensionDistributor]] でお尋ねください。",
	'extdist-want-more' => '他の拡張機能を入手',
	'extdist-tar-error' => 'アーカイブ API で アーカイブ URL から取得できません。',
);

/** Javanese (Basa Jawa)
 * @author NoiX180
 */
$messages['jv'] = array(
	'extensiondistributor' => 'Undhuh èkstènsi MediaWiki',
	'extensiondistributor-desc' => 'Èkstènsi kanggo ndistribusikaké arsip snapshot èkstènsi',
	'extdist-not-configured' => 'Mangga atur $wgExtDistList lan $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Ora ana èkstènsi "$1"',
	'extdist-no-such-version' => 'Èkstènsi "$1" ora ana nèng vèrsi "$2".',
	'extdist-choose-extension' => 'Pilih èkstènsi endi sing Sampéyan pingin undhuh:',
	'extdist-submit-extension' => 'Banjuraké',
	'extdist-no-versions' => 'Èkstènsi kapilih ($1) ora sumadhiya nèng vèrsi apa waé!',
	'extdist-submit-version' => 'Banjuraké',
	'extdist-want-more' => 'Èntukaké èkstènsi liya',
	'extdist-tar-error' => 'Tar mbalèkaké kodhé metu $1:', # Fuzzy
);

/** Georgian (ქართული)
 * @author BRUTE
 */
$messages['ka'] = array(
	'extensiondistributor' => 'მედიავიკის გაფართოების ჩაწერა',
	'extdist-no-such-extension' => 'არ არსებობს გაფართოება "$1"',
	'extdist-submit-extension' => 'გაგრძელება',
	'extdist-choose-version' => 'თქვენ იწერთ <b>$1</b> გაფართოებას.

აირჩიეთ მედიავიკის ვერსია.

გაფართოებათა უმრავლესობა მუშაობს მედიავიკის უმრავლეს ვერსიებზე, ასე რომ თუ თქვენი მედიავიკის ვერსია აქ არ არის, ან თუ გჭირდებათ უახლესი გაფართოება, სცადეთ გამოიყენოთ ამჟამინდელი ვერსია.',
	'extdist-submit-version' => 'გაგრძელება',
	'extdist-want-more' => 'სხვა გაფართოების ნახვა',
);

/** Khmer (ភាសាខ្មែរ)
 * @author Lovekhmer
 */
$messages['km'] = array(
	'extensiondistributor' => 'ទាញយកផ្នែកបន្ថែមនៃមេឌាវិគី',
	'extdist-submit-extension' => 'បន្ត',
	'extdist-submit-version' => 'បន្ត',
);

/** Korean (한국어)
 * @author Kwj2772
 * @author 아라
 */
$messages['ko'] = array(
	'extensiondistributor' => '미디어위키 확장 기능 다운로드',
	'extensiondistributor-desc' => '확장 기능의 스냅샷 아카이브 배포를 위한 확장 기능',
	'extdist-not-configured' => '$wgExtDistList와 $wgExtDistArchiveAPI를 설정하세요.',
	'extdist-list-missing' => '확장 기능 목록을 가져올 수 없습니다!',
	'extdist-no-such-extension' => '"$1" 확장 기능이 없습니다.',
	'extdist-no-such-version' => '"$1" 확장 기능은 "$2" 버전이 존재하지 않습니다.',
	'extdist-choose-extension' => '다운로드하려는 확장 기능을 선택하세요:',
	'extdist-submit-extension' => '계속',
	'extdist-choose-version' => '<b>$1</b> 확장 기능을 다운로드하고 있습니다.

미디어위키 버전을 선택하세요.

대부분의 확장 기능은 미디어위키의 여러 버전에서도 동작합니다, 당신의 미디어위키 확장 기능이 여기 없거나 최신 버전이 필요하다면, 현재 버전 다운로드를 선택하세요.',
	'extdist-no-versions' => '선택한 확장 기능($1)이 어떤 버전으로도 존재하지 않습니다.',
	'extdist-submit-version' => '계속',
	'extdist-created' => "미디어위키 확장 기능 <b>$1</b>의 <b>$2</b> 버전의 스냅샷 <b>$3</b> 이 만들어졌습니다. 5초 후에 다운로드가 자동적으로 실행됩니다.

스냅샷의 URL은 다음에 있습니다:
:$4
이 URL은 서버에서 즉시 다운로드할 때 사용될 것입니다. 하지만 즐겨찾기에 추가하지는 마세요. 내용이 업데이트되지 않고, 나중에 이 URL은 삭제될 것입니다.

tar 압축 파일을 확장 기능 폴더에 압축을 푸세요. 유닉스 계열의 운영 체제에서는:
<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>
을 이용하십시오.

윈도에서는 압축을 풀 때 [http://www.7-zip.org/ 7-zip]을 이용하실 수 있습니다.

만약 위키가 원격 서버에 있다면, 컴퓨터에 임시로 압축을 푼 뒤 압축이 풀어진 '''모든''' 파일을 서버의 확장 기능 폴더에 올리세요.

압축을 푼 후, 확장 기능을 LocalSettings.php에 등록해야 합니다. 확장 기능의 설명 문서가 어떻게 확장 기능을 등록하는 지에 대한 설명을 담고 있습니다.

이 확장 기능에 대해 어떤 질문이 있다면, [[Extension talk:ExtensionDistributor]] 문서로 가세요.",
	'extdist-want-more' => '다른 확장 기능 얻기',
	'extdist-tar-error' => '아카이브 API에서 아카이브 URL을 가져올 수 없습니다.',
);

/** Colognian (Ripoarisch)
 * @author Purodha
 * @author Reedy
 */
$messages['ksh'] = array(
	'extensiondistributor' => 'MediaWiki Zohsatzprojramm eronger lade',
	'extensiondistributor-desc' => 'Zohsazprojramm för Arschive met Zohsazprojramme ze verdeile.',
	'extdist-not-configured' => 'Bes esu joot un donn <code>$wgExtDistList</code> un <code>$wgExtDistArchiveAPI</code> setze.',
	'extdist-list-missing' => 'De Leß met de Zohsazprojramme kunnt nit afjeroofe wääde.',
	'extdist-no-such-extension' => 'Ene Zosatz „$1“ es nit doh.',
	'extdist-no-such-version' => 'Dä Zosatz „$1“ en dä Version „$2“ es nit doh.',
	'extdist-choose-extension' => 'Sök Der us, wat för ene Zosatz De eronger laade wells:',
	'extdist-submit-extension' => 'Wigger',
	'extdist-choose-version' => 'Do bes dä Zosatz <b>$1</b> am erunge lade.

Sök Ding Version fun MediaWiki us.

De miißte Zosätz fungxjeneere met diverse Versione fun MediaWiki, alsu falls Ding Version nit dobei es, udder wann de Bedarref häß aan de neuste Müjjeleschkeite un Eijeschaffte, dann versök de aktoelle Version.',
	'extdist-no-versions' => 'Dä Zosatz „$1“ jitt et nit en alle Versione!',
	'extdist-submit-version' => 'Wigger',
	'extdist-created' => 'En Schnappschoß-Version fun dä Version <b>$2</b> fun däm Zosatz „<b>$1</b>“ för MediaWiki Version <b>$3</b> eß aanjelaat woode. Et ErungerLade sull automattesch loß jonn, in fönnef Sekunde.

Dä URL för dä Schnappschoß es:
:$4
Di Address is bloß för jetz jrad eronger ze lade jedaach. Donn se nit faßhallde. Der Datei ier Enhallt weed bahl övverhollt sin, un se weed och nit lang opjehovve.

En dä Datei es e <i lang="en">tar</i>-Aschiif. Dat sullt en dat Verzeischnes met de MediaWiki-Zosätz ußjepack wäde. Med <i lang="en">Unix</i> un äänlijje Bedriefß-Süsteme jeit dat en dä Aat:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Med <i lang="en">Windows</i>, kanns De [http://www.7-zip.org/ 7-zip] nämme.

Wann Ding Wiki nit op dämm Rääschner läuf, wo de di Aschif-Datei lijje häß, dann donn se en e Zwescheverzeichnis ußpacke, un dann donn \'\'\'jede\'\'\' usjepackte Datei un \'\'\'jedes\'\'\' usjepackte Verzeichnis op Dingem Wiki singe Server en et <code lang="en">extensions</code>-Verzeichnis huhlade.

Wan De mem Ußpacke (un velleich Huhlade) fäädesch bes, do moß De dä Zosatz en  <code>LocalSettings.php</code> enndraare. De Dokementazjohn för dä Zosatz sät jenouer, wi dat em einzelne jeiht.

Wann De Frore övver dat Süßteem zom Zosätz erunger Lade haß, da jangk noh [[Extension talk:ExtensionDistributor]].',
	'extdist-want-more' => 'Noch ene Zosatz holle',
	'extdist-tar-error' => 'Dä URL för et Aschiif kunnt nit övver de <i lang="en>API</i> afjeroofe wääde.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Les Meloures
 * @author Robby
 * @author Soued031
 */
$messages['lb'] = array(
	'extensiondistributor' => 'MediaWiki Erweiderung eroflueden',
	'extensiondistributor-desc' => "Erweiderung fir d'Verdeele vu Schnappschoss-Archive vun Erweiderungen",
	'extdist-not-configured' => 'Konfiguréiert w.e.g. $wgExtDistList an $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Erweiderungslëscht konnt net generéiert ginn!',
	'extdist-no-such-extension' => 'Et gëtt keng Erweiderung "$1"',
	'extdist-no-such-version' => 'D\'Erweiderung "$1" gëtt et net an der Versioun "$2".',
	'extdist-choose-extension' => 'Wielt wat fir eng Erweiderung Dir wëllt eroflueden:',
	'extdist-submit-extension' => 'Viru fueren',
	'extdist-choose-version' => "Dir sidd am Gaang d'<b>$1</b> Erweiderung erofzelueden.

Wielt Är MediaWiki Versioun.

Déi meescht Erweiderunge funktionéiere mat verschiddene Versioune vu MediaWiki, wann Är Versioun vu MediaWiki net hei steet, oder wann der déi neist Funktioune vun den Erweiderunge braucht, da versicht déi neist Versioun ze benotzen.",
	'extdist-no-versions' => 'Déi gewielten Erweiderung ($1) ass a kenger Versioun disponibel!',
	'extdist-submit-version' => 'Viru fueren',
	'extdist-want-more' => 'Eng aner Erweiderung benotzen',
);

/** Limburgish (Limburgs)
 * @author Aelske
 * @author Ooswesthoesbes
 * @author Reedy
 */
$messages['li'] = array(
	'extensiondistributor' => 'Download MediaWiki extension',
	'extensiondistributor-desc' => 'Extension veur distributere snapshot archieve óf extensions',
	'extdist-not-configured' => 'Maak de instellinge veur $wgExtDistList en $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'De uitbreiding "$1" besteit neet',
	'extdist-no-such-version' => 'De oetbreiing "$1" besteit neet in de versie "$2".',
	'extdist-choose-extension' => 'Selekteer de extensie dae se wils downloade:',
	'extdist-submit-extension' => 'Doorgaon',
	'extdist-choose-version' => 'De bös de uitbreiding <b>$1</b> aan t downloade.

Selecteer de versie van MediaWiki.

De meiste uitbreidinge werke met meerdere versies van MediaWiki, dus as de versie neet in de lies steit, of as se behoefte höbs aan de nieuwste meugelikhede van de uitbreidinge, gebroek den de hujige versie.',
	'extdist-no-versions' => 'De geselecteerde uitbreiding ($1) is in gein enkele versie besjikbaar!',
	'extdist-submit-version' => 'Doorgaon',
	'extdist-created' => 'De snapshot voor versie <b>$2</b> voor de uitbreiding <b>$1</b> voor MediaWiki <b>$3</b> is aangemaakt. Uw download start automatisch over 5 seconden.

De URL voor de snapshot is:
:$4
Deze verwijzing kan gebruikt worden door het direct downloaden van de server, maar maak geen bladwijzers aan, omdat de inhoud bijgewerkt kan worden, of de snapshot op een later moment verwijderd kan worden.

Pak het tararchief uit in uw map "extensions/". Op een UNIX-achtig besturingssysteem gaat dat als volgt:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Op Windows kunt u [http://www.7-zip.org/ 7-zip] gebruiken om de bestanden uit te pakken.

Als uw wiki op een op afstand beheerde server staat, pak de bestanden dan uit in een tijdelijke map op uw computer. Upload daarna \'\'\'alle\'\'\' uitgepakte bestanden naar de map "extensions/" op de server.

Nadat u de bestanden hebt uitgepakt en op de juiste plaatst hebt neergezet, moet u de uitbreiding registreren in LocalSettings.php. In de documentatie van de uitbreiding treft u de instructies aan.

Als u vragen hebt over dit distributiesysteem voor uitbreidingen, ga dan naar [[Extension talk:ExtensionDistributor]].',
	'extdist-want-more' => "Nag 'n uitbreiding downloade",
	'extdist-tar-error' => 'Tar goof de volgende exitcode $1:', # Fuzzy
);

/** Lithuanian (lietuvių)
 * @author Eitvys200
 */
$messages['lt'] = array(
	'extensiondistributor' => 'Parsisiųsti MediaWiki pratęsimą',
	'extdist-no-such-extension' => 'Nėra plėtinio " $1 "',
	'extdist-choose-extension' => 'Pasirinkite kuri plėtinį, kurį norite atsisiųsti:',
	'extdist-submit-extension' => 'Tęsti',
	'extdist-submit-version' => 'Tęsti',
	'extdist-want-more' => 'Gauti kitą plėtinį',
);

/** Latvian (latviešu)
 * @author Papuass
 */
$messages['lv'] = array(
	'extdist-submit-version' => 'Turpināt',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 * @author Brest
 */
$messages['mk'] = array(
	'extensiondistributor' => 'Преземање на додаток за МедијаВики',
	'extensiondistributor-desc' => 'Додаток за дистрибуција на урнек-архиви на додатоци',
	'extdist-not-configured' => 'Задајте $wgExtDistList и $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Не можам да го добијам списокот на додатоци!',
	'extdist-no-such-extension' => 'Нема додаток со име „$1“',
	'extdist-no-such-version' => 'Додатокот „$1“ не постои во верзијата „$2“.',
	'extdist-choose-extension' => 'Одберете го додатокот што сакате да го преземете',
	'extdist-submit-extension' => 'Продолжи',
	'extdist-choose-version' => 'Го преземате додатокот <b>$1</b>.

Изберете ја вашата верзија на МедијаВики.

Највеќето додатоци работат на многу верзии на МедијаВики, така што ако вашата МедијаВики ја нема, или пак ако имате потреба од можностите во најновиот додаток, тогаш пробајте ја последната верзија.',
	'extdist-no-versions' => 'Избраниот додаток ($1) не е достапен во ниту една верзија!',
	'extdist-submit-version' => 'Продолжи',
	'extdist-created' => "Направена е снимка од верзијата <b>$2</b> на додатокот <b>$1</b> за МедијаВики <b>$3</b>. Преземањето треба да започне автоматски за 5 секунди. URL-адресата за оваа снимка е:
:$4
Можете да ја искористите веднаш за преземање на опслужувач, но не зачувувајте ја во прелистувачот, бидејќи содржината нема да се обновува, а подоцна може и да биде избришана.

Tar-податотеката треба да ја распакувате во папката за додатоци. На пример: на оперативен систем од типот на unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Во Windows за таа намена можете да го употребите [http://www.7-zip.org/ 7-zip].

Ако вашето вики е на далечински опслужувач, отпакувајте ги податотеките во привремена папка на вашиот локален сметач, а потоа подигнете ги '''сите''' отпакувани податотеки во папката за додатоци на опслужувачот.

Откако ќе ги распакувате податотеките, ќе треба да го регистрирате додатокот во LocalSettings.php. Документацијата на додатокот има напатствија за оваа постапка.

Доколку имате прашања за овој дистрибутивен систем на додатоци, обратете се на страницата [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Преземи друг додаток',
	'extdist-tar-error' => 'Не можам да го добијам URL-то на архивата од нејзиниот API.',
);

/** Malayalam (മലയാളം)
 * @author Praveenp
 */
$messages['ml'] = array(
	'extensiondistributor' => 'മീഡിയവിക്കി അനുബന്ധം ഡൗൺലോഡ് ചെയ്യുക',
	'extensiondistributor-desc' => 'അനുബന്ധങ്ങളുടെ തത്സമയ സഞ്ചയങ്ങൾ വിതരണം ചെയ്യാനുള്ള അനുബന്ധം',
	'extdist-not-configured' => 'ദയവായി $wgExtDistList, $wgExtDistArchiveAPI എന്നിവ ക്രമീകരിക്കുക',
	'extdist-no-such-extension' => '"$1" എന്നൊരു അനുബന്ധം ഇല്ല',
	'extdist-no-such-version' => '"$2" പതിപ്പിൽ "$1" എന്നൊരു അനുബന്ധം ഇല്ല.',
	'extdist-choose-extension' => 'താങ്കൾക്ക് ഡൗൺലോഡ് ചെയ്യേണ്ട അനുബന്ധം തിരഞ്ഞെടുക്കുക:',
	'extdist-submit-extension' => 'തുടരുക',
	'extdist-choose-version' => 'താങ്കൾ <b>$1</b> എന്ന അനുബന്ധം ഡൗൺലോഡ് ചെയ്യുകയാണ്.

താങ്കളുടെ മീഡിയവിക്കി പതിപ്പ് തിരഞ്ഞെടുക്കുക.

ബഹുഭൂരിപക്ഷം അനുബന്ധങ്ങളും മീഡിയവിക്കിയുടെ വിവിധ പതിപ്പുകളിൽ ഒരേപോലെ പ്രവർത്തിക്കാൻ പ്രാപ്തമാണ്, അതുകൊണ്ട് മീഡിയവിക്കി പതിപ്പ് ഇല്ലെങ്കിൽ, അല്ലെങ്കിൽ ഏറ്റവും പുതിയ അനുബന്ധ സവിശേഷതകളാണ് താങ്കൾക്ക് വേണ്ടതെങ്കിൽ, ഇപ്പോഴത്തെ പതിപ്പ് പരീക്ഷിക്കുക.',
	'extdist-no-versions' => 'തിരഞ്ഞെടുത്ത അനുബന്ധം ($1) ഒരു പതിപ്പിലും ലഭ്യമല്ല!',
	'extdist-submit-version' => 'തുടരുക',
	'extdist-created' => "മീഡിയവിക്കി <b>$3</b> ഉപയോഗിക്കുന്ന <b>$1</b> അനുബന്ധത്തിന്റെ തത്സമയ പതിപ്പ് <b>$2</b> സൃഷ്ടിച്ചിരിക്കുന്നു. താങ്കളുടെ ഡൗൺലോഡ് 5 സെക്കന്റുകൾക്കുള്ളിൽ സ്വയം തുടങ്ങുന്നതാണ്.

ഈ തത്സമയ ശേഖരണത്തിന്റെ യൂ.ആർ.എൽ.:
:$4
ഇത് ഒരു സെർവറിലേയ്ക്കുള്ള ഡൗൺലോഡിന് ഇപ്പോൾ തന്നെ ഉപയോഗിക്കാവുന്നതാണ്, പക്ഷേ ദയവായി ഇത് ബുൿമാർക്ക് ചെയ്ത് വെയ്ക്കാതിരിക്കുക, ഉള്ളടക്കം പുതുക്കാതാകുമ്പോൾ പിന്നീടൊരിക്കൽ ഇത് നീക്കം ചെയ്യപ്പെട്ടേക്കാം.

ടാർ സഞ്ചയിക താങ്കളുടെ അനുബന്ധങ്ങളുടെ ഡയറക്റ്ററിയിലേയ്ക്ക് എക്സ്ട്രാക്റ്റ് ചെയ്യാവുന്നതാണ്. ഉദാഹരണത്തിന്, യുണിക്സ് സമാന ഓ.എസ്സിൽ:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>
എന്നുപയോഗിക്കുക.

വിൻഡോസിൽ, പ്രമാണങ്ങൾ എക്സ്ട്രാക്റ്റ് ചെയ്യാൻ [http://www.7-zip.org/ 7-സിപ്] ഉപയോഗിക്കാം.

താങ്കളുടെ വിക്കി ഒരു വിദൂര സെ‌‌ർവറിലാണെങ്കിൽ, താങ്കളുടെ കൈയിലെ കമ്പ്യൂട്ടറിലെ താത്കാലിക ഡയറക്റ്ററിയിലേയ്ക്ക് പ്രമാണങ്ങൾ എക്സ്ട്രാക്റ്റ് ചെയ്ത ശേഷം, അവ '''എല്ലാം''' സെർവറിലെ അനുബന്ധങ്ങൾക്കുള്ള ഡയറക്റ്ററിയിലേയ്ക്ക് അപ്‌‌ലോഡ് ചെയ്ത് നൽകുക.

പ്രമാണങ്ങൾ എക്സ്ട്രാക്റ്റ് ചെയ്ത ശേഷം, അവ LocalSettings.php എന്ന പ്രമാണത്തിൽ അടയാളപ്പെടുത്തേണ്ടതുണ്ട്. അനുബന്ധത്തിന്റെ സഹായ താളിൽ ഇതെങ്ങനെ ചെയ്യാമെന്ന് നൽകിയിട്ടുണ്ടായിരിക്കും.

ഈ അനുബന്ധ വിതരണ സംവിധാനത്തെ കുറിച്ച് എന്തെങ്കിലും ചോദ്യങ്ങൾ താങ്കൾക്കുണ്ടെങ്കിൽ, ദയവായി [[Extension talk:ExtensionDistributor|ബന്ധപ്പെട്ട സംവാദം താൾ]] പരിശോധിക്കുക.",
	'extdist-want-more' => 'മറ്റൊരു അനുബന്ധം നേടുക',
	'extdist-tar-error' => 'ടാർ എക്സിറ്റ് കോഡ് $1 തിരിച്ചയച്ചിരിക്കുന്നു:', # Fuzzy
);

/** Marathi (मराठी)
 * @author V.narsikar
 */
$messages['mr'] = array(
	'extensiondistributor' => 'मिडियाविकि विस्तारकाचे अधिभारण करा',
	'extdist-submit-extension' => 'चालू ठेवा',
	'extdist-submit-version' => 'चालू ठेवा',
	'extdist-want-more' => 'दुसरे विस्तारक मिळवा',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 * @author Aurora
 * @author Aviator
 * @author Reedy
 */
$messages['ms'] = array(
	'extensiondistributor' => 'Muat turun penyambung MediaWiki',
	'extensiondistributor-desc' => 'Penyambung khas untuk pengedaran arkib petikan penyambung',
	'extdist-not-configured' => 'Sila tetapkan konfigurasi $wgExtDistList dan $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Senarai sambungan tidak dapat diambil!',
	'extdist-no-such-extension' => 'Penyambung "$1" tidak wujud',
	'extdist-no-such-version' => 'Penyambung "$1" tidak mempunyai versi "$2".',
	'extdist-choose-extension' => 'Sila pilih penyambung yang ingin dimuat turun:',
	'extdist-submit-extension' => 'Teruskan',
	'extdist-choose-version' => 'Anda sedang memuat turun penyambung <b>$1</b>.

Sila pilih versi MediaWiki anda.

Kebanyakan penyambung boleh digunakan dalam pelbagai versi MediaWiki. Oleh itu, jika versi MediaWiki anda tiada di sini, atau anda memerlukan penyambung dengan ciri-ciri terkini, anda boleh memilih untuk menggunakan versi semasa.',
	'extdist-no-versions' => 'Penyambung yang dipilih ($1) tiada dalam sebarang versi!',
	'extdist-submit-version' => 'Teruskan',
	'extdist-created' => "Sebuah petikan bagi penyambung <b>$1</b> versi <b>$2</b> untuk MediaWiki <b>$3</b> telah dicipta. Proses muat turun akan dimulakan secara automatik dalam masa 5 saat.

URL untuk petikan ini ialah:
:$4
Alamat ini boleh digunakan untuk memuat turun ke dalam pelayan anda dengan segera. Akan tetapi, jangan simpan alamat ini dalam ''bookmark'' kerana kandungannya tidak akan dikemas kini lagi, dan kelak mungkin akan dihapuskan balik.

Arkib tar yang dimuat turun perlu dikeluarkan ke dalam direktori extensions anda. Sebagai contoh, untuk sistem pengendalian ala UNIX:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Untuk Windows pula, anda boleh menggunakan perisian [http://www.7-zip.org/ 7-zip] untuk mengeluarkan fail-fail yang berkenaan.

Sekiranya wiki anda terdapat dalam pelayan jauh, sila keluarkan fail-fail yang berkenaan ke dalam direktori sementara dalam komputer tempatan anda, kemudian muat naik '''semua''' fail yang telah dikeluarkan ke dalam direktori extensions dalam komputer pelayan.

Selepas anda mengeluarkan fail-fail yang berkenaan, anda perlu mendaftarkan penyambung tersebut dalam LocalSettings.php. Anda boleh mendapatkan arahan untuk melakukan pendaftaran ini dengan merujuk dokumentasi yang disertakan dengan penyambung tersebut.

Sekiranya anda mempunyai sebarang soalan mengenai sistem pengedaran penyambung ini, sila ke [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Dapatkan penyambung lagi',
	'extdist-tar-error' => 'URL arkib tidak dapat diambl dari API arkib.',
);

/** Maltese (Malti)
 * @author Chrisportelli
 */
$messages['mt'] = array(
	'extensiondistributor' => 'Niżżel estensjoni MediaWiki',
	'extensiondistributor-desc' => "Estensjoni sabiex tiddistribwixxi arkivji ta' ritratti istantanji tal-estensjonijiet",
	'extdist-not-configured' => 'Jekk jogħġbok ikkonfigura $wgExtDistList u $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Ma teżisti l-ebda estensjoni bl-isem "$1"',
	'extdist-no-such-version' => 'L-estensjoni "$1" ma teżistix fil-verżjoni "$2".',
	'extdist-choose-extension' => 'Agħżel liema estenjoni xi tniżżel:',
	'extdist-submit-extension' => 'Kompli',
	'extdist-choose-version' => 'Inti qiegħed tniżżel l-estensjoni <b>$1</b>.

Agħżel il-verżjoni tal-MediaWiki tiegħek.

Ħafna mill-estensjonijiet jaħdmu fuq diversi verżjonijiet tal-MediaWiki, għalhekk jekk il-verżjoni tal-MediaWiki mhix hawnhekk, jew għandek bżonn tal-aħħar funzjonijiet tal-estensjoni, ipprova uża l-verżjoni attwali.',
	'extdist-no-versions' => 'L-estensjoni magħżula ($1) mhijiex disponibbli fl-ebda verżjoni!',
	'extdist-submit-version' => 'Kompli',
	'extdist-want-more' => 'Ġib estensjoni oħra',
	'extdist-tar-error' => "Tar irritorna l-''exit code'' segwenti $1:", # Fuzzy
);

/** Erzya (эрзянь)
 * @author Botuzhaleny-sodamo
 */
$messages['myv'] = array(
	'extdist-submit-extension' => 'Поладомс',
	'extdist-submit-version' => 'Поладомс',
);

/** Norwegian Bokmål (norsk bokmål)
 * @author Danmichaelo
 * @author EivindJ
 * @author Nghtwlkr
 */
$messages['nb'] = array(
	'extensiondistributor' => 'Last ned utvidelser til MediaWiki',
	'extensiondistributor-desc' => 'Utvidelse for distribusjon av andre utvidelser',
	'extdist-not-configured' => 'Still inn $wgExtDistList og $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Tilleggslisten kunne ikke hentes!',
	'extdist-no-such-extension' => 'Ingen utvidelse ved navn «$1»',
	'extdist-no-such-version' => 'Versjon «$2» av «$1» finnes ikke',
	'extdist-choose-extension' => 'Velg hvilken utvidelse du ønsker å laste ned:',
	'extdist-submit-extension' => 'Fortsett',
	'extdist-choose-version' => 'Du laster ned utvidelsen <b>$1</b>.

Angi hvilken MediaWiki-versjon du bruker.

De fleste utvidelser fungerer på flere versjoner av MediaWiki, så om versjonen du bruker ikke listes opp her, kan du prøve å velge den nyeste versjonen.',
	'extdist-no-versions' => 'Den valgte utvidelsen ($1) er ikke tilgjengelig i noen versjon.',
	'extdist-submit-version' => 'Fortsett',
	'extdist-created' => "Et øyeblikksbilde av versjon <b>$2</b> av utvidelsen <b>$1</b> for MediaWiki <b>$3</b> har blitt opprettet. Nedlastingen vil begynne automatisk om fem&nbsp;sekunder.

Adressen til dette øyeblikksbildet er:
:$4
Adressen kan brukes for nedlasting til en tjener, men ikke legg den til som bokmerke, for innholdet vil ikke bli oppdatert, og den kan slettes senere.

Tar-arkivet burde pakkes ut i din utvidelsesmappe. For eksempel, på et Unix-lignende operativsystem:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

På Windows kan du bruke [http://www.7-zip.org/ 7-zip] for å pakke ut filene.

Om wikien din er på en ekstern tjener, pakk ut filene i en midlertidig mappe på datamaskinen din, og last opp '''alle''' utpakkede filer til utvidelsesmappa på tjeneren.

Etter å ha pakket ut filene må du registrere utvidelsen i LocalSettings.php. Dokumentasjonen til utvidelsen burde ha instruksjoner på hvordan man gjør dette.

Om du har spørsmål om dette distribusjonssytemet for utvidelser, gå til [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Hent flere utvidelser',
	'extdist-tar-error' => 'Arkiv-URLen kunne ikke hentes fra arkiv-APIet.',
);

/** Low German (Plattdüütsch)
 * @author Reedy
 * @author Slomox
 */
$messages['nds'] = array(
	'extensiondistributor' => 'MediaWiki-Extension dalladen',
	'extensiondistributor-desc' => 'Extension för dat Bereidstellen vun Snappschuss-Archiven von Extensions',
	'extdist-not-configured' => 'Stell $wgExtDistList un $wgExtDistArchiveAPI in',
	'extdist-no-such-extension' => 'Extension „$1“ gifft dat nich',
	'extdist-no-such-version' => 'De Extension „$1“ gifft dat nich in de Version „$2“.',
	'extdist-choose-extension' => 'Wähl de Extension ut, de du dalladen wullt:',
	'extdist-submit-extension' => 'Wiedermaken',
	'extdist-choose-version' => 'Du laadst de <b>$1</b>-Extension dal.

Wähl dien MediaWiki-Version ut.

En groten Deel vun de Extensions arbeidt mit vele MediaWiki-Versionen. Wenn dien MediaWiki-Version hier nich opdükert oder du de ne’esten KNeep vun de Extension bruken wullt, denn versöök de aktuelle Version to bruken.',
	'extdist-no-versions' => 'De utwählte Extension ($1) is in keen Version verföögbor!',
	'extdist-submit-version' => 'Wiedermaken',
	'extdist-created' => "En Snappschuss vun de Version <b>$2</b> vun de MediaWiki-Extension <b>$1</b> is opstellt worrn (MediaWiki-Version <b>$3</b>). Dat Dalladen geit automaatsch los in 5 Sekunnen.

De URL för den Snappschuss is:
:$4
De URL is blot för dat Dalladen nu glieks dacht, spieker ehr nich as Leesteken af, de Datei warrt nich opfrischt un kann later ganz wegdaan warrn.

Dat Tar-Archiv schull in de Extension-Mapp utpackt warrn. Op en Unix-achtig Bedrievssystem mit:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Ünner Windows kannst du dat Programm [http://www.7-zip.org/ 7-zip] för dat Utpacken vun de Datein bruken.

Wenn dien Wiki op en vun feern bedeenten Server löppt, pack de Datein in en temporäre Mapp op dien lokalen Reekner ut un laad denn '''all''' utpackte Datein op den Server hooch.

Nadem du de Datein utpackt hest, musst du de Extension in de <code>LocalSettings.php</code> registreren. In de Doku för de Extension schull dor wat to stahn.

Wenn du Fragen to dit Extensions-Verdeel-System hest, gah man na de Sied [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'En annere Extension kriegen.',
	'extdist-tar-error' => 'Dat Tar-Programm mellt den Enn-Kood $1:', # Fuzzy
);

/** Dutch (Nederlands)
 * @author Mihxil
 * @author Naudefj
 * @author Romaine
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'extensiondistributor' => 'MediaWiki-uitbreiding downloaden',
	'extensiondistributor-desc' => 'Uitbreiding voor het distribueren van uitbreidingen',
	'extdist-not-configured' => 'Maak de instellingen voor $wgExtDistList en $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Het was niet mogelijk om de lijst met uitbreidingen op te halen.',
	'extdist-no-such-extension' => 'De uitbreiding "$1" bestaat niet',
	'extdist-no-such-version' => 'De uitbreiding "$1" bestaat niet in de versie "$2".',
	'extdist-choose-extension' => 'Selecteer de uitbreiding die u wilt downloaden:',
	'extdist-submit-extension' => 'Doorgaan',
	'extdist-choose-version' => 'U bent de uitbreiding <b>$1</b> aan het downloaden.

Selecteer uw versie van MediaWiki.

De meeste uitbreidingen werken met meerdere versies van MediaWiki, dus als uw versie niet in de lijst staat, of als u behoefte hebt aan de nieuwste mogelijkheden van de uitbreidingen, gebruik dan de huidige versie.',
	'extdist-no-versions' => 'De geselecteerde uitbreiding ($1) is in geen enkele versie beschikbaar!',
	'extdist-submit-version' => 'Doorgaan',
	'extdist-created' => 'De snapshot voor versie <b>$2</b> voor de uitbreiding <b>$1</b> voor MediaWiki <b>$3</b> is aangemaakt. Uw download start automatisch over 5 seconden.

De URL voor de snapshot is:
:$4
Deze koppeling kan gebruikt worden voor het direct downloaden naar een server, maar maak geen bladwijzers aan, omdat de inhoud niet bijgewerkt wordt, en op een later moment verwijderd kan worden.

Pak het tararchief uit in uw map "extensions/". Op een UNIX-achtig besturingssysteem gaat dat als volgt:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Op Windows kunt u [http://www.7-zip.org/ 7-zip] gebruiken om de bestanden uit te pakken.

Als uw wiki op een op afstand beheerde server staat, pak de bestanden dan uit in een tijdelijke map op uw computer. Upload daarna \'\'\'alle\'\'\' uitgepakte bestanden naar de map "extensions/" op de server.

Nadat u de bestanden hebt uitgepakt, moet u de uitbreiding registreren in LocalSettings.php. In de documentatie van de uitbreiding treft u de instructies aan.

Als u vragen hebt over dit distributiesysteem voor uitbreidingen, ga dan naar [[Extension talk:ExtensionDistributor]].',
	'extdist-want-more' => 'Nog een uitbreiding downloaden',
	'extdist-tar-error' => 'Het was niet mogelijk de archief-URL via de archief-API op te halen.',
);

/** Nederlands (informeel)‎ (Nederlands (informeel)‎)
 * @author Siebrand
 */
$messages['nl-informal'] = array(
	'extdist-choose-extension' => 'Selecteer de uitbreiding die je wilt downloaden:',
	'extdist-choose-version' => 'Je bent de uitbreiding <b>$1</b> aan het downloaden.

Selecteer je versie van MediaWiki.

De meeste uitbreidingen werken met meerdere versies van MediaWiki, dus als jouw versie niet in de lijst staat, of als je behoefte hebt aan de nieuwste mogelijkheden van de uitbreidingen, gebruik dan de huidige versie.',
	'extdist-created' => 'De snapshot voor versie <b>$2</b> voor de uitbreiding <b>$1</b> voor MediaWiki <b>$3</b> is aangemaakt. Je download start automatisch over 5 seconden.

De URL voor de snapshot is:
:$4
Deze koppeling kan gebruikt worden voor het direct downloaden naar een server, maar maak geen bladwijzers aan, omdat de inhoud niet bijgewerkt wordt, en op een later moment verwijderd kan worden.

Pak het tararchief uit in uw map "extensions/". Op een UNIX-achtig besturingssysteem gaat dat als volgt:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Op Windows kan je [http://www.7-zip.org/ 7-zip] gebruiken om de bestanden uit te pakken.

Als je wiki op een op afstand beheerde server staat, pak de bestanden dan uit in een tijdelijke map op uw computer. Upload daarna \'\'\'alle\'\'\' uitgepakte bestanden naar de map "extensions/" op de server.

Nadat je de bestanden hebt uitgepakt, moet je de uitbreiding registreren in LocalSettings.php. In de documentatie van de uitbreiding tref je de instructies aan.

Als je vragen hebt over dit distributiesysteem voor uitbreidingen, ga dan naar [[Extension talk:ExtensionDistributor]].',
);

/** Norwegian Nynorsk (norsk nynorsk)
 * @author Harald Khan
 * @author Njardarlogar
 * @author Reedy
 */
$messages['nn'] = array(
	'extensiondistributor' => 'Last ned utvidingar til MediaWiki',
	'extensiondistributor-desc' => 'Utviding for distribuering av andre utvidingar',
	'extdist-not-configured' => 'Still inn $wgExtDistList og $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Inga utviding med namnet "$1"',
	'extdist-no-such-version' => 'Versjon «$2» av «$1» finst ikkje',
	'extdist-choose-extension' => 'Vel kva utviding du ønskjer å lasta ned:',
	'extdist-submit-extension' => 'Hald fram',
	'extdist-choose-version' => 'Du lastar ned utvidinga <b>$1</b>.

Oppgje kva MediaWiki-versjon du nyttar.

Dei fleste utvidingane fungerer på fleire versjonar av MediaWiki, so om versjonen du nyttar ikkje er lista opp her, eller om du har bruk for dei siste utvidingseigenskapane, kan du prøva å nytta den noverande versjonen.',
	'extdist-no-versions' => 'Den valte utvidinga ($1) er ikkje tilgjengeleg i nokon versjon!',
	'extdist-submit-version' => 'Hald fram',
	'extdist-created' => "Eit snøggskot av versjon <b>$2</b> av utvidinga <b>$1</b> for MediaWiki <b>$3</b> er blitt oppretta. Nedlastinga vil starta automatisk om fem&nbsp;sekund.

Adressa til snøggskotet er:
:$4
Adressa kan bli brukt for nedlasting til tenaren, men ikkje legg ho til som bokmerke, for innhaldet vil ikkje bli oppdatert, og ho kan bli sletta seinare.

Tar-arkivet burde bli pakka ut i utvidingsmappa di; til dømes på eit Unix-liknande operativsystem:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

På Windows kan du nytta [http://www.7-zip.org/ 7-zip] for å pakka ut filene.

Om wikien din er på ein ekstern tenar, pakk ut filene i ei midlertidig mappa på datamaskinen din, og last opp '''alle''' utpakka filer i utvidingsmappa på tenaren.

Etter å ha pakka ut filene må du registrera utvidinga i LocalSettings.php. Dokumentasjonen til utvidinga burde ha instruksjonar på korleis ein gjer dette.

Om du har spørsmål om dette distribusjonssytemet for utvidingar, gå til [http://www.mediawiki.org/wiki/Extension_talk:ExtensionDistributor Extension talk:ExtensionDistributor].", # Fuzzy
	'extdist-want-more' => 'Hent fleire utvidingar',
	'extdist-tar-error' => 'Tar returnerte utgangskoden $1:', # Fuzzy
);

/** Occitan (occitan)
 * @author Cedric31
 * @author Reedy
 */
$messages['oc'] = array(
	'extensiondistributor' => 'Telecargar l’extension MediaWiki',
	'extensiondistributor-desc' => 'Extension per la distribucion dels archius fotografics de las extensions',
	'extdist-not-configured' => 'Configuratz $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => "Pas cap d'extension « $1 »",
	'extdist-no-such-version' => 'L’extension « $1 » existís pas dins la version « $2 ».',
	'extdist-choose-extension' => 'Seleccionatz l’extension que volètz telecargar :',
	'extdist-submit-extension' => 'Contunhar',
	'extdist-choose-version' => "Sètz a telecargar l’extension <b>$1</b>.

Seleccionatz vòstra version MediaWiki.

La màger part de las extensions vira sus diferentas versions de MediaWiki. Atal, se vòstra version es pas presenta aicí, o s'avètz besonh de las darrièras foncionalitats de l’extension, ensajatz d’utilizar la version correnta.",
	'extdist-no-versions' => 'L’extension seleccionada ($1) es indisponibla dins mantuna version !',
	'extdist-submit-version' => 'Contunhar',
	'extdist-created' => "Una fòto de la version <b>$2</b> de l’extension <b>$1</b> per MediaWiki <b>$3</b> es estada creada. Vòstre telecargament deuriá començar automaticament dins 5 segondas.

L'adreça d'aquesta fòto es :
:$4
Pòt èsser utilizat per un telecargament immediat cap a un servidor, mas evitatz de l’inscriure dins vòstres signets, tre alara lo contengut serà pas mes a jorn, e poirà èsser escafat a una data ulteriora.

L’archiu tar deuriá èsser extracha dins vòstre repertòri d'extensions. A títol d’exemple, sus un sistèma basat sus UNIX :

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Jos Windows, podètz utilizar [http://www.7-zip.org/ 7-zip] per extraire los fichièrs.

Se vòstre wiki se tròba sus un servidor distant, extractatz los fichièrs dins un fichièr temporari sus vòstre ordenador local, e en seguida televersatz los '''totes''' dins lo repertòri d'extensions del servidor.

Un còp l’extraccion facha, auretz besonh d’enregistrar l’extension dins LocalSettings.php. Aquesta deuriá aver un mòde operatòri per aquò.

S'avètz de questions a prepaus d'aqueste sistèma de distribucion de las extensions, anatz sus [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Obténer una autra extension',
	'extdist-tar-error' => "Impossible d’analisar l’URL d'archiu de l’API d'archiu.",
);

/** Oriya (ଓଡ଼ିଆ)
 * @author Ansumang
 */
$messages['or'] = array(
	'extdist-submit-extension' => 'ଚାଲୁରଖ',
	'extdist-submit-version' => 'ଚାଲୁରଖ',
);

/** Ossetic (Ирон)
 * @author Amikeco
 */
$messages['os'] = array(
	'extensiondistributor' => 'Æрбавгæн MediaWiki-йы æххæстгæнæн',
	'extdist-choose-extension' => 'Æрбавгæнынмæ æххæстгæнæнтæ равзæр:',
	'extdist-want-more' => 'Æндæр æххæстгæнæн æрбавгæн',
);

/** Deitsch (Deitsch)
 * @author Xqt
 */
$messages['pdc'] = array(
	'extensiondistributor' => 'MediaWiki-Extension runnerdraage',
	'extdist-submit-extension' => 'Weider',
	'extdist-submit-version' => 'Weider',
);

/** Polish (polski)
 * @author BeginaFelicysym
 * @author Derbeth
 * @author Leinad
 * @author Maikking
 * @author Sp5uhe
 */
$messages['pl'] = array(
	'extensiondistributor' => 'Pobierz rozszerzenie MediaWiki',
	'extensiondistributor-desc' => 'Rozszerzenie odpowiedzialne za dystrybucję zarchiwizowanych rozszerzeń gotowych do pobrania',
	'extdist-not-configured' => 'Proszę skonfigurować zmienne $wgExtDistList i $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Brak rozszerzenia „$1”',
	'extdist-no-such-version' => 'Rozszerzenie „$1” w wersji „$2” nie istnieje.',
	'extdist-choose-extension' => 'Wybierz rozszerzenie, które chcesz pobrać:',
	'extdist-submit-extension' => 'Kontynuuj',
	'extdist-choose-version' => 'Do pobrania zostało wybrane rozszerzenie <b>$1</b>.

Wybierz z listy wersję MediaWiki.

Większość rozszerzeń działa ze wszystkimi wersjami MediaWiki, więc jeśli nie ma na liście Twojej wersji MediaWiki lub potrzebujesz najnowszej wersji rozszerzenia, należy wybrać bieżącą wersję.',
	'extdist-no-versions' => 'Wybrane rozszerzenie „$1” nie jest dostępne w żadnej wersji oprogramowania!',
	'extdist-submit-version' => 'Kontynuuj',
	'extdist-created' => "Utworzono skompresowane archiwum rozszerzenia <b>$1</b> w wersji <b>$2</b> dla MediaWiki <b>$3</b>. Pobieranie powinno rozpocząć się automatycznie w ciągu 5 sekund.

Archiwum znajduje się pod adresem URL
:$4
Adresu można użyć do natychmiastowego przesłania archiwum na serwer, ale nie należy zapisywać adresu, ponieważ zawartość archiwum nie będzie aktualizowana i w późniejszym czasie archiwum może zostać usunięte.

Archiwum tar należy rozpakować w katalogu z rozszerzeniami. W systemach uniksowych wygląda to następująco:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

W systemach Windows do rozpakowania plików możesz użyć programu [http://www.7-zip.org/ 7-zip].

Jeśli Twoja wiki znajduje się na zdalnym serwerze, wypakuj pliki do tymczasowego katalogu na lokalnym komputerze a następnie prześlij na serwer '''wszystkie''' pliki do katalogu z rozszerzeniami.

Po umieszczeniu plików w odpowiednich katalogach, należy włączyć rozszerzenie w pliku LocalSettings.php. Dokumentacja rozszerzenia powinna zawierać instrukcję jak to zrobić.

Jeśli masz jakieś pytania na temat systemu dystrybuującego rozszerzenia, zadaj je na stronie [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Pobierz inne rozszerzenie',
	'extdist-tar-error' => 'Tar zwrócił kod zakończenia $1:', # Fuzzy
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'extensiondistributor' => "Dëscaria l'estension MediaWiki",
	'extensiondistributor-desc' => "Estension për distribuì j'archivi snapshot ëd j'estension",
	'extdist-not-configured' => 'Për piasì configura $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-list-missing' => "As peul pa trovesse la lista dj'estension!",
	'extdist-no-such-extension' => 'Pa gnun-e estension "$1"',
	'extdist-no-such-version' => 'L\'estension "$1" a esist pa ant la version "$2".',
	'extdist-choose-extension' => 'Selession-a che estension it veule dëscarié:',
	'extdist-submit-extension' => 'Continua',
	'extdist-choose-version' => "It ses an camin ch'it dëscarie l'estension <b>$1</b>.

Selession-a toa version MediaWiki.

Vàire estension a travajo dzora a 'd version diferente ëd MediaWiki, parèj se toa version ëd MediaWiki a l'é pa sì, o s'it l'has dabzògn ëd j'ùltime funsion ëd l'estension, preuva a dovré la version corenta.",
	'extdist-no-versions' => "L'estension selessionà ($1) a l'é pa disponìbil an gnun-e version!",
	'extdist-submit-version' => 'Continua',
	'extdist-created' => "Na còpia d'amblé ëd la version <b>$2</b> ëd l'estension <b>$1</b> për MediaWiki <b>$3</b> a l'é stàita creà. Soa dëscaria a dovrìa parte automaticament tra 5 second.

L'adrëssa për sta còpia-sì a l'é:
:$4
A peul esse dovrà për cariela sùbit su un servent, ma për piasì ch'a la buta pa ant ij sò marca-pàgina, da già che ël contnù a sarà pa agiornà, e a peul esse scancelà un doman.

L'archivi tar a dovrìa esse dëscompatà an sò dossié d'estension. Për esempi, ant un sistema ëd tipo OS unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Dzora a Windows, a peule dovré [http://www.7-zip.org/ 7-zip] për dëscompaté j'archivi.

Se soa wiki a l'é su un servent leugn, ch'a dëscompata j'archivi ant un dossié dzora a sò ordinator local, e peui ch'a caria '''tùit''' j'archivi dëscompatà ant ël dossié d'estension dzora al servent.

Apress ch'a l'ha dëscompatà j'archivi, a dev argistré l'estension an LocalSettings.php. La documentassion ëd l'estension a dovrìa avèj d'istrussion su com fé sòn.

S'a l'ha dle chestion su sto sistema ëd distribuì j'estension, për piasì ch'a vada a [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => "Pija n'àutra estension",
	'extdist-tar-error' => "As peul nen analisesse l'anliura dl'archivi da l'API d'archivi.",
);

/** Portuguese (português)
 * @author Cainamarques
 * @author Hamilton Abreu
 * @author Luckas
 * @author Malafaya
 */
$messages['pt'] = array(
	'extensiondistributor' => 'Descarregar extensão MediaWiki',
	'extensiondistributor-desc' => "Extensão para distribuir instantâneos arquivados ''(snapshot archives)'' de extensões",
	'extdist-not-configured' => 'Por favor, configure $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Não é possível buscar lista de extensões!',
	'extdist-no-such-extension' => 'A extensão "$1" não existe',
	'extdist-no-such-version' => 'A extensão "$1" não existe na versão "$2".',
	'extdist-choose-extension' => 'Selecione que extensão pretende descarregar:',
	'extdist-submit-extension' => 'Continuar',
	'extdist-choose-version' => 'Está a descarregar a extensão <b>$1</b>.

Selecione a sua versão do MediaWiki.

A maioria das extensões funciona em várias versões do MediaWiki, portanto se a sua versão do MediaWiki não aparecer aqui, ou se precisa das últimas funcionalidades da extensão, experimente usar a versão mais recente.',
	'extdist-no-versions' => 'A extensão selecionada ($1) não está disponível em nenhuma versão!',
	'extdist-submit-version' => 'Continuar',
	'extdist-created' => "Foi criado um instantâneo ''(snapshot)'' da versão <b>$2</b> da extensão <b>$1</b>, para o MediaWiki <b>$3</b>. A transferência deverá iniciar-se automaticamente em 5 segundos.

A URL deste instantâneo é:
:$4
Esta pode ser usada para descarregamento imediato para um servidor, mas por favor não a adicione aos seus favoritos, já que o conteúdo não será atualizado e poderá ser eliminado posteriormente.

Deve extrair o arquivo tar para o seu diretório de extensões. Por exemplo, num sistema operativo tipo UNIX, use:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

No Windows, poderá usar o [http://www.7-zip.org/ 7-zip] para extrair os ficheiros.

Se a sua wiki estiver localizada num servidor remoto, extraia os ficheiros para um diretório temporário no seu computador local, e depois carregue '''todos''' os diretórios e ficheiros extraídos para o diretório de extensões da wiki no servidor.

Após colocar a extensão no diretório de extensões da sua wiki, terá de registá-la em LocalSettings.php. A documentação da extensão deverá ter indicações sobre como o fazer.

Se tiver alguma questão sobre este sistema de distribuição de extensões, por favor, visite [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Obter outra extensão',
	'extdist-tar-error' => 'Não foi possível encontrar o URL arquivado da API.',
);

/** Brazilian Portuguese (português do Brasil)
 * @author Cainamarques
 * @author Eduardo.mps
 * @author Giro720
 */
$messages['pt-br'] = array(
	'extensiondistributor' => 'Descarregar extensão MediaWiki',
	'extensiondistributor-desc' => 'Extensão para distribuir arquivos snapshot de extensões',
	'extdist-not-configured' => 'Por favor, configure $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Não foi possível buscar lista de extensões!',
	'extdist-no-such-extension' => 'A extensão "$1" não existe',
	'extdist-no-such-version' => 'A extensão "$1" não existe na versão "$2".',
	'extdist-choose-extension' => 'Selecione que extensão pretende descarregar:',
	'extdist-submit-extension' => 'Continuar',
	'extdist-choose-version' => 'Você está a descarregando a extensão <b>$1</b>.

Selecione a versão do seu MediaWiki.

A maioria das extensões funciona através de múltiplas versões do MediaWiki, portanto, se a versão do seu MediaWiki não estiver aqui, ou se tiver necessidade das últimas funcionalidades da extensão, experimente usar a versão atual.',
	'extdist-no-versions' => 'A extensão selecionada ($1) não está disponível em nenhuma versão!',
	'extdist-submit-version' => 'Continuar',
	'extdist-created' => "Foi criado um instantâneo ''(snapshot)'' da versão <b>$2</b> da extensão <b>$1</b>, para o MediaWiki <b>$3</b>. A transferência deverá iniciar-se automaticamente em 5 segundos.

A URL deste instantâneo é:
:$4
Esta pode ser usada para descarregamento imediato para um servidor, mas por favor não a adicione aos seus favoritos, já que o conteúdo não será atualizado e poderá ser eliminado posteriormente.

O arquivo tar deve ser extraido em seu diretório de extensões. Por exemplo, num sistema operacional tipo UNIX, use:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

No Windows, poderá usar o [http://www.7-zip.org/ 7-zip] para extrair os arquivos.

Se a sua wiki estiver localizada num servidor remoto, extraia os arquivos para um diretório temporário no seu computador local, e depois carregue '''todos''' os diretórios e arquivos extraídos para o diretório de extensões da wiki no servidor.

Após colocar a extensão no diretório de extensões da sua wiki, terá de registrá-la em LocalSettings.php. A documentação da extensão deverá ter indicações sobre como o fazer.

Se tiver alguma questão sobre este sistema de distribuição de extensões, por favor, visite [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Obter outra extensão',
	'extdist-tar-error' => 'Não foi possível encontrar o URL arquivado da API.',
);

/** Romanian (română)
 * @author Firilacroco
 * @author KlaudiuMihaila
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'extensiondistributor' => 'Descărcare extensie MediaWiki',
	'extensiondistributor-desc' => 'Extensie pentru distribuirea unor arhive fotografice ale extensiilor',
	'extdist-not-configured' => 'Vă rugăm să configurați $wgExtDistList și $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Extensia "$1" inexistentă',
	'extdist-no-such-version' => 'Extensia "$1" nu există în versiunea "$2".',
	'extdist-submit-extension' => 'Continuă',
	'extdist-choose-version' => 'Descărcați extensia <b>$1</b>.

Alegeți versiunea dvs MediaWiki.

Cele mai multe extensii funcționează în mai multe versiuni de MediaWiki, deci dacă versiunea dvs MediaWiki nu este aici sau dacă aveți nevoie de cele mai recente funcționalități pentru extensii, încercați să folosiți versiunea curentă.',
	'extdist-no-versions' => 'Extensia selectată ($1) nu este disponibilă în orice versiune!',
	'extdist-submit-version' => 'Continuă',
	'extdist-want-more' => 'Obține altă extensie',
);

/** tarandíne (tarandíne)
 * @author Joetaras
 * @author Reder
 */
$messages['roa-tara'] = array(
	'extensiondistributor' => 'Scareche le estenziune de MediaUicchi',
	'extensiondistributor-desc' => 'Estenzione pe le archivije distribbuite istandanèe de le estenziune',
	'extdist-not-configured' => 'Pe piacere configure $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-list-missing' => "Non ge pozze analizzà l'elenghe de le estenziune!",
	'extdist-no-such-extension' => 'Nisciuna estenzione "$1"',
	'extdist-no-such-version' => 'L\'estenzione "$1" non g\'esiste jndr\'à versiune "$2".',
	'extdist-choose-extension' => "Scacchie l'estenzione ca vuè ccu scareche:",
	'extdist-submit-extension' => 'Condinue',
	'extdist-choose-version' => "Tu ste scareche l'estenzione <b>$1</b>.

Scacchie 'a versiona toje de MediaUicchi.

Diverse estenziune fatìane 'mbrà diverse versiune de MediaUicchi, accussì ce 'a versiona toje de MediaUicchi non ge stè, o ce tu è abbesogne de le funzionalità de l'estenzione cchiù nove, pruève ausanne 'a versione de mò.",
	'extdist-no-versions' => "L'estenzione scacchiate ($1) non g'è disponibbele pe nisicuna versione!",
	'extdist-submit-version' => 'Condinue',
	'extdist-created' => "'N'istandanèe d'a versione <b>$2</b> de l'estenzione <b>$1</b> pe MediaUicchi <b>$3</b> ha state ccrejate. 'U scarecamende tune avessa partì in automateche 'mbrà 5 seconde.

'A URL pe sta istandanèe jè:
:$4
Pò essere ausate pu scarecamende automateche a 'nu server, ma pe piacere mittele 'mbrà le preferite, accussì le condenute non ge avènene aggiornate, e ponne essere scangellate cchiù tarde.

L'archivije tar avessa essere estratte sus 'a cartelle de le estenziune tune. Pe esembie, sus a 'nu sisteme operative unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Sus a Windows, tu puè 'ndrucà [http://www.7-zip.org/ 7-zip] pe estrarre le file.

Ce 'a uicchi toje stè sus a 'nu server remote, estraie le file jndr'à 'na cartelle temboranèe sus a 'u combiuter tune, e pò careche '''tutte''' le file estratte sus 'a cartelle de l'estenziune d'u server.

Apprisse ca tu è estratte le file, tu è abbesogne de reggistrà l'estenzione jndr'à LocalSettings.php. 'A documendazione de l'estenzione avessa tenè le 'struziune sus a cumme a fà ste cose.

Ce tu tìne domande da fà sus a stu sisteme de distribuzione de estenzione, pe piacere vèje sus a [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => "Pigghie 'n'otra estenzione",
	'extdist-tar-error' => "Non ge pozze analizzà l'URL de l'archivije da l'archivije de le API.",
);

/** Russian (русский)
 * @author KPu3uC B Poccuu
 * @author Kaganer
 * @author Kalan
 * @author MaxSem
 * @author Okras
 * @author Александр Сигачёв
 */
$messages['ru'] = array(
	'extensiondistributor' => 'Скачать расширения MediaWiki',
	'extensiondistributor-desc' => 'Расширение для скачивания дистрибутивов с расширениями',
	'extdist-not-configured' => 'Пожалуйста, задайте $wgExtDistList и $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Не удаётся получить список расширений!',
	'extdist-no-such-extension' => 'Расширение «$1» не найдено',
	'extdist-no-such-version' => 'Версия $2 расширения «$1» не найдена.',
	'extdist-choose-extension' => 'Выберите расширение для скачивания:',
	'extdist-submit-extension' => 'Продолжить',
	'extdist-choose-version' => 'Вы скачиваете расширение <b>«$1»</b>.

Выберите свою версию MediaWiki.

Большинство расширений работают с несколькими версиями MediaWiki, поэтому если установленная у вас версия здесь не приведена, или вам требуются возможности последней версии расширения — попробуйте последнюю версию.',
	'extdist-no-versions' => 'Выбранное расширение («$1») не доступно ни в одной версии!',
	'extdist-submit-version' => 'Продолжить',
	'extdist-created' => "Создан снимок версии <b>$2</b> расширения <b>$1</b> для MediaWiki <b>$3</b>. Загрузка должна начаться автоматически через 5 секунд.

URL данного снимка:
:$4
Этот адрес может быть использован для немедленного начала загрузки на сервер, но, пожалуйста, не заносите ссылку в закладки, так как содержание не будет обновляться, а адрес может перестать работать в будущем.

Tar-архив следует распаковать в вашу директорию для расширений. Например, для юникс-подобных ОС это будет команда:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

В Windows для извлечения файлов вы можете использовать программу [http://www.7-zip.org/ 7-zip]

Если ваша вики находится на удалённом сервере, извлеките файлы во временную директорию вашего компьютера и затем загрузите '''все''' извлечённые файлы в директорию расширения на сервере.

После извлечения файлов, вам следует прописать это расширение в файл LocalSettings.php. Документация по расширению должна содержать соответствующие указания.

Если у вас есть вопрос об этой системе распространения расширений, пожалуйста, обратитесь к странице [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Скачать другое расширение',
	'extdist-tar-error' => 'Не удается получить URL архива из архивного API.',
);

/** Rusyn (русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'extensiondistributor' => 'Скачати росшырїня MediaWiki',
	'extensiondistributor-desc' => 'Росшырїня про дістрібуцію архівів росшырїня',
	'extdist-not-configured' => 'Просиме, наштелюйте $wgExtDistList і $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Росшырїня „$1” не єствує',
	'extdist-no-such-version' => 'Росшырїня "$1" не єствує у верзії "$2".',
	'extdist-choose-extension' => 'Выберте, котре росшырїня хочете скачати:',
	'extdist-submit-extension' => 'Продовжыти',
	'extdist-choose-version' => 'Тягате росшырїня <b>$1</b>.

Выберьте верзію MediaWiki.

Векшына росшырїнь фунґує на веце верзіях MediaWiki, также кідь гев ваша верзія MediaWiki не є уведжена або вам треба новшы властноти росшырїня, попробуйте хосновати актуалну верзію.',
	'extdist-no-versions' => 'Выбране росшырїня ($1) не є доступне в жадній верзії!',
	'extdist-submit-version' => 'Продовжыти',
	'extdist-created' => "Пакунок <b>$1</b> у верзії <b>$2</b> про MediaWiki <b>$3</b> быв створеный. Ёго скачаня бы ся мало автоматічно спустити за пять секунд.

Адреса того пакунка є:
: $4
Можете собі одталь нынї пакунок скачати, але тоту адресу собі ниґде не укладайте, бо обсяг одказованого файлу не буде актуалізованый і файл може быти пізнїше змазаный.

Тот tar собі роспакуйте до адресаря <code>extensions</code>. На операчный сістемах на базї Unixu наприклад:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

На Windows можете пакунок розбалити з проґрамом [http://www.7-zip.org/ 7-zip].

Кідь ваша вікі біжыть на далекім сервері, роспакуйте архів до даякого дочасного адресаря на локалнім компютерї і потім награйте '''вшыткы''' роспакованы файлы до адресаря <code>extensions</code> на далекім сервері.

По роспакованю файлів будете мусити росшырїня реґістровати у файлї <code>LocalSettings.php</code>. Детайлїшы інформації бы мала обсяговати документавія ку росшырїню.

Вопросы ку тій сістемі дістрібуції росшырїня можете класти на сторінцї [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Скачати інше росшырїня',
	'extdist-tar-error' => 'Tar скінчів з вернутым кодом $1:', # Fuzzy
);

/** Sakha (саха тыла)
 * @author HalanTul
 */
$messages['sah'] = array(
	'extensiondistributor' => 'МедиаВики тупсарыыларын хачайдааһын',
	'extensiondistributor-desc' => 'Тупсарыылары хачайдыыр тупсарыы',
	'extdist-not-configured' => 'Бука диэн балары туруор: $wgExtDistList уонна $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => '"$1" тупсарыы булуллубата',
	'extdist-no-such-version' => '"$1" тупсарыы "$2" барыла булуллубата.',
	'extdist-choose-extension' => 'Тупсарыыны хачайдыырга тал:',
	'extdist-submit-extension' => 'Салгыы',
	'extdist-choose-version' => '<b>«$1»</b> тупсарыыны хачайдаан эрэҕин.

Бэйэҕэр турар MediaWiki барылын тал.

Тупсарыылар үгүстэрэ MediaWiki хас да барылын кытта үлэлииллэр, онон эйиэхэ турар барыл тиһиккэ суох буоллаҕына эбэтэр бүтэһик барыл биэрэр кыахтара наада буоллахтарына — бүтэһик барылы хачайдаан көр.',
	'extdist-no-versions' => 'Талбыт ($1) тупсарыыҥ ханнык да барылга үлэлиир кыаҕа суох!',
	'extdist-submit-version' => 'Салгыы',
	'extdist-created' => "MediaWiki <b>$3</b> анаан <b>$1</b> тупсарыы <b>$2</b> барылын снэпшота (хаартыската) оҥоһулунна. 5 сөкүүндэннэн хачайданыы саҕаланыахтаах.

Снэпшот URL-а:
:$4
Бу аадырыс сиэрбэргэ сип-сибилигин хачайдыырга туһаныллар, кэлин үлэлиэ суоҕун сөп, онон сигэни закладкаҕа киллэрэр наадата суох.

Tar-архыыбы тупсарыылар паапкаларыгар (директория расширений) арыйыахха наада. Холобур, юникс бииһин ууһун ОС-тарыгар бу хамаанда туттуллар:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Windows-ка билэлэри арыйарга [http://www.7-zip.org/ 7-zip] бырагыраамманы туттуоххун сөп.

Эн биикиҥ ыраах (удаленный) сиэрбэргэ турар буоллаҕына билэлэри быстах кэмҥэ анаан оҥоһуллубут паапкаҕа хостоо, онтон хостоммут билэлэри '''барытын''' сиэрбэр тупсарыыга аналлаах паапкатыгар көһөр.

Билэлэри хостоон баран тупсарыыны бу билэҕэ LocalSettings.php суруттарыахха наада. Манна аналлаах ыйыылар-кэрдиилэр тупсарыы дөкүмүөнүгэр баар буолуохтахтар.

Бу туһунан тугу эмит ыйытыаххын баҕардаххына бу сирэйгэ киирээр: [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Атын тупсарыыны хачайдыырга',
	'extdist-tar-error' => 'Куод $1 сыыһатын Tar көрдөрөр:', # Fuzzy
);

/** Sinhala (සිංහල)
 * @author Singhalawap
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'extensiondistributor' => 'මීඩියාවිකි විස්තීරණය බාගන්න',
	'extdist-not-configured' => 'කරුණාකර $wgExtDistList සහ $wgExtDistArchiveAPI වින්‍යාසගත කරන්න',
	'extdist-no-such-extension' => 'සත්‍ය විස්තීරණයක් නොමැත "$1"',
	'extdist-no-such-version' => '"$1" විස්තීරණය "$2" අනුවාදයෙහි නොපවතියි.',
	'extdist-choose-extension' => 'ඔබට බාගැනීමට අවශ්‍ය විස්තීරණය තෝරන්න:',
	'extdist-submit-extension' => 'ඉදිරියට යන්න',
	'extdist-choose-version' => 'ඔබ බාගතකරමින් සිටින්නේ <b>$1</b> විස්තිර්ණයයි.

ඔබේ මීඩියාවිකි අනුවාදය තෝරන්න.

සමහරක් විස්තීර්ණ මාධ්‍යවිකියෙහි බහුවිධ අනුවාද හරහා වැඩකරයි, එම නිසා ඔබේ මාධ්‍යවිකි අනුවාදය මෙතන නොමැති නම්, හෝ ඔබට නවතම විස්තීර්ණ ගුණාංග අවශ්‍යනම්, වත්මන් අනුවාදය භාවිතා කිරීමට උත්සහ කරන්න.',
	'extdist-no-versions' => 'තෝරාගත් විස්තීරණය ($1) කිසිදු අනුවාදයකින් ලබාගත නොහැක!',
	'extdist-submit-version' => 'ඉදිරියට යන්න',
	'extdist-want-more' => 'වෙනත් විස්තිර්ණයක් ලබාගන්න',
);

/** Slovak (slovenčina)
 * @author Helix84
 */
$messages['sk'] = array(
	'extensiondistributor' => 'Stiahnuť rozšírenie MediaWiki',
	'extensiondistributor-desc' => 'Rozšírenie na distribúciu archívov rozšírení',
	'extdist-not-configured' => 'Prosím, nastavte $wgExtDistList a $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Rozšírenie „$1” neexistuje',
	'extdist-no-such-version' => 'Rozšírenie „$1” neexistuje vo verzii „$2”',
	'extdist-choose-extension' => 'Vyberte, ktoré rozšírenie chcete stiahnuť:',
	'extdist-submit-extension' => 'Pokračovať',
	'extdist-choose-version' => 'Sťahujete rozšírenie <b>$1</b>.

Vyberte vašu verziu MediaWiki.

Väčšina rozšírení funguje na viacerých verziách MediaWiki, takže ak tu nie je vaša verzia MediaWiki uvedená alebo potrebujete najnovšiu vývojovú verziu rozšírenia, pokúste sa použiť aktuálnu verziu.',
	'extdist-no-versions' => 'Zvolené rozšírenie ($1) nie je dostupné v žiadnej verzii!',
	'extdist-submit-version' => 'Pokračovať',
	'extdist-created' => "Snímka verzie <b>$2</b> rozšírenia <b>$1</b> pre MediaWiki <b>$3</b> bol vytvorený. Sťahovanie by malo začať automaticky do 5 sekúnd.

URL tohto obrazu je:
:$4
Je možné ho použiť na okamžité stiahnutie na server, ale prosím neukladajte ho ako záložku, pretože jeho obsah sa nebude aktualizovať a neskôr môže byť zmazaný.

Tar archív by ste mali rozbaliť do vášho adresára s rozšíreniami. Príklad pre unixové systémy:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Na Windows môžete na rozbalenie súborov použiť [http://www.7-zip.org/ 7-zip].

Ak je vaša wiki na vzdialenom serveri, rozbaľte súbory do dočasného adresára na vašom lokálnom počítači a potom nahrajte '''všetky''' rozbalené súbory do adresára pre rozšírenia na serveri.

Po rozbalení súborov budete musieť rozšírenie zaregistrovať v LocalSettings.php. Dokumentácia k rozšíreniu by mala obsahovať informácie ako to spraviť.

Ak máte otázky týkajúce sa tohto systému distribúcie rozšírení, navštívte [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Stiahnuť iné rozšírenie',
	'extdist-tar-error' => 'Tar skončil s návratovým kódom $1:', # Fuzzy
);

/** Slovenian (slovenščina)
 * @author Dbc334
 * @author Eleassar
 */
$messages['sl'] = array(
	'extensiondistributor' => 'Prenesi razširitev MediaWiki',
	'extensiondistributor-desc' => 'Razširitev, ki razdeljuje arhive posnetkov razširitev',
	'extdist-not-configured' => 'Prosimo, nastavite $wgExtDistList in $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Ne morem pridobiti seznama razširitev!',
	'extdist-no-such-extension' => 'Razširitev »$1« ne obstaja',
	'extdist-no-such-version' => 'Razširitev »$1« v različici »$2« ne obstaja.',
	'extdist-choose-extension' => 'Izberite, katero razširitev želite prenesti:',
	'extdist-submit-extension' => 'Nadaljuj',
	'extdist-choose-version' => 'Prenašate razširitev <b>$1</b>.

Izberite svojo različico MediaWiki.

Večina razširitev deluje na več različicah MediaWiki, zato v primeru, da vaša različica MediaWiki tukaj ni navedena ali potrebujete najnovejše funkcije razširitve, poskusite uporabiti trenutno različico.',
	'extdist-no-versions' => 'Izbrana razširitev ($1) ni na razpolago v nobeni različici!',
	'extdist-submit-version' => 'Nadaljuj',
	'extdist-created' => "Posnetek različice <b>$2</b> razširitve <b>$1</b> za MediaWiki <b>$3</b> je ustvarjen. Vaš prenos bi se moral začeti samodejno v 5 sekundah.

URL posnetka je:
:$4
Lahko ga uporabite za takojšnji prenos s strežnika, vendar ga ne dodajte med zaznamke, saj vsebina ne bo posodobljena in bo pozneje morda izbrisana.

Arhiv tar je potrebno razširiti v mapo z razširitvami. Na primer, na operacijskem sistemu vrste unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Na sistemu Windows lahko za razširjanje datotek uporabite [http://www.7-zip.org/ 7-zip].

Če je vaš wiki na oddaljenem strežniku, razširite datoteke v začasno mapo na vašem lokalnem računalniku in nato '''vse''' razširjene datoteke naložite v mapo razširitev na strežniku.

Potem ko ste razširili vse datoteke, morate registrirati razširitev v LocalSettings.php. Dokumentacija razširirtve bi morala vsebovati navodila, kako to storiti.

Če imate kakšna vprašanje glede sistema razdeljevanja razširitev, pojdite na [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Dobi drugo razširitev',
	'extdist-tar-error' => 'Ne morem pridobiti URL arhiva iz API arhiva.',
);

/** Serbian (Cyrillic script) (српски (ћирилица)‎)
 * @author Rancher
 * @author Михајло Анђелковић
 */
$messages['sr-ec'] = array(
	'extdist-submit-extension' => 'Настави',
	'extdist-submit-version' => 'Настави',
	'extdist-want-more' => 'Преузми другу екстензију',
);

/** Serbian (Latin script) (srpski (latinica)‎)
 */
$messages['sr-el'] = array(
	'extdist-submit-extension' => 'Produži',
	'extdist-submit-version' => 'Produži',
	'extdist-want-more' => 'Preuzmi drugu ekstenziju',
);

/** Swedish (svenska)
 * @author Boivie
 * @author Jopparn
 * @author M.M.S.
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'extensiondistributor' => 'Ladda ner tillägg till MediaWiki',
	'extensiondistributor-desc' => 'Tillägg för distribution av övriga tillägg',
	'extdist-not-configured' => 'Var god bekräfta $wgExtDistList och $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Det gick inte att hämta listan över programtillägg!',
	'extdist-no-such-extension' => 'Ingen sådant tillägg "$1"',
	'extdist-no-such-version' => 'Tillägget "$1" finns inte i versionen "$2".',
	'extdist-choose-extension' => 'Välj vilket tillägg du vill ladda ner:',
	'extdist-submit-extension' => 'Fortsätt',
	'extdist-choose-version' => '
Du laddar ner tillägget <b>$1</b>.

Ange vilken version av MediaWiki du använder.

De flesta tilläggen fungerar på flera versioner av MediaWiki, så om versionen du använder inte listas upp här, kan du pröva att välja den nyaste versionen.',
	'extdist-no-versions' => 'Det valda tillägget ($1) är inte tillgängligt i någon version!',
	'extdist-submit-version' => 'Fortsätt',
	'extdist-created' => "En ögonblicksbild av version <b>$2</b> av tillägget <b>$1</b> för MediaWiki <b>$3</b> har skapats. Din nerladdning ska starta automatiskt om 5 sekunder.

URL:et för ögonblicksbilden är:
:$4
Den kan användas för direkt nedladdning till en server, men bokmärk den inte, för innehållet kommer inte uppdateras, och den kan bli raderad vid ett senare tillfälle.

Tar-arkivet ska packas upp i din extensions-katalog. Till exempel, på ett unix-likt OS:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

På Windows kan du använda [http://www.7-zip.org/ 7-zip] för att packa upp filerna.

Om din wiki är på en fjärrserver, packa upp filerna till en tillfällig katalog på din lokala dator, och ladda sedan upp '''alla''' uppackade filer till extensions-katalogen på servern.

Efter att du packat upp filerna, behöver du registrera programtillägget i LocalSettings.php. Programtilläggets dokumentation ska ha instruktioner om hur man gör det.

Om du har några frågor om programtilläggets distributionssystem, gå till [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Hämta andra tillägg',
	'extdist-tar-error' => 'Det gick inte att hämta arkiv-URL:en från arkiv-API:et.',
);

/** Tamil (தமிழ்)
 * @author TRYPPN
 * @author மதனாஹரன்
 */
$messages['ta'] = array(
	'extensiondistributor' => 'மீடியாவிக்கி நீட்சியைத் தரவிறக்கவும்',
	'extdist-choose-extension' => 'நீங்கள் தரவிறக்க வேண்டிய நீட்சியைத் தெரிவு செய்யவும்:',
	'extdist-submit-extension' => 'தொடரவும்',
	'extdist-no-versions' => 'தெரிவு செய்யப்பட்ட நீட்சி ($1) எந்தவொரு பதிப்பிலும் கிடைக்காது!',
	'extdist-submit-version' => 'தொடரவும்',
	'extdist-want-more' => 'இன்னோர் நீட்சியைப் பெறவும்',
);

/** Telugu (తెలుగు)
 * @author Chaduvari
 * @author Veeven
 */
$messages['te'] = array(
	'extdist-no-such-extension' => '"$1" అనే పొడగింత లేదు',
	'extdist-no-such-version' => 'వెర్షను "$2" లో ఎక్స్టెన్షను "$1" లేదు.',
	'extdist-choose-extension' => 'మీరు ఏ పొడగింతని దింపుకోవాలనుకుంటున్నారో ఎంచుకోండి:',
	'extdist-submit-extension' => 'కొనసాగించు',
	'extdist-choose-version' => 'మీరు <b>$1</b> పొడగింతని దింపుకోబోతున్నారు.

మీ మిడియావికీ సంచికని ఎంచుకోండి.

చాలా పొడగింతలు పలు మీడియావికీ సంచికల్లో పనిచేస్తాయి, కాబట్టి మీ మీడియావికీ సంచిక ఇక్కడ లేకపోతే, లేదా మీకు పొడగింతల సరికొత్త సౌలభ్యాల అవసరం ఉంటే, ప్రస్తుత సంచికని ఉపయోగించండి.',
	'extdist-no-versions' => 'ఎంచుకున్న ఎక్స్టెన్షను ($1) ఏ వెర్షనులోనూ లేదు!',
	'extdist-submit-version' => 'కొనసాగించు',
	'extdist-want-more' => 'మరొక పొడగింతని పొందండి',
);

/** Thai (ไทย)
 * @author Horus
 * @author Korrawit
 * @author Reedy
 * @author Woraponboonkerd
 */
$messages['th'] = array(
	'extdist-submit-extension' => 'ดำเนินการต่อ',
	'extdist-choose-version' => 'คุณกำลังดาวน์โหลดซอฟต์แวร์เสริมชื่อ <b>$1</b> 

กรุณาเลือกรุ่นปรับปรุงของมีเดียวิกิที่คุณใช้อยู่

ซอฟต์แวร์เสริมส่วนใหญ่สามารถใช้งานได้บนหลายรุ่นปรับปรุงของมีเดียวิกิ ดังนั้นถ้ารุ่นปรับปรุงมีเดียวิกิของคุณไม่ปรากฏในนี้ หรือถ้าคุณต้องการใช้คุณสมบัติล่าสุดของซอฟต์แวร์เสริมนี้ ให้ลองใช้ซอฟต์แวร์เสริมรุ่นปรับปรุงปัจจุบัน',
	'extdist-submit-version' => 'ดำเนินการต่อ',
	'extdist-created' => "ไฟล์คัดลอกของซอฟต์แวร์เสริมของ MediaWiki <b>$3</b> ชื่อ <b>$1</b> รุ่นหมายเลข <b>$2</b> ได้ถูกสร้างขึ้นแล้ว และการดาวน์โหลดไฟล์ของคุณจะเริ่มต้นโดยอัตโนมัติภายใน 5 วินาที

URL สำหรับไฟล์คัดลอกคือ:
:$4
ซึ่งสามารถใช้สำหรับการดาวน์โหลดโดยตรงจากเซิร์ฟเวอร์ได้ แต่กรุณาอย่าคั่นหน้านี้ไว้เนื่องจากเนื้อหาของไฟล์จะไม่ถูกปรับปรุงเป็นรุ่นล่าสุด และอาจจะถูกลบได้ในภายหลัง

ไฟล์ภายในของไฟล์ tar ควรจะถูกดึงออกมาวางไว้ที่ไดเร็กทอรีซอฟต์แวร์เสริมของคุณ ตัวอย่างเช่น ในระบบปฏิบัติการ UNIX หรือคล้ายคลึง:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

สำหรับบนระบบปฏิบัติการวินโดวส์ คุณสามารถใช้โปรแกรม [http://www.7-zip.org/ 7-zip] แตกไฟล์ออกมา

ถ้าวิกิของคุณอยู่ในเซิร์ฟเวอร์สั่งการทางไกล ให้ดึงไฟล์ออกมาวางไว้ที่โฟลเดอร์ชั่วคราวบนคอมพิวเตอร์ของคุณก่อน แล้วจึงอัพโหลดไฟล์'''ทั้งหมด'''ไปยังไดเร็กทอรีของซอฟต์แวร์เสริมบนเซิร์ฟเวอร์

หลังจากที่คุณดึงไฟล์ออกมาแล้ว คุณจำเป็นต้องลงทะเบียนซอฟต์แวร์เสริมใน LocalSettings.php ซึ่งเอกสารแนบที่มากับซอฟต์แวร์เสริมจะมีขั้นตอนการทำอยู่

ถ้าคุณยังมีข้อสงสัยประการใดเกี่ยวกับระบบการแผยแพร่ซอฟต์แวร์เสริมนี้ กรุณาไปที่ [[Extension talk:ExtensionDistributor]]",
);

/** Turkmen (Türkmençe)
 * @author Hanberke
 */
$messages['tk'] = array(
	'extensiondistributor' => 'MediaWiki giňeltmesini düşür',
	'extensiondistributor-desc' => 'Giňeltmeleriň pursatlyk görnüş arhiwlerini paýlamak üçin giňeltme',
	'extdist-not-configured' => 'Konfigurirläň: $wgExtDistList we $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => '"$1" diýip giňeltme ýok.',
	'extdist-no-such-version' => '"$2" wersiýasynda "$1" giňeltmesi ýok.',
	'extdist-choose-extension' => 'Düşürmek isleýän giňeltmäňizi saýlaň:',
	'extdist-submit-extension' => 'Dowam et',
	'extdist-no-versions' => 'Saýlanylan giňeltme ($1) hiç bir wersiýada ýok!',
	'extdist-submit-version' => 'Dowam et',
	'extdist-want-more' => 'Başga giňeltme al',
	'extdist-tar-error' => 'Tar çykyş kody $1 gaýdyp geldi:', # Fuzzy
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'extensiondistributor' => 'Ikarga pababa ang karugtong na pang-MediaWiki',
	'extensiondistributor-desc' => 'Karugtong para sa pagpapamahagi ng sinupan/arkibo ng mga karugtong na para sa mga kuha ng larawan/litrato',
	'extdist-not-configured' => 'Paki-isaayos ang $wgExtDistList at $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'Walang ganyang karugtong na "$1"',
	'extdist-no-such-version' => 'Hindi umiiral ang karugtong na "$1" sa loob ng bersyong "$2".',
	'extdist-choose-extension' => 'Piliin kung aling karugtong ang nais mong ikarga pababa:',
	'extdist-submit-extension' => 'Ipagpatuloy',
	'extdist-choose-version' => "Ikinakarga mo pababa ang <b>$1</b> na karugtong.

Piliin ang iyong bersyon ng MediaWiki.

Gumagawa sa kahabaan ng maramihang mga bersyon ng MediaWiki ang karamihan sa mga karugtong, kaya't kung ang iyong bersyon ng MediaWiki ay hindi dito, o kung kailangan mo ng isang pinakabagong mga kasangkapang-katangian ng karugtong, subuking gamitin ang pangkasalukuyang bersyon.",
	'extdist-no-versions' => 'Hindi makukuha mula sa loob ng anumang bersyon ang napiling karugtong na ($1)!',
	'extdist-submit-version' => 'Ipagpatuloy',
	'extdist-created' => "Nalikha ang isang kuhang larawan ng bersyong <b>$2</b> ng dugtong na <b>$1</b> para sa MediaWiki na <b>$3</b>. Dapat na kusang magsimula ang iyong pagkakargang paibaba sa loob ng 5 mga segundo.

Ang URL para sa kuhang larawang ito ay:
:$4
Maaaring gamitin ito para sa kaagad na pagkakargang paibaba patungo sa isang tagapaghain, ngunit huwag itong lagyan ng panandang pang-aklat, dahil hindi maisasapanahon ang mga nilalaman, at maaaring mabura ito sa paglaon.

Dapat na hanguin ang sinupan ng tar patungo sa iyong direktoryo ng mga dugtong.  Halimbawa, sa isang mistulang unix na OS:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Sa Windows, maaari mong gamitin ang [http://www.7-zip.org/ 7-zip] upang humango ng mga talaksan.

Kung ang wiki mo ay nasa isang malayong tagapaghain, hanguin ang mga talaksan patungo sa isang pansamantalang direktoryo na nasa iyong lokal na kompyuter, at pagkatapos ay ikarga paitaas ang '''lahat''' ng nahangong mga talaksan papunta sa direktoryo ng mga dugtong na nasa ibabaw ng tagapaghain.

Pagkaraan mong mahango ang mga talaksan, kailangan mong ipatala ang mga dugtong sa LocalSettings.php.  Ang dokumentasyon ng dugtong ay dapat na may mga panuto kung paano ito gagawin.

Kung mayroon kang anumang mga katanungan hinggil sasistema ng pagpapamahagi ng dugtong na ito, mangyaring pumunta sa [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Kumuha ng iba pang karugtong',
	'extdist-tar-error' => "Ibinalik ng pormat na ''tar'' ang kodigo sa paglabas na $1:", # Fuzzy
);

/** Turkish (Türkçe)
 * @author Joseph
 * @author Reedy
 */
$messages['tr'] = array(
	'extensiondistributor' => 'MedyaViki eklentisini indir',
	'extensiondistributor-desc' => 'Eklentilerin anlık görüntü arşivlerini dağıtmak için eklenti',
	'extdist-not-configured' => 'Lütfen $wgExtDistList ve $wgExtDistArchiveAPI ayarlayın',
	'extdist-no-such-extension' => '"$1" adında bir eklenti yok',
	'extdist-no-such-version' => '"$2" versiyonunda "$1" eklentisi mevcut değil.',
	'extdist-choose-extension' => 'İndirmek istediğiniz eklentiyi seçin:',
	'extdist-submit-extension' => 'Devam et',
	'extdist-choose-version' => '<b>$1</b> eklentisini indiriyosunuz.

MedyaViki sürümünüzü seçin.

Pekçok eklenti MedyaVikinin birçok sürümünde çalışır, eğer MedyaViki sürümünüz burada yoksa, ya da en son eklenti özelliklerine ihtiyacınız varsa, güncel sürümü kullanmayı deneyin.',
	'extdist-no-versions' => 'Seçili eklenti ($1) hiçbir versiyonda mevcut değil!',
	'extdist-submit-version' => 'Devam et',
	'extdist-created' => "<b>$1</b> eklentisinin <b>$2</b> versiyonunun anlık görüntüsü MediaWiki <b>$3</b> için oluşturuldu. İndirmeniz 5 saniye içinde otomatik olarak başlamalıdır.

Anlık görüntünün URLsi:
:$4
Bu, bir sunucuya anında indirme için kullanılabilir. Ancak içerik güncellenmeyeceğinden ve ileri bir tarihte silinebileceğinden, lütfen yer imlerine eklemeyin.

Tar arşivi eklenti dizininize çıkarılmalıdır. Örneğin, unix tipi işletim sistemlerinde:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Windows'ta, dosyaları çıkartmak için [http://www.7-zip.org/ 7-zip]'i kullanabilirsiniz.

Eğer vikiniz uzaktan bir sunucuda ise, dosyaları yerel bilgisayarınızda geçici bir dizine çıkarın, ve sonra '''bütün''' çıkarılan dosyaları sunucunun eklenti dizinine kopyalayın.

Dosyaları çıkardıktan sonra, eklentiyi LocalSettings.php'de kaydetmelisiniz. Eklenti dokümantasyonu bunu nasıl yapacağınızın açıklamasını içerebilir.

Eğer bu eklenti dağıtım sistemi ile herhangi bir sorunuz varsa, lütfen [[Extension talk:ExtensionDistributor]]'a gidin.",
	'extdist-want-more' => 'Başka eklenti al',
	'extdist-tar-error' => 'Tar çıkış kodu $1 geri döndürdü:', # Fuzzy
);

/** Uyghur (Arabic script) (ئۇيغۇرچە)
 * @author Sahran
 */
$messages['ug-arab'] = array(
	'extdist-submit-extension' => 'داۋاملاشتۇر',
	'extdist-submit-version' => 'داۋاملاشتۇر',
);

/** Ukrainian (українська)
 * @author AS
 * @author Base
 * @author NickK
 * @author Olvin
 * @author Prima klasy4na
 * @author Ата
 * @author Тест
 */
$messages['uk'] = array(
	'extensiondistributor' => 'Завантажити розширення MediaWiki',
	'extensiondistributor-desc' => 'Розширення для завантаження дистрибутивів розширень',
	'extdist-not-configured' => 'Будь ласка, налаштуйте $wgExtDistList і $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Не вдалося дістати список розширень!',
	'extdist-no-such-extension' => 'Розширення «$1» не знайдено',
	'extdist-no-such-version' => 'Розширення "$1" не існує у версії "$2".',
	'extdist-choose-extension' => 'Виберіть розширення, яке ви хочете завантажити:',
	'extdist-submit-extension' => 'Продовжити',
	'extdist-choose-version' => 'Ви завантажуєте розширення <b>$1</b>.

Оберіть Вашу версію MediaWiki.

Більшість розширень працюють на кількох версіях MediaWiki, тому, якщо вашої версії MediaWiki тут немає, або якщо у Вас є потреба в функціях найновішої версії розширення, спробуйте використати поточну версію.',
	'extdist-no-versions' => 'Обране розширення ($1) не доступне в жодній версії!',
	'extdist-submit-version' => 'Продовжити',
	'extdist-created' => "Знімок версії <b>$2</b> розширення <b>$1</b> MediaWiki <b>$3</b> створено. Завантаження почнеться автоматично через 5 секунд.

URL-адреса для цього знімка:
:$4
Вона може бути використана для негайного завантаження з сервера, але, будь ласка, не заносьте її в закладки, тому що її зміст не буде оновлюватись, адреса може бути непрацездатною через деякій час.

Tar-архів необхідно розпакувати в каталог розширення. Наприклад, в UNIX-подібних ОС:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

У Windows ви можете скористатись [http://www.7-zip.org/ 7-zip] для розпакування файлів.

Якщо ваша вікі на віддаленому сервері, розпакуйте файли в тимчасову папку на вашому локальному комп'ютері, а потім завантажте '''всі''' розпаковані файли в каталог розширення на сервері.

Після того, як ви розпакували файли, вам необхідно зареєструвати розширення в LocalSettings.php. Документація розширення повинні мати інструкції про те, як це зробити.

Якщо у вас є питання по цій системі розповсюдження розширень, будь ласка, перейдіть до [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Завантажити інше розширення',
	'extdist-tar-error' => 'Не вдалося дістати архівну URL з архівного API.',
);

/** Urdu (اردو)
 * @author Muhammad Shuaib
 * @author පසිඳු කාවින්ද
 */
$messages['ur'] = array(
	'extensiondistributor' => 'زیراثقال میڈیاوکی توسیع',
	'extdist-submit-extension' => 'جاری رکھیں',
	'extdist-submit-version' => 'جاری رکھیں',
	'extdist-want-more' => 'ایک اور توسیع حاصل کریں',
);

/** vèneto (vèneto)
 * @author Candalua
 * @author Reedy
 */
$messages['vec'] = array(
	'extensiondistributor' => 'Descarga na estension MediaWiki',
	'extensiondistributor-desc' => 'Estension par distribuir archivi snapshot de le estension',
	'extdist-not-configured' => 'Par piaser configura $wgExtDistList e $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => 'L\'estension "$1" no la esiste',
	'extdist-no-such-version' => 'L\'estension "$1" no la esiste in te la version "$2".',
	'extdist-choose-extension' => 'Siegli quala estension te voli descargar:',
	'extdist-submit-extension' => 'Continua',
	'extdist-choose-version' => "Te sì drio descargar l'estension <b>$1</b>.

Selessiona la to version de MediaWiki.

Tante estension le va su più version de MediaWiki, quindi se la to version de MediaWiki no la xe qua o se te serve le ultime funsion de l'estension, próa a doparar la version corente.",
	'extdist-no-versions' => "L'estension che ti gà sielto ($1) no la xe disponibile in nissuna version!",
	'extdist-submit-version' => 'Continua',
	'extdist-created' => "Na istantanea de la version <b>$2</b> de l'estension <b>$1</b> par MediaWiki <b>$3</b> la xe stà creà. El scaricamento el dovarìa partir da solo fra 5 secondi.

L'URL par sta istantanea el xe:
:$4
El pode vegner doparà par descargar de boto dal server, ma no stà zontarlo ai Preferiti parché el contenuto no'l vegnarà mia ajornà e el colegamento el podarìa in futuro èssar cavà.

L'archivio tar el dovarìa vegner estrato in te la to cartèla de le estension. Par esenpio, su de un sistema operativo de tipo unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Su Windows te podi doparar [http://www.7-zip.org/ 7-zip] par estrarre i file.

Se la to wiki la se cata su de un server remoto, estrai i file in te na cartèla tenporanea sul to computer locale e in seguito carga '''tuti quanti''' i file estrati in te la cartèla de le estension sul server.

Dopo che ti gà estrato i file, te gavarè bisogno de registrar l'estension in LocalSettings.php. El manual de l'estension el dovarìa contegner le istrussion su come far.

Se ti gà qualche domanda riguardo el sistema de distribussion de sta estension, varda [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => "Toli n'antra estension",
	'extdist-tar-error' => 'El Tar el gà ritornà el seguente còdese de uscita $1:', # Fuzzy
);

/** Veps (vepsän kel’)
 * @author Игорь Бродский
 */
$messages['vep'] = array(
	'extdist-submit-extension' => 'Jatkta',
	'extdist-submit-version' => 'Jatkata',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author Vinhtantran
 */
$messages['vi'] = array(
	'extensiondistributor' => 'Tải về phần mở rộng MediaWiki',
	'extensiondistributor-desc' => 'Phần mở rộng để phân phối các bản lưu trữ ảnh của các phần mở rộng',
	'extdist-not-configured' => 'Xin hãy cấu hình $wgExtDistList và $wgExtDistArchiveAPI',
	'extdist-list-missing' => 'Không thể lấy danh sách phần mở rộng!',
	'extdist-no-such-extension' => 'Không có phần mở rộng “$1”',
	'extdist-no-such-version' => 'Phần mở rộng “$1” không tồn tại trong phiên bản “$2”.',
	'extdist-choose-extension' => 'Chọn phần mở rộng bạn muốn tải về:',
	'extdist-submit-extension' => 'Tiếp tục',
	'extdist-choose-version' => 'Bạn đang tải về phần mở rộng <b>$1</b>.

Chọn phiên bản MediaWiki của bạn.

Phần lớn phần mở rộng có thể chạy được trên nhiều phiên bản MediaWiki, do đó nếu phiên bản MediaWiki của bạn không được liệt kê ở đây, hoặc nếu bạn cần sử dụng các tính năng mở rộng mới nhất, hãy thử sử dụng phiên bản hiện hành.',
	'extdist-no-versions' => 'Phiên bản được chọn ($1) không có sẵn trong bất kỳ phiên bản nào!',
	'extdist-submit-version' => 'Tiếp tục',
	'extdist-created' => "Đã tạo ra bản lưu trữ phiên bản <b>$2</b> của phần mở rộng <b>$1</b> dành cho MediaWiki <b>$3</b>. Nó sẽ tự động bắt đầu tải về trong 5 giây nữa.

Địa chỉ URL của bản lưu trữ này là:
:$4
Có thể tải trực tiếp lên máy chủ, nhưng xin đừng đánh dấu trang (<i>bookmark</i>) nó, vì nội dung co thể sẽ không được cập nhật, và nó có thể bị xóa sau vài ngày nữa.

Tập tin lưu trữ tar nên được bung vào thư mục chứa phần mở rộng của bạn. Ví dụ, trên hệ điều hành tương tự Unix:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Trên Windows, bạn có thể sử dụng [http://www.7-zip.org/ 7-zip] để giải nén các tập tin.

Nếu wiki của bạn nằm ở máy chủ từ xa, hãy bung các tập tin đó vào một thư mục tạm trên máy tính hiện tại của bạn, rồi sau đó tải '''tất cả''' các tập tin đã giải nén lên thư mục chứa phần mở rộng trên máy chủ.

Sau khi đã giải nén tập tin, bạn sẽ cần phải đăng ký phần mở rộng trong LocalSettings.php. Tài liệu đi kèm với phần mở rộng sẽ có những hướng dẫn về cách thực hiện điều này.

Nếu bạn có thắc mắc nào về hệ thống phân phối phần mở rộng này, xin ghé vào [[Extension talk:ExtensionDistributor]].",
	'extdist-want-more' => 'Lấy một phần mở rộng khác',
	'extdist-tar-error' => 'Không thể lấy URL của bản nén từ API bản nén.',
);

/** Yiddish (ייִדיש)
 * @author Imre
 * @author פוילישער
 */
$messages['yi'] = array(
	'extensiondistributor' => 'ַאַראָפלאָדן מעדיעוויקי פֿאַרברייטערונג',
	'extdist-submit-extension' => 'פֿארזעצן',
	'extdist-submit-version' => 'פֿארזעצן',
);

/** Cantonese (粵語)
 * @author Reedy
 * @author Shinjiman
 */
$messages['yue'] = array(
	'extensiondistributor' => '下載MediaWiki擴展',
	'extensiondistributor-desc' => '發佈擴展歸檔映像嘅擴展',
	'extdist-not-configured' => '請設定 $wgExtDistList 同 $wgExtDistArchiveAPI',
	'extdist-no-such-extension' => '無呢個擴展 "$1"',
	'extdist-no-such-version' => '個擴展 "$1" 唔存在於呢個版本 "$2" 度。',
	'extdist-choose-extension' => '揀你要去下載嘅擴展:',
	'extdist-submit-extension' => '繼續',
	'extdist-choose-version' => '
你而家下載緊 <b>$1</b> 擴展。

揀你要嘅 MediaWiki 版本。

多數嘅擴展都可以響多個 MediaWiki 嘅版本度行到，噉如果你嘅 MediaWiki 版本唔響度，又或者你需要最新嘅擴展功能嘅話，試吓用最新嘅版本。',
	'extdist-no-versions' => '所揀嘅擴展 ($1) 不適用於任何嘅版本！',
	'extdist-submit-version' => '繼續',
	'extdist-created' => "一個可供 MediaWiki <b>$3</b> 用嘅 <b>$1</b> 擴展之 <b>$2</b> 版本嘅映像已經整好咗。你嘅下載將會響5秒鐘之後自動開始。

呢個映像嘅 URL 係:
:$4
佢可能會用響即時下載到伺服器度，但係請唔好記底響書籤度，因為裏面啲嘢可能唔會更新，亦可能會響之後嘅時間刪除。

個 tar 壓縮檔應該要解壓到你嘅擴展目錄。例如，響 unix 類 OS:

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

響 Windows，你可以用 [http://www.7-zip.org/ 7-zip] 去解壓嗰啲檔案。

如果你嘅 wiki 係響一個遠端伺服器嘅話，就響電腦度解壓檔案到一個臨時目錄，然後再上載'''全部'''已經解壓咗嘅檔案到伺服器嘅擴展目錄。

響你解壓咗啲檔案之後，你需要響 LocalSettings.php 度註冊番個擴展。個擴展說明講咗點樣可以做到呢樣嘢。

如果你有任何對於呢個擴展發佈系統有問題嘅話，請去[[Extension talk:ExtensionDistributor]]。",
	'extdist-want-more' => '攞另一個擴展',
	'extdist-tar-error' => 'Tar 回應結束碼 $1:', # Fuzzy
);

/** Simplified Chinese (中文（简体）‎)
 * @author Hydra
 * @author Hzy980512
 * @author Liangent
 * @author Shinjiman
 * @author Wmr89502270
 * @author Yfdyh000
 */
$messages['zh-hans'] = array(
	'extensiondistributor' => '下载MediaWiki扩展',
	'extensiondistributor-desc' => '发布扩展存档映像的扩展',
	'extdist-not-configured' => '请设置 $wgExtDistList 和 $wgExtDistArchiveAPI',
	'extdist-list-missing' => '无法读取扩展列表！',
	'extdist-no-such-extension' => '没有这个扩展 "$1"',
	'extdist-no-such-version' => '该扩展 "$1" 不存在于这个版本 "$2" 中。',
	'extdist-choose-extension' => '选择要下载的扩展：',
	'extdist-submit-extension' => '继续',
	'extdist-choose-version' => '您将要下载<b>$1</b>扩展。

请选择您的MediaWiki版本。

多数的扩展都可以在多个 MediaWiki 版本上运行，如果您的 MediaWiki 版本不存在，又或者您需要最新的扩展功能的话，可尝试用最新的版本。',
	'extdist-no-versions' => '所选择扩展（$1）不适用于任何的版本！',
	'extdist-submit-version' => '继续',
	'extdist-created' => "MediaWiki <b>$3</b>版本的<b>$1</b>扩展的<b>$2</b>版本已创建。下载将在5秒内自动开始。

快照的链接是：
:$4
它可能可以给您直接在服务器上下载，但不要收藏它，因为它不会更新，并且下载后可能过后就会删除。

Tar压缩文件要解压到您的扩展目录中。比如在类Unix系统中使用命令：

<pre>
tar -xzf $5 -C /var/www/mediawiki/extensions
</pre>

Windows上，可以使用[http://www.7-zip.org/ 7-zip]来解压文件。

若您的维基在远程服务器上，请解压所有文件到您的电脑上的一个临时文件夹中，然后上传'''所有'''文件到远程服务器上的扩展目录中。

解压文件后，您就需要在LocalSettings.php中注册您的插件。插件资料中应该已经介绍了。

如果您对这个插件获取系统有任何建议，请前去[[Extension talk:ExtensionDistributor]]。",
	'extdist-want-more' => '下载其他扩展',
	'extdist-tar-error' => '无法从存档API读取存档URL。',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Anakmalaysia
 * @author Liangent
 * @author Mark85296341
 * @author Shinjiman
 * @author Simon Shek
 */
$messages['zh-hant'] = array(
	'extensiondistributor' => '下載 MediaWiki 擴充套件',
	'extensiondistributor-desc' => '發布擴充套件存檔映像的擴充套件',
	'extdist-not-configured' => '請設定 $wgExtDistList 和 $wgExtDistArchiveAPI',
	'extdist-list-missing' => '無法讀取擴展清單！',
	'extdist-no-such-extension' => '沒有這個擴充套件「$1」',
	'extdist-no-such-version' => '該擴充套件「$1」不存在於這個版本「$2」中。',
	'extdist-choose-extension' => '選擇您要去下載的擴充套件：',
	'extdist-submit-extension' => '繼續',
	'extdist-choose-version' => '您現正下載 <b>$1</b> 擴充套件。

選擇您要的 MediaWiki 版本。

多數的擴充套件都可以在多個 MediaWiki 版本上執行，如果您的 MediaWiki 版本不存在，又或者您需要最新的擴充套件功能的話，可嘗試用最新的版本。',
	'extdist-no-versions' => '所選擇擴充套件 （$1） 不適用於任何的版本！',
	'extdist-submit-version' => '繼續',
	'extdist-created' => "已創建的定制<b>$3</b> 的<b>$1</b> 擴展的版本<b>$2</b> 的快照。您下載應在 5 秒後自動啟動。

，此快照的 URL 是：
:$4
，可用於直接下載到一個的服務器，但請不要不書籤它，因為內容將不會更新，和它可能在晚些時候會被刪除。

tar 存檔應提取到您擴展的目錄。為例對一個類似 unix 的操作系統：

<pre>
tar -xzf $5-C /var/www/mediawiki/extensions
</pre>

在Windows 中，可以使用[http://www.7-zip.org/ 7-zip] 解壓縮文件。

遠程服務器上如果您維基提取到一個臨時目錄在本地計算機上的文件，然後將上傳'''所有'''的解壓縮的文件擴展名的目錄在服務器上。

提取文件後，您將需要在LocalSettings.php 中註冊擴展。擴展的文檔應有說明如何執行此操作。

有關於此擴展名配電系統的任何問題，請轉到[[Extension talk:ExtensionDistributor]]。",
	'extdist-want-more' => '取得另一個擴充套件',
	'extdist-tar-error' => '無法從存檔API讀取存檔URL。',
);
