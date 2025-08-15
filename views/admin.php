<?php
if (session_status() == PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../controllers/CAdmin.php';
$controlador = new CAdmin();

$usuarios = $controlador->ObtenerUsuarios();
$logs = $controlador->ObtenerLogs();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <h1>Panel de Administración</h1>
    <div class="login-menu">
        <p>Admin: <?= htmlspecialchars($_SESSION['n_usuario'] ?? '') ?></p>
        <a href="/Pagina-web-dw/controllers/Clogout.php" class="button">Cerrar sesión</a>
    </div>
</header>

<main>
    <!-- Usuarios -->
    <section id="usuarios">
        <h2>Usuarios</h2>
        <table class="tabla-turnos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                <tr>
                    <td><?= $u['id_usu'] ?></td>
                    <td><?= htmlspecialchars($u['n_usuario']) ?></td>
                    <td><?= htmlspecialchars($u['email']) ?></td>
                    <td><?= $u['admin'] ? 'Sí' : 'No' ?></td>
                    <td>
                        <button class="btn-editar"
                            data-id="<?= $u['id_usu'] ?>"
                            data-nusuario="<?= htmlspecialchars($u['n_usuario']) ?>"
                            data-email="<?= htmlspecialchars($u['email']) ?>"
                            data-admin="<?= $u['admin'] ?>">Editar</button>
                        <form style="display:inline;" method="post" action="/Pagina-web-dw/controllers/CEliminar.php">
                            <input type="hidden" name="id_usu" value="<?= $u['id_usu'] ?>">
                            <button type="submit" class="btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Logs -->
    <section id="logs">
        <h2>Logs de Turnos</h2>
        <table class="tabla-turnos">
            <thead>
                <tr>
                    <th>ID Log</th>
                    <th>Usuario</th>
                    <th>Terapeuta</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($logs as $l): ?>
                <tr>
                    <td><?= $l['id_log'] ?></td>
                    <td><?= htmlspecialchars($l['n_usuario']) ?></td>
                    <td><?= htmlspecialchars($l['descripcion']) ?></td>
                    <td><?= $l['fecha'] ?></td>
                    <td><?= $l['hora'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<!-- Modal -->
<div class="modal" id="modalEditar">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Editar Usuario</h3>
        <form method="post" action="/Pagina-web-dw/controllers/CEditar.php">
            <input type="hidden" name="id_usu" id="modal_id">
            <label for="modal_nusuario">Usuario:</label>
            <input type="text" name="n_usuario" id="modal_nusuario" required>
            <label for="modal_email">Email:</label>
            <input type="email" name="email" id="modal_email" required>
            <label for="modal_admin">Admin:</label>
            <input type="checkbox" name="admin" id="modal_admin">
            <button type="submit">Actualizar</button>
        </form>
    </div>
</div>



<script>
const modal = document.getElementById("modalEditar");
const closeBtn = modal.querySelector(".close");

document.querySelectorAll(".btn-editar").forEach(btn => {
    btn.addEventListener("click", () => {
        document.getElementById("modal_id").value = btn.dataset.id;
        document.getElementById("modal_nusuario").value = btn.dataset.nusuario;
        document.getElementById("modal_email").value = btn.dataset.email;
        document.getElementById("modal_admin").checked = btn.dataset.admin == 1;

        modal.classList.add("show"); // activa la animación desplegable
    });
});

closeBtn.addEventListener("click", () => {
    modal.classList.remove("show");
});

window.addEventListener("click", e => {
    if (e.target === modal) modal.classList.remove("show");
});

</script>
</body>
</html>
