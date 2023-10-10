<?php

class homeModel extends DB{
    
    public function GetItems (){
    $query= $this->connect()->prepare('SELECT productos.*, marcas.Nombre FROM productos INNER JOIN marcas on productos.marcaID = marcas.MarcaID');
    $query->execute();
    $items = $query->fetchAll(PDO::FETCH_OBJ);
    return $items;
   }
   
}