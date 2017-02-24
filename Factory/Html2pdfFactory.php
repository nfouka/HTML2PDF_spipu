<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of df
 *
 * @author nadir
 */


namespace UGA\Html2PDFBundle\Factory ;

class Html2pdfFactory 
{
    private $html2_pdf_orientation;
    private $html2_pdf_format;
    private $html2_pdf_lang;
    private $html2_pdf_unicode;
    private $html2_pdf_encoding;
    private $html2_pdf_margin;
    /**
     * @param string $orientation
     * @param string $format
     * @param string $lang
     * @param boolean $unicode
     * @param string $encoding
     * @param int[] $margin
     */
    public function __construct($orientation, $format, $lang, $unicode, $encoding, $margin)
    {
        $this->html2_pdf_orientation = $orientation;
        $this->html2_pdf_format = $format;
        $this->html2_pdf_lang = $lang;
        $this->html2_pdf_unicode = $unicode;
        $this->html2_pdf_margin = $margin;
        $this->html2_pdf_encoding = $encoding;
    }


    public function getInstance($orientation = null, $format = null, $lang = null, $unicode = null, $encoding = null, $margin = null)
            
    {
        return new \HTML2PDF(
            $orientation ? $orientation :   $this->html2_pdf_orientation ,
            $format ? $format :             $this->html2_pdf_format,
            $lang ? $lang :                 $this->html2_pdf_lang,
            $unicode ? $unicode :           $this->html2_pdf_unicode,
            $margin ? $margin :             $this->html2_pdf_margin , 
            $encoding ? $encoding :         $this->html2_pdf_encoding
            
        );
    }

}