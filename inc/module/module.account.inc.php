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
            setcookie('gerki[accountID]', serialize($account->getAccountID()), time()+60*60*24*30);
            setcookie('gerki[loginName]', serialize($account->getLoginName()), time()+60*60*24*30);
            header("Location: ?module=account&submodule=overview");
        }
        $_POST = '';
    }
    $smarty->assign('account', $account);
}

if(isset($_GET['action']) && $_GET['action'] == 'logout') {
    $_SESSION = array();
    unset($_SESSION['account']);
    session_destroy();
    setcookie('gerki[accountID]', '', time()-1);
    setcookie('gerki[loginName]', '', time()-1);
    $_COOKIE['gerki'] = '';
    unset($_COOKIE['gerki']);
    $smarty->assign('content', 'welcome.tpl');
}
