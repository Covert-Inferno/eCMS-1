<?php
/**
 * Filename module.account.inc.php.
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 22:02
 */

$account = new \eCMS\Account\Account();
$smarty->assign('content', 'account_overview.tpl');

if(isset($_GET['action']) && $_GET['action'] == 'login') {
    $smarty->assign('currentContentHead', 'German Kings Login');
    $smarty->assign('content', 'account_login.tpl');
    if(isset($_POST) && isset($_POST['submit'])) {
        if($account->loginUser($_POST) == false)
            $smarty->assign('content', 'account_login.tpl');
        else {
            $_SESSION['account']['accountID'] = serialize($account->getAccountID());
            $_SESSION['account']['loginName'] = serialize($account->getLoginName());
            setcookie('gerki', $_SESSION['account'], time()+60*60*24*30);
            header("Location: ?module=account&submodule=overview");
        }
    }
    $smarty->assign('account', $account);
}

if(isset($_GET['action']) && $_GET['action'] == 'logout') {
    setcookie('gerki', $_SESSION['account'], time()-60*60*24*30);
    $_COOKIE = '';
    $_SESSION = array();
    $smarty->assign('content', 'welcome.tpl');
}
