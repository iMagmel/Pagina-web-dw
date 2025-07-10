<?php
require_once __DIR__ . '/../controllers/Cturno.php';



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $terapeuta = $_POST['terapeuta'] ?? null;
        $fecha = $_POST['fecha'] ?? null;
        $hora = $_POST['hora'] ?? null;
        $usuario = $_SESSION["id_usu"] ?? null;

        if (empty($terapeuta) || empty($fecha) || empty($hora) || empty($usuario)) {
            echo "Todos los campos son obligatorios.";
        }
            
            
            $reg = new CTurno();
            $stmt = $reg->Registrarturno($terapeuta, $fecha, $hora, $usuario);
    
        if ($stmt->execute()){  
        header('Location: /Pagina-web-dw/views/index.html');
        exit();
        }else{
            $stmt->error;
        }
    }

    require_once __DIR__ . '/../views/PedirTurno.php';
?>