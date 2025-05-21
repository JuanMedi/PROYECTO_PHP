<?php
require_once __DIR__ . '/../Models/MensajesContactosModel.php';

class MensajesContactosController {
    private $model;

    public function __construct() {
        $this->model = new MensajesContactosModel();
    }

    public function getAll() {
        return $this->model->getAll();
    }

    public function getById($id) {
        return $this->model->getById($id);
    }

    public function createMensaje() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id_usuario = (int)$_POST['id'];

            $modelo = new MensajesContactosModel();
            $modelo->setIdUsuario($id_usuario);
            $exito = $modelo->create();

            if ($exito) {
                echo "<p>Mensaje registrado con éxito.</p>";
            } else {
                echo "<p>Error al registrar el mensaje.</p>";
            }
        } else {
            echo "<p>Faltan datos para registrar el mensaje.</p>";
        }
    }

    public function eliminar($id) {
        return $this->model->delete($id);
    }
}
