<?php
require_once __DIR__ . '/../models/Mfpass.php';
require_once __DIR__ . '/../helpers/PHPmailer.php';

$email = $_POST['email'] ?? '';
$modelo = new Mfpass();

$usuario = $modelo->verificarEmail($email);
if (!$usuario) {
    die("El correo electrónico no está registrado.");
}

$codigo = rand(1000,9999);
$modelo->guardarCodigo($email, $codigo);
PHPmailers::enviarCode($email, $codigo);

session_start();
$_SESSION['recuperar_email'] = $email;
header("Location: /Pagina-web-dw/views/fpass2.php");
?>