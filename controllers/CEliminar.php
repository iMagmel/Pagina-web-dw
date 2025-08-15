<?php
session_start();
if (!isset($_SESSION['id_usu']) || $_SESSION['admin'] != 1) {
    header("Location: /Pagina-web-dw/views/index.php");
    exit();
}

require_once __DIR__ . '/CAdmin.php';
$controlador = new CAdmin();
$id = $_GET['id'] ?? null;
if ($id) {
    $controlador->EliminarUsuario($id);
} else {
    header("Location: /Pagina-web-dw/views/admin.php");
    exit();
}
