<?php
/**
 * Modelo del producto
 * Autor: Alfrevo Valle (TheNewRol)
 */
namespace App\Models;

use Libs\Core\Connection;

class Producto {
  
  public $id;
  public $nombre;
  public $modelo;
  public $catalogo;
  public $ano;
  public $texto_lirico;
  public $destacado;
  public $descripcion;
  public $especificaciones_tecnicas;
  public $autor;
  public $premio;
  public $imagenes;
  /**
   * Inicializando el modelo Producto
   */
  public function __construct(){
    //$this->getData(); 
  }

  public static function all () {
    $products = array();
    $sql = "SELECT DISTINCT p.id as 'id_producto', p.nombre as 'Nombre_Producto', mi.nombre as 'Nombre_Modelo', p.ano, pi.texto_producto as 'Texto_Lirico', pi.destacado_web, pi.texto_shop 'texto_web', pi.descripcion_web, pi.especificaciones_tecnicas, ai.de_autor, cat.nombre
      FROM producto as p
      LEFT JOIN producto_idioma as pi on pi.producto_id=p.id
      LEFT join modelo as m on m.producto_id=p.id
      LEFT join modelo_idioma as mi on mi.modelo_id=m.id
      LEFT join composicion as compo on compo.modelo_id=m.id
      LEFT join composicion_componente as cc on cc.composicion_id=compo.id
      LEFT join componente as c on c.id=cc.componente_id
      LEFT join componente_idioma as ci on ci.componente_id=c.id
      LEFT JOIN producto_autor as pa on pa.producto_id=p.id
      LEFT JOIN autores_info ai on ai.id_autor=pa.santacole_autor_id
      LEFT JOIN catalogo as cat on cat.id=p.catalogo_id
      WHERE compo.codigo_nuevo is not null AND compo.codigo_nuevo != '' AND compo.sistema !=1 AND pi.idioma_id=1 AND mi.idioma_id=1
      ORDER BY p.nombre ASC
      LIMIT 5";
    $productsList = Connection::execQuery($sql);
    foreach($productsList as $sqlProduct){

      $productObj = new self();
      $productObj->id = $sqlProduct["id_producto"];
//      $prodcutObj->nombre = $sqlProduct["Nombre_Producto"];
      $productObj->modelo = $sqlProduct["Nombre_Modelo"];
      $productObj->ano = $sqlProduct["ano"];
      $productObj->texto_lirico = $sqlProduct["Texto_Lirico"];
      $productObj->destacado = $sqlProduct["destacado_web"];
      $productObj->catalogo = $sqlProduct["nombre"];
      $productObj->descripcion = $sqlProduct["descripcion_web"];
      $productObj->especificaciones_tecnicas = $sqlProduct["especificaciones_tecnicas"];
      $productObj->autor = $sqlProduct["de_autor"];
      $productObj->premio = self::getPrize($sqlProduct["id_producto"]);
      $productObj->imagenes = self::getImgProduct($sqlProduct["id_producto"]);
      array_push($products, $productObj);
    }
    return $products;
  }
  /**
   * Obtenemos todos los premios asosciados a estre producto
   * @param $idProducto (int) id del producto
   * @return (array) devuelve un array de objetos que contiene cada uno de los premios asociados a este producto
   */
  private static function getPrize ($idProducto){
    $premios = array();
    $sql = "SELECT PrePro.id_producto, PrePro.premio, PreLang.nombre_texto, PreLang.clase_texto
      FROM premios_producto AS PrePro
      LEFT JOIN premio_idioma AS PreLang ON PreLang.premio_id = PrePro.premio
      WHERE PrePro.id_producto = " . $idProducto . " AND PreLang.idioma_id = 1";
    $premioList = Connection::execQuery($sql);
    foreach($premioList as $premio){
      $premiosArray = array(
	"id_premio" => $premio["premio"],
	"id_product" => $premio["id_producto"],
	"nombre" => $premio["nombre_texto"],
	"clase_texto" => $premio["clase_texto"]
      );
      array_push($premios, (object)$premiosArray);
    }
    return $premios;
  }
  /**
   * Obtenemos todos las imagenes asociadas a este producto
   * @param $idProducto (int) id del producto
   * @return (array) devuelve un array de objetos que contiene todas las imagenes asociadas a este producto
   */
  private static function getImgProduct($idProducto){
    $imagenes = array();
    $sql = "SELECT fotos_id, productos_id, foto_original_r1, foto_original_r2, foto_original_r3, foto_original_r4, foto_original_r5, foto_original_r6 
      FROM productos_imagenes 
      WHERE productos_id = " . $idProducto;
    $imgsProduct = Connection::execQuery($sql);
    foreach($imgsProduct as $img){
      
      $imgArray = array(
	"id_img" => $img["fotos_id"],
	"id_producto" => $img["productos_id"],
	"foto_x150"   => $img["foto_original_r1"],
	"foto_x600"   => $img["foto_original_r2"],
	"foto_x1000"  => $img["foto_original_r3"],
	"foto_x1700"  => $img["foto_original_r4"],
	"foto_x2400"  => $img["foto_original_r5"],
	"foto_72dp"   => $img["foto_original_r6"]
      );
      array_push($imagenes, (object)$imgArray);
    }
    return $imagenes;

  }
}
