<?php
/**
 * Filename: module.news.inc.php
 * User: 'Barracuda'
 * Date: 15.01.14
 * Time: 12:30
 */

$smarty->assign('currentContentHead', 'German Kings News');
$smarty->assign('news', \eCMS\Administration\News\news::fetchNews());
$smarty->assign('content', 'news.tpl');
