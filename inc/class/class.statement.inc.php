<?php
/**
 * Filename: class.statement.inc.php
 * User: 'Barracuda'
 * Date: 07.01.14
 * Time: 16:48
 */

namespace eCMS\database;


abstract class statement {

    public abstract function execute();

    public abstract function bind_param($placeholder, $replace);

    public abstract function fetch_array();

    public abstract function fetch_assoc();

    public abstract function getNumRows();

} 