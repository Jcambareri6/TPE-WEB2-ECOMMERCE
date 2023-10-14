<?php
require_once './App/Models/marcas.model.php';

class MarcasHelper {
    public static function cargarMarcas() {
        $marcasModel = new MarcasModel();
        $marcas = $marcasModel->getMarcas();
        return $marcas;
    }
    public static function estaEnUso($id) {
        $marcasModel = new MarcasModel();
        return $marcasModel->isMarcaInUse($id);
        
    }

}
