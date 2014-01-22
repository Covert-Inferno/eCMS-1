<?php
/**
 * Filename: append.php
 * User: 'Barracuda'
 * Date: 06.01.14
 * Time: 15:42
 */

/** Load mainframe template */
$smarty->display('mainframe.tpl');

print 'POST:';
var_dump($_POST);
print 'API:';
var_dump($apiKey);