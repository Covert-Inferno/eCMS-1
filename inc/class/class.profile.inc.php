<?php
/**
 * Filename class.profile.inc.php.
 * User: 'Barracuda'
 * Date: 15.01.14
 * Time: 23:13
 */

namespace eCMS\Account;


use eCMS\database\db;

class profile {
    public static function getProfile($accountID) {
        if(!isset($accountID))
            return false;
        else {
            $db = db::getInstance();
            /** SELECT auf Datenbank für Profilabruf passend zur Account-ID */
        }
    }
} 