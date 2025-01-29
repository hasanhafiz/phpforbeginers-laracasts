<?php 

use Core\Database;
use Core\Validator;

$config = require( base_path("config.php") );

$db = new Database( $config['database'] );

$errors = [];
 
if ( ! Validator::checkLength( $_POST['body'], 3, 100 ) ) {
    $errors['body'] = "Field must be between 3 and 20 characters";
}

if ( ! empty( $errors ) ) {
    view("views/notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}
 
$query = "INSERT INTO notes(body, user_id) VALUES (:body, :user_id)";
$result = $db->query( $query, [':body' => $_POST['body'], ':user_id' => 1] );

header("Location: /notes");
die();