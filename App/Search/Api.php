<?php
/**
 * Base search API interface
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

abstract class App_Search_Api
{
    public function getResults($query = '', $count = 8, $start = 0)
    {
        // Base result must be in JSON format as standard
        return $this;
    }
}