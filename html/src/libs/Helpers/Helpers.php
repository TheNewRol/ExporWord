<?php
/**
 * Funciones Helper
 * Autor: Alfredo Valle (TheNewRol)
 */

/**
 * Mediante el controlador obtenemos el nombre del modelo
 * @param String $controller contiene el namespace del controlador
 * @return String Nombre de controlador
 */
function getNameController ($controller){
  return substr(substr(strrchr($controller, '\\'), 1), 0, -10);
}
