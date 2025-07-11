<?php
require_once __DIR__ . '/../models/db/conexionbd.php';

class Mturno {
    private $con;

    public function __construct() {
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
    }

    public function Pedirturno($terapeuta, $fecha, $hora, $usuario) {
        $sql = "CALL sp_AgregarTurno(?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            return "Error en prepare: " . $this->con->error;
        }

        // Importante: validar los tipos de datos. Si terapeuta y usuario son enteros:
        $stmt->bind_param("issi", $fecha, $hora, $terapeuta, $usuario);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $error = $stmt->error;
            $stmt->close();
            return "Error en execute: " . $error;
        }
    }
}
