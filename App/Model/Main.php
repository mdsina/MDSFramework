<?php
/**
 * page model Main
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Model_Main
 */
class App_Model_Main extends App_Base_Model_Abstract
{
    protected $_search;

    /**
     * Get prepared data
     *
     * @return array|void
     */
    public function getData()
    {
        if (!$request = $this->getRequest(false)) {
            $request = new Framework_Request();

            if (!$request) {
                return array();
            }
        }

        $query = $request->getData(array('query'));

        if (empty($query)) {
            return array();
        }

        $api = $request->getData(array('api'));

        switch ($api) {
            case 'google' :
            default :
                $this->_search = new App_Search_Google();
                break;
        }

        if (!$this->_search) {
            return array();
        }

        $count = $request->getData(array('count'), 8);
        $result = $this->_search->getResults($query, $count);

        return $result;
    }
}