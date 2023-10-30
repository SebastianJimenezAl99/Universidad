<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/conf/conexion.php");
class Usuario{

    public function __construct(){}

    public static function validarUserAndPassword($data) {
        $fila = null;
        try {
            $conexion = conectarBaseDeDatos();
            $email = $data['email'];
            $password = $data['password'];
            $sql = "SELECT * FROM Usuarios WHERE EMAIL = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $stmt->close();
            $conexion->close();
    
            if ($resultado->num_rows > 0) {
                $fila = $resultado->fetch_assoc();
    
                if (password_verify($password,$fila['password'])) {
                    
                    $_SESSION["USER"] = $fila;
                    header("refresh:2;url=/index.php");
                }else{
                    echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Contraseña Invalida",
                            text: "La contraseña ingresada es incorrecta",
                        }).then(function() {
                            window.location.href = "/index.php"; 
                        });
                    </script>
                ';
                }
            }  else {
                echo '
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "Usuario Invalido",
                        text: "El usuario no existe",
                    }).then(function() {
                        window.location.href = "/index.php"; 
                    });
                </script>
            ';
            } 
        } catch (Exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }

    public function IfEmailExist($email){
        try {
            $conexion = conectarBaseDeDatos();
            $sql = "SELECT * FROM Usuarios WHERE EMAIL = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $stmt->close();
            $conexion->close();
    
            if ($resultado->num_rows > 0) {
                return true;
            }  else {
                return false;
            } 
        } catch (Exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }


    public function ListAllUser(){
        $fila = null;
        try {
            $conexion = conectarBaseDeDatos();
            $sql = "SELECT usuarioID, dni, email, CASE id_rol
                        WHEN 1 THEN 'Administrador'
                        WHEN 2 THEN 'Maestro'
                        WHEN 3 THEN 'Alumno'
                        ELSE 'Rol desconocido'
                    END AS rol, nombre, apellido, direccion, fechaNacimiento, estado, (SELECT GROUP_CONCAT(id_clase) FROM clases WHERE id_maestro = usuarioID) as id_clase , (SELECT GROUP_CONCAT(nombre) FROM clases WHERE id_maestro = usuarioID) as clase FROM usuarios";
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

    public function cambiarRol($data){
        $id = $data['id'];
        $rol = ["Administrador","Maestro","Alumno"];
        if ($id == 2) {
            echo '
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "Acceso no permitido",
                        text: "Usted no puede realizar cambio de rol y estado de usted mismo",
                    }).then(function() {
                        window.location.href = "/index.php?pagina=1"; 
                    });
                </script>
                ';
        }else{
            try {
                $conexion = conectarBaseDeDatos();
                $email = $data['email'];
                $id = $data['id'];
                $id_rol = ['id_rol'];
                $estado = isset($data['estado']) ? "Activo" : "Inactivo";
                $sql = "UPDATE usuarios SET id_rol = ? , estado = ? WHERE usuarioID = ? and email= ?;";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("isis",$id_rol, $estado, $id, $email);
                $stmt->execute();
                $stmt->close();
                $conexion->close();
                echo '
                    <script>
                        Swal.fire({
                            icon: "success",
                            title: "Cambio Exitoso",
                            text: "Se ha realizado el cambio de estado y/o rol",
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

    public function findForId($id){
        try {
            $conexion = conectarBaseDeDatos();
            $sql = "SELECT 
            usuarioID, dni, email, id_rol, nombre, apellido, direccion, fechaNacimiento, estado, 
            (SELECT GROUP_CONCAT(id_clase) FROM clases WHERE id_maestro = usuarioID) as id_clase , 
            (SELECT GROUP_CONCAT(nombre) FROM clases WHERE id_maestro = usuarioID) as clase 
            FROM `usuarios` 
            WHERE usuarioID = ? ;";
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

    public function crearUser($data){
        try {
            $conexion = conectarBaseDeDatos();

            $id_clase = isset($data['id_clase']) ? $data['id_clase'] : null; 
            $dni = isset($data['dni']) ? $data['dni'] : null;
            $email =  $data['email'];
            $pass = password_hash('Universidad2023', PASSWORD_DEFAULT);
            $id_rol = $data['id_rol'];
            $nombre = isset($data['nombre']) ? $data['nombre'] : null;
            $apellido = isset($data['apellido']) ? $data['apellido'] : null;
            $direccion = isset($data['direccion']) ? $data['direccion'] : null;
            $fechaNacimiento = isset($data['fechaNacimiento']) ? $data['fechaNacimiento'] : null;
            $estado = $data['estado'];
            /* Comienza ingreso a la base de datos */
            $sql = "INSERT INTO usuarios (dni, email, password, id_rol, nombre, apellido, direccion, fechaNacimiento, estado) VALUES (?,?,?,?,?,?,?,?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssisssss",$dni,$email,$pass,$id_rol,$nombre,$apellido,$direccion,$fechaNacimiento,$estado);
            $stmt->execute();
            $stmt->close(); 
            /* aqui termino el ingreso */
            $sql = "SELECT usuarioID FROM usuarios WHERE email = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $fila = $resultado->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            print_r($fila);
            if (isset($id_clase)) { 
                $sql = "UPDATE clases SET id_maestro = ? WHERE id_clase = ?;";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("ii", $fila[0]['usuarioID'],$id_clase);
                $stmt->execute();
            }
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
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }

    public function editUser($data){
        try {
            $conexion = conectarBaseDeDatos();
            $id_clase = isset($data['id_clase']) ? $data['id_clase'] : null; 
            $id = $data['id'];
            $dni = isset($data['dni']) ? $data['dni'] : null;
            $email =  $data['email'];
            $nombre = isset($data['nombre']) ? $data['nombre'] : null;
            $apellido = isset($data['apellido']) ? $data['apellido'] : null;
            $direccion = isset($data['direccion']) ? $data['direccion'] : null;
            $fechaNacimiento = isset($data['fechaNacimiento']) ? $data['fechaNacimiento'] : null;
            if (isset($id_clase)) {
                $sql = "UPDATE clases SET id_maestro = null WHERE id_maestro = ?;";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $sql = "UPDATE clases SET id_maestro = ? WHERE id_clase = ?;";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("ii", $id,$id_clase);
                $stmt->execute();
            }else{
                $sql = "UPDATE clases SET id_maestro = null WHERE id_maestro = ?;";
                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
            }
            $sql = "UPDATE usuarios SET dni = ?, nombre = ? , apellido = ? , direccion = ?, fechaNacimiento = ? WHERE usuarioID= ? and email = ?;";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssssis",$dni,$nombre,$apellido,$direccion,$fechaNacimiento,$id,$email);
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
        } catch (Exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }

    public function maestrosSinAsignacion(){
        try {
            $conexion = conectarBaseDeDatos();
            $sql = "SELECT u.usuarioID as id_maestro, CONCAT(u.nombre,' ',u.apellido) as maestro
            FROM usuarios u
            LEFT JOIN clases c ON u.usuarioID = c.id_maestro
            WHERE u.id_rol = 2 AND c.id_clase IS NULL AND u.estado = 'Activo';";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $stmt->close();
            $conexion->close();
            if ($resultado->num_rows > 0) {
                return $resultado->fetch_all(MYSQLI_ASSOC);
            }  
        } catch (Exception $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        }
    }


    public function EliminarUser($id) {
        try {
            $conexion = conectarBaseDeDatos();

            $sql = "UPDATE usuarios SET estado = 'Inactivo' WHERE usuarioID = ?;";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('i',$id);
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