<?php
/**
 * Working with requests
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class Framework_Request
 */
class Framework_Request
{
    // user's query
    protected $_query;

    // full request
    protected $_request;

    protected $_actionName;

    // all path tokens without query
    protected $_path = [];

    // data from POST or GET query
    protected $_data = [];


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->_prepareQuery();
    }


    /**
     * Prepare params from user's query
     */
    private function _prepareQuery()
    {
        if (!empty($_SERVER['QUERY_STRING'])) {
            $this->_query = $_SERVER['QUERY_STRING'];
        }

        if (!empty($_SERVER['REQUEST_URI'])) {
            $this->_request = trim(strtolower(explode('?', $_SERVER['REQUEST_URI'])[0]), '/');
            $tokens = explode('/', $this->_request);
            $this->_path = array_merge($this->_path, $tokens);
        }

        if (!empty($_GET)) {
            $query = $_GET;

            if (!empty($query['action'])) {
                $this->_actionName = $query['action'];
                unset($query['action']);
            }

            $this->_data = array_merge($this->_data, $query);
        }

        if (!empty($_POST)) {
            $query = $_POST;

            if (!empty($query['action'])) {
                unset($query['action']);
            }

            $this->_data = array_merge($this->_data, $query);
        }
    }


    /**
     * Return action name from request
     *
     * @param null $default
     * @return string|null
     */
    public function getActionName($default = null)
    {
        if (empty($this->_actionName)) {
            return $default;
        }

        return $this->_actionName;
    }


    /**
     * Get fields from request data
     *
     * @param array $filedList
     * @param mixed $default
     * @return array
     */
    public function getData($filedList = [], $default = null)
    {
        if (empty($filedList)) {
            return $this->_data;
        }

        if (empty($this->_data)) {
            return $default;
        }

        $result = [];

        if (count($filedList) == 1) {
            $field = reset($filedList);

            if (array_key_exists($field, $this->_data)) {
                $result = $this->_data[$field];
            } else {
                $result = $default;
            }

            return $result;
        }

        foreach($filedList as $field) {
            if (array_key_exists($field, $this->_data)) {
                $result[] = $this->_data[$field];
            }
        }

        return $result;
    }


    /**
     * Get user's query string
     *
     * @param null $default
     * @return string|null
     */
    public function getQuery($default = null)
    {
        if (empty($this->_query)) {
            return $default;
        }

        return $this->_query;
    }


    /**
     * Get request path
     *
     * @param null $default
     * @return string|null
     */
    public function getRequest($default = null)
    {
        if (empty($this->_request)) {
            return $default;
        }

        return $this->_request;
    }
}