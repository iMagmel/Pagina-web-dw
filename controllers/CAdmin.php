<?php
require_once __DIR__ . '/../models/MAdmin.php';

class CAdmin {
    private $modelo;

    public function __construct() {
        $this->modelo = new MAdmin();
    }

    public function ObtenerLogs() {
        return $this->modelo->GetLogs();
    }

    public function ObtenerUsuarios() {
        return $this->modelo->GetUsuarios();
    }

    public function EliminarUsuario($id) {
        $this->modelo->DeleteUsuario($id);
        header("Location: /Pagina-web-dw/views/admin.php");
        exit();
    }

    public function EditarUsuario($id, $n_usuario = null, $email = null, $admin = null) {
        if ($n_usuario !== null && $email !== null && $admin !== null) {
            $this->modelo->UpdateUsuario($id, $n_usuario, $email, $admin);
            header("Location: /Pagina-web-dw/views/admin.php");
            exit();
        } else {
            return $this->modelo->GetUsuarioPorId($id);
        }
    }
}
