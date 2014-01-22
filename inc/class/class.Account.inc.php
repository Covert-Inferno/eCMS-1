<?php
/**
 * Filename: class.Account.inc.php
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 12:14
 */

namespace eCMS\Account;


use eCMS\database\db;
use eCMS\Misc\miscellaneous;

class Account {

    private $accountID;
    private $loginName;
    private $loginPwd;
    private $email;
    private $gameAccount = array();
    private $accountError = array(
        'noLoginName' => 0,
        'loginNameUnknown' => 0,
        'noLoginPwd' => 0,
        'loginPwdWrong' => 0
    );
    private $group;

    public function __construct() {

    }

    private function validateLoginName($loginName) {
        if(empty($loginName)) {
            $this->setAccountError('noLoginName');
            return false;
        } else {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                  tblUserAccount_accId,
                  tblUserAccount_loginName,
                  tblUserAccount_email
                FROM
                  tblUserAccount
                WHERE
                  lower(tblUserAccount_loginName) = lower(:logName)'
            );
            $stmt->bind_param('logName', $loginName);
            $stmt->execute();
            $logName = $stmt->fetch_assoc();
            if ($logName == false) {
                $this->setAccountError('loginNameUnknown');
                return false;
            } else {
                $this->setAccountID($logName['tblUserAccount_accId']);
                $this->setLoginName($logName['tblUserAccount_loginName']);
                $this->setEmail($logName['tblUserAccount_email']);
            }
            return true;
        }
    }

    private function validatePassword($password) {
        if(empty($password))
            $this->setAccountError('noLoginPwd');
        else {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                  tblUserAccount_pwd
                FROM
                  tblUserAccount
                WHERE
                  tblUserAccount_accId = lower(:aid)'
            );
            $stmt->bind_param('aid', $this->accountID);
            $stmt->execute();
            $savedPwd = $stmt->fetch_assoc();

            if ($password != miscellaneous::hasher($password, $savedPwd['tblUserAccount_pwd']))
                $this->setAccountError('loginPwdWrong');
            else
                return true;
        }
    }

    private function validateCookieHash($hash) {
        if(empty($hash))
            return false;
        else {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                  tblUserAccount_accId,
                  tblUserAccount_loginName,
                  tblUserAccount_email
                FROM
                  tblUserAccount
                WHERE
                  tblUserAccount_cookieHash = :chash'
            );
            $stmt->bind_param('chash', $hash);
            $stmt->execute();
            $cookieLogin = $stmt->fetch_assoc();
            if ($cookieLogin == false)
                return false;
            else {
                $this->setAccountID($cookieLogin['tblUserAccount_accId']);
                $this->setLoginName($cookieLogin['tblUserAccount_loginName']);
                $this->setEmail($cookieLogin['tblUserAccount_email']);
            }
            return true;
        }
    }

    private function getGroupInformation($accountId) {
        if(!empty($accountId)) {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                    tblGroup_hash
                FROM
                    tblGroup
                JOIN
                    tblGroupUser
                ON
                    tblGroupUser_groupId = tblGroup_id
                WHERE
                    tblGroupUser_accountId = :acid'
            );
            $stmt->bind_param('acid', $this->getAccountID());
            $stmt->execute();
            $group = $stmt->fetch_array();
            $this->setGroup($group);
            #die(var_dump($this->getGroup()));
        }
    }

    public function loginUser($loginData) {
        $this->validateLoginName($loginData['loginName']);
        $this->validatePassword($loginData['loginPwd']);

        if(in_array(1, $this->getAccountError()))
            return false;
        else {
            $this->getGroupInformation($this->getAccountID());
            return true;
        }
    }

    public function loginUserByCookie() {
        if(isset($_COOKIE['gerki']) && !empty($_COOKIE['gerki'])) {
            if($this->validateCookieHash(unserialize($_COOKIE['gerki']['checksum'])) == true) {
                self::getGroupInformation(self::getAccountID());
                return true;
            } else
                return false;
        } else
            return false;
    }

    public function saveChecksum($hash, $accountID, $loginName) {
        if(!empty($hash) && !empty($accountID) && !empty($loginName)) {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'UPDATE
                    tblUserAccount
                SET
                    tblUserAccount_cookieHash = :chash
                WHERE
                    tblUserAccount_accId = :accountId
                AND
                    lower(tblUserAccount_loginName) = lower(:lname)'
            );
            $stmt->bind_param('chash', $hash);
            $stmt->bind_param('accountId', $accountID);
            $stmt->bind_param('lname', $loginName);
            $stmt->execute();
            }
    }

    /**
     * @param array $accountError
     */
    public function setAccountError($accountError)
    {
        $this->accountError[$accountError] = 1;
    }

    /**
     * @param null $error
     * @return array
     */
    public function getAccountError($error = NULL)
    {
        if(!empty($error))
        return $this->accountError[$error];
        else
            return $this->accountError;
    }

    /**
     * @param mixed $accountID
     */
    public function setAccountID($accountID)
    {
        $this->accountID = $accountID;
    }

    /**
     * @return mixed
     */
    public function getAccountID()
    {
        return $this->accountID;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param array $gameAccount
     */
    public function setGameAccount($gameAccount)
    {
        $this->gameAccount = $gameAccount;
    }

    /**
     * @return array
     */
    public function getGameAccount()
    {
        return $this->gameAccount;
    }

    /**
     * @param mixed $loginName
     */
    public function setLoginName($loginName)
    {
        $this->loginName = $loginName;
    }

    /**
     * @return mixed
     */
    public function getLoginName()
    {
        return $this->loginName;
    }

    /**
     * @param mixed $loginPwd
     */
    public function setLoginPwd($loginPwd)
    {
        $this->loginPwd = $loginPwd;
    }

    /**
     * @return mixed
     */
    public function getLoginPwd()
    {
        return $this->loginPwd;
    }

    public function __destruct() {

    }

    /**
     * @param array $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return array
     */
    public function getGroup()
    {
        return $this->group;
    }



}
