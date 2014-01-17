<?php
/**
 * Filename: append.php
 * User: 'Barracuda'
 * Date: 06.01.14
 * Time: 15:42
 */

/** Load mainframe template */
$smarty->display('mainframe.tpl');

var_dump($_COOKIE);
var_dump($_SESSION);
var_dump($_POST);
var_dump($registration);
print '---';
var_dump(unserialize($_SESSION['account']['group']));