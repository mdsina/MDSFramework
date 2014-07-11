<?php
/**
 * Main page controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class App_Controller_Main extends Framework_Base_Controller
{

    /**
     * Constructor
     *
     * @param Framework_Di $di
     */
    public function __construct(Framework_Di $di)
    {
        $this->setDi($di);
        $this->setModel(new App_Model_Main());
        $this->setView(new App_View_Main());
    }


    /**
     * Default action
     *
     * @return $this|void
     */
    public function viewAction()
    {
        $request = $this->getDi()->get('Request');
        $params['query'] = $request->getData('query', '');
        $params['api'] = $request->getData('api', 'google');
        $params['count'] = $request->getData('count', 8);

        $fullData['data'] = $this->getModel()->getData($params);
        $fullData['extended']['query'] = $params['query'];

        $this->getView()->getContent($fullData);
    }
}