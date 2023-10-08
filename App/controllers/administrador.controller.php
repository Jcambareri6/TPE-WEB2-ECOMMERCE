<?php 
require './App/Views/admin.view.php';
require './App/Models/Administrador.Model.php';
class AdministradorController{
    private $Model;
    private $View;
    public function __construct(){
        AuthHelper::verify();
       $this->View= new adminView();
       $this->Model= new adminModel();

    }
    public function ShowDashboard() {
       $Items= $this->Model->GetItems();
        //    var_dump($Items);
        $this->View->ShowDashboard($Items);  
    }
    public function DeleteItem($id){
        $this->Model->DeleteItem($id);
         
        header('Location: ' . BASE_URL . '/dashboardAdmin');
        
    }
    
}