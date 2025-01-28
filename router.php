<?php 

$path = parse_url( $_SERVER["REQUEST_URI"] )['path'];

$routes = require "routes.php";

function routeToController( $path, $routes ) {
    if ( array_key_exists( $path, $routes ) ) {
        require $routes[$path];
    } else {
        abort();
    }
}

function abort( int $code = 404 ) {
    http_response_code($code);
    require "views/$code.php";
    die();
}

routeToController( $path, $routes );