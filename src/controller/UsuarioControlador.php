<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/src/model/Usuario.php");
class UsuarioControlador{

    public function __construct(){}

    public function maestrosSinAsignacion(){
        $userModel = new Usuario();
        return $userModel->maestrosSinAsignacion();
    }

}