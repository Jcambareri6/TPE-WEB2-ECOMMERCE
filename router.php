<?php
include_once './app/models/model.php';
include_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
$action='showProductos';

 if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
$params= explode('/',$action);
switch ($params[0]){
    case 'login':
       $authController= new AuthController;
       $authController->showLogin();
    break;
    case 'auth':
        $authController= new AuthController;
        $authController->auth();
     break;
}


