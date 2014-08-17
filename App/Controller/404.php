<?php
/**
 * 404 controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

namespace App\Controller;

use Framework\MVC\Controller;
use Framework\Di\Di;

class NotFound extends Controller
{
    public function __construct(Di $di)
    {
        $this->setView(new \App\View\NotFound($di->getNew('Templating')));
        return $this;
    }

    public function viewAction()
    {
        $this->getView()->render('templates/404.tpl');
    }
}