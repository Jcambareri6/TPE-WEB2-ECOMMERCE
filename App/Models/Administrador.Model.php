<?php

class adminModel extends DB{
   public function GetItems (){
    $query= $this->connect()->prepare('SELECT productos.*, marcas.Nombre FROM productos INNER JOIN marcas ON productos.IDmarca =marcas.MarcaID');
    $query->execute();
    $Items = $query->fetchAll(PDO::FETCH_OBJ);
    return $Items;
   }
   public function getItem ($id){
      $query= $this->connect()->prepare('SELECT * FROM productos WHERE ProductoID=?');
      $query->execute([$id]);
      $Item = $query->fetch(PDO::FETCH_OBJ);
       return $Item;
   }
   private function uploadImage($imagen){
      $target = './images/' . uniqid() . '.jpg';
      move_uploaded_file($imagen, $target);
      return $target;
  }


   public function addItem($imagen=null,$ProductTittle,$description,$stock,$price,$marcaID,$condicion){
      $pathImg = null;
      if ($imagen){
         $pathImg = $this->uploadImage($imagen);
      }
      
      $query = $this->connect()->prepare('INSERT INTO `productos`(`Imagen` ,`NombreProducto`, `Descripcion`, `Precio`, `Stock`, `IDmarca`, `Condicion`) VALUES (?,?,?,?,?,?,?)');
      $query->execute([$pathImg,$ProductTittle,$description,$stock,$price,$marcaID,$condicion]);
      return $this->connect()->lastInsertId();
   }
   public function DeleteItem($id){
    $query=$this->connect()->prepare('DELETE FROM productos WHERE ProductoID = ?');
    $query->execute([$id]);
   }
   function updateItem($id, $ProductTittle, $description, $stock, $price, $marcaID, $condicion) {
      $query = $this->connect()->prepare('UPDATE productos SET NombreProducto=?, Descripcion=?, Precio=?, Stock=?, IDmarca=?, Condicion=? WHERE ProductoID=?');
      $query->execute([$ProductTittle, $description, $price, $stock, $marcaID, $condicion, $id]);
   }

   public function addMarca($marcaTitulo){
      $query = $this->connect()->prepare('INSERT INTO marcas (Nombre) VALUES (?)');
      $query->execute([$marcaTitulo]);
      return $this->connect()->lastInsertId();
   }
   public function getItemsPorMarca($id){
      $query = $this->connect()->prepare('SELECT productos.*, marcas.Nombre FROM productos INNER JOIN marcas on productos.IDmarca = marcas.MarcaID WHERE IDmarca = ?');
      $query -> execute([$id]);
      $items = $query->fetchAll(PDO::FETCH_OBJ);
      return $items;
     }


}