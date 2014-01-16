<?php
/**
 * Filename class.Registration.inc.php.
 * User: 'Barracuda'
 * Date: 08.01.14
 * Time: 22:22
 */

namespace eCMS\Account;


use eCMS\database\db;
use eCMS\Misc\miscellaneous;

class Registration {

    private $loginName;
    private $password;
    private $email;
    public $registrationError = array(
        'noLoginName' => 0,
        'loginAlreadyExists' => 0,
        'noLoginPwd' => 0,
        'noLoginPwdRepeat' => 0,
        'noEmail' => 0,
        'noEmailRepeat' => 0,
        'loginNameTooShort' => 0,
        'pwdNotPwdRepeat' => 0,
        'pwdTooShort' => 0,
        'emailNotEmailRepeat' => 0,
        'wrongEmailSyntax' => 0,
        'emailAlreadyExists' => 0,
        'noPrivacy' => 0
    );

    public function __construct() {}

    private function validateLoginName($loginName) {
        if(empty($loginName))
            $this->registrationError['noLoginName'] = 1;
        elseif(strlen($loginName) < 3)
            $this->registrationError['loginNameTooShort'] = 1;
        else {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                    tblUserAccount_loginName
                FROM
                    tblUserAccount
                WHERE
                    lower(tblUserAccount_loginName) = lower(:lName)'
            );
            $stmt->bind_param('lName', $loginName);
            $stmt->execute();
            $result = $stmt->fetch_assoc();
            if($result == false)
                $this->loginName = $loginName;
            else
                $this->registrationError['loginAlreadyExists'] = 1;

        }
    }

    private function validatePassword($pwd, $pwdRepeat) {
        if(empty($pwd))
            $this->registrationError['noLoginPwd'] = 1;

        if(empty($pwdRepeat))
            $this->registrationError['noLoginPwdRepeat'] = 1;

        if(strlen($pwd) < 6)
            $this->registrationError['pwdTooShort'] = 1;

        if($this->registrationError['noLoginPwd'] == 0 && $this->registrationError['noLoginPwdRepeat'] == 0) {
            if($pwd != $pwdRepeat)
                $this->registrationError['pwdNotPwdRepeat'] = 1;
        }

        if($this->registrationError['noLoginPwd'] == 0 && $this->registrationError['noLoginPwdRepeat'] == 0 &&
            $this->registrationError['pwdTooShort'] == 0 && $this->registrationError['pwdNotPwdRepeat'] == 0)
            $this->password = miscellaneous::hasher($pwd);
    }

    private function validateEmail($email, $emailRepeat) {
        if (empty($email))
            $this->registrationError['noEmail'] = 1;
        else
            $this->registrationError['noEmail'] = 0;

        if (empty($emailRepeat))
            $this->registrationError['noEmailRepeat'] = 1;
        else
            $this->registrationError['noEmailRepeat'] = 0;
        if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email))
            $this->registrationError['emailNotAnEmail'] = 1;
        else
            $this->registrationError['emailNotAnEmail'] = 0;

        if ($this->registrationError['noEmail'] == 0 && $this->registrationError['noEmailRepeat'] == 0) {
            if ($email != $emailRepeat)
                $this->registrationError['emailNotEmailRepeat'] = 1;
            else
                $this->registrationError['emailNotEmailRepeat'] = 0;
        }

        if ($this->registrationError['noEmail'] == 0 && $this->registrationError['noEmailRepeat'] == 0 &&
            $this->registrationError['emailNotAnEmail'] == 0 && $this->registrationError['emailNotEmailRepeat'] == 0)
        {
            $db = db::getInstance();
            $stmt = $db->prepare(
                'SELECT
                    tblUserAccount_loginName
                FROM
                    tblUserAccount
                WHERE
                    lower(tblUserAccount_email) = lower(:accountmail)'
            );
            $stmt->bind_param('accountmail', $email);
            $stmt->execute();
            $result = $stmt->fetch_assoc();
            if($result == false)
                $this->email = $email;
            else
                $this->registrationError['emailAlreadyExists'] = 1;
        }
    }

    private function validatePrivacy($privacy) {
        if(empty($privacy) || $privacy == false)
            $this->registrationError['noPrivacy'] = 1;
    }

    private function validateData($accountData) {
        $this->validateLoginName($accountData['loginName']);
        $this->validatePassword($accountData['loginPwd'], $accountData['loginPwd_repeat']);
        $this->validateEmail($accountData['email'], $accountData['email_repeat']);
        $this->validatePrivacy($accountData['privacy']);

        if (in_array(1, $this->registrationError))
            return false;
        else
            return true;
    }

    public function addAccount($accountData) {
        if (!isset($accountData)) {
            // Error Handling
            return false;
        } else {
            if ($this->validateData($accountData) == false)
                return false;
            else {
                $db = db::getInstance();
                $stmt = $db->prepare(
                    'INSERT INTO
                        tblUserAccount
                    SET
                        tblUserAccount_loginName = :lName,
                        tblUserAccount_pwd = :password,
                        tblUserAccount_email = :accountmail'
                );
                $stmt->bind_param('lName', $this->loginName);
                $stmt->bind_param('password', $this->password);
                $stmt->bind_param('accountmail', $this->email);
                $stmt->execute();
                return true;
            }
        }
    }

    public function __destruct() {}
}
