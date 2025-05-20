<?php
require_once __DIR__ . '/../config/db.php';

class TipoDocumentoModel {
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
        $sql = "SELECT * FROM Tipo_Documento";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM Tipo_Documento WHERE id = $id LIMIT 1";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function save() {
        $sql = "INSERT INTO Tipo_Documento (nombre) VALUES ('{$this->nombre}')";
        return $this->db->query($sql);
    }

    public function update() {
        $sql = "UPDATE Tipo_Documento SET nombre = '{$this->nombre}' WHERE id = {$this->id}";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM Tipo_Documento WHERE id = $id";
        return $this->db->query($sql);
    }
}
