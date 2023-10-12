<?php
require_once'./App/Models/model.php';
class MarcasModel extends DB{
    public function getMarcas (){
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