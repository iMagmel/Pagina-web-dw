<?php
require_once __DIR__ . '/../models/Mfpass.php';
session_start();

$email = $_SESSION['recuperar_email'] ?? '';
$nueva_contraseña = $_POST['contrasena'] ?? '';
$confirmacion_contraseña = $_POST['rcontrasena'] ?? '';

if ($nueva_contraseña !== $confirmacion_contraseña) {
    die("Las contraseñas no coinciden.");
}

$modelo = new Mfpass();
$modelo->cambiarContraseña($email, $nueva_contraseña);

unset($_SESSION['recuperar_email']);
echo "Contraseña cambiada exitosamente. Puedes iniciar sesión con tu nueva contraseña.";
header("Location: /Pagina-web-dw/views/login.php");
?>