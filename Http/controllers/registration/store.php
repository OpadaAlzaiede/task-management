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

    $errors['password'] = ['A password of at least 7 characters. !'];
}

if(!empty($errors)) {

    view('registration/create.view.php', [
        'heading' => 'Register',
        'errors' => $errors
    ]);

    die();
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if($user) {

    header('location: /');
    die();

} else {

    $db->query("INSERT INTO users(email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    login(['email' => $email]);

    header('location: /');
    die();

}


