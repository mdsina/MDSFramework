<?php
/**
 * Main page controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class App_Controller_Main extends App_Controller_Abstract
{

    /**
     * Constructor
     *
     * @param Framework_Di $di
     */
    public function __construct(Framework_Di $di)
    {
        $this->_di = $di;
        $this->_model = new App_Model_Main();
        $this->_view = new App_View_Main();
    }


    /**
     * Default action
     *
     * @return $this|void
     */
    public function view()
    {
        $request = $this->_di->getStatic('Request');
        $params['query'] = $request->getData('query', '');
        $params['api'] = $request->getData('api', 'google');
        $params['count'] = $request->getData('count', 8);

        $fullData['data'] = $this->_model->getData($params);
        $fullData['extended']['query'] = $params['query'];

        $this->_view->getContent($fullData);
    }
}