<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class App_Controller_Energo extends App_Controller_Abstract
{
    /**
     * Constructor
     *
     * @param Framework_Request $request
     */
    public function __construct(Framework_Di $di)
    {
        $this->_di = $di;
        $this->_model = new App_Model_Energo();
        $this->_view = new App_View_Energo($di->get('Templating'));
    }


    /**
     * Default action
     */
    public function view()
    {
        $this->_view->getContent($this->_model->getData());
    }
}