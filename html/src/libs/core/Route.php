<?php
/**
 * Gestion de rutas de la pagina
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

use App\Controllers\ProductoController;

use Libs\Core\Request;
use Libs\Core\Response;

class Route {
  /**
   * Instancia de la classe Route
   * @Object Route
   */
  private static $instance;

  public $request;
  protected $routes = [];
  public $response; 
  /**
   * Creando Objeto Route
   */
  public function __construct(){
    $this->request = new Request();
    $this->response = new Response();
  }
  
  public function get($patch, $callback){
    $this->routes['get'][$patch] = $callback; 
  }
  public function post($patch, $callback){
    $this->routes['post'][$patch] = $callback;
  }
  public function resolve(){
    $patch = $this->request->getPatch();
    $method = $this->request->getMethod();
    $callback = $this->routes[$method][$patch] ?? false;
    $contentType = $this->request->getContentType();
    if($callback === false){
      $this->response->setStatusCode(404);
      echo "Not found";
      exit;
    }

    if(is_array($callback)){
      $callback[0] = new $callback[0]();
    }
    if($contentType == "application/json" && $method == 'post'){
      //var_dump($callback);
      echo call_user_func($callback, json_decode(file_get_contents('php://input'), true)); 
    }else{
      echo call_user_func($callback); 
    }
    /*echo "<pre> patch " . $patch . "</pre>";
    echo "<pre> method " . $method . "</pre>";
    echo "<pre> callback " . var_dump($callback) . "</pre>";*/
  } 
}
