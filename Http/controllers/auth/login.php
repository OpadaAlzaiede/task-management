<?php

use core\App;
use Http\forms\LoginForm;

$db = App::resolve(\core\Database::class);


$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];


$form = new LoginForm();

if(!$form->validate($data)) {

    view('auth/login.view.php', [
        'heading' => 'Login',
        'errors' => $form->errors()
    ]);

    die();
}


$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $data['email']
])->find();

if($user) {

    if(password_verify($data['password'], $user['password']))
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





