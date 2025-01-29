<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class );

$currentUserId = 1;

// find the corresponding notes
$query = "SELECT * FROM notes where id = :id";
$note = $db->query($query, [':id' => $_POST['id']])->findOrFail();

// chcek the authorized user can edit note or not
authorize( $note['user_id'] === $currentUserId );

// check the form validation
$errors = [];

if ( ! Validator::checkLength( $_POST['body'], 3, 150 ) ) {
    $errors['body'] = "Field must be between 3 and 20 characters";
}

if ( ! empty( $errors ) ) {
    return view("views/notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors
    ]);
}

// if no validation errors found, update the record in the notes database table
$query = "UPDATE notes SET body = :body WHERE id = :id";
$db->query( $query, [':body' => $_POST['body'], ':id' => $_POST['id']] );

// redirects to notes landing page
header("Location: /notes");
die();