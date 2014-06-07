<?php

// Try to start routing
try {
    App_Router::getInstance()->run();
} catch (Framework_Exception_Page $e) {
    $error = new App_Base_Controller_404();
    $error->view();
}

