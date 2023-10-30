<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/src/model/Usuario.php");
class UsuarioControlador{

    public function __construct(){}

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

    public function maestrosSinAsignacion(){
        $userModel = new Usuario();
        return $userModel->maestrosSinAsignacion();
    }

    public function checkElimanar($id,$modulo,$pagina){
        echo '
        <script>
        Swal.fire({
            title: "Confirmación",
            text: "¿Usted desea eliminar el registro seleccionado?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Sí, eliminalo!"
          }).then((result) => {
            if (result.isConfirmed) {
          
              // Redirección si el usuario confirma
              window.location.href = "/index.php?modulo='.$modulo.'&pagina='.$pagina.'&idDelete='.$id.'&delete=true";
            } else {
              // Redirección si el usuario no confirma
              window.location.href = "/index.php?modulo='.$modulo.'&pagina='.$pagina.'";
            }
          });
          
        </script>
        ';
    }

    public function EliminarUser($id){
        $userModel = new Usuario();
        $userModel->EliminarUser($id);
    }

}