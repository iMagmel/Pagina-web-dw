<?php
require_once __DIR__ . '../db/conexionbd.php';

class MLogin {
    private $con;

    public function __construct(){
        $this->con->Conexion::Conectar();
    }

    public function Log($usuario, $password) {
        $sql = "CALL sp_BuscarUsuario(?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$usuario, $password]);
        return $stmt;
    }
}  

?>