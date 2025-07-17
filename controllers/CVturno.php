<?php
require_once __DIR__ . '/../models/Mturno.php';
require_once __DIR__ . '/../models/MmostrarT.php';
require_once __DIR__ . '/../controllers/CTurno.php';
session_start();

$controlador = new CTurno();
$listaTerapeutas = $controlador->ObtenerTerapeutas();

// Procesar formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $terapeuta = $_POST['terapeuta'] ?? null;
    $fecha = $_POST['fecha'] ?? null;
    $hora = $_POST['hora'] ?? null;
    $usuario = $_SESSION["id_usu"] ?? null;

    if (empty($terapeuta) || empty($fecha) || empty($hora)) {
        echo "Todos los campos son obligatorios.";
    } else {
        $resultado = $controlador->Registrarturno($terapeuta, $fecha, $hora, $usuario);

        if ($resultado === true) {
            header('Location: /Pagina-web-dw/views/index.php');
            exit();
        } else {
            echo "Error al registrar turno: " . htmlspecialchars($resultado);
        }
    }
}

// Mostrar la vista
require_once __DIR__ . '/../views/PedirTurno.php';

?>