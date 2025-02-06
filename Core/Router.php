<?php 

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router {
    
    protected $routes = [];
    
    protected function add( string $method, string $route, string $controller ) {
        $this->routes[] = [
            'uri' => $route,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }
    
    public function get( string $route, string $controller ) {
        return $this->add( 'GET', $route, $controller );     
        // dump( $this );
    }
    
    public function post( string $route, string $controller ) {
        return $this->add( 'POST', $route, $controller );
    }
    
    public function put( string $route, string $controller ) {
        return $this->add( 'PUT', $route, $controller );
    }

    public function patch( string $route, string $controller ) {
        return $this->add( 'PATCH', $route, $controller );
    }
    
    public function delete( string $route, string $controller ) {
        return $this->add( 'DELETE', $route, $controller );
    }
    
    public function getRoutes() {
        var_dump( $this->routes );
    }
    
    public function abort( int $code = 404) {
        http_response_code($code);
        require base_path( "views/$code.php" );
        die();        
    }
    
    public function only( $key ) {
        $this->routes[ array_key_last($this->routes)  ]['middleware'] = $key;
        return $this;
        // dump( $this->routes );
    }
    
    public function route(string $path, string $method) {
                
        foreach ($this->routes as $route) {
            if ( $path === $route['uri'] && $route['method'] === strtoupper( $method )) {
                
                Middleware::resolve( $route['middleware'] );
                
                return require base_path( 'Http/controllers/' . $route['controller'] );
            }
        }
        
        // if url / path does not match, then abort with default status 404 code
        $this->abort();       
    }
    


}