<?php

class homeModel extends DB{
    
    public function GetItems (){
    $query= $this->connect()->prepare('SELECT productos.*, marcas.Nombre FROM productos INNER JOIN marcas on productos.IDmarca = marcas.MarcaID ');
    $query->execute();
    $items = $query->fetchAll(PDO::FETCH_OBJ);
    return $items;
   }

   public function getItemsPorMarca($id){
    $query = $this->connect()->prepare('SELECT productos.*, marcas.Nombre FROM productos INNER JOIN marcas on productos.IDmarca = marcas.MarcaID WHERE IDmarca = ?');
    $query -> execute([$id]);
    $items = $query->fetchAll(PDO::FETCH_OBJ);
    return $items;
   }
   
}