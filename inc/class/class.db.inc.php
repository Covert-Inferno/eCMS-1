<?php
/**
 * Filename: class.db.inc.php
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 16:07
 *
 * Main class for database handling. Is used to handle different database types.
 * Currently supporting MySQL.
 */

namespace eCMS\database;


class db {

    static $type;
    static $host = false;
    static $port = false;
    static $user = false;
    static $pwd = false;
    static $dbname = false;
    static $instance = false;

    public function __construct() {}

    static function getType() {
        return self::$type;
    }

    static function setType($type) {
        self::$type = $type;
    }

    static function getInstance() {
        if(self::$instance === false) {
            switch(self::getType()):
                case 'mysql':
                    mysql_db::$host = self::$host;
                    mysql_db::$user = self::$user;
                    mysql_db::$pwd = self::$pwd;
                    mysql_db::$dbname = self::$dbname;
                    self::$instance = mysql_db::getInstance();
                    break;
                default:
                    die('No database of type ' . self::getType() . ' found');
            endswitch;
        }
        return self::$instance;
    }

    /**
     * @param boolean $dbname
     */
    public static function setDbname($dbname)
    {
        self::$dbname = $dbname;
    }

    /**
     * @return boolean
     */
    public static function getDbname()
    {
        return self::$dbname;
    }

    /**
     * @param boolean $host
     */
    public static function setHost($host)
    {
        self::$host = $host;
    }

    /**
     * @return boolean
     */
    public static function getHost()
    {
        return self::$host;
    }

    /**
     * @param boolean $port
     */
    public static function setPort($port)
    {
        self::$port = $port;
    }

    /**
     * @return boolean
     */
    public static function getPort()
    {
        return self::$port;
    }

    /**
     * @param boolean $pwd
     */
    public static function setPwd($pwd)
    {
        self::$pwd = $pwd;
    }

    /**
     * @return boolean
     */
    public static function getPwd()
    {
        return self::$pwd;
    }

    /**
     * @param boolean $user
     */
    public static function setUser($user)
    {
        self::$user = $user;
    }

    /**
     * @return boolean
     */
    public static function getUser()
    {
        return self::$user;
    }



    public function __destruct() {}
}
