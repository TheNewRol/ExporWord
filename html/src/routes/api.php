<?php

$routes->get('/', function(){
    return "Hello Word";
});

$routes->get('/productos', function(){
    return "Hello to products";
});
