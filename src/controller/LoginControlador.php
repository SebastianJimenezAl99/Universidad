<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/src/model/Usuario.php");


class LoginControlador{

    public function __construct(){}

    public function vistaLogin(){
        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/Login.php");
    }

    public function validarUserAndPasswordAll($data){
        Usuario::validarUserAndPassword($data);
    }


    public function CerrarSeccion(){
        unset($_SESSION['USER']);
        unset($_SESSION['MODULO']);
        unset($_SESSION['AllUSERS']);
        unset($_SESSION['USER_FOR_EDIT']);
        unset($_SESSION['LISTA_CLASES']);
        unset($_SESSION['MAESTROS_DISPONIBLE']);
        unset($_SESSION['CLASS_FOR_EDIT']);
        header("refresh:2;url=/index.php");
    }

    public function admiDashboard(){
        include_once($_SERVER["DOCUMENT_ROOT"]."/src/view/admi/AdmiDashboard.php");
    }

    
}
