<?php
/**
 * Classe principal de gestion de controladores
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

use App\Models\Producto;

class Controllers {
    /**
     * Modelo del controlador
     * @var Objeto
     */
    public $model;
    
    /**
     * Inicializando el Objeto Controllers
     */
    public function __construct(){
       $this->loadModel(); 
    }
    
    /**
     * Comprobamos la existencia del modelo
     */
    public function loadModel() {
        $model = substr(substr(strrchr(get_class($this), '\\'), 1), 0, -10);
        $routeClass = "src/app/Models/" . $model . ".php";
        if(file_exists($routeClass)){
            $this::createModel($model);
        }else{
            echo "<br> modelo no encontrado <br>";
        }
    }
    
    /**
     * Creamos connexion entre el controlador y el modelo
     * @param Objeto $model modelo del controlador
     */
    private function createModel($model){
        switch($model){
            case "Producto":
                $this->model = new Producto();
                break;
        }
    }
}
