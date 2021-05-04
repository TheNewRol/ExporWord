<?php
/**
 * Gestión del archivo .env
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

use Dotenv\Dotenv;

class EnvConfig {
  /**
   * @var Array
   */
  protected $envRequired = array(
    'DB_PORT',
    'DB_HOST',
    'DB_DATABASE',
    'DB_USERNAME',
    'DB_PASSWORD',
    'DB_CONNECTION',
  );
  /**
   * @Object Dotenv
   */
  protected static $dotenv;

  /**
   * Crea uns instancia de Dotenv
   * @param String $routeEnv ruta hacia la ubicacion del archivo .env
   */
  public function __construct($routeEnv){
    self::$dotenv = Dotenv::createImmutable($routeEnv);
    self::$dotenv->load();
    self::$dotenv->required($this->envRequired)->notEmpty();
  }
}
