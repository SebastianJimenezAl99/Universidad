<?php
function conectarBaseDeDatos() {

    $host = "localhost"; 
    $usuario = "root";
    $contraseña = ""; 
    $base_de_datos = "UNIVERSIDAD"; 
    try {
        $conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

        if ($conexion->connect_error) {
            throw new Exception("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    } catch (Exception $ex) {
        echo 'Error en base de datos: '.$ex->getMessage();;
    }
}
