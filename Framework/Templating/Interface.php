<?php
/**
 * Base interface for templating
 *
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

interface Framework_Templating_Interface
{
    public function render($template, $data);
    public function generate($data);
}