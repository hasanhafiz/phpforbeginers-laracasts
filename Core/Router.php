<?php 

namespace Core;

class Router {
    
    protected $routes = [];
    
    protected function add( string $method, string $route, string $controller ) {
        $this->routes[] = [
            'uri' => $route,
            'controller' => $controller,
            'method' => $method
        ];
    }
    
    public function get( string $route, string $controller ) {
        $this->add( 'GET', $route, $controller );
    }

    public function post( string $route, string $controller ) {
        $this->add( 'POST', $route, $controller );
    }

    public function put( string $route, string $controller ) {
        $this->add( 'PUT', $route, $controller );
    }

    public function patch( string $route, string $controller ) {
        $this->add( 'PATCH', $route, $controller );
    }
    
    public function delete( string $route, string $controller ) {
        $this->add( 'DELETE', $route, $controller );
    }
    
    public function getRoutes() {
        var_dump( $this->routes );
    }
    
    public function abort( int $code = 404) {
        http_response_code($code);
        require base_path( "views/$code.php" );
        die();        
    }
    
    public function route(string $path, string $method) {
                
        foreach ($this->routes as $route) {
            if ( $path === $route['uri'] && $route['method'] === strtoupper( $method )) {
                return require base_path( $route['controller'] );
            }
        }
        
        // if url / path does not match, then abort with default status 404 code
        $this->abort();       
    }

}