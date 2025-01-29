<?php 

use Core\App;
use Core\Database;
use Core\Container;


$container = new Container();

// we just create a callable function.
// It will not executed, untill someone call this
// it can be done by php built in function : call_user_func
$container->bind('Core\Database', function(){
    $config = require base_path("config.php") ;
    return new Database( $config['database'] );
});

App::setContainer( $container );