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
     * Start routing
     */
    public static function run()
	{
        $request = new Framework_Request();

		// Initialize default controller and action
		$controllerName = self::_getControllerName($request, 'App_Controller_404');
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


    private static function _getControllerName($request = null, $default = null)
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
