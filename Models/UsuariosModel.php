<?php
require_once __DIR__ . '/../config/db.php';

class UsuariosModel{
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

    public function userExists($email, $contraseña) {
    $sql = "SELECT * FROM Usuarios WHERE email = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Verifica la contraseña con hash
        if (password_verify($contraseña, $user['contraseña'])) {
            return $user; // Devuelve datos del usuario si existe
        }
    }
    return false;
}


    public function setemail($email) {
        $query = $this->db->prepare("SELECT * FROM Usuarios WHERE email = :email");
        $query->execute([':email' => $email]);

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
        $sql = "INSERT INTO Usuarios 
            (nombre, apellido, tipo_documento_id, numero_documento, telefono, email, nombre_usuario, contraseña, rol_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación: " . $this->db->error);
        }

        $hashed_password = password_hash($this->contraseña, PASSWORD_DEFAULT);

        $stmt->bind_param(
            "ssisssssi",
            $this->nombre,
            $this->apellido,
            $this->tipo_documento_id,
            $this->numero_documento,
            $this->telefono,
            $this->email,
            $this->nombre_usuario,
            $hashed_password,
            $this->rol_id
        );

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function obtenerNombrePorEmail($email) {
    $sql = "SELECT nombre_usuario FROM Usuarios WHERE email = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($nombre);
    if ($stmt->fetch()) {
        return $nombre;
    } else {
        return null;
    }
    }     


    public function delete($id) {
        $id = (int)$id;
        $sql = "DELETE FROM Usuarios WHERE id = $id";
        return $this->db->query($sql);
    }

    public function esAdmin($id_usuario) {
    $query = "SELECT rol_id FROM Usuarios WHERE id = ?";
    $stmt = $this->db->prepare($query);

    if (!$stmt) {
        return false; // Error en la preparación de la consulta
    }

    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->bind_result($rol_id);

    if ($stmt->fetch()) {
        $stmt->close();
        return $rol_id === 1; // Devuelve true si el rol es admin (ID 1)
    } else {
        $stmt->close();
        return false; // Usuario no encontrado
    }
    }

}