<?php
/**
 * Filename: class.APIKey.inc.php
 * User: 'Barracuda'
 * Date: 22.01.14
 * Time: 11:47
 */

namespace eCMS\Account;


use eCMS\database\db;

class APIKey {

    public static function getAPIKey($accountID) {
        if(isset($accountID)) {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                    tblAPIKey.tblAPIKey_keyId,
                    tblAPIKey.tblAPIKey_vCode,
                    tblAPIKey.tblAPIKey_checksum,
                    tblAPIAccount.tblAPIAccount_standard
                FROM
                    tblAPIKey
                JOIN
                    tblAPIAccount
                ON
                    tblAPIKey.tblAPIKey_id = tblAPIAccount.tblAPIAccount_id
                WHERE
                    tblAPIAccount.tblAPIAccount_accountId = :aid
                ORDER BY
                    tblAPIAccount.tblAPIAccount_standard DESC'
            );
            $stmt->bind_param('aid', $accountID);
            $stmt->execute();
            $apiKey = $stmt->fetch_array();
            if(!empty($apiKey))
                return $apiKey;
            else
                return false;
        } else
            return false;
    }

    public static function addAPIKey($keyID, $vCode) {}

    public static function editAPIKey($keyID, $vCode) {}

    public static function delAPIKey($keyID, $vCode) {}
} 