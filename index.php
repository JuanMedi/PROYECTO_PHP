<?php

require_once 'setup/create_database.php';

session_start(); // <- Esto es lo que te falta
header('location: login.php'); // <- Redirigir a login.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? 'login.php';

    if (!empty($email)) {
        $_SESSION['email'] = $email; // <- Guardar el usuario en la sesión
        header("Location: layout.php?page=main"); // Redirigir
        exit;
    };
}
?>
