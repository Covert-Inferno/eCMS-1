<?php
/**
 * Filename module.registration.inc.php.
 * User: 'Barracuda'
 * Date: 08.01.14
 * Time: 22:37
 */

$registration = new registration();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'addAccount') {
        if($registration->addAccount($_POST) == false)
            $smarty->assign('content', 'account_registration.tpl');
        else
            $smarty->assign('content', 'account_registration_success.tpl');
        $smarty->assign('registration', $registration);
    }
} else
    $smarty->assign('content', 'account_registration.tpl');
