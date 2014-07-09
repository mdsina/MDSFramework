<?php
/**
 * Base abstract controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Controller_Abstract
 */
class App_Controller_Abstract
{
    protected $_model;
    protected $_view;
    protected $_di;

    /**
     * Constructor
     *
     * @param Framework_Request $request
     */
    public function __construct(Framework_Di $di)
    {
        $this->_view = new App_View_Abstract($di->getStatic('Templating'));
        $this->_model = new App_Model_Abstract($di);
        $this->_di = $di;
    }


    /**
     * Default action
     *
     * @return $this
     */
    function view()
    {
        return $this;
    }
}