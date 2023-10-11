<?php 
require './App/Views/admin.view.php';
require './App/Models/Administrador.Model.php';
require_once './App/Models/marcas.model.php';
class AdministradorController{
    private $ModelAdmin;
    private $modelMarcas;
    private $View;
    public function __construct(){
        AuthHelper::verify();
       $this->View= new adminView();
       $this->ModelAdmin= new adminModel();
       $this->modelMarcas = new MarcasModel();

    }
    public function getMarcas(){
       $marcas= $this->modelMarcas->getMarcas();
       return $marcas;
    }

    public function ShowDashboard() {
       $Items= $this->ModelAdmin->GetItems();
        //    var_dump($Items);
        $this->View->ShowDashboard($Items,$this->getmarcas());  
    }
    public function DeleteItem($id){
        $this->ModelAdmin->DeleteItem($id);
         
        header('Location: ' . BASE_URL . '/dashboardAdmin');
        
    }

    public function showFormAdd(){
        $this->View->showFormAdd($error=null,$this->getMarcas());
    }
    public function AddProduct(){
 
      
        if(empty($_POST['tittle'])||empty($_POST['description'])|| empty($_POST['stock']) || empty($_POST['price']) || empty($_POST['condition'])|| empty($_POST['marcaID'])){
            $this->View->showFormAdd("no se completaron los datos",$this->getMarcas());
        }else{
            $ProductTittle= $_POST['tittle'];
            $description= $_POST['description'];
            $stock= $_POST['stock'];
            $price= $_POST['price'];
            $condicion= $_POST['condition'];
               $marcaID=  $_POST['marcaID']; 
            var_dump($ProductTittle,$description,$stock,$price,$condicion,$marcaID);
           
        }


    }
    
}