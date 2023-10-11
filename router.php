<?php
include_once './app/models/model.php';
include_once './app/controllers/auth.controller.php';
include_once './app/controllers/home.controller.php';
include_once './App/controllers/administrador.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
$action = 'showProductos';

if (isset($_GET['action'])) {
   $action = $_GET['action'];
}
$params = explode('/', $action);
switch ($params[0]) {
   case 'login':
      $controller = new AuthController;
      $controller->showLogin();
      break;
   case 'auth':
      $controller = new AuthController;
      $controller->auth();
      break;
   case 'home':
      $controller = new HomeController;
      $controller->showHome();
      break;
   case 'dashboardAdmin':
      $controller = new AdministradorController();
      $controller->ShowDashboard();
      break;
   case 'ViewFormadd':
      $controller = new AdministradorController();
      $controller->showFormAdd();
      break;
   case 'add':
      $controller = new AdministradorController();
      $controller->AddProduct();
      break;

      case 'productosMarca': 
      echo "hola";
      $controller = new HomeController();
      $controller->showProductosPorMarca($params[1]);
      break;
    


   case 'delete':
      $controller = new AdministradorController;
      var_dump($params[1]);
      $controller->DeleteItem($params[1]);
      break;
   case 'logout':
      $controller = new AuthController();
      $controller->logout();
      break;
}