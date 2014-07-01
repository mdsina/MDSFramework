<?php
/**
 * Base interface for working with databases
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

interface Framework_ActiveRecord_Api
{
    public function where($field, $value);
    public function groupBy($groups);
    public function select($fields);
    public function limit($limit);
    public function raw($query);
}