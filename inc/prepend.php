<?php
/**
 * Filename: prepend.php
 * User: 'Barracuda'
 * Date: 06.01.14
 * Time: 15:42
 */

/** Error Reporting */
error_reporting(1);
ini_set('display_errors', 1);

/** Start session */
session_start();

/** If a cookie is found, create the account session */
if(isset($_COOKIE['gerki'])) {
    $_SESSION['account']['accountID'] = $_COOKIE['gerki']['accountID'];
    $_SESSION['account']['loginName'] = $_COOKIE['gerki']['loginName'];
}

/** Include Smarty lib */
require_once 'smarty/Smarty.class.php';

/** Create new Smarty instance $smarty */
$smarty = new Smarty();

/** Define Smarty directories for templates */
$smarty->setTemplateDir('www/templates');
$smarty->setCompileDir('www/templates_c');
$smarty->setCacheDir('www/cache');
$smarty->setConfigDir('www/configs');

/** Autoload defined classes */
function autoload_classes($className) {
    $classPath = 'inc/class/';
    $className = explode('\\', $className);
    $classFileName = 'class.' . end($className) . '.inc.php';
    if(!file_exists($classPath . $classFileName)) {
        $smarty->assign('currentContentHead', 'German Kings 404 - Seite nicht gefunden');
        $smarty->assign('content', '404.tpl');
    } else {
        require $classPath . $classFileName;
    }
}

/** Register class autoload with Smarty autoload */
spl_autoload_register('autoload_classes');

/** Set database object */
\eCMS\database\db::setType('mysql');
\eCMS\database\db::setHost('localhost');
\eCMS\database\db::setUser('root');
\eCMS\database\db::setPwd('');
\eCMS\database\db::setDbname('ecms');

/** Load defined modules */
if(isset($_GET['module'])) {
    $modulePath = 'inc/module/';
    $moduleName = 'module.' . $_GET['module'] . '.inc.php';
    if(!file_exists($modulePath . $moduleName)) {
        $smarty->assign('currentContentHead', 'German Kings 404 - Seite nicht gefunden');
        $smarty->assign('content', '404.tpl');
    } else
        require $modulePath . $moduleName;
} else {
    require 'inc/module/module.news.inc.php';
}

if(isset($_GET['submodule'])) {
    $submodulePath = 'inc/module/' . $_GET['module'] . '/';
    $submoduleName = 'submodule.' . $_GET['submodule'] . '.inc.php';
    if(!file_exists($submodulePath . $submoduleName)) {
        $smarty->assign('currentContentHead', 'German Kings 404 - Seite nicht gefunden');
        $smarty->assign('content', '404.tpl');
    }
    else
        require $submodulePath . $submoduleName;
}

