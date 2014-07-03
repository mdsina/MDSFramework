<?php
/**
 * Base Dependency Injection class for working with services and API
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class Framework_Di
{

    /**
     * Services, store anonymous function
     *
     * @var array
     */
    protected $_services = [];


    /**
     * Store service
     *
     * @param $service
     * @param $function
     */
    public function set($service, $function)
    {
        $this->_services[$service] = $function;
    }


    /**
     * Call service
     *
     * @param $service
     * @return mixed
     */
    public function get($service)
    {
        return $this->_services[$service]($this);
    }
}