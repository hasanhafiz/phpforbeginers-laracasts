<?php 

$errors = [];

view("views/registration/create.view.php", [
    'heading' => 'Register yourself',
    'errors' => $errors
]);