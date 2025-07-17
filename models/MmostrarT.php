<?php

require_once __DIR__ . '../db/conexionbd.php';

class Mterapeu{
    private $con;

    public function __construct() {
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
    }

    public function Mostrartera() {

        
    $sql = "CALL sp_ObtenerTerapeutas()";
    $stmt = $this->con->prepare($sql);

    if (!$stmt) {
        die("Error al preparar la consulta: " . $this->con->error);
    }

    if (!$stmt->execute()) {
        die("Error al ejecutar la consulta: " . $stmt->error);
    }

    $resultado = $stmt->get_result();

    $terapeutas = [];
    while ($fila = $resultado->fetch_assoc()) {
        $terapeutas[] = $fila;
    }

    $stmt->close();
    $this->con->next_result(); 

    return $terapeutas;
}

}
?>