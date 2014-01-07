<?php
/**
 * Filename: class.structure.inc.php
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 16:15
 */

namespace eCMS\database;


abstract class structure {

    public abstract static function getInstance();

    public abstract function prepare($query);

    public abstract function execute($query);

    public abstract function error();

    abstract protected function connect();

}
