<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main class="main-register">
        <form action="register.php" method="post" class="form-login">
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
                <input type="text" class="i-login" name="email" placeholder="Correo electronico" />
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

            <input type="submit" class="submit" value="Registrarse" />

            <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $n_usuario = $_POST['n_usuario'] ?? null;
    $email = $_POST['email'] ?? null;
    $contrasena = $_POST['contrasena'] ?? null;
    $rcontrasena = $_POST['rcontrasena'] ?? null;

    if (!$nombre || !$apellido || !$n_usuario || !$email || !$contrasena || !$rcontrasena) {
    echo "⚠️ Por favor complete todos los campos del formulario.";
    } else {
    if ($contrasena !== $rcontrasena) {
        echo "<br>❌ Las contraseñas no coinciden.";
        exit;
    }

    $servidor = "localhost";
    $usu = "root";
    $contra = "";
    $db = "calmaturnos";

    $conexion = new mysqli($servidor, $usu, $contra, $db);

    if ($conexion->connect_error) {
        die("❌ Conexión fallida: " . $conexion->connect_error);
    }

    $sql = "CALL sp_CrearUsuario(?, ?, ?, ?, ?)";
    $declaracion = $conexion->prepare($sql);

    if ($declaracion) {
        $declaracion->bind_param("sssss", $nombre, $apellido, $n_usuario, $email, $contrasena);

        if ($declaracion->execute()) {
            echo "<br>✅ Usuario registrado correctamente.";
        } else {
            echo "<br>❌ Error al ejecutar el procedimiento: " . $declaracion->error;
        }

        $declaracion->close();
    } else {
        echo "<br>❌ Error al preparar la consulta: " . $conexion->error;
    }

    $conexion->close();
    }
}
else
{
    echo("Error: Acceso no permitido");
}
?>


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
