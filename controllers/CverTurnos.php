<?php
require_once __DIR__ . '/../models/MverTurnos.php';
session_start();
class CverTurnos {
    
    public function MostrarTurnosUsuario($id_usuario) {
        $modelo = new MverTurnos();
        return $modelo->ObtenerTurnosPorUsuario($id_usuario);
    }
}

// Solo si se accede desde el navegador directamente
$id_usuario = $_SESSION['id_usu'] ?? null;

if ($id_usuario) {
    $controlador = new CverTurnos();
    $turnos = $controlador->MostrarTurnosUsuario($id_usuario);
    require_once __DIR__ . '/../views/MisTurnos.php';
} else {
    echo "Usuario no autenticado.";
}
?>
