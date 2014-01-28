<?php
if(isset($_GET) && $_GET['action'] == 'add') {
    if(isset($_POST)) {

    } else {
        if(isset($_SESSION['account'])) {
            $apiKey = \eCMS\Account\APIKey::getAPIKey(unserialize($_SESSION['account']['accountID']));
            foreach($apiKey as $key => $array) {

            }
            $smarty->assign('apiKey', $apiKey);
            $smarty->assign('content', 'account/apikey_show.tpl');
        }
    }
} else {
    $smarty->assign('content', 'character/character_overview.tpl');
}
