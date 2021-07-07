<?php
use App\Controllers\ProductoController;
header('Access-Control-Allow-Origin: *');


$routes->get('/', function(){
    return "Hello Word";
});

$routes->get('/productos/', [ProductoController::class, 'index']);

$routes->post('/productos/download-word/', [ProductoController::class, 'downloadProducts']); 
