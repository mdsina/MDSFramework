<?php
/**
 * 404 controller class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class App_Controller_404 extends App_Base_Controller_Abstract
{
    public function __construct()
    {
        $this->_view = new App_View_404();
        return $this;
    }

    public function view()
    {
        $this->_view->render('templates/404.tpl');
    }
}