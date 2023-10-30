<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/conf/conexion.php");
class Clase{

    public function __construct(){}

    public function listarClasesDisponible(){
        $fila = null;
        try {
            $conexion = conectarBaseDeDatos();
            $sql = "SELECT id_clase, nombre, id_maestro,
            (SELECT CONCAT(nombre, ' ', apellido) as nombre FROM usuarios WHERE usuarioID = c.id_maestro ) as maestro,
            (SELECT COUNT(*) FROM estudiantes_clases as ec WHERE ec.id_clase = c.id_clase ) as alumnosInscritos
            FROM clases as c;";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($resultado->num_rows > 0) {
                $fila = $resultado->fetch_all(MYSQLI_ASSOC);
            } else {
                echo '<script>alert("El pedido no se encuentra registrado");</script>
                    ';
            }
            $stmt->close();
            $conexion->close();
        } catch (Exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
        return $fila;
    }


    public function crearClase($data){
        $nombre = $data['nombre'];
        $id_maestro = isset($data['id_maestro']) ? $data['id_maestro'] : null ;
        try {
            $conexion = conectarBaseDeDatos();
            $sql = "INSERT INTO clases (nombre, id_maestro) VALUES (?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("si", $nombre,$id_maestro);
            $stmt->execute();
            $stmt->close();
            $conexion->close();
            echo '
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Creacion exitosa",
                    text: "Se ha creado de manera exitosa",
                }).then(function() {
                    window.location.href = "/index.php?pagina=1"; 
                });
            </script>
            ';
        } catch (Exception $e) {
           
        }
    }

    public function actualizarClase($data) {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $id_maestro = isset($data['id_maestro']) ? $data['id_maestro'] : NULL ;
        try{
            $conexion = conectarBaseDeDatos();
            $sql = "UPDATE clases SET nombre = ? ,id_maestro = ? WHERE id_clase = ?;";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sii", $nombre, $id_maestro,$id);
            $stmt->execute();
            $stmt->close();
            $conexion->close();
            echo '
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "Cambio exitoso",
                        text: "Se ha realizado los cambios de manera exitosa",
                    }).then(function() {
                        window.location.href = "/index.php?pagina=1"; 
                    });
                </script>
                ';
        } catch (Exception $e){
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }

    public function findClassForId($id) {
        try {
            $conexion = conectarBaseDeDatos();
            $sql = "SELECT c.id_clase, c.nombre, c.id_maestro,
            (SELECT CONCAT(nombre, ' ', apellido) as nombre FROM usuarios WHERE usuarioID = c.id_maestro ) as maestro,
            (SELECT COUNT(*) FROM estudiantes_clases as ec WHERE ec.id_clase = c.id_clase ) as alumnosInscritos
            FROM clases as c
            WHERE c.id_clase = ?;";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $stmt->close();
            $conexion->close();
            if ($resultado->num_rows > 0) {
                return $resultado->fetch_assoc(); 
            }  
        } catch (Exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }

    public function eliminarClase($id){
        try {
            $conexion = conectarBaseDeDatos();
            $sql = "DELETE FROM clases WHERE id_clase = ?;";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->close();
            $conexion->close();
            echo '
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Eliminado con Exito",
                    text: "El registro se ha eliminado",
                }).then(function() {
                    window.location.href = "/index.php?pagina=1"; 
                });
            </script>
            ';
        } catch (Exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }

}