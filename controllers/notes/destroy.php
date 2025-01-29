<?php

use Core\App;
use Core\Database;
use Core\Container;

// $config = require( base_path("config.php") );
// $db = new Database( $config['database'] );

$db = App::container()->resolve('Core\Database');

$currentUserId = 1;

$query = "SELECT * FROM notes where id = :id";
$note = $db->query($query, [':id' => $_GET['id']])->findOrFail();

authorize( $note['user_id'] === $currentUserId );

$db->query("DELETE FROM notes WHERE id = :id", [':id' => $_POST['id']]);

header("Location: /notes");
exit;