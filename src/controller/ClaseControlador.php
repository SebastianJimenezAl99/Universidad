<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/src/model/Clase.php");
class ClaseControlador{

    public function __construct(){}

    public function listarClases(){
        $claseModal = new Clase();
        return $claseModal->listarClasesDisponible();
    }

    public function crearClase($data){
        $claseModal = new Clase();
        $claseModal->crearClase($data);
    }

    public function findClassForId($id) {
        $claseModal = new Clase();
        return $claseModal->findClassForId($id);
    }
    
    public function actualizarClase($data){
        $claseModal = new Clase();
        $claseModal->actualizarClase($data);
    }

    public function eliminarClase($id){
        $claseModal = new Clase();
        $claseModal->eliminarClase($id);
    }
}