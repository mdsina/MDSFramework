<?php
/**
 * Base abstract view class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_View_Abstract
 */
class App_View_Abstract
{
    protected $_data;
    protected $_templater;


    /**
     * Constructor
     *
     * @param null|array $data
     */
    public function __construct(Framework_Templating_Factory $templater, $data = null)
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
    public function setData($data = array())
    {
        $this->_data = $data;
    }


    /**
     * Get render data
     *
     * @param null|array $default
     * @return array
     */
    public function getData($default = null)
    {
        if (!$this->_data) {
            return $default;
        }

        return $this->_data;
    }
}
