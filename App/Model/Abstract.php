<?php
/**
 * Base abstract model class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Model_Abstract
 */
class App_Model_Abstract
{
    protected $_di;

    public function __construct()
    {
       // $this->_di = $di;
    }

    /**
     * prepare data from database/storage and get it
     */
    public function getData()
	{
	}
}