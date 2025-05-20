<?php
require_once __DIR__ . '/../config/db.php';

class MensajesContactosModel {
    private $id;
    private $id_usuario;
    private $fecha;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = (int)$id_usuario;
    }

    public function getAll() {
        $sql = "
            SELECT m.*, u.nombre AS usuario_nombre 
            FROM Mensaje_Contactos m 
            JOIN Usuarios u ON m.id_usuario = u.id
        ";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM Mensaje_Contactos WHERE id = $id LIMIT 1";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function save() {
        $sql = "
            INSERT INTO Mensaje_Contactos (id_usuario)
            VALUES ({$this->id_usuario})
        ";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM Mensaje_Contactos WHERE id = $id";
        return $this->db->query($sql);
    }
}
