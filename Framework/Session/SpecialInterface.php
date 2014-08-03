<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

namespace Framework\Session;


/**
 * Interface SpecialInterface
 *
 * Additional interface for required functions to implement in session handlers
 * (maybe not implements by class but need in SessionManager)
 *
 * @package Framework\Session
 */
interface SpecialInterface
{
    public function hash();
}