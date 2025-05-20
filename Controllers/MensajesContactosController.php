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

    public function crear($data) {
        $this->model->setIdUsuario($data['id_usuario']);
        return $this->model->save();
    }

    public function eliminar($id) {
        return $this->model->delete($id);
    }
}
