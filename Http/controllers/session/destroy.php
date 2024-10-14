<?php
//log the user out
use Core\Authenticator;


$logout = new Authenticator;
$logout->logout();


logout();

$_SESSION = [];
session_destroy();
$params = session_get_cookie_params();
setcookie('PHPSESSID', '', time() - 3600, $params['path'],$params['domain'],$params['secure'],$params['httponly']);


header('location:/');
exit();