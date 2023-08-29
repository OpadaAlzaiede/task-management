<?php

use core\Validator;
use core\App;

$db = App::resolve(\core\Database::class);

$errors = [];

$body = $_POST['body'];
$title = $_POST['title'];

if(!Validator::string($body, 1, 100)) {

    $errors['body'] = ['A body of no more than 100 characters is required !'];
}

if(!Validator::string($title, 1, 20)) {

    $errors['title'] = ['A title of no more than 20 characters is required !'];
}

if(!empty($errors)) {

    view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);

    die();
}


$db->query("INSERT INTO notes(title, body, user_id) VALUES(:title, :body, :user_id)", [
    'body' => $body,
    'title' => $title,
    'user_id' => 1
]);

header('location: /notes');

die();


