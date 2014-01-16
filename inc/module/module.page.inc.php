<?php
/**
 * Filename: module.page.inc.php
 * User: 'Barracuda'
 * Date: 15.01.14
 * Time: 17:21
 */

if(isset($_GET['page'])) {
    $smarty->assign('content', 'page.tpl');
    if(isset($_GET['sub'])) {

    }
}