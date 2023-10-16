<?php
include_once './app/models/model.php';
include_once './app/controllers/auth.controller.php';
include_once './app/controllers/home.controller.php';
include_once './App/controllers/administrador.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
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
    
      $controller = new HomeController();
      $controller->showProductosPorMarca($params[1]);
      
      break;
   case 'marcas':
      $controller = new AdministradorController();
      $controller->ShowDashboardMarcas();
      break;
   case 'viewFormAddMarca':
      $controller = new AdministradorController();
      $controller->showFormAddMarcas();
      break;
   case 'addMarca':
      $controller = new AdministradorController();
      $controller->insertMarca();
      break;

   case 'deleteMarca':
      $controller = new AdministradorController;
      $controller->DeleteMarca($params[1]);
      break;
    case 'update':
    $controller = new AdministradorController;
    $controller->UpdateItem($params[1]);
   break;
    case 'showItem':
      $controller = new HomeController();
      var_dump($params[1]);
      $controller->showItem($params[1]);
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