    <?php
    require_once __DIR__ . '/../models/Msignup.php';

    class Sign {
        public function Registrarusu($nombre, $apellido, $usuario, $email, $password){
        
            $passusu = $usuario . $password;
            $passhash = hash('sha256',$passusu);

            $modelo = new Msingup();
            $stmt = $modelo->Sign($nombre, $apellido, $usuario, $email, $passhash);
            
            return $stmt;

        }
    }

   

?>