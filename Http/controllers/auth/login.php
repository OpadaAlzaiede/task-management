<?php

use core\App;
use Http\Forms\LoginForm;

$db = App::resolve(\core\Database::class);


$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if(!$form->validate($email, $password)) {

    view('auth/login.view.php', [
        'heading' => 'Login',
        'errors' => $form->errors()
    ]);

    die();
}


$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if($user) {

    if(password_verify($password, $user['password']))
    {
        login($user);

        header('location: /');
        die();

    }

}

$errors['email'] = ['No matching found for that email address.'];

view('auth/login.view.php', [
    'heading' => 'Login',
    'errors' => $errors
]);

die();





