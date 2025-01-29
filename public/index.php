<?php 

use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register( function( $class ){
    $class = str_ireplace('\\', '/', $class);
    require base_path( "$class.php" );
});

require base_path("bootstrap.php");

$router = new Router();

require base_path("routes.php"); 

// when update / delete data using form, we need to override method POST to either PUT or DELETE
// So, we need to pass method to route

$path = parse_url( $_SERVER["REQUEST_URI"] )['path'];

// var_dump( $_POST );
// dd( $_SERVER["REQUEST_METHOD"] );

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route( $path, $method );

// require base_path("router.php"); 

