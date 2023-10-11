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

   public function GetMarcas(){
      $query = $this->connect()->prepare('SELECT * FROM marcas');
      $query->execute();
      $marcas = $query->fetchAll(PDO::FETCH_OBJ);
      return $marcas;
   }

   public function DeleteMarca($id){
      $query = $this->connect()->prepare('DELETE FROM marcas WHERE MarcaID = ?');
      $query->execute([$id]);
   }

}