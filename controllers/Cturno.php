<?php
require_once __DIR__ . '/../models/Mturno.php';
            
class CTurno {
        public function Registrarturno($terapeuta, $fecha, $hora, $usu){

            $modelo = new Mturno();
            $stmt = $modelo->PedirTurno($terapeuta, $fecha, $hora, $usu);
            
            return $stmt;
        }
    }

?>