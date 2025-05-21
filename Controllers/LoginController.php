<?php
require_once __DIR__ . '/../Controllers/UsuariosController.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $contraseña = $_POST['contraseña'] ?? '';

    if (!empty($email) && !empty($contraseña)) {
        $controller = new UsuariosController();
        $usuario = $controller->login($email, $contraseña);

        if ($usuario) {
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
            header("Location: ../layout.php?page=main");
            exit;
        } else {
            $_SESSION['error'] = "Email o contraseña incorrectos.";
            header("Location: ../login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Por favor completa todos los campos.";
        header("Location: ../login.php");
        exit;
    }
}
