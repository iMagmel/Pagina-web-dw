<?php

class Conexion {

    public function Conectar($servidor, $usu, $contra, $db){
        private $servidor = "localhost";
        private $usu = "root";
        private $contra = "";
        private $db = "calmaturnos";

        $conexion = new mysqli($servidor, $usu, $contra, $db);

        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        return $conexion;
    }
}

?>