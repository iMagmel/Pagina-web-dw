<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
   
    <main class="main-login">
        <form action="login.php" method="post" class="form-login">
            <h2>Inicio de sesion</h2>

            <fieldset class="f-login">
                <legend>Nombre de usuario</legend>
                <input type="text" class="i-login" name="n_usuario" placeholder="Nombre de usuario">
            </fieldset>

            <fieldset class="f-login">
                <legend>Contraseña</legend>
                <input type="password" class="i-login" name="contrasena" id="pass" placeholder="Contraseña">
              <input type="checkbox" id="ver-pass" onclick="verPass()">
            </fieldset>
            <label id="cc-login"><a href="register.html">Crear cuenta</a></label>
            <label id="forget-login"><a href="forgetpass.html">Olvide mi contraseña</a></label>

            <button type="submit" class="submit">Ingresar</button>

        <?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $n_usuario = $_POST['n_usuario'] ?? null;
    $contrasena = $_POST['contrasena'] ?? null;

    if (!$n_usuario || !$contrasena) {
    echo "⚠️ Por favor complete todos los campos del formulario.";
    } else {

    $servidor = "localhost";
    $usu = "root";
    $contra = "";
    $db = "calmaturnos";

    $conexion = new mysqli($servidor, $usu, $contra, $db);

    if ($conexion->connect_error) {
        die("❌ Conexión fallida: " . $conexion->connect_error);
    }

    $sql = "CALL sp_BuscarUsuario(?,?)";
    $declaracion = $conexion->prepare($sql);

    if ($declaracion) {
        $declaracion->bind_param("ss", $n_usuario, $contrasena);

        if ($declaracion->execute()) {
            echo "<br>✅ Inicio de sesion correcto.";
             header("Location: index.html");
            exit(); 
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
