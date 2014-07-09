<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class Framework_Templating_Factory
{

    /**
     * @var Framework_Templating_Interface
     */
    protected $_templater;


    /**
     * @param string $type
     */
    public function __construct($type)
    {
        $defaultTemplater = 'Framework_Templating_Native';
        if (class_exists('Framework_Templating_' . $type)) {
            $defaultTemplater = 'Framework_Templating_' . $type;
        }

        $this->_templater = new $defaultTemplater;
    }


    /**
     * Change templater
     *
     * @param Framework_Templating_Interface $templater
     */
    public function setTemplater(Framework_Templating_Interface $templater)
    {
        $this->_templater = $templater;
    }


    /**
     * Render template
     *
     * @param string $template
     * @param array $data
     */
    public function render($template, array $data)
    {
        $this->_templater->render($template, $data);
    }
}