$country = array('Abchasien',
    'Afghanistan',
    '&Auml;gypten',
    'Albanien',
    'Algerien',
    'Andorra',
    'Angola',
    'Antigua und Barbuda',
    '&Auml;quatorialguinea',
    'Argentinien',
    'Armenien',
    'Aserbaidschan',
    '&Auml;thiopien',
    'Australien',
    'Bahamas',
    'Bahrain',
    'Bangladesch',
    'Barbados',
    'Belarus',
    'Belgien',
    'Belize',
    'Benin',
    'Bergkarabach',
    'Bhutan',
    'Bolivien',
    'Bosnien und Herzegowina',
    'Botswana',
    'Brasilien',
    'Brunei',
    'Bulgarien',
    'Burkina Faso',
    'Burundi',
    'Chile',
    'Volksrepublik China',
    'Cookinseln',
    'Costa Rica',
    'D&auml;nemark',
    'Deutschland',
    'Dominica',
    'Dominikanische Republik',
    'Dschibuti',
    'Ecuador',
    'El Salvador',
    'Elfenbeink&uuml;ste',
    'Eritrea',
    'Estland',
    'Fidschi',
    'Finnland',
    'Frankreich',
    'Gabun',
    'Gambia',
    'Georgien',
    'Ghana',
    'Grenada',
    'Griechenland',
    'Guatemala',
    'Guinea',
    'Guinea-Bissau',
    'Guyana',
    'Haiti',
    'Honduras',
    'Indien',
    'Indonesien',
    'Irak',
    'Iran',
    'Irland',
    'Island',
    'Israel',
    'Italien',
    'Jamaika',
    'Japan',
    'Jemen',
    'Jordanien',
    'Kambodscha',
    'Kamerun',
    'Kanada',
    'Kap Verde',
    'Kasachstan',
    'Katar',
    'Kenia',
    'Kirgisistan',
    'Kiribati',
    'Kolumbien',
    'Komoren',
    'Kongo, Demokratische Republik',
    'Kongo, Republik',
    'Niederlande',
    'Korea, Nord',
    'Korea, S&uuml;d',
    'Kosovo',
    'Kroatien',
    'Kuba',
    'Kuwait',
    'Laos',
    'Lesotho',
    'Lettland',
    'Libanon',
    'Liberia',
    'Libyen',
    'Liechtenstein',
    'Litauen',
    'Luxemburg',
    'Madagaskar',
    'Malawi',
    'Malaysia',
    'Malediven',
    'Mali',
    'Malta',
    'Marokko',
    'Marshallinseln',
    'Mauretanien',
    'Mauritius',
    'Mazedonien',
    'Mexiko',
    'Mikronesien',
    'Moldawien',
    'Monaco',
    'Mongolei',
    'Montenegro',
    'Mosambik',
    'Myanmar',
    'Namibia',
    'Nauru',
    'Nepal',
    'Neuseeland',
    'Nicaragua',
    'Niger',
    'Nigeria',
    'Niue',
    'Nordzypern',
    'Norwegen',
    'Oman',
    '&Ouml;sterreich',
    'Osttimor / Timor-Leste',
    'Pakistan',
    'Pal&auml;stina',
    'Palau',
    'Panama',
    'Papua-Neuguinea',
    'Paraguay',
    'Peru',
    'Philippinen',
    'Polen',
    'Portugal',
    'Ruanda',
    'Rum&auml;nien',
    'Russland',
    'Salomonen',
    'Sambia',
    'Samoa',
    'San Marino',
    'S&atilde;o Tom&eacute; und Pr&iacute;ncipe',
    'Saudi-Arabien',
    'Schweden',
    'Schweiz',
    'Senegal',
    'Serbien',
    'Seychellen',
    'Sierra Leone',
    'Simbabwe',
    'Singapur',
    'Slowakei',
    'Slowenien',
    'Somalia',
    'Somaliland',
    'Spanien',
    'Sri Lanka',
    'St. Kitts und Nevis',
    'St. Lucia',
    'St. Vincent und die Grenadinen',
    'S&uuml;dafrika',
    'Sudan',
    'S&uuml;dossetien',
    'S&uuml;dsudan',
    'Suriname',
    'Swasiland',
    'Syrien',
    'Tadschikistan',
    'Taiwan',
    'Tansania',
    'Thailand',
    'Togo',
    'Tonga',
    'Transnistrien',
    'Trinidad und Tobago',
    'Tschad',
    'Tschechien',
    'Tunesien',
    'T&uuml;rkei',
    'Turkmenistan',
    'Tuvalu',
    'Uganda',
    'Ukraine',
    'Ungarn',
    'Uruguay',
    'Usbekistan',
    'Vanuatu',
    'Vatikanstadt',
    'Venezuela',
    'Vereinigte Arabische Emirate',
    'Vereinigte Staaten',
    'Vereinigtes K&ouml;nigreich',
    'Vietnam',
    'Westsahara',
    'Zentralafrikanische Republik',
    'Zypern');

$smarty->assign('country', $country);

