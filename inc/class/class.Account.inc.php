<?php
/**
 * Created by PhpStorm.
 * User: Dominic
 * Date: 07.01.14
 * Time: 12:14
 */

namespace eCMS\Account;


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

    public function __construct() {

    }

    private function validateLoginName($loginName) {
        if(empty($loginName))
            $this->setAccountError('noLoginName');
        else {
            /** Establish database connection and select proper user */
        }
    }

    private function validatePassword($password) {
        if(empty($password))
            $this->setAccountError('noLoginPwd');
        else {
            /** Establish database connection and select proper user */
        }
    }

    public function loginUser($loginData) {
        $this->validateLoginName($loginData['loginName']);
        $this->validatePassword($loginData['loginPwd']);

        if(in_array(1, $this->getAccountError()))
            return false;
        else {
            #$this->gatherInformation();
            return true;
        }
    }

    /**
     * @param array $accountError
     */
    public function setAccountError($accountError)
    {
        /** @noinspection PhpIllegalArrayKeyTypeInspection */
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

} 