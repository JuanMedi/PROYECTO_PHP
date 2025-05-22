<?php
require_once __DIR__ . '/../Models/NivelActividadesModel.php';

class NivelActividadesController {
    private $model;

    public function __construct() {
        $this->model = new NivelActividadesModel();
    }

    // Obtener todos los niveles
    public function getAll() {
        return $this->model->getAll();
    }

    // Obtener un nivel por ID (si tu modelo lo permite, implementa getById)
    public function getById($id) {
        return $this->model->getById($id);
    }

    // Crear nuevo nivel
    public function crear($data) {
        $this->model->setData($data);
        return $this->model->save();
    }

    // Actualizar un nivel existente
    public function actualizar($id, $data) {
        $this->model->setId($id);
        $this->model->setData($data);
        return $this->model->save();
    }

    // Eliminar un nivel
    public function eliminar($id) {
        return $this->model->delete($id);
    }
}
