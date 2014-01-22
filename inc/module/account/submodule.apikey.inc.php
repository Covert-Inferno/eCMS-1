<?php
/**
 * Filename: submodule.apikey.inc.php
 * User: 'Barracuda'
 * Date: 22.01.14
 * Time: 11:36
 */

if(isset($_GET['action'])) {
    if($_GET['action'] == 'addAPIKey') {
        /** Eingabemaske für neuen APIKey */
    } else if($_GET['action'] == 'delAPIKey') {
        /** Löschen eines bestimmten APIKeys */
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
