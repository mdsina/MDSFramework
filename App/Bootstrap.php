<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

$di = new Framework_Di();

$di->set('Params', function() {
    return new Framework_Params('App/params.php');
});

$di->set('Templating', function() use ($di) {
    $type = $di->get('Params')->getParams('templating');
    $factory = new Framework_Templating_Factory($type);
    $factory->initTemplater();
    return $factory->getTemplater();
});

$di->set('Request', function() {
   return new Framework_Request();
});

$di->set('MySQL', function() use ($di) {
    $connectionParams = $di->get('Params')->getParams('mysql');
    $provider = new Framework_DataSource_Provider('MySQL', $connectionParams);
    return $provider->getQueryProvider();
});

$di->set('Cookie', function () {
   return new Framework\Cookie\CookieManager();
});

try {
    App_Router::getInstance()->run($di);
} catch (Framework_Exception_InvalidArgument $e) {
    echo $e->getMessage();
} catch (Framework_Exception_Page $e) {
    echo $e->getMessage();
}

