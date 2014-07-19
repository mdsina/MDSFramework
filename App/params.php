<?php

$params = [
    'mysql' => [
        'host' => 'localhost',
        'port' => '',
        'login' => '',
        'password' => '',
        'db' => '',
        'provider' => 'mysql'
    ],

    'templating' => 'Smarty',

    'routes_file' => 'App/routes.php',

    'smarty' => [
        'path' => 'App/Vendors/Smarty-3.1.19/libs/',
        'file' => 'Smarty.class.php',
        'template_dir' => 'templates',
        'compile_dir' => 'templates_c',
        'config_dir' => 'configs',
        'cache_dir' => 'cache'
    ],

    'cookie' => [
        'encryption_key' => '@#!^%&(-=_+*#№?'
    ]

];
