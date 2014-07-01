<?php
/**
 * Base search abstract class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

abstract class App_Search_Abstract
{

    /**
     * Get result by query
     *
     * @param string $query
     * @param int $count
     * @param int $start
     * @return $this
     */
    public function getResults($query = '', $count = 8, $start = 0)
    {
        // Base result must be in JSON format as standard
        return $this;
    }
}