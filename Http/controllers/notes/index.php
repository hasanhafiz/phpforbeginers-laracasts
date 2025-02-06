<?php 

use Core\App;
use Core\Database;

$heading = 'My Notes';

$db = App::resolve( Database::class );

$query = "SELECT * FROM notes where user_id = :user_id";
$notes = $db->query($query, [':user_id' => 1])->get();

view("views/notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);