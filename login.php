<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

                $n_usuario = $_POST["n_usuario"] ?? '';
                $contrasena = $_POST["contrasena"] ?? '';          
                
            if($n_usuario, $contrasena){

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
                
                    $sql = " usuarios(n_usuario, contrasena) values (?,?)";

                    $declaracion = $conexion->prepare($sql);

                    $declaracion->bind_param("ss",$n_usuario, $contrasena);

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