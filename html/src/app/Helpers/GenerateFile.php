<?php

//namespace App;

use \PhpOffice\PhpWord; 

class GenerateFile extends PhpWord{  

  /**
   * Incializando constructor padre
   */
  function __construct(){
    parent::__construct();
  }
  
  /**
   * Descargamos el archivo con los datos que exportamos
   */
  function save2($nameFile, $phpWord, $tipeFile = "Word2007"){
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