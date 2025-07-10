<?php
require_once __DIR__ . '/../models/db/conexionbd.php';

class Mfpass {
    private $con;

    public function __construct(){
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
    }

    public function verificarEmail($email) {
        $sql = "CALL SP_VerificarEmail(?)";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $this->con->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($id_usu);

        if ($stmt->fetch()) {
            return ['id_usu' => $id_usu];
        } else {
            return false;
        }
    }

    public function guardarCodigo($email, $codigo) {
        $sql = "CALL SP_GuardarCodRecuperacion(?, ?)";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $this->con->error);
        }

        $stmt->bind_param("ss", $email, $codigo);
        $stmt->execute();
    }

    public function verificarCodigo($email, $codigo) {
        $sql = "CALL SP_VerificarCodRecuperacion(?, ?)";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $this->con->error);
        }

        $stmt->bind_param("ss", $email, $codigo);
        $stmt->execute();
        $stmt->bind_result($id_usu);

        if ($stmt->fetch()) {
            return ['id_usu' => $id_usu];
        } else {
            return false;
        }
    }

    public function cambiarContraseña($contraseña, $nueva_contraseña) {
        $sql = "CALL SP_CambiarContraseña(?, ?)";
        $stmt = $this->con->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $this->con->error);
        }

        $stmt->bind_param("ss", $contraseña, $nueva_contraseña);
        $stmt->execute();
    }
}
?>
