<?php
 require_once './app/controllers/helpers/auth.helper.php';
 require_once './app/views/auth.view.php';
require_once './app/models/auth.model.php';
require_once './App/controllers/helpers/marcasHelper.php';

class AuthController {
    private $view;
    private $model;
    private $marcas;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
        $this->marcas=MarcasHelper::cargarMarcas();
    }

    public function showLogin() {
       
        $this->view->showLogin($error=null, $this->marcas);
    }

    public function auth() {
  
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $this->view->showLogin('Faltan completar datos', $this->marcas);
            return;
        }

        // busco el usuario
        $user = $this->model->getByEmail($username);
        if ($user && password_verify($password, $user->password)) {
            // ACA LO AUTENTIQUE
            
            AuthHelper::login($user);
            
            
            header('Location: ' . BASE_URL . '/dashboardAdmin');
        } else {
            $this->view->showLogin('Usuario inválido', $this->marcas);
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL.'/home');    
    }
}
