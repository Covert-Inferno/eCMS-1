<?php
/**
 * Filename: class.mysql_db.inc.php
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 16:13
 */

namespace eCMS\database;


/**
 * @property mixed lastid
 */
class mysql_db extends structure {

    static $instance = false;
    static $host = false;
    static $user = false;
    static $pwd = false;
    static $dbname = false;
    private $error = array();
    private $dbh;
    private $result;

    private function __construct() {
        $this->connect();
    }

    public static function getInstance()
    {
        if(self::$instance === false)
            self::$instance = new mysql_db();
        return self::$instance;
    }

    public function prepare($query)
    {
        if(!$this->dbh)
            $this->connect();
        return new mysql_statement($query, $this->dbh);
    }

    public function execute($query)
    {
        if(!$this->dbh)
            $this->connect();
        $this->result = mysql_query($query, $this->dbh);
        $this->lastid = mysql_insert_id($this->dbh);
        if(mysql_errno($this->dbh))
            $this->error['execute'] = mysql_errno($this->dbh) . ': ' . mysql_error($this->dbh);
        return new mysql_statement($query, $this->dbh);
    }

    public function error()
    {
        return $this->error;
    }

    protected function connect()
    {
        if(!$this->dbh) {
            $this->dbh = mysql_connect(self::$host, self::$user, self::$pwd) or die('Connection could not be established');
            mysql_select_db(self::$dbname) or die('Database could not be found');

            if(mysql_errno($this->dbh)) {
                $this->error['connection'] = mysql_errno($this->dbh) . ': ' . mysql_error($this->dbh);
            }
        }
        return $this->dbh;
    }
}