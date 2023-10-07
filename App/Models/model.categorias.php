<?php
require_once 'config.php';
require_once './model.php';

class ModelCategorias extends DB{
    private $db;
    public function __construct(){
        $this->db= new DB();
    
    }

   public function InsertarMarca($MarcaID, $Nombre){
    // Obtén una instancia de la conexión PDO
    $pdo = $this->connect();
    
    // Consulta de inserción
    $query = 'INSERT INTO marcas(MarcaID, Nombre) VALUES (?, ?)';
    
    // Preparar la consulta
    $statement = $pdo->prepare($query);
    $statement->execute([$MarcaID, $Nombre]);
    if($statement==true){
        return $pdo->lastInsertId();
    }else{
         return false;
    }

}
public function DeleteMarca($id){
     
    $query='DELETE FROM `marcas` WHERE ?';
    $this->connect()->prepare($query)->execute([$id]);
}


   
}