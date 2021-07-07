<?php
/**
 * Controlador de la vista producto
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace App\Controllers;

use Libs\Core\Json;
use Libs\Core\Controllers;

use App\Models\Producto;
use App\Helpers\GenerateFile;
   

class ProductoController extends Controllers {
  /**
   * Inicializando controlador y modelo
   */
  public function __construct(){
    parent::__construct();  
  }

  /**
   * Refirigir a la vista producto
   */
  public function index(){
    Json::arrayToJson(Producto::all(), 200);
  }

  public function downloadProducts($data){

    header('Access-Control-Allow-Origin: *');
    $phpWord = new GenerateFile();
    
    foreach($data as $product){
      $phpWord->addContent($product['catalogo'], array());
      
      $phpWord->addContent("Nombre producto" . $product["nombre"], array());
      $phpWord->addContent("Diseñador" . $product['autor'], array());
      $phpWord->addContent("Año" . $product['ano'], array());
      foreach($product['premios'] as $premio){
	$phpWord->addContent("Premio" . $premio['nombre'], array());
      }
      $phpWord->addContent('Texto web' .  $product['texto_web'], array());
      $phpWord->addContent("Destacado" . $product['destacado'], array());
      $phpWord->addContent("Texto Lírico" . $product['texto_lirico'], array());
      $phpWord->section->addPageBreak();
    }
    

    header("Content-Description: File Transfer");
    header('Content-Disposition: attachment; filename="testfile.doc"');
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Expires: 0');
    $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $xmlWriter->save("php://output");
  }
}
