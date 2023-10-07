<?php 
require './App/Views/admin.view.php';
class AdministradorController{
    private $Model;
    private $View;
    public function __construct(){
        AuthHelper::verify();
       $this->View= new adminView();

    }
    public function ShowDashboard() {
        $this->View->ShowDashboard();
    }
    
}