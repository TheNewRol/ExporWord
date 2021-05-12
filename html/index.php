<?php

/**
 * Prepara el arraque de la aplicacion, para poder deleitar a nuestros usuarios
 */
require (__DIR__ . "/bootstrap.php");

use Libs\Core\Route;

$routes = new Route();
include ('./src/routes/api.php');

$routes->resolve();


/*
if(isset($_GET['controller']) && isset($_GET['action'])){
    $action = $_GET['action'];
    $controller = $_GET['controller'];
}else{
    $action = 'index';
    $controller = "Producto";
}
Route::getInstance()->get($controller, $action);
 */








/*
echo "<h3> Export Word </h3>";

require_once 'bootstrap.php';

use App\GenerateFile;


$newFile = new GenerateFile("test.docx");
var_dump($newFile->nameFile);
/*$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->createSection();
$file = 'HelloWorld.docx';

//Inico de estilos
$tituloTipologia = "tituloStyle";
$nombreProducto = "nombreProducto";
$infoProducto = "infoProducto";
$premioProducto = "premioProducto";
$phpWord->addFontStyle(
  $tituloStyle,
  array('name' => 'Arial', 'size' => 11, 'color' => '080808', 'bold' => true)
);
$phpWord->addFontStyle(
  $nombreProducto,
  array('name' => 'Arial', 'size' => 10, 'color' => '080808', 'bold' => false)
);
$phpWord->addFontStyle(
  $tituloStyle,
  array('name' => 'Arial', 'size' => 10, 'color' => 'ff0000', 'bold' => false)
);
//Fin de estilos

//Inicio de contenido
$section->addText(
  "Tipologi",
  $tituloTipologia
);

$section->addText(
  "Nombre producto",
  $nombreProducto
);
$section->addText(
  "Diseñador",
  $infoProducto
);
$section->addText(
  "Año",
  $infoProducto
);
$section->addText(
  "Premio",
  $premioProducto
);
$section->addText(
  "Texto Web",
  $infoProducto
);
$section->addText(
  "Destacado",
  $nombreProducto
);
$section->addText(
  "Texto Lirico",
  $infoProducto
);
//Fin de contenido



downloadFile($file, $phpWord);



function addText($text, $font){
  
}


function downloadFile($nameFile, $phpWord, $tipeFile = "Word2007"){
  header("Content-Description: File Transfer");
  header('Content-Disposition: attachment; filename="' . $file . '"');
  header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
  header('Content-Transfer-Encoding: binary');
  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  header('Expires: 0');
  $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
  $xmlWriter->save("php://output");
}*/
