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

    public function CheckEliminarClase($id){
        echo '
        <script>
        Swal.fire({
            title: "Confirmación",
            text: "¿Usted desea eliminar esta clase?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Sí, eliminalo!"
          }).then((result) => {
            if (result.isConfirmed) {
          
              // Redirección si el usuario confirma
              window.location.href = "/index.php?modulo=adminClases&idDelete='.$id.'&delectClase=true";
            } else {
              // Redirección si el usuario no confirma
              window.location.href = "/index.php?modulo=adminClases";
            }
          });
          
        </script>
        ';
    }

    public function eliminarClase($id){
        $claseModal = new Clase();
        $claseModal->eliminarClase($id);
    }
}