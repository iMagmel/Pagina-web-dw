<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedir Turno</title>
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
            <a href="/Pagina-web-dw/controllers/CverTurnos.php" class="log-btn" id="Turno-btn"->Ver mis turnos</a>

        </nav>


      <div class="login-menu">
            <p style="margin: 0.5em 1em; font-weight: bold;">
              Mi cuenta: <?php echo htmlspecialchars($_SESSION['n_usuario'] ?? 'n_usuario'); ?>
            </p>
            <a href="/Pagina-web-dw/controllers/Clogout.php" class="button" style="margin: 0.5em 1em; font-weight: bold;">Cerrar sesión</a>
          <?php endif; ?>
      </div>

</header>
    <main class="main-login">

        <form action="" method="post">
            <div class="form-login">

                <h2>Reservar Turno</h2>

                <label for="terapeuta">Elegir tipo de masaje:</label>
                <select name="terapeuta" required>
                    <option value="">Seleccionar terapeuta</option>
                    <?php foreach ($listaTerapeutas as $terapeuta): ?>
                        <option value="<?= $terapeuta['id_terapeuta'] ?>">
                            <?= htmlspecialchars($terapeuta['descripcion']) ?>
                        </option>

                    <?php endforeach; ?>
                </select>

                <label for="fecha">Elegir fecha:</label>
                <input type="date" id="fecha" name="fecha" required>

                <label for="hora">Elegir hora:</label>
                <input type="time" id="hora" name="hora" required>


                <button type="submit" class="submit">Confirmar Turno</button>
            </div>
        </form>
    </main>

    <script>
        function actualizarMinimos() {
            let fechaInput = document.getElementById("fecha");
            let horaInput = document.getElementById("hora");

            let ahora = new Date();
            let hoy = ahora.toISOString().split("T")[0];
            let horaActual = ahora.toTimeString().slice(0, 5);

            fechaInput.min = hoy;

            fechaInput.addEventListener("change", function() {
                if (this.value === hoy) {
                    horaInput.min = horaActual;
                } else {
                    horaInput.min = "00:00";
                }
            });
        }

        actualizarMinimos();
    </script>
</body>

</html>