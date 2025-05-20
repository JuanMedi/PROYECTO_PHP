<?php
require_once __DIR__ . '/../Models/ActividadesModel.php';
require_once __DIR__ . '/../Models/NivelActividadesModel.php'; // Asegúrate del nombre correcto

class ActividadesController {
    private $actividadModel;
    private $nivelModel;

    public function __construct() {
        $this->actividadModel = new ActividadesModel();
        $this->nivelModel = new NivelActividadesModel(); // Corrige el nombre si era incorrecto
    }

    // Obtener todas las actividades
    public function getAll() {
        return $this->actividadModel->getAll();
    }

    // Obtener una actividad por ID
    public function getById($id) {
        return $this->actividadModel->getById($id);
    }

    // Crear una nueva actividad
    public function crear($data) {
        $this->actividadModel->setNombre($data['nombre']);
        $this->actividadModel->setNivelId($data['nivel_id']);
        $this->actividadModel->setDescripcion($data['descripcion']);
        $this->actividadModel->setTiempoEstimado($data['tiempo_estimado']);
        return $this->actividadModel->save();
    }

    // Actualizar una actividad
    public function actualizar($id, $data) {
        $this->actividadModel->setId($id);
        $this->actividadModel->setNombre($data['nombre']);
        $this->actividadModel->setNivelId($data['nivel_id']);
        $this->actividadModel->setDescripcion($data['descripcion']);
        $this->actividadModel->setTiempoEstimado($data['tiempo_estimado']);
        return $this->actividadModel->update();
    }

    // Eliminar una actividad
    public function eliminar($id) {
        return $this->actividadModel->delete($id);
    }

    // Obtener todos los niveles para uso en formularios u otros
    public function getNiveles() {
        return $this->nivelModel->getAll();
    }
}
