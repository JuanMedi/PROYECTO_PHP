<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

"
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" href="Access/Img/Icono.jpeg" type="image/jpeg"> <!-- Icono de la pestaña -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Access/css/style.css">
</head>

<body class='Contenido-login'>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card" style="width: 50rem;">
            <div class="card-header">
                <h1 id='text-login'>Iniciar Sesión</h1>
            </div>
            <div class="card-body">
                <form action="controllers/LoginController.php" method="POST" class="m-0">

                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" placeholder="Correo electrónico" required class="form-control">

                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" name="contraseña" placeholder="Contraseña" required class="form-control">

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>

                    <?php if ($error): ?>
                        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                </form>
            </div>
            <div class="card-footer text-muted">
                <p id='text-login'>¿No tienes cuenta? <a href="signup.php">Regístrate</a></p>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>