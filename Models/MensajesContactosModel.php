<?php
require_once __DIR__ . '/../config/db.php';

class MensajesContactosModel
{
    private $id;
    private $id_usuario;
    private $fecha;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = (int) $id_usuario;
    }

    public function getAllConUsuarios()
    {
        $sql = "
        SELECT
            m.*,
            u.nombre AS usuario_nombre,
            u.apellido,
            u.email,
            u.nombre_usuario,
            m.id_usuario -- para que esté disponible sin alias extra
        FROM Mensaje_Contactos m
        JOIN Usuarios u ON m.id_usuario = u.id
        ORDER BY m.fecha DESC
    ";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $id = (int) $id;
        $sql = "SELECT * FROM Mensaje_Contactos WHERE id = $id LIMIT 1";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function create()
    {
        $sql = "
        INSERT INTO Mensaje_Contactos (id_usuario, fecha)
        VALUES ({$this->id_usuario}, NOW())
    ";
        return $this->db->query($sql);
    }

    public function update($id)
    {
        $id = (int) $id;
        $sql = "
            UPDATE Mensaje_Contactos
            SET id_usuario = {$this->id_usuario}
            WHERE id = $id
        ";
        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $id = (int) $id;
        $sql = "DELETE FROM Mensaje_Contactos WHERE id = $id";
        return $this->db->query($sql);
    }
}
