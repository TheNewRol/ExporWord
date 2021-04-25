<?php
/**
 * Gestion de rutas de la pagina
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

use App\Controllers\ProductoController;

class Route {
  /**
   * Instancia de la classe Route
   * @Object Route
   */
  private static $instance;
  /**
   * Lista de controladores con sus metodos y funciones
   * @var array
   */
  public $routeControllers = array(
    'Producto' => ['index']
  );
  
  /**
   * Creando Objeto Route
   */
  private function __construct(){
  }
  
  /**
   * Patron de diseño singleton de la classe Route
   * @return Object $instance devolvemos la instancia de la classe Route
   */
  public static function getInstance(){
    if(!self::$instance instanceof self){
      self::$instance = new self();
    }
    return self::$instance;
  }
  
  /**
   * Realizamos una llamda al controlar y a una de sus funciones
   * @param String $controllers nombre del controlador que se va a instanciar
   * @param String $action nombre de la funcion del controlador
   */
  public function get($controller, $action) {
    if(array_key_exists($controller, $this->routeControllers)){
      if(in_array($action, $this->routeControllers[$controller])){
        require_once('src/app/Controllers/' . $controller . 'Controller.php');
        switch($controller){
          case 'Producto':
            $controller = new ProductoController();
            break;
        }
        $controller::{$action}();
      }
    }
  }
}
