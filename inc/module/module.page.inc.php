<?php
/**
 * Filename: module.page.inc.php
 * User: 'Barracuda'
 * Date: 15.01.14
 * Time: 17:21
 */

if(isset($_GET['page'])) {
    if(file_exists('./www/templates/pages/' . $_GET['page'] . '.tpl'))
        $smarty->assign('content', 'pages/' . $_GET['page'] . '.tpl');
    else
        $smarty->assign('content', '404.tpl');
    if(isset($_GET['sub'])) {

    }
}