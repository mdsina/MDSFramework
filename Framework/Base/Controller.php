<?php
/**
 * Base abstract controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class Framework_Base_Controller
 */
abstract class Framework_Base_Controller
{
    private $_model;
    private $_view;
    private $_di;

    /**
     * Constructor
     *
     * @param Framework_Request $request
     */
    public function __construct(Framework_Di $di)
    {
        $this->_view = new Framework_Base_View($di->get('Templating'));
        $this->_model = new Framework_Base_Model($di);
        $this->_di = $di;
    }


    /**
     * set DIC
     *
     * @param Framework_Di $di
     */
    protected function setDi(Framework_Di $di)
    {
        $this->_di = $di;
    }


    /**
     * get DIC
     *
     * @return Framework_Di
     */
    protected function getDi()
    {
        return $this->_di;
    }


    /**
     * set View
     *
     * @param Framework_Base_View $view
     */
    protected function setView(Framework_Base_View $view)
    {
        $this->_view = $view;
    }


    /**
     * get View
     *
     * @return Framework_Base_View
     */
    protected function getView()
    {
        return $this->_view;
    }


    /**
     * set Model
     *
     * @param Framework_Base_Model $model
     */
    protected function setModel(Framework_Base_Model $model)
    {
        $this->_model = $model;
    }


    /**
     * get Model
     *
     * @return Framework_Base_Model
     */
    protected function getModel()
    {
        return $this->_model;
    }


    /**
     * Do something before any action
     */
    protected function _beforeAction() {}


    /**
     * Do something after any action
     */
    protected function _afterAction() {}


    /**
     * @param string $name - call function name
     * @param array $args - function arguments
     * @return bool|mixed
     */
    public function __call($name, $args)
    {
        $name = $name . 'Action';
        if (!method_exists($this, $name )) {
            return false;
        }

        $reflection = new ReflectionMethod($this, $name);

        if (!$reflection->isPublic()) {
            return false;
        }

        $this->_beforeAction();
        call_user_func_array([$this, $name], $args);
        $this->_afterAction();

        return true;
    }


    /**
     * Default action
     *
     * @return $this
     */
    public function viewAction()
    {
        return $this;
    }
}