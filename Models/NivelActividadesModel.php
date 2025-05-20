<?php
require_once __DIR__ . '/../config/db.php';

class NivelActividadesModel {
    private $id;
    private $nombre;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Getters y setters para id y nombre
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = (int)$id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    // Obtener todos los niveles
    public function getAll() {
        $sql = "SELECT * FROM Nivel_Actividades";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // Insertar nuevo nivel
    public function guardar() {
        $sql = "INSERT INTO Nivel_Actividades (nombre) VALUES ('{$this->nombre}')";
        return $this->db->query($sql);
    }

    // Consultar nivel por ID
    public function getById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM Nivel_Actividades WHERE id = $id LIMIT 1";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_assoc();
    }

    // Actualizar nivel
    public function actualizar() {
        $id = (int)$this->id;
        $sql = "UPDATE Nivel_Actividades SET nombre = '{$this->nombre}' WHERE id = $id";
        return $this->db->query($sql);
    }

    // Borrar nivel
    public function borrar($id) {
        $id = (int)$id;
        $sql = "DELETE FROM Nivel_Actividades WHERE id = $id";
        return $this->db->query($sql);
    }
}
