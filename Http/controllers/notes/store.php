<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class );

$errors = [];
 
if ( ! Validator::validLength( $_POST['body'], 3, 100 ) ) {
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