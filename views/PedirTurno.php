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
    <main class="main-login">
        
        <form action="" method="post">
        <div class="form-login">
            <a href="/Pagina-web-dw/views/index.php" class="home-link" aria-label="Volver a inicio">
    <div class="house-icon">
        <div class="roof"></div>
        <div class="base"></div>
    </div>
</a>

            <h2>Reservar Turno</h2>

   <label for="terapeuta">Elegir tipo de masaje:</label>
<select name="terapeuta" required >
    <option value="">Seleccionar terapeuta</option>
    <?php foreach ($listaTerapeutas as $terapeuta): ?>
        <option value="<?= $terapeuta['id_terapeuta']?>">
            <?= htmlspecialchars($terapeuta['descripcion']) ?>
        </option>

    <?php endforeach; ?>
</select>

            <label for="fecha" >Elegir fecha:</label>
            <input type="date" name="fecha" required>

            <label for="hora">Elegir hora:</label>
            <input type="time" name="hora" required>
            
            <button type="submit" class="submit">Confirmar Turno</button>
        </div>
        </form>
    </main>
</body>
</html>