<?php
require_once'./App/Models/model.php';
class MarcasModel extends DB{
    public function getMarcas (){
        $query = $this->connect()->prepare('SELECT * FROM marcas');
        $query->execute();
        $marcas = $query->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
    }
}