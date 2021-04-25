<?php
/**
 * Clase principal de gestión de la vista
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace Libs\Core;

class Views {
    /**
     * Inicializando objeto Views
     */
    public function __construct() {
    
    }

    /**
     * Obtenemos la vista que vamos a mostrar
     * @param String $controller nombre del controlador
     * @param String $view nombre de la vista
     */
    public function getView($controller, $view){
        $dirView = strtolower(getNameController($controller));
        $routeView = "src/app/Views/" . $dirView . "/" . $view . ".php";
        //echo $routeView . "<br>";
        if(file_exists($routeView)){
            require_once($routeView);
        }else{
            echo "Vista no encontrada";
        }
    }
} 
