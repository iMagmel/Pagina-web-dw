<?php
session_start();
if (!isset($_SESSION['recuperar_email'])) {
  header("Location: /Pagina-web-dw/views/fpass1.php");
  exit();
}
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
    <main class="main-login">
        <div class="form-login">
            <h2>Ingresa el codigo de 4 digitos que se mando en tu correo</h2>

            <fieldset class="f-login">
                <legend>Codigo Recuperacion</legend>
                <input type="number" class="i-login" maxlength="4" required placeholder="••••">
            </fieldset>
            
            <button type="submit" class="submit">Ingresar</button>
        </div>
    </main>
</body>
</html>