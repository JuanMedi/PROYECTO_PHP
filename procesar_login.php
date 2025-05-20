<?php
session_start();
require_once 'config/db.php';

$db = Database::connect();

// Recoger datos
$nombre_usuario = $_POST['nombre_usuario'];
$contraseña = $_POST['contraseña'];

// Buscar usuario
$stmt = $db->prepare("SELECT id, nombre, contraseña FROM usuarios WHERE nombre_usuario = ?");
$stmt->bind_param("s", $nombre_usuario);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $nombre, $hash);
    $stmt->fetch();

    // Verificar contraseña (si estás usando password_hash, si no, usa comparación directa)
    if (password_verify($contraseña, $hash)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user'] = $nombre; // Aquí guardas el nombre

        header("Location: index.php");
        exit;
    } else {
        echo "❌ Contraseña incorrecta";
    }
} else {
    echo "❌ Usuario no encontrado";
}
$stmt->close();
