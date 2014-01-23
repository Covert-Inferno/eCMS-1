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

    public static function getAPIKey($accountID, $checksum = NULL) {
        if(isset($accountID)) {
            if(isset($checksum) && !empty($checksum)) {
                $db = db::getInstance();
                $stmt = $db->prepare(
                    'SELECT
                        tblAPIKey.tblAPIKey_keyId,
                        tblAPIKey.tblAPIKey_vCode,
                        tblAPIKey.tblAPIKey_checksum,
                        tblAPIAccount.tblAPIAccount_standard,
                        tblAPIAccount.tblAPIAccount_accountId
                    FROM
                        tblAPIKey
                    JOIN
                        tblAPIAccount
                    ON
                        tblAPIKey.tblAPIKey_id = tblAPIAccount.tblAPIAccount_id
                    WHERE
                        tblAPIAccount.tblAPIAccount_accountId = :aid
                    AND
                        tblAPIKey.tblAPIKey_checksum = :csum'
                );
                $stmt->bind_param('aid', $accountID);
                $stmt->bind_param('csum', $checksum);
                $stmt->execute();
                $apiKey = $stmt->fetch_assoc();
                if(!empty($apiKey)) {
                    return $apiKey;
                } else
                    return false;
            } else {
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
            }
        } else
            return false;
    }

    public static function addAPIKey($keyID, $vCode) {
        if(isset($keyID) && isset($vCode)) {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'INSERT INTO
                    tblAPIKey
                SET
                    tblAPIKey_keyId = :kid,
                    tblAPIKey_vCode = :verCode,
                    tblAPIKey_checksum = :csum'
            );
            $stmt->bind_param('kid', $keyID);
            $stmt->bind_param('verCode', $vCode);
            $stmt->bind_param('csum', md5('KeyIdIs' . $keyID));
            $stmt->execute();

            $stmt2 = $db->prepare(
                'INSERT INTO
                    tblAPIAccount
                SET
                    tblAPIAccount_id = :kid,
                    tblAPIAccount_accountId = :aid'
            );
            $stmt2->bind_param('kid', $stmt->lastid);
            $stmt2->bind_param('aid', unserialize($_SESSION['account']['accountID']));
            $stmt2->execute();
        }
    }

    public static function editAPIKey($keyID, $vCode) {}

    public static function delAPIKey($keyID, $vCode) {}

    public static function saveUnauthorizedAccess($checksum, $accountId) {
        if(isset($checksum) && isset($accountId)) {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                    count(tblAPIUnauthorizedAccess_accessId)
                AS
                    counter
                FROM
                    tblAPIUnauthorizedAccess
                WHERE
                    tblAPIUnauthorizedAccess_accountId = :aid'
            );
            $stmt->bind_param('aid', $accountId);
            $stmt->execute();
            $result = $stmt->fetch_assoc();

            $stmt2 = $db->prepare(
                'INSERT INTO
                    tblAPIUnauthorizedAccess
                SET
                    tblAPIUnauthorizedAccess_checksum = :csum,
                    tblAPIUnauthorizedAccess_accountId = :accId'
            );
            $stmt2->bind_param('csum', $checksum);
            $stmt2->bind_param('accId', $accountId);
            $stmt2->execute();

            if($result['counter'] >= 1) {
                Account::killSession();
                Account::banAccount($accountId);
                return 'banned';
            }
        }
    }
} 