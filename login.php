<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

"<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" href="Access/Img/Icono.jpeg" type="image/jpeg"> <!-- Icono de la pestaña -->
    <link rel="stylesheet" type="text/css" href="Access/css/style.css">
</head>
<body class = 'Contenido-login'>
    <div id = 'login-container'>
        <h1 id = 'text-login'>Iniciar Sesión</h1>
        <form action="controllers/LoginController.php" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>

            <?php if ($error): ?>
                <p style="color:red"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
        </form>
    </div>
    <a href='singup.php'>Registrarse</a>
</body>
</html>