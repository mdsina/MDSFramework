<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


class Framework_DataSource_Provider
{
    protected $_connection;

    /**
     * @var Framework_DataSource_Query_Interface
     */
    protected $_query;


    /**
     * Create DataSource provider
     *
     * @param string $queryProvider
     * @param array $params - Connection params, see PDO connection class for details
     * @param string $connectionProvider
     */
    public function __construct($queryProvider, array $params = [], $connectionProvider = 'PDO')
    {
        $defaultQueryProvider = 'Framework_DataSource_Query_MySQL';

        if (class_exists('Framework_DataSource_Connection_' . $connectionProvider)) {
            $connectionProvider = 'Framework_DataSource_Connection_' . $connectionProvider;
        }

        if (class_exists('Framework_DataSource_Query_' . $queryProvider)) {
            $defaultQueryProvider = 'Framework_DataSource_Query_' . $queryProvider;
        }

        $this->_connection = new $connectionProvider($params);
        $this->_query = new $defaultQueryProvider($this->_connection);
    }


    /**
     * Get query provider
     *
     * @return Framework_DataSource_Query_Interface
     */
    public function getQueryProvider()
    {
        return $this->_query;
    }
}