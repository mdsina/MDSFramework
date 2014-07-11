<?php
/**
 * 404 controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class App_Controller_404 extends Framework_Base_Controller
{
    public function __construct(Framework_Di $di)
    {
        $this->setView(new App_View_404($di->getNew('Templating')));
        return $this;
    }

    public function view()
    {
        $this->getView()->render('templates/404.tpl');
    }
}