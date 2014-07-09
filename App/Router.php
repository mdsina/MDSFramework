<?php
/**
 * Router
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Router
 */
class App_Router
{

    /**
     * App_Router instance
     *
     * @var App_Router
     */
    protected static $_instance;


    /**
     * @var Framework_Di
     */
    protected $_di;


    /**
     * Get App_Router instance
     *
     * @return App_Router
     */
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }


    /**
     * Start routing
     *
     * @param Framework_Di $di
     * @throws Framework_Exception_Page
     */
    public function run(Framework_Di $di)
	{
        $this->_di = $di;
        $request = $di->getStatic('Request');

		// Initialize default controller and action
		$controllerName = $this->_getControllerName('App_Controller_404');
		$actionName = $request->getActionName('view');

		// Try to create controller
        try {
            $controller = new $controllerName($di, $request);
        } catch (Framework_Exception_Class $e) {
            $error = new App_Controller_404($di);
            $error->view();
            exit();
        }

        // Call action from controller
		if (method_exists($controller, $actionName)) {
		    $controller->$actionName();
		} else {
			throw new Framework_Exception_Page();
		}
	}


    /**
     * Get Controller name from routes map
     *
     * @param null $default
     * @return int|null|string
     */
    private function _getControllerName($default = null)
    {
        require_once($this->_di->getStatic('Params')->getParams('routes_file'));

        $path = $this->_di->getStatic('Request')->getRequest();

        foreach ($routes as $controller => $route) {
            if (in_array($path, $route)) {
                return $controller;
            }
        }

        return $default;
    }
}
