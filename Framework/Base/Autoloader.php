<?php
/**
 * Main class auto loader
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class Framework_Base_Autoloader
 */
class Framework_Base_Autoloader
{
    /**
     * Constructor
     * Initializing SPL autoloader
     */
    public function __construct()
    {
        spl_autoload_register(array('Framework_Base_Autoloader', '_load'));
    }


    /**
     * Loading class by name
     *
     * @param $className
     * @return array|bool
     * @throws Framework_Exception_Class
     */
    protected function _load($className)
    {
        if (empty($className) || !is_string($className)) {
            return array('error' => 'class ' . $className . ' is not loaded');
        }

        $path = str_replace('_', DIRECTORY_SEPARATOR, $className);
        $path .= '.php';

        if (!is_readable($path)) {
            throw new Framework_Exception_Class();
            //return false;
        }

        require_once($path);
        return true;
    }
}