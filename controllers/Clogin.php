<?php
require_once __DIR__ . '/../models/Mlogin.php';

class Log {
    public function ValidarLog($usuario, $password) {
        if (empty($usuario) || empty($password)) {
            return "Todos los campos son obligatorios.";
        }

        $passhash = hash('sha256',$password);
        $modelo = new MLogin();
        $resultado = $modelo->Log($usuario, $passhash);

        if ($resultado && isset($resultado['id_usu'])) {
            session_start();
            $_SESSION["id_usu"] = $resultado["id_usu"];
            $_SESSION["n_usuario"] = $resultado["n_usuario"];
            $_SESSION["admin"] = $resultado["admin"];

            if ($resultado["admin"] == 1) {
                header("Location: /Pagina-web-dw/views/admin.php");
            } else {
                header("Location: /Pagina-web-dw/views/index.php");
            }
            exit();
        } else {
            return "Usuario y contraseña incorrectos.";
        }
    }
}

$mensaje = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    $login = new Log();
    $mensaje = $login->ValidarLog($usuario, $password);
}

require_once __DIR__ . '/../views/login.php';
?>
