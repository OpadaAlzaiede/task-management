<?php

use core\App;
use \Http\forms\CreateNoteForm;

$db = App::resolve(\core\Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->findOrFail();


$data = [
    'body' => $_POST['body'],
    'title' => $_POST['title']
];

$form = new CreateNoteForm();


authorize($note['user_id'] == $currentUserId); // GLOBAL AUTHORIZE FUNCTION (authorizes certain condition and aborts upon failure).

if(!$form->validate($data)) {

    view('notes/edit.view.php', [
        'heading' => 'Create Note',
        'errors' => $form->errors(),
        'note' => $note
    ]);

    die();
}


$db->query("UPDATE notes SET title = :title, body = :body WHERE id = :note_id", [
    'title' => $data['title'],
    'body' => $data['body'],
    'note_id' => $_POST['id']
]);

header('location: /notes');

die();

