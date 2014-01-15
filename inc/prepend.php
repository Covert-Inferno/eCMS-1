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

