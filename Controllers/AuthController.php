<?php
require_once 'Models/UsuariosModel.php';

class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuariosModel();
    }

    public function login($email, $password) {
        $usuario = $this->usuarioModel->getUsuarioPorEmail($email);

        if ($usuario && password_verify($password, $usuario['password'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_rol'] = $usuario['rol']; // Opcional, si tienes roles

            header("Location: index.php"); // O redirecciona a un dashboard
            exit;
        } else {
            $_SESSION['error'] = "Credenciales inválidas.";
            header("Location: login.php");
            exit;
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit;
    }
}
?>
