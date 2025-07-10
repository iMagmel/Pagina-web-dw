<?php
require_once __DIR__ . '/Csignup.php';

$mensaje = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $usuario = $_POST['n_usuario'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['contrasena'] ?? null;
    $rcontrasena = $_POST['rcontrasena'] ?? null;

    if (empty($nombre) || empty($apellido) || empty($usuario) || empty($email) || empty($password)) {
        return "Todos los campos son obligatorios.";
        exit();
    }

    if ($password !== $rcontrasena) {
        return "Las contraseñas no coinciden.";
        exit();
    }

    $reg = new Sign();
    $stmt = $reg->Registrarusu($nombre, $apellido, $usuario, $email, $password);

    if ($stmt === true) {
        header('Location: /Pagina-web-dw/controllers/Clogin.php');
        exit();
    } else {
        return "No se pudo registrar el usuario";
    }
}

     require_once __DIR__ . '/../views/register.php';

?>