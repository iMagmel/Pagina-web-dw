<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_usu']) || $_SESSION['admin'] != 1) {
    header("Location: /Pagina-web-dw/views/index.php");
    exit();
}

require_once __DIR__ . '/../controllers/CAdmin.php';

$controlador = new CAdmin();
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: /Pagina-web-dw/views/admin.php");
    exit();
}

// Si enviaron el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n_usuario = $_POST['n_usuario'];
    $email = $_POST['email'];
    $admin = isset($_POST['admin']) ? 1 : 0;
    $controlador->EditarUsuario($id, $n_usuario, $email, $admin);
}

// Obtener datos del usuario para el formulario
$usuario = $controlador->EditarUsuario($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Usuario</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <h1>Editar Usuario</h1>
</header>

<main>
    <form action="" method="post" class="form-login">
        <label>Nombre de usuario:</label>
        <input type="text" name="n_usuario" value="<?= htmlspecialchars($usuario['n_usuario']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

        <label>
            <input type="checkbox" name="admin" <?= $usuario['admin'] ? 'checked' : '' ?>>
            Administrador
        </label>

        <button type="submit" class="submit">Guardar cambios</button>
        <a href="/Pagina-web-dw/views/admin.php" class="log-btn">Cancelar</a>
    </form>
</main>
</body>
</html>
