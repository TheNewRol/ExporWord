<?php
/**
 * Funciones Helper
 * Autor: Alfredo Valle (TheNewRol)
 */
use Libs\Core\EnvConfig;
use Libs\Core\Connection;

/**
 * Inicializamos EnvConfig para poner todas las variables de entorno en acceso global
 */
new EnvConfig(__DIR__ . '/../../../');

/**
 * Mediante el controlador obtenemos el nombre del modelo
 * @param String $controller contiene el namespace del controlador
 * @return String Nombre de controlador
 */
function getNameController ($controller){
  return substr(substr(strrchr($controller, '\\'), 1), 0, -10);
}

/**
 * Otenemos el valor de variables de entorno
 * @param String $key Nombre de la varible de entorno
 * @return String contenido de la varible de entorno
 */
function config($key){
  return $_ENV[$key];
}
