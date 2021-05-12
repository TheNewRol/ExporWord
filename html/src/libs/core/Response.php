<?php
/**
 * Gestion de rutas de la pagina
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

class Response {

  public function __construct(){
    //your code
  }

  public function setStatusCode(int $code){
    http_response_code($code);
  }
}
