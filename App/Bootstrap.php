<?php

// Try to start routing
$di = new Framework_Di();

$di->set('Params', function() {
    return new Framework_Params('App/params.php');
});

$di->set('Templating', function() use ($di) {
    $type = $di->getStatic('Params')->getParams('templating');
    return new Framework_Templating_Factory($type);
});

$di->set('Request', function() {
   return new Framework_Request();
});

try {
    App_Router::getInstance()->run($di);
} catch (Framework_Exception_InvalidArgument $e) {
    echo $e->getMessage();
} catch (Framework_Exception_Page $e) {
    $error = new App_Base_Controller_404();
    $error->view();
}

