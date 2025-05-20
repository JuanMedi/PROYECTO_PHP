<?php
require_once __DIR__ . '/../Models/TipoDocumentoModel.php';

class TipoDocumentoController {
    private $model;

    public function __construct() {
        $this->model = new TipoDocumentoModel();
    }

    public function getAll() {
        return $this->model->getAll();
    }

    public function getById($id) {
        return $this->model->getById($id);
    }

    public function crear($data) {
        $this->model->setNombre($data['nombre']);
        return $this->model->save();
    }

    public function actualizar($id, $data) {
        $this->model->setId($id);
        $this->model->setNombre($data['nombre']);
        return $this->model->update();
    }

    public function eliminar($id) {
        return $this->model->delete($id);
    }
}
