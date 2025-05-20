<?php
require_once __DIR__ . '/../config/db.php';

class UsuariosModel {
    private $db;
    private $id;
    private $nombre;
    private $apellido;
    private $tipo_documento_id;
    private $numero_documento;
    private $telefono;
    private $email;
    private $nombre_usuario;
    private $contraseña;
    private $rol_id;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function setId($id) {
        $this->id = (int)$id;
    }

    public function setData($data) {
        $this->nombre = $this->db->real_escape_string($data['nombre']);
        $this->apellido = $this->db->real_escape_string($data['apellido']);
        $this->tipo_documento_id = (int)$data['tipo_documento_id'];
        $this->numero_documento = $this->db->real_escape_string($data['numero_documento']);
        $this->telefono = $this->db->real_escape_string($data['telefono']);
        $this->email = $this->db->real_escape_string($data['email']);
        $this->nombre_usuario = $this->db->real_escape_string($data['nombre_usuario']);
        $this->contraseña = $this->db->real_escape_string($data['contraseña']);
        $this->rol_id = (int)$data['rol_id'];
    }

    

    public function getAll() {
        $sql = "
            SELECT u.*, r.nombre AS rol_nombre, t.nombre AS tipo_documento_nombre
            FROM Usuarios u
            JOIN Rol_Usuario r ON u.rol_id = r.id
            JOIN Tipo_Documento t ON u.tipo_documento_id = t.id
        ";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM Usuarios WHERE id = $id LIMIT 1";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function save() {
        $sql = "
            INSERT INTO Usuarios 
                (nombre, apellido, tipo_documento_id, numero_documento, telefono, email, nombre_usuario, contraseña, rol_id)
            VALUES 
                ('{$this->nombre}', '{$this->apellido}', {$this->tipo_documento_id}, '{$this->numero_documento}', 
                 '{$this->telefono}', '{$this->email}', '{$this->nombre_usuario}', '{$this->contraseña}', {$this->rol_id})
        ";
        return $this->db->query($sql);
    }

    public function update($id) {
        $id = (int)$id;
        $sql = "
            UPDATE Usuarios SET 
                nombre = '{$this->nombre}', 
                apellido = '{$this->apellido}', 
                tipo_documento_id = {$this->tipo_documento_id}, 
                numero_documento = '{$this->numero_documento}',
                telefono = '{$this->telefono}',
                email = '{$this->email}',
                nombre_usuario = '{$this->nombre_usuario}',
                contraseña = '{$this->contraseña}',
                rol_id = {$this->rol_id}
            WHERE id = $id
        ";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM Usuarios WHERE id = $id";
        return $this->db->query($sql);
    }
}
