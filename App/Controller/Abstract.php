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
    protected $_request;
    protected $_di;

    /**
     * Constructor
     *
     * @param Framework_Request $request
     */
    public function __construct(Framework_DI $di = null, $request = null)
    {
        $this->_view = new App_View_Abstract();
        $this->_model = new App_Model_Abstract($di);
        $this->_di = $di;

        if ($request instanceof Framework_Request) {
            $this->_request = $request;
        }
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