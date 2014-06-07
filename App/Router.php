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
     */
    public function run()
	{
        $request = new Framework_Request();

		// Initialize default controller and action
		$controllerName = $this->_getControllerName($request, 'App_Controller_404');
		$actionName = $request->getActionName('view');

		// Try to create controller
        try {
            $controller = new $controllerName($request);
        } catch (Framework_Exception_Class $e) {
            $error = new App_Controller_404();
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
