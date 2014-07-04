<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class Framework_Templating_Native implements Framework_Templating_Interface
{
    public function render($template, array $data)
    {
        $renderData = $data;
        include($template);
    }
}