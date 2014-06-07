<?php
/**
 * Base abstract model class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Base_Model_Abstract
 */
class App_Base_Model_Abstract
{
    protected $_request;


    /**
     * Constructor
     *
     * @param Framework_Request $request
     */
    public function __construct($request = null)
    {
        if ($request instanceof Framework_Request) {
            $this->_request = $request;
        }
    }


    /**
     * prepare data from database/storage and get it
     */
    public function getData()
	{
	}


    /**
     * get request data
     *
     * @param null $default
     * @return array
     */
    public function getRequest($default = null)
    {
        if (!$this->_request) {
            return $default;
        }

        return $this->_request;
    }
}