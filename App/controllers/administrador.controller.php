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
    public function showFormAdd(){
        $this->View->showFormAdd();
    }
    public function AddProduct(){
      
      
        if(empty($_POST['tittle'])||empty($_POST['description'])|| empty($_POST['stock']) || empty($_POST['price']) || empty($_POST['condition'])|| empty($_POST['marcaID'])){
        //     $ProductTittle= $_POST['tittle'];
        //  $description= $_POST['description'];
        //     $stock= $_POST['stock'];
        //     $price= $_POST['price'];
        //     $condicion= $_POST['condition'];
        //      $marcaID=  $_POST['marcaID'];  
        }else{
            $this->View->ShowError("falta completar los datos");
        }


    }
    
}