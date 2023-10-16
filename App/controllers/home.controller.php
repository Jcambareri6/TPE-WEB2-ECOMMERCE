<?php
require_once './app/views/home.view.php';

require_once './app/models/marcas.model.php';

require_once './App/controllers/helpers/marcasHelper.php';


class HomeController{
    private $view;
    private $model;
    private $modelMarcas;
    private $marcas;

    function __construct(){
        
        $this->view = new HomeView();
        $this->modelMarcas= new MarcasModel();
        $this->model = new adminModel();
        $this->marcas= MarcasHelper::cargarMarcas();
    }
    public function showItem($id){
       $Item= $this->model->getItem($id);
       $this->view->showItem($Item);
    }
  

    public function showHome(){
        $products= $this->model->GetItems();
       
        $this->view->showHome($products,  $this->marcas);

    }

    public function showProductosPorMarca($id){
        $productsMarca = $this->modelMarcas->getItemsPorMarca($id);
       
         $this->view->showHome($productsMarca,  $this->marcas);
       
    }
}