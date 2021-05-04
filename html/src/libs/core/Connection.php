<?php
/**
 * Conexíon a la base de datos
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

use PDO;

class Connection {
  /**
   * @var String
   */
  private $servername;
  /**
   * @var String
   */
  private $database;
  /**
   * @var String
   */
  private $username;
  /**
   * @var String
   */
  private $password;
  /**
   * @var String
   */
  private $charset;
  /**
   * @var PDO
   */
  private static $pdoInstance;
  
  /**
   * Creando la connexion a la BD
   */
  private function __construct(){
    try{
      $dsn = "mysql:host=" . config('DB_HOST') . ";dbname=" . config("DB_DATABASE") . ";port=" . config('DB_PORT');
      echo $dsn . "," .config('DB_USERNAME') . "," . config('DB_PASSWORD') . "<br>";
      self::$pdoInstance = new PDO($dsn, config('DB_USERNAME'), config('DB_PASSWORD'));
      self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo "Error en la connexion <br>" . $e->getMessage();
    }
  }
  
  /**
   * Obteniendo instacia de la connexion de la base de datos
   */
  public static function getInstance(){
    if(!self::$pdoInstance instanceof self){
      self::$pdoInstance = new self();
    }
    return self::$pdoInstance;
  }
}
