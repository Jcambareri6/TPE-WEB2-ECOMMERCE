<?php

class HomeView {
    public function showHome($products, $marcas){
        
        require './templates/home.phtml';
    }
    public function showItem($Item){
        require './Templates/infoProducto.phtml';
    }
}