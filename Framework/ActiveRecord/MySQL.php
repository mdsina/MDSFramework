<?php
/**
 * Work with MySQL
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


class Framework_ActiveRecord_MySQL extends Framework_ActiveRecord_Abstract
{

    protected $_where = [];
    protected $_select = [];

    /**
     * Pointer to last connection
     *
     * @var resource
     */
    protected $_connection;


    /**
     * Constructor. Set parameters for connection
     *
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->_login = !empty($params['login']) ? $params['login'] : null;
        $this->_password = !empty($params['password']) ? $params['password'] : null;
        $this->_dbName = !empty($params['db']) ? $params['db'] : null;
        $this->_host = !empty($params['host']) ? $params['host'] : null;

        $this->getConnection();

        try {
            $this->_selectDataBase($this->_dbName);
        } catch (Framework_Exception_MySQL_Db $e) {
            echo $e->getMessage();
        }
    }


    /**
     * where in query
     *
     * syntax like this (..->where('someValue > ?', 3), ...->where('someValue IN(?)', [1,2,3,4]))
     *
     * @param $field
     * @param $value
     */
    public function where($field, $value)
    {
        $value = array($value);
        $this->_where[] = preg_replace('/\?/', implode(',', $value) , $field);
    }


    /**
     * select fields from db
     *
     * @param $fields
     */
    public function select($fields)
    {
        if (empty($fields)) {
            $fields = ['*'];
        }

        $this->_select = array_merge($this->_select, $fields);
    }


    /**
     * Get connection or new instance of it
     *
     * (Please, don't use $newConnection!, use _getNewConnection([], true))
     *
     * @param bool $newConnection
     * @return null|resource
     */
    public function getConnection($newConnection = false)
    {
        // Ugh... add functionality for more connections it's good idea, but now I need in some connections pool storage
        // TO-DO: add connections pool!!!!!

        //by some time I think, it's bad idea to store link to connection in this object, who want it - store it
        if (!$this->_connection || $newConnection) {
            try {
                $this->_connection = $this->_getNewConnection(null, $newConnection);
            } catch (Framework_Exception_MySQL_Connection $e) {
                echo $e->getMessage();
            }
        }

        return $this->_connection;
    }


    /**
     * Set our preinitialized connection
     *
     * @param null $connection
     * @param null $default
     * @return bool|null
     */
    public function setConnection($connection = null, $default = null)
    {
        if (!$connection) {
            return $default;
        }

        $this->_connection = $connection;

        return true;
    }


    /**
     * Create connection
     *
     * @param array $params
     * @return null|resource
     * @throws Framework_Exception_MySQL_Connection
     */
    protected function _getNewConnection(array $params = [], $newConnection = false)
    {
        $connectionParams = [];

        if (!empty($params) && in_array(['login', 'password', 'host'], $params)) {
            $connectionParams = $params;
        } elseif (!empty($this->_login) && !empty($this->_host) && !empty($this->_password)) {
            $connectionParams['login'] = $this->_login;
            $connectionParams['host'] = $this->_host;
            $connectionParams['password'] = $this->_password;
        } else {
            return null;
        }

        $connection = @mysql_connect(
            $connectionParams['host'],
            $connectionParams['login'],
            $connectionParams['password'],
            $newConnection
        );

        if (!$connection) {
            throw new Framework_Exception_MySQL_Connection('Failed to connect to MySQL server: ' . mysql_error());
        }

        return $connection;

    }


    /**
     * Get database from connection
     *
     * @param string $dbName
     * @param null $default
     * @return bool|null
     * @throws Framework_Exception_MySQL_Db
     */
    protected function _selectDataBase($dbName = '', $default = null)
    {
        if (!$this->getConnection() || empty($dbName)) {
            return $default;
        }

        $dataBaseStatus = @mysql_select_db($dbName, $this->getConnection());

        if (!$dataBaseStatus) {
            throw new Framework_Exception_MySQL_Db(mysql_error());
        }

        return $dataBaseStatus;
    }
}