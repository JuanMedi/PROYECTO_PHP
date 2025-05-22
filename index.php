<?php
require_once 'setup/create_database.php';
require_once __DIR__ . '/config/db.php'; // Asegúrate de tener acceso a la base de datos

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';

    if (!empty($email)) {
        // Buscar usuario en la base de datos
        $db = Database::connect();
        $email = $db->real_escape_string($email);

        $sql = "SELECT * FROM Usuarios WHERE email = '$email' LIMIT 1";
        $result = $db->query($sql);

        if ($result && $result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            $_SESSION['user_id'] = $usuario['id']; // ← Guardar ID en sesión
            $_SESSION['email'] = $usuario['email']; // ← Guardar email en sesión (opcional)

            header("Location: layout.php?page=main");
            exit;
        } else {
            echo "<p style='color:red'>Usuario no encontrado.</p>";
        }
    }
} else {
    header('location: login.php'); // Redirige si no es POST
    exit;
}
?>
