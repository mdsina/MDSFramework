<?php
/**
 * main search page's view class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_View_Main
 */
class App_View_Main extends App_Base_View_Abstract
{

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