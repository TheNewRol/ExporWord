<?php

namespace App\Helpers;

use PhpOffice\PhpWord\PhpWord; 

class GenerateFile extends PhpWord{  
  public $section;
  public $word;
  public $nameFile = "Products.docx";
  
  /**
   * Incializando constructor padre
   */ 
  public function __construct(){
    $this->word = parent::__construct();
    $this->section = parent::createSection();
  }

  public function addContent($text, $style){
    $this->section->addText($text, $style); 
  }
  public function addStyle($nameStyle, $style){
    parent::addFontStyle($nameStyle, $style);
  }
  public function download(){
    $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter(Self, 'Word2007');
    $xmlWriter->save("php://output");
  } 
  /**
   * Descargamos el archivo con los datos que exportamos
   */
  public function save2($nameFile, $phpWord, $tipeFile = "Word2007"){
    /*
    header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="' . $file . '"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $xmlWriter->save("php://output");
     */
  }
}
