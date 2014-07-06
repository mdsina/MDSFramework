<?php
/**
 * 404 page view class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_View_404
 */
class App_View_404 extends App_View_Abstract
{
    public function render($template, $data = null)
    {
        include ($template);
    }
}