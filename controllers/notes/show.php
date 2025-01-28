<?php 

use Core\Database;

$config = require( base_path("config.php") );

$db = new Database( $config['database'] );

$currentUserId = 1;

// dd( $_SERVER );
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    
    $query = "SELECT * FROM notes where id = :id";
    $note = $db->query($query, [':id' => $_GET['id']])->findOrFail();
    
    authorize( $note['user_id'] === $currentUserId );
    
    $db->query("DELETE FROM notes WHERE id = :id", [':id' => $_POST['id']]);
    
    header("Location: /notes");
    exit;
}

$query = "SELECT * FROM notes where id = :id";
$note = $db->query($query, [':id' => $_GET['id']])->findOrFail();

authorize( $note['user_id'] === $currentUserId );

view("views/notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);