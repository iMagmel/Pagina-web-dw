<?php
require_once __DIR__ . '../db/conexionbd.php';

class MLogin {
    private $con;

    public function __construct() {
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
    }

    public function Log($usuario, $password) {
        $sql = "CALL sp_BuscarUsuario(?, ?)";
        $stmt = $this->con->prepare($sql);
        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->con->error);
        }


        $stmt->bind_param("ss", $usuario, $password);
    

        if (!$stmt->execute()) {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }

        $stmt->bind_result($id_usu, $n_usuario);
        if ($stmt->fetch()) {
            return [
                'id_usu' => $id_usu,
                'n_usuario' => $n_usuario
            ];
        } else {
            return false;
        }
    }
}
?>
