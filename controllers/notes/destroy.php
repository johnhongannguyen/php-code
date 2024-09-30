<?php

use Core\App;
use Core\Database;

$db = App::container()->resolve(Database::class);

$currentUserId = 1;

// perform authorization
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
        'id' => $_POST['id']
    ])->findOrFail();

authorize($note['user_id'] == $currentUserId);

//form was submitted, delete the current note
$db->query('DELETE FROM notes WHERE id = :id',[
        'id' => $_POST['id']
    ]);

header('location:/notes');
exit();





