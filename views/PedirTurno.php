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
            <h2>Reservar Turno</h2>

            <label for="terapeuta">Elegir tipo de masaje:</label>
            <select name="terapeuta" >
                <option value="1">Maria Sol</option>
                <option value="2">esteban ruiz</option>
                <option value="3">laura m</option>
                <option value="4">Centro Holistico Kairos</option>
            </select>

            <label for="fecha">Elegir fecha:</label>
            <input type="date" name="fecha">

            <label for="hora">Elegir hora:</label>
            <input type="time" name="hora">
            
            <button type="submit" class="submit">Confirmar Turno</button>
        </div>
        </form>
    </main>
</body>
</html>