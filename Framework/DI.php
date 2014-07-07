<?php
/**
 * Base Dependency Injection class for working with services and API
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class Framework_Di
{

    /**
     * Services, store anonymous functions
     *
     * @var array
     */
    protected $_services = [];


    /**
     * Store service
     *
     * @param string $serviceName
     * @param $function - anonymous function
     */
    public function set($serviceName, $function)
    {
        $this->_services[$serviceName] = $function;
    }


    /**
     * Call service
     *
     * @param string $serviceName
     * @return anonymous function result stored in _services
     */
    public function get($serviceName)
    {
        return $this->_services[$serviceName]($this);
    }
}