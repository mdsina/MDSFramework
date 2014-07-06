<?php
/**
 * Smarty templating.
 *
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Base class for working with smarty. Only API and initialize.
 * Get Smarty object for work, because to support native work with
 * different versions of Smarty really hard and it's a bad idea.
 *
 * Class Framework_Templating_Smarty
 */
class Framework_Templating_Smarty implements Framework_Templating_Interface
{
    public function render($template, array $data)
    {

    }
}