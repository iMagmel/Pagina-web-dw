<?php
require_once __DIR__ . '/../models/db/conexionbd/php';

class MLogin {
    private $con

    public function __construct(){
        $this->conn->Conexion::Conectar();
    }

    public function Log($usuario, $password) {
        $sql = "CALL sp_BuscarUsuario(?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$usuario, $password]);
        return $stmt;
    }
}  

?>