<?php
require_once './app/views/home.view.php';
require_once './app/models/model.home.php';


class HomeController{
    private $view;
    private $model;

    function __construct(){
        
        $this->view = new HomeView();
        $this->model = new homeModel();
    }
  

    public function showHome(){
        $products= $this->model->GetItems();
        $this->view->showHome($products);
    }
}