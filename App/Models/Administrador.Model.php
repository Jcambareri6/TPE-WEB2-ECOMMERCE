<?php

class adminModel extends DB{
   public function GetItems (){
    $query= $this->connect()->prepare('SELECT productos.*, marcas.Nombre FROM productos INNER JOIN marcas ON productos.marcaID =marcas.MarcaID');
    $query->execute();
    $Items = $query->fetchAll(PDO::FETCH_OBJ);
    return $Items;
   }
   public function DeleteItem($id){
    $query=$this->connect()->prepare('DELETE FROM productos WHERE ProductoID = ?');
    $query->execute([$id]);
   }

}