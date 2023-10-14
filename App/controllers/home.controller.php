<?php
require_once './app/views/home.view.php';
require_once './app/models/model.home.php';
require_once './app/models/marcas.model.php';
require_once './App/controllers/helpers/marcasHelper.php';


class HomeController{
    private $view;
    private $model;
    private $modelMarcas;
    private $marcas;

    function __construct(){
        
        $this->view = new HomeView();
        $this->model = new homeModel();
        $this->modelMarcas = new MarcasModel();
        $this->marcas= MarcasHelper::cargarMarcas();
    }
  

    public function showHome(){
        $products= $this->model->GetItems();
       
        $this->view->showHome($products,  $this->marcas);

    }

    public function showProductosPorMarca($id){
        $productsMarca = $this->model->getItemsPorMarca($id);
       
         $this->view->showHome($productsMarca,  $this->marcas);
       
    }
}