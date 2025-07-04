<?php
require_once __DIR__ . '/../models/db/conexionbd.php';

class Msingup {
    private $con;

    public function __construct(){
        $this->con->Conexion::Conectar();
    }

    public function Sign($nombre, $apellido, $usuario, $email, $password) {
        $sql = "CALL sp_CrearUsuario(?,?,?,?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$nombre, $apellido, $usuario, $email, $password]);
        return $stmt;
    }
}  

?>