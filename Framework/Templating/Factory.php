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
    private $_templater;


    /**
     * @var string
     */
    private $_type;


    /**
     * @param string $type
     */
    public function __construct($type)
    {
        $this->setType($type);
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
     * get templater
     *
     * @return Framework_Templating_Interface
     */
    public function getTemplater()
    {
        return $this->_templater;
    }


    /**
     * Get type of templater
     *
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }


    /**
     * set templater type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }


    /**
     * Initialize templater by type
     *
     * @param string $type
     */
    public function initTemplater($type = null)
    {
        if (empty($type)) {
            $type =  $this->getType();
        }

        $defaultTemplater = 'Framework_Templating_Native';
        if (class_exists('Framework_Templating_' . $type)) {
            $defaultTemplater = 'Framework_Templating_' . $type;
        }

        $this->_templater = new $defaultTemplater;
    }
}