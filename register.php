<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            
                $nombre = $_POST["nombre"] ?? '';
                $apellido = $_POST["apellido"] ?? '';
                $n_usuario = $_POST["n_usuario"] ?? '';
                $email = $_POST["email"] ?? '';
                $contrasena = $_POST["contrasena"] ?? '';
                $rcontrasena = $_POST["rcontrasena"] ?? '';
                
                
                
            if($nombre, $apellido, $n_usuario, $email, $contrasena){

                $servidor = "localhost";
                $usu = "root";
                $contra = "";
                $db = "calmaturnos";


                $conexion = new mysqli($servidor, $usu, $contra, $db);

                if($conexion -> connect_error)
                {
                    die("Conexión fallida" . $conexion -> connect_error);
                }
                else
                {
                
                    $sql = "INSERT INTO usuarios(nombre, apellido, n_usuario, email, contrasena) values (?,?,?,?,?)";

                    $declaracion = $conexion->prepare($sql);

                    $declaracion->bind_param("sssss", $nombre, $apellido, $n_usuario, $email, $contrasena);

                    if($declaracion->execute())
                    {
                        echo "<br> Datos cargados correctamente";
                    }
                    else
                    {
                        echo "<br> No se ejecuta la consulta correctamente";
                    }

                    $declaracion -> close();
                    $conexion -> close();
                }
            }
            else
            {
                echo"Escriba todos los valores";
            }

    }
    else
    {
        echo("Error: Acceso no permitido");
    }
?>