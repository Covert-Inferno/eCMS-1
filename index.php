<?php
/**
 * Filename: index.php
 * User: 'Barracuda'
 * Date: 06.01.14
 * Time: 15:43
 */

require_once 'inc/prepend.php';

$smarty->display('account_login.tpl');

$EveAPI = new \eCMS\EveAPI\EveAPI('1490636', 'AVkLU7aKz4LvKYbBRynNGJesTmhUXBt9i8vGuF59sdCGdIuSDZIQMGNnrf2lP4Y7');

$charList = \eCMS\EveAPI\Character::getCharacterSheet($EveAPI, '1238718255');
var_dump($charList);

require_once 'inc/append.php';
