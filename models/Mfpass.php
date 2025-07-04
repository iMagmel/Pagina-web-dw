<?php
require_once __DIR__ . '/../models/db/conexionbd.php';

class Mfpass {
    private $con;

    public function __construct(){
        $this->con->Conexion::Conectar();
    }

        public function verificarEmail($email) {
        $sql = "CALL SP_VerificarEmail ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        public function guardarCodigo($email, $codigo) {
        $sql = "CALL SP_GuardarCodRecuperacion ?, ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$email, $codigo]);
    }
        public function verificarCodigo($email, $codigo) {
        $sql = "CALL SP_VerificarCodRecuperacion ?, ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$email, $codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        public function cambiarContraseña($contraseña, $nueva_contraseña) {
        $sql = "CALL SP_CambiarContraseña ?, ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$contraseña, $nueva_contraseña]); 
    }



}

?>