<?php 

$errors = [];

view("views/login/create.view.php", [
    'heading' => 'Login',
    'errors' => $errors
]);