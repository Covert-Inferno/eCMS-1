<?php
/**
 * Filename: class.mysql_statement.inc.php
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 16:49
 */

namespace eCMS\database;


class mysql_statement extends statement {

    public $error = array();
    public $lastid;
    public $rows;
    private $dbh;
    private $query;
    private $result;
    private $binds;

    public function __construct($query, $dbh) {
        $this->dbh = $dbh;
        $this->query = $query;
    }

    public function execute()
    {
        $binds = func_get_args();
        foreach($binds as $index => $name)
            $this->binds[$index] = $name;

        if(is_array($this->binds)) {
            foreach($this->binds as $placeholder => $replace) {
                if(is_numeric($replace))
                    $this->query = str_replace(":$placeholder", mysql_real_escape_string($replace, $this->dbh), $this->$query);
                else
                    $this->query = str_replace(":$placeholder", '"' . mysql_real_escape_string($replace, $this->dbh) . '"', $this->query);
            }
        }
        $this->result = mysql_query($this->query);
        if(mysql_errno($this->dbh))
            $this->error['execute'] = mysql_errno($this->dbh) . ': ' . mysql_error($this->dbh);

        if(!$this->result)
            print_r($this->error);

        $this->lastid = mysql_insert_id($this->dbh);
        if(mysql_errno($this->dbh))
            $this->error['execute'] = mysql_errno($this->dbh) . ': ' . mysql_error($this->dbh);
    }

    public function bind_param($placeholder, $replace)
    {
        return $this->binds[$placeholder] = $replace;
    }

    public function fetch_array()
    {
        $resArray = '';
        if(!$this->result)
            die('fetch_array: No result resource');

        while($result = mysql_fetch_assoc($this->result)) {
            if(mysql_errno($this->dbh))
                $this->error['fetch_array'] = mysql_errno($this->dbh) . ': ' . mysql_error($this->dbh);
            else
                $resArray[] = $result;
        }
        return $resArray;
    }

    public function fetch_assoc()
    {
        if(!$this->result)
            die('fetch_assoc: No result resource');
        $result = mysql_fetch_assoc($this->result);
        if(mysql_errno($this->dbh))
            $this->error['fetch_assoc'] = mysql_errno($this->dbh) . ': ' . mysql_error($this->dbh);
        return $result;
    }

    public function getNumRows()
    {
        return $this->rows = mysql_num_rows($this->result);
    }

    public function __destroy() {}
}
