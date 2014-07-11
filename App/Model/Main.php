<?php
/**
 * page model Main
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Model_Main
 */
class App_Model_Main extends Framework_Base_Model
{
    protected $_search;

    /**
     * Get prepared data
     *
     * @param array $params
     * @return array|void
     */
    public function getData($params = [])
    {
        if (empty($params)) {
            return [];
        }

        switch ($params['api']) {
            case 'google' :
            default :
                $this->_search = new App_Search_Google();
                break;
        }

        if (!$this->_search) {
            return [];
        }

        $result = $this->_search->getResults($params['query'], $params['count']);

        return $result;
    }
}