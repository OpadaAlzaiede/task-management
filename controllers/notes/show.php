<?php

use core\App;

$db = App::resolve(\core\Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_GET['id']
])->findOrFail();


authorize($note['user_id'] == $currentUserId); // GLOBAL AUTHORIZE FUNCTION (authorizes certain condition and aborts upon failure).

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);
