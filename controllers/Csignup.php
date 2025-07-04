    <?php
    require_once __DIR__ . '/../models/Msignup.php';

    class Sign {
        public function Registrarusu($nombre, $apellido, $usuario, $email, $password){
        
        if (empty($nombre) || empty($apellido) || empty($usuario) || empty($email) || empty($password)) {
            return "Todos los campos son obligatorios.";
        }

        $modelo = new Msingup();
        $stmt = $modelo->Sign($nombre, $apellido, $usuario, $email, $password);

        $result = $stmt->Msingup();

        return $result;
    }
}

require_once __DIR__ . '/../views/register.php';
?>