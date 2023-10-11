<?php
require_once './app/views/home.view.php';
require_once './app/models/model.home.php';
require_once './app/models/marcas.model.php';


class HomeController{
    private $view;
    private $model;
    private $modelMarcas;

    function __construct(){
        
        $this->view = new HomeView();
        $this->model = new homeModel();
        $this->modelMarcas = new MarcasModel();
    }
  

    public function showHome(){
        $products= $this->model->GetItems();
        $marcas = $this->modelMarcas->getMarcas();
        $this->view->showHome($products, $marcas);

    }

    public function showProductosPorMarca($id){
        $productsMarca = $this->model->getItemsPorMarca($id);
        $marcas = $this->modelMarcas->getMarcas();
       // $this->view->showHome($productsMarca, $marcas);
        echo ('Entre');
    }
}