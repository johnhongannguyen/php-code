<?php
//return [
//    '/'=> 'controllers/index.php',
//    '/about'=> 'controllers/about.php',
//    '/notes'=> 'controllers/notes/index.php',
//    '/note'=> 'controllers/notes/show.php',
//    '/notes/create'=>'controllers/notes/create.php',
//    '/contact'=> 'controllers/contact.php',
//    '/mission'=> 'controllers/mission.php'
//
//];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/mission', 'controllers/mission.php');

// routes related to notes
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router-> delete('/note', 'controllers/notes/delete.php');

