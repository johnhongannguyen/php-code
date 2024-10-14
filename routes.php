<?php

$router->get('/', '/index.php');
$router->get('/about', '/about.php');
$router->get('/contact', '/contact.php');
$router->get('/mission', '/mission.php');

// routes related to notes
$router->get('/notes', '/notes/index.php')->only('auth');
$router->get('/note', '/notes/show.php');
$router->delete('/note', '/notes/destroy.php');

$router->get('/note/edit', '/notes/edit.php');
$router->patch('/note', '/notes/update.php');

$router->get('/notes/create', '/notes/create.php');
$router->post('/notes', '/notes/store.php');

// register new user
$router->get('/register','/registration/create.php')->only('guest');
$router->post('/register','/registration/store.php')->only('guest');

// log in
$router->get('/login','/session/create.php')->only('guest');
$router->post('/session','/session/store.php')->only('guest');

// log out
$router->delete('/session','controllers/session/destroy.php')->only('auth');