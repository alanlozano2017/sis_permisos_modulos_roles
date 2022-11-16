<?php

Class Conexion{

    public static function conectar(){
        $servidor = "localhost"; $usuario = "root"; $contrasena = ""; $nombreBaseDatos = "rrhh";
        $conexionBD = new mysqli($servidor, $usuario, $contrasena, $nombreBaseDatos);
        if ($conexionBD->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conexionBD;
        
    }

}

?>