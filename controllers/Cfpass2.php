<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/Mfpass.php';
session_start();

$email = $_SESSION['recuperar_email'] ?? '';
$codigo = $_POST['codigo'] ?? '';

$modelo = new Mfpass();

$correcto = $modelo->verificarCodigo($email, $codigo);

if ($correcto) {
    header("Location: /Pagina-web-dw/views/fpass3.php");
    exit;
} else {
    echo "<script>alert('Código incorrecto'); window.location.href = '/Pagina-web-dw/views/fpass2.php';</script>";
    exit;
}
?>
