<?php

// Try to start routing
$di = new Framework_Di();

$di->set('Params', function() {
    return Framework_Params::getInstance('App/params.php');
});

$di->set('Templating', function() use ($di) {
    $type = $di->get('Params')->getParams(['templating']);
    return Framework_Templating_Factory::getInstance($type['templating']);
});

$di->set('Request', function() {
   return Framework_Request::getInstance();
});

try {
    App_Router::getInstance()->run($di);
} catch (Framework_Exception_Page $e) {
    $error = new App_Base_Controller_404();
    $error->view();
}

