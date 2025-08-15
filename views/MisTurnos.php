<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Turnos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>


<header>
        <h1><a href="/../Pagina-web-dw/views/index.php" style="text-decoration: none; color: #000;">CalmaTurnos</a></h1>
        <nav class="nav-links">
            <?php if (!isset($_SESSION['id_usu'])): ?>
         <a href="/Pagina-web-dw/controllers/Clogin.php" class="log-btn">Iniciar sesión</a>
            <a href="../controllers/CVsignup.php" class="log-btn">Registrarse</a>
            <?php else: ?>
            <a href="/Pagina-web-dw/controllers/CVturno.php" class="log-btn" id="Turno-btn">Pedir Turno</a>

        </nav>


      <div class="login-menu">
            <p style="margin: 0.5em 1em; font-weight: bold;">
              Mi cuenta: <?php echo htmlspecialchars($_SESSION['n_usuario'] ?? 'n_usuario'); ?>
            </p>
            <a href="/Pagina-web-dw/controllers/Clogout.php" class="button" style="margin: 0.5em 1em; font-weight: bold;">Cerrar sesión</a>
          <?php endif; ?>
      </div>

</header>

<div class="tabla-turnos-container">
    <?php if (!empty($turnos)): ?>
        <table class="tabla-turnos">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Terapeuta</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turnos as $turno): ?>
                    <tr>
                        <td><?= htmlspecialchars($turno['fecha']) ?></td>
                        <td><?= htmlspecialchars($turno['hora']) ?></td>
                        <td><?= htmlspecialchars($turno['nombre_terapeuta'] . ' ' . $turno['apellido_terapeuta']) ?></td>
                        <td><?= htmlspecialchars($turno['descripcion']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tenés turnos registrados.</p>
    <?php endif; ?>
</div>

</body>
</html>
