<?php
/**
 * Native render by php
 *
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class Framework_Templating_Native implements Framework_Templating_Interface
{

    use Framework_Templating_Base;

    /**
     * @param string $template
     * @param array $data
     */
    public function render($template, array $data)
    {
        $renderData = $data;
        include($template);
    }


    public function Initialize()
    {

    }
}