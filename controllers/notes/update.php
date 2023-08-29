<?php

use core\App;
use core\Validator;

$db = App::resolve(\core\Database::class);

$currentUserId = 1;

$errors = [];

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->findOrFail();


$title = $_POST['title'];
$body = $_POST['body'];


authorize($note['user_id'] == $currentUserId); // GLOBAL AUTHORIZE FUNCTION (authorizes certain condition and aborts upon failure).

if(!Validator::string($body, 1, 100)) {

    $errors['body'] = ['A body of no more than 100 characters is required !'];
}

if(!Validator::string($title, 1, 20)) {

    $errors['title'] = ['A title of no more than 20 characters is required !'];
}

if(!empty($errors)) {

    view('notes/edit.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors,
        'note' => $note
    ]);

    die();
}

$db->query("UPDATE notes SET title = :title, body = :body WHERE id = :note_id", [
    'title' => $title,
    'body' => $body,
    'note_id' => $_POST['id']
]);

header('location: /notes');

die();

