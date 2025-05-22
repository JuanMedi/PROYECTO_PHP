<?php
require_once __DIR__ . '/../Models/MensajesContactosModel.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class MensajesContactosController
{
    private $model;

    public function __construct()
    {
        $this->model = new MensajesContactosModel();
    }

    public function getAll()
    {
        return $this->model->getAllConUsuarios();
    }

    public function getById($id)
    {
        return $this->model->getById($id);
    }

    public function createMensaje()
    {
        if (!isset($_SESSION['user_id'])) {
            die('Acceso no autorizado. Usuario no logueado.');
        }

        $id_usuario = $_SESSION['user_id'];
        $this->model->setIdUsuario($id_usuario);

        $success = $this->model->create();

        if ($success) {
            header('Location: ../Layout.php?page=form');
            echo "<script>alert('Mensaje creado exitosamente.');</script>";
        } else {
            die('Error al crear mensaje.');
        }
    }

    public function eliminar($id)
    {
        return $this->model->delete($id);
    }
}

// Manejo simple de POST para crear mensaje
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'crearMensaje') {
    $controller = new MensajesContactosController();
    $controller->createMensaje();
}

