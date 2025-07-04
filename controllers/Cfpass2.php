<?php
require_once __DIR__ . '/../models/Mfpass.php';
session_start();

$email = $_SESSION['recuperar_email'] ?? '';
$codigo = $_POST['codigo'] ?? '';

$modelo = new Mfpass();

$correcto = $modelo->verificarCodigo($email, $codigo);


if ($correcto) {
    header("Location: /Pagina-web-dw/views/fpass3.php");
} else {
    return "Codigo Incorrecto";
}


?>