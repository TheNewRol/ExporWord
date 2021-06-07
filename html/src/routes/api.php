<?php
use App\Controllers\ProductoController;

$routes->get('/', function(){
    return "Hello Word";
});

$routes->get('/productos', function(){
    return "Hello to products";
});

$routes->get('/productos/export', [ProductoController::class, 'index']);
