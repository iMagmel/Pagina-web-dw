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

<header class="header-turnos">
    <a class="home-link" href="/Pagina-web-dw/views/index.php">
    <div class="house-icon">
        <div class="roof"></div>
        <div class="base"></div>
    </div>
</a>

    <h2>Mis Turnos</h2>
    <div></div>
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
