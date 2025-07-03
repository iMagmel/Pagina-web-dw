    <?php
    require_once __DIR__ . '/../models/Mlogin.php';

    class log {
        public function ValidarLog($usuario, $password){
        
        if (empty($usuario) || empty($password)) {
            return "Todos los campos son obligatorios.";
        }

        $modelo = new Mlogin();
        $stmt = $modelo->Log($usuario, $password);

        $result = $stmt->fetch_assoc();

        if ($result && isset($result['id_usu'])) {  
            
            session_start();
            $_SESSION["id_usu"] = $result["id_usu"];
            $usuario = $_POST['usuario'] ?? '';
            $password = $_POST['password'] ?? '';
            
            header("Location: /Pagina-web-dw/views/index.html");
            exit();

        } else {
            return "Usuario y contraseña incorrecto";
        }
    }
}

require_once __DIR__ . '/../views/login.php';
    ?>