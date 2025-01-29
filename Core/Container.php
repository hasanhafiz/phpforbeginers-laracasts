<?php 

namespace Core;

class Container {
    
    protected array $bindings = [];
    
    public function bind(string $key, callable $resolver ) {
        $this->bindings[ $key ] = $resolver;
    }
    
    public function resolve( string $key ) {
        
        if ( ! array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching bind found for key: {$key}");
        }        
        
        $resolver = $this->bindings[$key];
        return call_user_func( $resolver );
        
    }
    
    public function getBindings() {
        return $this->bindings;
    }
}