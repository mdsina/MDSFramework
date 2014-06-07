<?php
/**
 * Main page controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class App_Controller_Main extends App_Base_Controller_Abstract
{

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

        $this->_model = new App_Model_Main($this->_request);
        $this->_view = new App_View_Main();
    }

    public function view()
    {
        $fullData['data'] = $this->_model->getData();
        $fullData['extended']['query'] = $this->_request->getData(array('query'), '');

        $this->_view->getContent($fullData);
    }
}