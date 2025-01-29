<?php 

use Core\App;

$db = App::resolve('Core\Database');

$currentUserId = 1;

// find the corresponding notes
$query = "SELECT * FROM notes where id = :id";
$note = $db->query($query, [':id' => $_GET['id']])->findOrFail();

// chcek the authorized user can edit note or not
authorize( $note['user_id'] === $currentUserId );

$errors = [];

view("views/notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note
]);