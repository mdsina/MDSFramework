<?php
/**
 * 404 page view class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

namespace App\View;

use Framework\MVC\View;

/**
 * Class NotFound
 */
class NotFound extends View
{
    public function render($template, $data = null)
    {
        include ($template);
    }
}