<?php
session_start();
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
                <option value="">Masajes relajantes y aromaterapia</option>
                <option value="">Descontracturante y deportivo</option>
                <option value="">Reflexología podal</option>
                <option value="">Atención integral</option>
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