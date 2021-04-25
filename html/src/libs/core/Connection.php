<?php
/**
 * Conexíon a la base de datos
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

class Db {
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
      $dsn = "mysql:host=$this->servername; dbname=$this->database; charset=$this->charset";
      self::$pdoInstance = new PDO($dsn, $this->username, $this->password);
      self::$pdoInstance::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
      echo "Error en la connexion <br>" . $e::getMessage();
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
