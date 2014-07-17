<?php
/**
 * 404 page view class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

use Framework\MVC\View;

/**
 * Class App_View_404
 */
class App_View_404 extends View
{
    public function render($template, $data = null)
    {
        include ($template);
    }
}