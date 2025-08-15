<?php
require_once __DIR__ . '/../models/Mfpass.php';
session_start();

$email = $_SESSION['recuperar_email'] ?? '';
$nueva_contraseña = $_POST['contrasena'] ?? '';
$confirmacion_contraseña = $_POST['rcontrasena'] ?? '';

if ($nueva_contraseña !== $confirmacion_contraseña) {
    die("Las contraseñas no coinciden.");
}

$npasshas = hash('sha256', $nueva_contraseña);
$modelo = new Mfpass();
$modelo->cambiarContraseña($email, $ncontraseña);

unset($_SESSION['recuperar_email']);
echo '<script> alert("Contraseña cambiada exitosamente. Puedes iniciar sesión con tu nueva contraseña.")</script>';
header("Location: /Pagina-web-dw/controllers/Clogin.php");
?>