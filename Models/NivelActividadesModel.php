<?php
require_once __DIR__ . '/../config/db.php';

class NivelActividadesModel {
    private $db;
    private $id;
    private $nombre;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function setId($id) {
        $this->id = (int)$id;
    }

    public function setData($data) {
        $this->nombre = $this->db->real_escape_string($data['nombre']);
    }

    public function getAll() {
        $sql = "SELECT * FROM Nivel_Actividades";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM Nivel_Actividades WHERE id = $id LIMIT 1";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function save() {
        if (isset($this->id)) {
            // Actualizar
            $sql = "UPDATE Nivel_Actividades SET nombre = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("si", $this->nombre, $this->id);
        } else {
            // Insertar
            $sql = "INSERT INTO Nivel_Actividades (nombre) VALUES (?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $this->nombre);
        }

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM Nivel_Actividades WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}
