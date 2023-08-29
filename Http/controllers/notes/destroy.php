<?php

use core\App;

$db = App::resolve(\core\Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] == $currentUserId); // GLOBAL AUTHORIZE FUNCTION (authorizes certain condition and aborts upon failure).

$db->query("DELETE FROM notes WHERE id = :id", ['id' => $_POST['id']]);

header('location: /notes');
exit();

