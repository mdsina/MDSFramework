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
        $request = $di->get('Request');

		// Initialize default controller and action
		$controllerName = $this->_getControllerName($request, 'App_Controller_404');
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
     * @param null $request
     * @param null $default
     * @return int|null|string
     */
    private function _getControllerName($request = null, $default = null)
    {
        require_once('App/routes.php');

        if (!$request) {
            return null;
        }

        $path = $request->getRequest();

        foreach ($routes as $controller => $route) {
            if (in_array($path, $route)) {
                return $controller;
            }
        }

        return $default;
    }
}
