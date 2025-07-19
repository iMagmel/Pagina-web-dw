<?php
require_once __DIR__ . '/db/conexionbd.php';

class MverTurnos {
    private $con;

    public function __construct() {
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
        
    }

    public function ObtenerTurnosPorUsuario($id_usuario) {
        $sql = "CALL sp_ObtenerTurnosUsuario(?)";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            die("Error en preparación: " . $this->con->error);
        }

        $stmt->bind_param("i", $id_usuario);

        if (!$stmt->execute()) {
            die("Error en ejecución: " . $stmt->error);
        }

        $resultado = $stmt->get_result();
        $turnos = [];

        while ($fila = $resultado->fetch_assoc()) {
            $turnos[] = $fila;
        }

        $stmt->close();
        $this->con->next_result();

        return $turnos;
    }
}
?>
