<?php

use core\App;
use Http\forms\LoginForm;
use \core\Authenticator;

$db = App::resolve(\core\Database::class);


$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];


$form = new LoginForm();

if($form->validate($data)) {

    if((new Authenticator)->attempt($data['email'], $data['password'])) {

        redirect("/");
    }

    $form->error('email', ['No matching found for that email address.']);
}

view('auth/login.view.php', [
    'heading' => 'Login',
    'errors' => $form->errors()
]);

die();





