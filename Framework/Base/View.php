<?php
/**
 * Base abstract view class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class Framework_Base_View
 */
abstract class Framework_Base_View
{
    private $_data;

    /**
     * @var Framework_Templating_Interface
     */
    private $_templater;


    /**
     * Constructor
     *
     * @param null|array $data
     */
    public function __construct(Framework_Templating_Interface $templater, $data = null)
    {
        $this->_templater = $templater;

        if ($data) {
            $this->setData($data);
        }

        return $this;
    }


    /**
     * Template render
     *
     * @param string $templateName
     * @param array $extendedData
     */
    public function render($templateName, $extendedData = null)
	{
		$resultData = [
            'data' => $this->getData(),
            'extended' => $extendedData
        ];

        $this->_templater->render($templateName, $resultData);
	}


    /**
     * Set render data
     *
     * @param array $data
     */
    protected function setData(array $data = [])
    {
        $this->_data = $data;
    }


    /**
     * Get render data
     *
     * @param null|array $default
     * @return array
     */
    protected function getData($default = null)
    {
        if (!$this->_data) {
            return $default;
        }

        return $this->_data;
    }


    /**
     * set templater
     *
     * @param Framework_Templating_Factory $templater
     */
    protected function setTemplater(Framework_Templating_Interface $templater)
    {
        $this->_templater = $templater;
    }


    /**
     * get templater
     *
     * @return Framework_Templating_Factory
     */
    protected function getTemplater()
    {
        return $this->_templater;
    }
}
