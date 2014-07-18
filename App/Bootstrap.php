<?php

ini_set('display_errors','On');
error_reporting(E_ALL);

$di = new Framework\Di\Di();

$di->set('Params', function() {
    return new Framework\Params\Params('App/params.php');
});

$di->set('Templating', function() use ($di) {
    $type = $di->get('Params')->getParams('templating');
    $params = $di->get('Params')->getParams(mb_strtolower($type));
    $factory = new Framework\Templating\Factory($type, $params);
    $factory->initTemplater();
    return $factory->getTemplater();
});

$di->set('Request', function() {
   return new Framework\Request\Request();
});

$di->set('MySQL', function() use ($di) {
    $connectionParams = $di->get('Params')->getParams('mysql');
    $provider = new Framework\DataSource\Provider('MySQL', $connectionParams);
    return $provider->getQueryProvider();
});

$di->set('Cookie', function () {
   return new Framework\Cookie\CookieManager();
});

$di->get('Cookie')->create('test6', '', '123121251314124112');
$di->get('Cookie')->activate('test6');

try {
    App_Router::getInstance()->run($di);
} catch (Framework_Exception_InvalidArgument $e) {
    echo $e->getMessage();
} catch (Framework_Exception_Page $e) {
    echo $e->getMessage();
}

