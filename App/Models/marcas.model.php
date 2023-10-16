<?php
require_once './App/Models/model.php';
class MarcasModel extends DB
{
    public function getMarcas()
    {
        $query = $this->connect()->prepare('SELECT * FROM marcas');
        $query->execute();
        $marcas = $query->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
    }

    public function addMarca($marcaTitulo)
    {
        $query = $this->connect()->prepare('INSERT INTO marcas (Nombre) VALUES (?)');
        $query->execute([$marcaTitulo]);
        return $this->connect()->lastInsertId();
    }
    public function getItemsPorMarca($id)
    {
        $query = $this->connect()->prepare('SELECT productos.*, marcas.Nombre FROM productos INNER JOIN marcas on productos.IDmarca = marcas.MarcaID WHERE IDmarca = ?');
        $query->execute([$id]);
        $items = $query->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }
    public function isMarcaInUse($marcaID)
    {
        $query = $this->connect()->prepare('SELECT COUNT(*) FROM productos WHERE IDmarca = ?');
        $query->execute([$marcaID]);
        $query->execute();
        $count = $query->fetchColumn();
        return $count > 0; // Devuelve true si la marca se está utilizando en algún producto.
    }
    public function DeleteMarca($id)
    {
        $query = $this->connect()->prepare('DELETE FROM marcas WHERE MarcaID = ?');
        $query->execute([$id]);
    }
    function UpdateMarca($nombreMarca,$id) {
        $query = $this->connect()->prepare('UPDATE marcas SET Nombre=?  WHERE MarcaID=?');
        $query->execute([$nombreMarca,$id]);
     }
}
