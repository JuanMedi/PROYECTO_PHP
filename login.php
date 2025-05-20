<!DOCTYPE html>
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
        <form class = 'login-form' method="POST" action="index.php">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <a href='singup.php'>Registrarse</a>
</body>
</html>