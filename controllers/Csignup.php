    <?php
    require_once __DIR__ . '/../models/Msignup.php';

    class Sign {
        public function Registrarusu($nombre, $apellido, $usuario, $email, $password){
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST['nombre'] ?? null;
            $apellido = $_POST['apellido'] ?? null;
            $usuario = $_POST['n_usuario'] ?? null;
            $email = $_POST['email'] ?? null;
            $password = $_POST['contrasena'] ?? null;
            $rcontrasena = $_POST['rcontrasena'] ?? null;

        if (empty($nombre) || empty($apellido) || empty($usuario) || empty($email) || empty($password)) {
            return "Todos los campos son obligatorios.";
        }


        if ($password === !$rcontrasena) {
            return "Las contraseñas no coinciden";
        }

            $modelo = new Msingup();
            $stmt = $modelo->Sign($nombre, $apellido, $usuario, $email, $password);
            $result = $stmt->Msingup();
            header('Location: ../controllers/Clogin.php');
            exit();
        }
    }
}
   
require_once __DIR__ . '/../views/register.php';
?>