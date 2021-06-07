<?php
/**
 * Controlador de la vista producto
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

class Json {
  public static function arrayToJson($data, $status){
    header('Content-Type: application/json');
    header('Status:' . $status);
    echo json_encode($data);
  }
}
