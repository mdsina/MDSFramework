<?php
/**
 * Base interface for working with query
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

interface Framework_DataSource_Query_Interface
{
    public function where($field, $value);
    public function groupBy($groups);
    public function select($fields);
    public function limit($limit);
    public function raw($query);
}