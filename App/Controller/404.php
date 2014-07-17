<?php
/**
 * 404 controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

use Framework\MVC\Controller;
use Framework\Di\Di;

class App_Controller_404 extends Controller
{
    public function __construct(Di $di)
    {
        $this->setView(new App_View_404($di->getNew('Templating')));
        return $this;
    }

    public function viewAction()
    {
        $this->getView()->render('templates/404.tpl');
    }
}