<?php 

$errors = [];

view("views/notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
]);