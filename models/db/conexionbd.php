<?php

class Conexion {
    public function Conectar(){
        $servidor = "localhost";
        $usu = "root";
        $contra = "";
        $db = "calmaturnos";

        $conexion = new mysqli($servidor, $usu, $contra, $db);

        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        return $conexion;
    }
}

?>