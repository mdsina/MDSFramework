<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

namespace Framework\Cookie;

interface CookieInterface
{
    public function activate();
    public function setValue($value);
    public function setName($value);
    public function getName();
    public function setExpirationDate($expirationDate);
}