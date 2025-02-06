<?php 

$_SESSION['name'] = 'Hasan Hafiz';

view("views/index.view.php", [
    'heading' => 'Home'
]);