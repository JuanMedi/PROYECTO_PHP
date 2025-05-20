<?php
require_once __DIR__ . '/../config/db.php';

class RolUsuariosModel {
    private $id;
    private $nombre;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function setId($id) {
        $this->id = (int)$id;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll() {
        $sql = "SELECT * FROM Rol_Usuario";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM Rol_Usuario WHERE id = $id LIMIT 1";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function save() {
        $sql = "INSERT INTO Rol_Usuario (nombre) VALUES ('{$this->nombre}')";
        return $this->db->query($sql);
    }

    public function update() {
        $sql = "UPDATE Rol_Usuario SET nombre = '{$this->nombre}' WHERE id = {$this->id}";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM Rol_Usuario WHERE id = $id";
        return $this->db->query($sql);
    }
}
