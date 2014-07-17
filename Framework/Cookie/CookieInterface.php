<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

namespace Framework\Cookie;

/**
 * Interface CookieInterface
 * @package Framework\Cookie
 */
interface CookieInterface
{
    public function activate();
    public function setValue($value);
    public function setName($value);
    public function getName();
    public function getData();
    public function setExpirationDate($expirationDate);
}