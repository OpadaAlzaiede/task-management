<?php

use core\App;
use \Http\forms\CreateNoteForm;

$db = App::resolve(\core\Database::class);

$data = [
    'body' => $_POST['body'],
    'title' => $_POST['title']
];

$form = new CreateNoteForm();

if(!$form->validate($data)) {

    view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $form->errors()
    ]);

    die();
}

$db->query("INSERT INTO notes(title, body, user_id) VALUES(:title, :body, :user_id)", [
    'title' => $data['title'],
    'body' => $data['body'],
    'user_id' => 1
]);

header('location: /notes');

die();


