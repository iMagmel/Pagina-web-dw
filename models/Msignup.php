<?php
require_once __DIR__ . '/../models/db/conexionbd.php';

class Msingup {
    private $con;

    public function __construct(){
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
    }

    public function Sign($nombre, $apellido, $usuario, $email, $password) {
        $sql = "CALL sp_CrearUsuario(?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->con->error);
        }

        $stmt->bind_param("sssss", $nombre, $apellido, $usuario, $email, $password);

        if ($stmt->execute()) {
            return true;
        } else {
            return $stmt->error;
        }
    }
}

?>