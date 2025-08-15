<?php
require_once __DIR__ . '/../models/Mturno.php';
require_once __DIR__ . '/../models/MmostrarT.php';
class CTurno {

    public function ObtenerTerapeutas() {
        $get = new Mterapeu();
        return $get->Mostrartera();
    }

    public function Registrarturno($terapeuta, $fecha, $hora, $usu) {
        $modelo = new Mturno();
        return $modelo->Pedirturno($terapeuta, $fecha, $hora, $usu);
    }
}

?>