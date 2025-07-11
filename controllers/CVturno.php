<?php
require_once __DIR__ . '/../models/Mturno.php';
session_start();

class CTurno {
    public function Registrarturno($terapeuta, $fecha, $hora, $usu) {
        $modelo = new Mturno();
        return $modelo->Pedirturno($terapeuta, $fecha, $hora, $usu);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $terapeuta = $_POST['terapeuta'] ?? null;
    $fecha = $_POST['fecha'] ?? null;
    $hora = $_POST['hora'] ?? null;
    $usuario = $_SESSION["id_usu"];

    if (empty($terapeuta)) {
        echo "Todos los campos son obligatorios.";
    } else {
        $reg = new CTurno();
        $resultado = $reg->Registrarturno($terapeuta, $fecha, $hora, $usuario);

        if ($resultado === true) {
            header('Location: /Pagina-web-dw/views/index.php');
            exit();
        } else {
            echo "Error al registrar turno: " . htmlspecialchars($resultado);
        }
    }
}

// Mostrar el formulario (o incluir la vista)
require_once __DIR__ . '/../views/PedirTurno.php';
?>