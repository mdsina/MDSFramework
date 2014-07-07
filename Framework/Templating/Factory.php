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
     * @var Framework_Templating_Factory
     */
    protected static $_instance;


    /**
     * @param string $type
     */
    protected function __construct($type)
    {
        $defaultTemplater = 'Framework_Templating_Native';
        if (class_exists('Framework_Templating_' . $type)) {
            $defaultTemplater = 'Framework_Templating_' . $type;
        }

        $this->_templater = new $defaultTemplater;
    }


    /**
     * @param string $type
     * @return Framework_Templating_Factory
     */
    public static function getInstance($type)
    {
        if (self::$_instance === null) {
            self::$_instance = new self($type);
        }

        return self::$_instance;
    }


    /**
     * @param string $type
     * @return Framework_Templating_Factory
     */
    public static function getNewInstance($type)
    {
        return new self($type);
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