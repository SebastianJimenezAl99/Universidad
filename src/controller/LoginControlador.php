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

    public function ListAllUser(){
        $userModel = new  Usuario();
        return $userModel->ListAllUser(); 
    }

    public function cambiarRol($data){
        $userModel = new Usuario();
        $userModel->cambiarRol($data);
    }

    public function FindForId($id){
        $userModel = new Usuario();
        return $userModel->findForId($id);
    }

    public function crearUser($data){
        $userModel = new Usuario();
        if ($userModel->IfEmailExist($data['email'])) {
            echo '
            <script>
                    Swal.fire({
                        icon: "error",
                        title: "Usuario Existente",
                        text: "El correo que usted ha proporcionado ya se encuentra registrado en otro usuario.",
                    }).then(function() {
                        window.location.href = "/index.php"; 
                    });
                </script>
            ';
        }else{
            $userModel->crearUser($data);
        }
        
    }

    public function editUser($data){
        $userModel = new Usuario();
        $userModel->editUser($data);
    }
}
