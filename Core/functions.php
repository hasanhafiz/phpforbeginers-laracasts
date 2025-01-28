<?php 

use Core\Response;

function urlIs( string $url ): bool {
    $path = parse_url( $_SERVER["REQUEST_URI"] )['path'];
    return $path === $url;
}

function authorize( $condition, $status = Response::FORBIDDEN ) {
    if ( ! $condition ) {
        abort( $status );    
    }
}
function dd( $data = null ) {
    echo "<pre>";
    print_r( $data );
    echo "</pre>";
}

function base_path( $path ) {
    return BASE_PATH . $path;
}

function view( $path, array $attributes = [] ) {
    extract( $attributes );
    require base_path( $path );
}

