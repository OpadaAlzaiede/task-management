<?php

use core\Validator;
use core\App;

$db = App::resolve(\core\Database::class);

$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];

if(!Validator::email($email)) {

    $errors['email'] = ['You should provide a valid email address.'];
}

if(!Validator::string($password, 7, 255)) {

    $errors['password'] = ['Please provide a valid password. !'];
}

if(!empty($errors)) {

    view('auth/login.view.php', [
        'heading' => 'Login',
        'errors' => $errors
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





