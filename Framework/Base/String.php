<?php
/**
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class Framework_Base_String
{

    /**
     * Return string with first uppercase symbol
     *
     * @param $str
     * @param string $encoding
     * @param bool $lowerStrEnd
     * @return string
     */
    static public function mbUcFirst($str, $encoding = "UTF-8", $lowerStrEnd = false) {
        $firstLetter = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding);
        $strEnd = "";

        if ($lowerStrEnd) {
            $strEnd = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encoding), $encoding), $encoding);
        } else {
            $strEnd = mb_substr($str, 1, mb_strlen($str, $encoding), $encoding);
        }

        $str = $firstLetter . $strEnd;
        return $str;
    }
}