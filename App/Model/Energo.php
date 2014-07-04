<?php
/**
 * page model Energo
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_Model_Energo
 */
class App_Model_Energo extends App_Model_Abstract
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
        $result = [
            'persons' => [
                'I',
                'You'
            ]
        ];

        return $result;
    }
}