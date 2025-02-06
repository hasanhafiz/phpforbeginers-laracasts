<?php 

namespace Http\Forms;

use Core\App;
use Core\Database;

class Authenticator {
    public function attempt( $email, $password )
    {
        $user = App::resolve(Database::class)->query( "SELECT * FROM users WHERE email = :email", [':email' => $email] )->find();
        if ( $user ) {
            // now check the password with table password
            if ( password_verify( $password, $user['password'] ) ) {
                login( $email );
                return true; 
            }
            return false;
        }
        return false;
    }
}