<?php

ini_set('display_errors', 1);

require_once('Framework/Base/Autoloader.php');
$autoloader = new Framework\Base\Autoloader();
$autoloader->register();

require_once 'App/Bootstrap.php';