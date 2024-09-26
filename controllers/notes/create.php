<?php

use Core\Database;
use Core\Validator;



$config = require base_path('config.php');
$db =  new Database($config['database']);

$error = [];


if($_SERVER["REQUEST_METHOD"] == "POST"){
    // validate body request



    if(!Validator::string($_POST['body'],1,1000)){
        $error['body'] = 'A body of no more than 1,000 characters is required';
    }

    if(empty($error)){
        $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)",[
            'body' => $_POST['body'],
            'user_id' => 1
        ]);

    }


}




view("notes/create.view.php", [
    'heading' => 'Create Note',
    'error' => $error
]);

