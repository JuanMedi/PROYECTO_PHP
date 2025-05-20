<?php
require_once __DIR__ . '/../config/db.php';

class ActividadesModel {
    private $id;
    private $nombre;
    private $nivel_id;
    private $descripcion;
    private $tiempo_estimado;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Getters opcionales
    public function getId() {
        return $this->id;
    }

    // Setters
    public function setId($id) {
        $this->id = (int)$id;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setNivelId($nivel_id) {
        $this->nivel_id = (int)$nivel_id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function setTiempoEstimado($tiempo) {
        $this->tiempo_estimado = (float)$tiempo;
    }

    // Obtener todas las actividades con el nombre del nivel
    public function getAll() {
        $sql = "
            SELECT a.*, n.nombre AS nivel_nombre 
            FROM Actividades a 
            LEFT JOIN Nivel_Actividades n ON a.nivel_id = n.id
        ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Guardar nueva actividad
    public function save() {
        $sql = "
            INSERT INTO Actividades (nombre, nivel_id, descripcion, tiempo_estimado)
            VALUES (
                '{$this->nombre}', 
                {$this->nivel_id}, 
                '{$this->descripcion}', 
                {$this->tiempo_estimado}
            )
        ";
        return $this->db->query($sql);
    }

    // Consultar por ID
    public function getById($id) {
        $id = (int)$id;
        $sql = "
            SELECT a.*, n.nombre AS nivel_nombre 
            FROM Actividades a 
            LEFT JOIN Nivel_Actividades n ON a.nivel_id = n.id
            WHERE a.id = $id LIMIT 1
        ";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    // Actualizar actividad
    public function update() {
        $sql = "
            UPDATE Actividades 
            SET 
                nombre = '{$this->nombre}', 
                nivel_id = {$this->nivel_id}, 
                descripcion = '{$this->descripcion}', 
                tiempo_estimado = {$this->tiempo_estimado}
            WHERE id = {$this->id}
        ";
        return $this->db->query($sql);
    }

    // Borrar actividad
    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM Actividades WHERE id = $id";
        return $this->db->query($sql);
    }
}
