<?php 
require './App/Views/admin.view.php';
require './App/Models/Administrador.Model.php';
require_once './App/Models/marcas.model.php';
require_once './App/controllers/helpers/marcasHelper.php';

class AdministradorController{
    private $ModelAdmin;
    private $modelMarcas;
    private $View;
    private $marcas;
    public function __construct(){
        AuthHelper::verify();
       $this->View= new adminView();
        $this->ModelAdmin= new adminModel();
       $this->modelMarcas = new MarcasModel();
       $this->marcas= MarcasHelper::cargarMarcas();

    }
 
    public function ShowDashboard() {
       $Items=$this->ModelAdmin->GetItems();
        $this->View->ShowDashboard($Items,$this->marcas);  
    }
    public function DeleteItem($id){
        $this->ModelAdmin->DeleteItem($id);
         
        header('Location: ' . BASE_URL . '/dashboardAdmin');
        
    }
   
    public function DeleteMarca($id){

            $this->modelMarcas->deleteMarca($id);
            header('Location: ' . BASE_URL . '/marcas');
    
    }

    public function showFormAdd(){
        $this->View->showFormAdd($error=null,$this->marcas);
    }
    public function AddProduct(){
        if( empty($_POST['tittle'])||empty($_POST['description'])|| empty($_POST['stock']) || empty($_POST['price']) || empty($_POST['condition'])|| empty($_POST['marcaID'])){
            $this->View->showFormAdd("No se completaron los datos",$this->marcas);
        }else{
            $ProductTittle= $_POST['tittle'];
            $description= $_POST['description'];
            $stock= $_POST['stock'];
            $price= $_POST['price'];
            $condicion= $_POST['condition'];
            $marcaID=  $_POST['marcaID']; 
           $id= $this->ModelAdmin->addItem($ProductTittle,$description,$stock,$price,$marcaID,$condicion);
           if($id){
              
                 header('Location: ' . BASE_URL . '/dashboardAdmin');
           }else{
             $this->View->showFormAdd("Error al insertar",$this->marcas);
           }
        }


    }
    function ShowModalEdit($error){
        $this->View->ShowModalEdit("campos vacios");
    }
    public function updateItem($id){
        if(empty($_POST['nombreProducto'])||empty($_POST['descripcion'])|| empty($_POST['stock']) || empty($_POST['precio']) || empty($_POST['condicion'])|| empty($_POST['marca'])){
          $this->View->ShowError("ERROR- CAMPOS VACIOS");
        }else{
            $ProductTittle= $_POST['nombreProducto'];
            $description= $_POST['descripcion'];
            $stock= $_POST['stock'];
            $price= $_POST['precio'];
            $condicion= $_POST['condicion'];
            $marcaID=  $_POST['marca'];
           
            $this->ModelAdmin->UpdateItem($id,$ProductTittle,$description,$stock,$price,$marcaID,$condicion);
            
            header('Location: ' . BASE_URL . '/dashboardAdmin');
        }

    }

    public function ShowDashboardMarcas(){
        $this->View->ShowDashboardMarcas($error=null, $this->marcas);
    }

    public function showFormAddMarcas(){
        $this->View->ShowFormAddMarcas($error=null,$this->marcas);
    }

    public function insertMarca(){
        if (empty($_POST['tittleMarca'])){
            $this->View->ShowFormAddMarcas("ERROR - CAMPO VACIO",$this->marcas);
        }else{
            $marcaTitulo = $_POST['tittleMarca'];
            $id= $this->ModelAdmin->addMarca($marcaTitulo);
            if ($id){
                header('Location: ' . BASE_URL . '/marcas');
            }else{
                $this->View->showFormAddMarcas("Error al insertar", $this->marcas);
            }
        }
    }

    public function updateMarca($id){
        if (empty($_POST['nombreMarca'])){
            $this->View->ShowError("ERROR - CAMPO VACIO");
        }else{
            $MarcaTitulo = $_POST['nombreMarca'];
            $this->ModelAdmin->UpdateMarca($id,$MarcaTitulo);
            header ('Location: ' . BASE_URL . '/marcas');
        }
    }
    
}