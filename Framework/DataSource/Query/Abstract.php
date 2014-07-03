<?php
/**
 * Query class
 *
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


abstract class Framework_DataSource_Query_Abstract implements Framework_DataSource_Query_Interface
{
    /**
     * where in query
     *
     * syntax like this (..->where('someValue > ?', 3), ...->where('someValue IN(?)', [1,2,3,4]))
     *
     * @param $field
     * @param $value
     */
    public function where($field, $value)
    {
        $value = array($value);
        $this->_where[] = preg_replace('/\?/', implode(',', $value) , $field);
    }


    /**
     * select fields from db
     *
     * @param $fields
     */
    public function select($fields)
    {
        if (empty($fields)) {
            $fields = ['*'];
        }

        $this->_select = array_merge($this->_select, $fields);
    }
}