<?php
/**
 * Abstract for working with db
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

abstract class Framework_ActiveRecord_Abstract implements Framework_ActiveRecord_Api
{
    protected $_connection;
    protected $_dbName;
    protected $_login;
    protected $_password;
    protected $_host;

    public function where($filed, $value)
    {

    }

    public function select($fields)
    {

    }

    public function groupBy($groups)
    {

    }

    public function limit($limit)
    {

    }

    public function raw($query)
    {

    }
}