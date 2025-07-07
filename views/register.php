<?php

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
    <main class="main-register">
        <form action="" method="post" class="form-login">
            <h2>Registro</h2>
            <fieldset class="f-login">
                <legend>Nombre</legend>
                <input type="text" class="i-login" name="nombre" placeholder="Nombre" />
            </fieldset>

            <fieldset class="f-login">
                <legend>Apellido</legend>
                <input type="text" class="i-login" name="apellido" placeholder="Apellido" />
            </fieldset>

            <fieldset class="f-login">
                <legend>Nombre de usuario</legend>
                <input type="text" class="i-login" name="n_usuario" placeholder="Nombre de usuario" />
            </fieldset>

            <fieldset class="f-login">
                <legend>Correo electronico</legend>
                <input type="email" class="i-login" name="email" placeholder="Correo electronico" />
            </fieldset>

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

            <input type="submit" class="submit" value = "Registrarse"/>
        </form>
    </main>

    <script>
     

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