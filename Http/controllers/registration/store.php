<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class );



// validate the form input
$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];

if ( ! Validator::email( $_POST['email'] ) ) {
    $errors['email'] = "Invalid email address";
}

if ( ! Validator::validLength( $_POST['password'], 6, 15 ) ) {
    $errors['password'] = "Password must be 6-15 chars long";
}

if ( ! empty( $errors ) ) {
   return view("views/registration/create.view.php", [
        'heading' => 'Register new account',
        'errors' => $errors
    ]);

}

// check if the account already exists?     // redirect to Login page
$user = $db->query("SELECT * FROM users WHERE email = :email", [':email' => $email ])->find();
if ( $user ) {
    header("Location: /login");
    die();    
}

// create a new user and store into session

$password = password_hash( $password, PASSWORD_BCRYPT );

$query = "INSERT INTO users(email, password) VALUES (:email, :password)";
$result = $db->query( $query, [':email' => $email, ':password' => $password] );

header("Location: /login");
die();