<?php
/**
 * Energo search page's view class
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */


/**
 * Class App_View_Energo
 */
class App_View_Energo extends App_View_Abstract
{

    /**
     * get full page content
     *
     * @param array $data
     */
    public function getContent($data)
    {
        // for easy use likes getContent('string');
        $data = array($data);

        $this->setData($data);
        $this->render('templates/xslt_example.xsl');
    }
}