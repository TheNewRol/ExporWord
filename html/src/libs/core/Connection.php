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
  private static $PDOInstance;
  
  /**
   * Creando la connexion a la BD
   */
  private function __construct(){
    
    try{
      $dsn = "mysql:host=" . config('DB_HOST') . ";dbname=" . config("DB_DATABASE") . ";port=" . config('DB_PORT');
      self::$PDOInstance = new PDO($dsn, config('DB_USERNAME'), config('DB_PASSWORD'));
      self::$PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo "Error en la connexion <br>" . $e->getMessage();
    }
  }
  
  /**
   * Obteniendo instacia de la connexion de la base de datos
   */
  public static function getInstance(){
    if(!self::$PDOInstance instanceof self){
      //self::$pdoInstance = new self();
      new self();
    }
    return self::$PDOInstance;
  }
  public static function execQuery($sql){
    $stm = self::getInstance()->prepare($sql);
    $stm->setFetchMode(PDO::FETCH_ASSOC);
    $stm->execute();
    return $stm;
  }
}
