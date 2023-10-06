<?php
include_once './App/Models/model.php';
include_once'./App/Controllers/Auth.Controlller.php';

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


