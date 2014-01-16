<?php
/**
 * Filename: module.page.inc.php
 * User: 'Barracuda'
 * Date: 15.01.14
 * Time: 17:21
 */

if(isset($_GET['page'])) {
    /*$pageContent = \eCMS\Page\page::getPage($_GET['page']);
    if($pageContent != false) {
        $smarty->assign('currentContentHead', 'German Kings ' . $pageContent['tblPage_title']);
        $smarty->assign('pageContent', $pageContent['tblPage_content']);
        $smarty->assign('content', 'page.tpl');
    } else {
        $smarty->assign('currentContentHead', 'German Kings 404 - Seite nicht gefunden');
        $smarty->assign('content', '404.tpl');
    }*/
    if(file_exists('./www/templates/pages/' . $_GET['page'] . '.tpl'))
        $smarty->assign('content', 'pages/' . $_GET['page'] . '.tpl');
    else
        $smarty->assign('content', '404.tpl');
    if(isset($_GET['sub'])) {

    }
}