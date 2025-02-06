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
    exit;
}

function dump( $data = null ) {
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

function abort( int $code = 404 ) {
    http_response_code($code);
    require base_path( "views/$code.php" );
    die();
}

function login( $email ) {
    $_SESSION['user'] = [ 'email' => $email ];
    session_regenerate_id( true );
}

function logout() {
    unset( $_SESSION['user'] );
    session_destroy();
    $params = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() -3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);        
}

function redirect( $path = '/' ) {
    header("Location: {$path}");
    exit();
}