<?php
/**
 * main search page's view class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

use Framework\MVC\View;
use Framework\Templating\Factory;

/**
 * Class App_View_Main
 */
class App_View_Main extends View
{

    public function __construct(array $params = [])
    {
        $factory = new Factory('Smarty', $params);
        $factory->initTemplater();
        $this->setTemplater($factory->getTemplater());
        $this->getTemplater()->setCaching(false);
    }

    /**
     * get full page content
     *
     * @param array $data
     */
    public function getContent($data)
    {
        $this->setData($data['data']);
        $this->render('templates/main.tpl', $data['extended']);
    }
}