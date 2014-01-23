<?php
/**
 * Filename: submodule.apikey.inc.php
 * User: 'Barracuda'
 * Date: 22.01.14
 * Time: 11:36
 */

if(isset($_GET['action'])) {
    if($_GET['action'] == 'add') {
        if(isset($_POST) && !empty($_POST)) {
            $eveapi = new \eCMS\EveAPI\EveAPI($_POST['keyId'], $_POST['vCode']);
            $checkAPIKey = $eveapi->fetchData('/account/APIKeyInfo.xml.aspx');
            if($checkAPIKey->error['code'] != NULL) {
                $smarty->assign('error', $checkAPIKey->error['code']);
            } else {
                \eCMS\Account\APIKey::addAPIKey($_POST['keyId'], $_POST['vCode']);
            }
        }
        $smarty->assign('content', 'account/apikey_add.tpl');
    } else if($_GET['action'] == 'del') {
        /** Löschen eines bestimmten APIKeys */
    } else if($_GET['action'] == 'edit') {
        /** Editieren eines bestimmten APIKeys */
        if(isset($_GET['cs'])) {
            if(unserialize($_SESSION['account']['accountID']) == unserialize($_COOKIE['gerki']['accountID'])) {
                $apiKey = \eCMS\Account\APIKey::getAPIKey(unserialize($_SESSION['account']['accountID']), $_GET['cs']);
                if($apiKey['tblAPIAccount_accountId'] == unserialize($_SESSION['account']['accountID']))
                    $smarty->assign('apiKey', $apiKey);
                else {
                    if(\eCMS\Account\APIKey::saveUnauthorizedAccess($_GET['cs'], unserialize($_SESSION['account']['accountID'])) == 'banned')
                        $smarty->assign('banned', 1);
                    $smarty->assign('notAllowed', 1);
                }
                $smarty->assign('content', 'account/apikey_edit.tpl');
            }
        }
    }
} else {
    if(isset($_SESSION['account']) && isset($_COOKIE['gerki'])) {
        if(unserialize($_SESSION['account']['accountID']) == unserialize($_COOKIE['gerki']['accountID'])) {
            $apiKey = \eCMS\Account\APIKey::getAPIKey(unserialize($_SESSION['account']['accountID']));
            $smarty->assign('apiKey', $apiKey);
            $smarty->assign('content', 'account/apikey_show.tpl');
        } else
            return false;
    }
}
