<?php
/**
 * 404 controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class App_Controller_404 extends App_Controller_Abstract
{
    public function __construct(Framework_Di $di)
    {
        $this->_view = new App_View_404($di->get('Templating'));
        return $this;
    }

    public function view()
    {
        $this->_view->render('templates/404.tpl');
    }
}