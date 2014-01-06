<?php
/**
 * Created by PhpStorm.
 * User: Dominic
 * Date: 06.01.14
 * Time: 15:42
 */

require_once 'smarty/Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir('www/templates');
$smarty->setCompileDir('www/templates_c');
$smarty->setCacheDir('www/cache');
$smarty->setConfigDir('www/configs');