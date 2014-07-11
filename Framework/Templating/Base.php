<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


trait Framework_Templating_Base
{
    private $_params = [];

    public function setParams(array $params = [])
    {
        $this->_params = $params;
    }

    public function getParams()
    {
        return $this->_params;
    }
}