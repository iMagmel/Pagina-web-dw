<?php
session_start();
if (!isset($_SESSION['recuperar_email'])) {
  header("Location: /Pagina-web-dw/views/fpass1.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <main class="main-login">
        <form action = "../controllers/Cfpass3.php" method="POST" class="form-login">
            <h2>Renova tu contraseña</h2>

            <fieldset class="f-login">
                <legend>Contraseña</legend>
                <input type="password" class="i-login" id="pass1" name="contrasena" placeholder="Contraseña" />
                <input type="checkbox" onclick="verPass('pass1')" />
            </fieldset>

            <fieldset class="f-login">
                <legend>Repetir contraseña</legend>
                <input type="password" class="i-login" id="pass2" name="rcontrasena" placeholder="Repetir contraseña" />
                <input type="checkbox" onclick="verPass('pass2')" />
            </fieldset>

            <input type="submit" class="submit" value="Registrarse" />
        </form>
    </main>

    <script>
        document.querySelector('.form-login').addEventListener('submit', function (event) {
            const inputs = this.querySelectorAll('input[type="text"], input[type="password"]');
            for (let input of inputs) {
                if (input.value.trim() === '') {
                    event.preventDefault();
                    input.focus();
                    return;
                }
            }
        });

        function verPass(id) {
            let pass = document.getElementById(id);
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        }
    </script>
</body>

</html>
