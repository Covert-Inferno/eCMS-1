<?php
/**
 * Filename: module.news.inc.php
 * User: 'Barracuda'
 * Date: 15.01.14
 * Time: 12:30
 */

if(isset($_GET['action'])) {
    if($_GET['action'] == 'writeNews') {
        $smarty->assign('currentContentHead', 'German Kings News schreiben');
        $smarty->assign('content', 'adm/news_create.tpl');
    }
} else {
    $smarty->assign('currentContentHead', 'German Kings News');
    $smarty->assign('news', \eCMS\Administration\News\news::fetchNews());
    $smarty->assign('content', 'news.tpl');
}
