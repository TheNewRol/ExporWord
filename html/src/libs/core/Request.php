<?php
/**
 * Gestion de peticiones de la pagina
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

class Request {
  public function __construct(){
    // your code
  }
  /**
   * Obtenemos la url limpia sin dominio ni parametros que sepasan en la url
   */
  public function getPatch(){
    $patch = $_SERVER['REQUEST_URI'] ?? '/';
    $position = strpos($patch, '?');
    if($position === false){
      return $patch;
    }
    return substr($patch, 0 , $position);
  }
  /**
   * Obtenemos el metodo al que se va a llamar (get, post, put ...)
   */
  public function getMethod(){
    return strtolower($_SERVER['REQUEST_METHOD']);
  }
}
