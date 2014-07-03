<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class Framework_Templating_XSLT implements Framework_Templating_Interface
{
    public function __construct()
    {

    }

    public function generate($data)
    {
        $dom = new DOMDocument('1.0');

        $rootNode = $dom->appendChild($dom->createElement('page'));


    }

    public function render($template, $data)
    {

    }
}