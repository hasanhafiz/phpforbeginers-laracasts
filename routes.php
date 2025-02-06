<?php 

// return [
//     '/' => 'index.php',
//     '/about' => 'about.php',
//     '/notes' => 'notes/index.php',
//     '/note' => 'notes/show.php',
//     '/notes-create' => 'notes/create.php',
//     '/contact' => 'contact.php',
// ];

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->delete('/note', 'notes/destroy.php');

$router->get('/note', 'notes/show.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes', 'notes/store.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'login/create.php')->only('guest');
$router->post('/login', 'login/login.php');

$router->delete('/logout', 'logout/logout.php')->only('auth');

$router->get('/dashboard', 'dashboard/create.php');