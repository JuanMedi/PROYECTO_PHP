<?php
require_once __DIR__ . '/../Models/UsuariosModel.php';

class UsuariosController {
    private $model;

    public function __construct() {
        $this->model = new UsuariosModel();
    }

    public function getAll() {
        return $this->model->getAll();
    }

    public function getById($id) {
        return $this->model->getById($id);
    }

    public function crear($data) {
    $this->model->setData($data);
    return $this->model->save();
}

    public function actualizar($id, $data) {
    $this->model->setId($id);
    $this->model->setData($data);
    return $this->model->update($id); // Ahora sí
}


    public function eliminar($id) {
        return $this->model->delete($id);
    }
}
