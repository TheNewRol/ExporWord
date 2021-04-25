<?php
/**
 * Controlador de la vista producto
 * Autor: Alfredo Valle (TheNewRol)
 */
namespace App\Controllers;

use Libs\Core\Views;
use Libs\Core\Controllers;
use App\Models\Producto;

class ProductoController extends Controllers {
  /**
   * Inicializando controlador y modelo
   */
  public function __construct(){
    parent::__construct();  
  }

  /**
   * Refirigir a la vista producto
   */
  public function index(){
    Views::getView(get_class(), "index");
  }
}
