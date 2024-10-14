<?php
use Core\Validator;
use Core\Database;
use Core\App;
$email = $_POST['email'];
$password = $_POST['password'];

//validate the form inputs
$errors= [];
if(!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::string($password,7, 255)){
    $errors['password'] = 'Please provide a valid password at least 7 letters';
}

if(!empty($errors)){
    return view('registration/create.view.php',[
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// check if the account already use
$user = $db->query('SELECT * FROM users WHERE email = :email',[
    'email' => $email
])->find();


if($user){
    // then someone with that email already exist and has an account
    // yes -> redirect to login page
    header('location:/');
    exit();
}else{
//no -> save one to the database, then log the user in, and redirect
    $db->query('INSERT INTO users(email,password) VALUES(:email,:password)',[
        'email'=> $email,
        'password'=> password_hash($password,PASSWORD_BCRYPT)
    ]);
    // mark that the user has logged in
   login($user);

    header('location:/');
    exit();
}

