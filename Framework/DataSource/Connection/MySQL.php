<?php
/**
 * Work with MySQL
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


class Framework_DataSource_Connection_MySQL implements Framework_DataSource_Connection_Interface
{
    /**
     * Pointer to connection
     *
     * @var resource
     */
    protected $_connection;

    protected $_login;
    protected $_password;
    protected $_dbName;
    protected $_host;


    /**
     * @var Framework_DataSource_Connection_MySQL
     */
    protected $_instance;


    /**
     * Get instance of class
     *
     * @param array $params
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }


    /**
     * Initialize instance
     *
     * @param array $params
     */
    public function Initialize(array $params = [])
    {
        $this->_login = !empty($params['login']) ? $params['login'] : null;
        $this->_password = !empty($params['password']) ? $params['password'] : null;
        $this->_dbName = !empty($params['db']) ? $params['db'] : null;
        $this->_host = !empty($params['host']) ? $params['host'] : null;

        $this->_initConnection();

        try {
            $this->selectDataBase($this->_dbName);
        } catch (Framework_Exception_MySQL_Db $e) {
            echo $e->getMessage();
        }
    }


    /**
     * Get connection or new instance of it
     *
     * But now provide only one connection
     *
     * (Please, don't use $newConnection!, use _getNewConnection([], true))
     *
     * @return null|resource
     */
    protected function _initConnection(/*$newConnection = false*/)
    {
        // Ugh... add functionality for more connections it's good idea, but now I need in some connections pool storage
        // TO-DO: add connections pool!!!!!

        //by some time I think, it's bad idea to store link to connection in this object, who want it - store it
        if (!$this->getConnection() /*|| $newConnection*/) {
            try {
                $this->setConnection($this->_getNewConnection(/*null, $newConnection*/));
            } catch (Framework_Exception_MySQL_Connection $e) {
                echo $e->getMessage();
            }
        }

        return $this;
    }


    /**
     * Set our preinitialized connection
     *
     * @param null $connection
     * @param null $default
     * @return Framework_DataSource_Connection_MySQL
     */
    public function setConnection($connection = null)
    {
        $this->_connection = $connection;

        return $this;
    }


    /**
     * Get connection
     *
     * @param null $default
     * @return null|resource
     */
    public function getConnection($default = null)
    {
        if (!$this->_connection) {
            return $default;
        }

        return $this->_connection;
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
    public function selectDataBase($dbName = '', $default = null)
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