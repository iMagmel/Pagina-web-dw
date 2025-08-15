<?php
require_once __DIR__ . '/../models/db/conexionbd.php';

class MAdmin {
    private $con;

    public function __construct() {
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
    }

    public function GetLogs() {
        $sql = "CALL sp_GetLogs()";
        $res = $this->con->query($sql);

        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->close(); // Cierra el result set
            $this->con->next_result(); // Libera el buffer para siguientes consultas
            return $data;
        }
        return [];
    }

    public function GetUsuarios() {
        $sql = "CALL sp_GetUsuarios()";
        $res = $this->con->query($sql);

        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->close();
            $this->con->next_result();
            return $data;
        }
        return [];
    }

    public function DeleteUsuario($id) {
        $stmt = $this->con->prepare("CALL sp_DeleteUsuario(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $this->con->next_result();
    }

    public function UpdateUsuario($id, $n_usuario, $email, $admin) {
        $stmt = $this->con->prepare("CALL sp_UpdateUsuario(?, ?, ?, ?)");
        $stmt->bind_param("issi", $id, $n_usuario, $email, $admin);
        $stmt->execute();
        $stmt->close();
        $this->con->next_result();
    }

    public function GetUsuarioPorId($id) {
    $stmt = $this->con->prepare("CALL sp_GetUsuarioPorId(?)");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $res = $stmt->get_result();
    $usuario = $res->fetch_assoc();

    $stmt->close();
    $this->con->next_result();

    return $usuario ? $usuario : false;
    }
}
