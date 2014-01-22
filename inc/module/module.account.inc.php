<?php
/**
 * Filename module.account.inc.php.
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 22:02
 */

$smarty->assign('content', 'account_overview.tpl');

if(isset($_GET['action']) && $_GET['action'] == 'login') {
    $smarty->assign('currentContentHead', 'German Kings Login');
    $smarty->assign('content', 'account_login.tpl');
    if(isset($_POST) && isset($_POST['submit'])) {
        if($account->loginUser($_POST) == false)
            $smarty->assign('content', 'account_login.tpl');
        else {
            #die(var_dump($_POST));
            $_SESSION['account']['accountID'] = serialize($account->getAccountID());
            $_SESSION['account']['loginName'] = serialize($account->getLoginName());
            $_SESSION['account']['group'] = serialize($account->getGroup());
            $_SESSION['account']['checksum'] = serialize(\eCMS\Misc\miscellaneous::hasher(unserialize($_SESSION['account']['accountID']) . unserialize($_SESSION['account']['loginName'])));
            if(isset($_POST['stayLoggedIn'])) {
                setcookie('gerki[accountID]', serialize($account->getAccountID()), time()+60*60*24*30);
                setcookie('gerki[loginName]', serialize($account->getLoginName()), time()+60*60*24*30);
                setcookie('gerki[group]', serialize($account->getGroup()), time()+60*60*24*30);
                $checksum = \eCMS\Misc\miscellaneous::hasher(unserialize($_SESSION['account']['accountID']) . unserialize($_SESSION['account']['loginName']));
                setcookie('gerki[checksum]', serialize($checksum), time()+60*60*24*30);
                \eCMS\Account\Account::saveChecksum($checksum, $account->getAccountID(), $account->getLoginName());
            }
            header("Location: ?module=news");
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
    setcookie('gerki[group]', '', time()-1);
    setcookie('gerki[checksum]', '', time()-1);
    $_COOKIE['gerki'] = '';
    unset($_COOKIE['gerki']);
    $smarty->assign('content', 'welcome.tpl');
}

if(isset($_GET['action']) && $_GET['action'] == 'edit') {
    if(isset($_SESSION['account']) || isset($_COOKIE['gerki'])) {

    }
}
