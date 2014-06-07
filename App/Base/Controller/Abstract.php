<?php
/**
 * Base abstract controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Base_Controller_Abstract
 */
class App_Base_Controller_Abstract
{
    protected $_model;
    protected $_view;
    protected $_request;

    /**
     * Constructor
     *
     * @param Framework_Request $request
     */
    public function __construct($request = null)
    {
        $this->_view = new App_Base_View_Abstract();
        $this->_model = new App_Base_Model_Abstract();

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