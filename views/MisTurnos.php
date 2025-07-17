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
</head>
<body>
    <h2 >Mis Turnos</h2>

    <?php if (!empty($turnos)): ?>
        <table>
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
</body>
</html>
