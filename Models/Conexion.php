<?php

Class Conexion{

    public static function conectar(){
        $servidor = "localhost"; $usuario = "root"; $contrasena = ""; $nombreBaseDatos = "db_s1";
        $conexionBD = new mysqli($servidor, $usuario, $contrasena, $nombreBaseDatos);
        if ($conexionBD->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conexionBD;
        
    }

}

?>