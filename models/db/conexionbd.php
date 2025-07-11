<?php

class Conexion {
    public function Conectar(){
        $servidor = "localhost";
        $usu = "root";
        $contra = "";
        $db = "calmaturnos";

        $conexion = new PDO("mysql:host=$servidor;dbname=$db, $usu, $contra");

        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        return $conexion;
    }
}

?>