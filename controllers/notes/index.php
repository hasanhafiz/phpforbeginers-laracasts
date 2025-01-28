<?php 

use Core\Database;

$heading = 'My Notes';

$config = require( base_path("config.php") );

// dd( $config );

$db = new Database( $config['database'] );
$query = "SELECT * FROM notes where user_id = :user_id";
$notes = $db->query($query, [':user_id' => 1])->get();

view("views/notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);