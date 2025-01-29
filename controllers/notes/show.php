<?php 

use Core\App;

$db = App::resolve('Core\Database');

$currentUserId = 1;

$query = "SELECT * FROM notes where id = :id";
$note = $db->query($query, [':id' => $_GET['id']])->findOrFail();

authorize( $note['user_id'] === $currentUserId );

view("views/notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);