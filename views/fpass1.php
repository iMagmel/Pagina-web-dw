<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Olvidaste tu contraseña?</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <form action="../controllers/Cfpass1.php" method="POST">
    <main class="main-login">
        <div class="form-login">
            <h2>Ingresa tu correo electronico</h2>

            <fieldset class="f-login">
                <legend>Correo electronico</legend>
                <input type="email" name = "email" class="i-login">
            </fieldset>
            
            <button type="submit" class="submit">Ingresar</button>
        </div>
    </main>
    </form>
</body>
</html>