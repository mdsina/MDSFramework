<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

interface Framework_DataSource_Connection_Interface
{
    public function getConnection();
    public function setConnection($connection = null);
}