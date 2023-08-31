<?php

use core\App;
use \Http\forms\RegisterForm;
use \core\Authenticator;


$db = App::resolve(\core\Database::class);

$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$form = new RegisterForm();

if(!$form->validate($data)) {

    view('registration/create.view.php', [
        'heading' => 'Register',
        'errors' => $form->errors()
    ]);

    die();
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $data['email']
])->find();

if($user) {

    header('location: /');
    die();

} else {

    $db->query("INSERT INTO users(email, password) VALUES (:email, :password)", [
        'email' => $data['email'],
        'password' => password_hash($data['password'], PASSWORD_BCRYPT),
    ]);

    (new Authenticator)->login(['email' => $data['email']]);

    header('location: /');
    die();

}


