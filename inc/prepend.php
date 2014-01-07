<?php
/**
 * Created by PhpStorm.
 * User: Dominic
 * Date: 06.01.14
 * Time: 15:42
 */

/** Error Reporting */
error_reporting(1);
ini_set('display_errors', 1);

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
        printf('Class "' . end($className) . '" does not exist');
    } else {
        require $classPath . $classFileName;
    }
}

/** Register class autoload with Smarty autoload */
spl_autoload_register('autoload_classes');

$EveAPI = new \eCMS\EveAPI\EveAPI('1490636', 'AVkLU7aKz4LvKYbBRynNGJesTmhUXBt9i8vGuF59sdCGdIuSDZIQMGNnrf2lP4Y7');

echo '<pre>';
$charSheet = \eCMS\EveAPI\Character::getCharacterSheet($EveAPI, $data = array('characterID' => 1238718255));
var_dump($charSheet->result);