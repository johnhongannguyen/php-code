<?php

use Http\Forms\LoginForm;
use Core\Authenticator;

// validate the form
$form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);

// attempt to log in the user
$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);
// if fail to log in - then return back to previous page
if (!$signedIn) {
    $form->error(
        'email','No matching account found for that email address and password'
    )->throw();
}
// otherwise resend them to the homepage
redirect('/');










