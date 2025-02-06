<?php 

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\Authenticator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class );

// validate the form input
$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;
if ( $form->validate( $email, $password ) ) {
    $auth = new Authenticator;
    if ( $auth->attempt( $email, $password ) ) {
        redirect("/dashboard");
    }
}

$form->addError('password', 'No matching account found for that email address and password.');

return view("views/login/create.view.php", [
    'heading' => 'Log in',
    'errors' => $form->getErrors()
]);

