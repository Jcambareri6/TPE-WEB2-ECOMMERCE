<?php
include_once './Models/model.php';
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
$action='showProductos';

 if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
$params= explode('/',$action);
switch ($params[0]){
    
}


