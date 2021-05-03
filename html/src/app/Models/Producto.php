<?php
/**
 * Modelo del producto
 * Autor: Alfrevo Valle (TheNewRol)
 */
namespace App\Models;

use Libs\Core\Connection;

class Producto {
  /**
   * Inicializando el modelo Producto
   */
  public function __construct(){
    phpinfo();
    $con = Connection::getInstance();
  }
}
