<?php
require_once __DIR__ . '/../models/db/conexionbd.php';

class Mturno{
    private $con;

    public function __construct(){
        $this->con = Conexion::Conectar();
    }

    public function Pedirturno($terapeuta,$fecha, $hora, $usuario) {
        $sql = "CALL sp_AgregarTurno ?, ?, ?, ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ssss", $terapeuta, $fecha, $hora, $usuario);
        if($stmt ->execute()){
            return $stmt;
        }else{
            return $stmt -> error;
        }

    }
}  

?>