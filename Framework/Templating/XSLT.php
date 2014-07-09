<?php
/**
 * XSLT templating
 *
 * @author Daniil Mikhailov <info@mdsina.ru>
 * @copyright Copyright (c) 2014, Daniil Mikhailov
 */

class Framework_Templating_XSLT implements Framework_Templating_Interface
{
    protected $_xml;
    protected $_xsl;


    /**
     * Constructor, Initialize Framework_Base_XML and xsl DOMDocument
     */
    public function __construct()
    {
        $this->_xml = new Framework_Base_XML(['write']);

        //need info about charset, but f#ck it, I have no time to provide it :\
        $this->_xsl = new DOMDocument(null, 'UTF-8');

    }


    /**
     * XSLT Render method, convert data to xml and provide it by XSLTProcessor
     *
     * @param $template
     * @param array $data
     */
    public function render($template, array $data)
    {
        try {
            if (!$this->_xsl->load($template)) {
                throw new Framework_Exception_File('Template "' . $template . '" not loaded');
            }
        } catch (Framework_Exception_File $e) {
            echo $e->getMessage();
        }

        // ugh...
        $templateXmlData = new DOMDocument('1.0', 'UTF-8');

        // hm, maybe some exception... another time
        $templateXmlData->loadXML($this->_xml->arrayToXml($data));

        $processor = new XSLTProcessor();
        $processor->importStylesheet($this->_xsl);

        echo $processor->transformToDoc($templateXmlData)->saveHTML();
    }
}