<?php
// Asumiendo conexión en $db (mysqli)
require_once 'config/db.php';  // o la ruta correcta

$db = Database::connect();  // Esto inicializa $db para usarlo luego

// Ahora sí puedes hacer queries con $db
$tiposDocumento = $db->query("SELECT id, nombre FROM tipo_documento")->fetch_all(MYSQLI_ASSOC);
$roles = $db->query("SELECT id, nombre FROM Rol_Usuario")->fetch_all(MYSQLI_ASSOC);


// Variables para valores por defecto (para edición o formulario vacío)
$usuario_nombre = $_POST['nombre'] ?? '';
$usuario_apellido = $_POST['apellido'] ?? '';
$usuario_tipo_documento_id = $_POST['tipo_documento_id'] ?? '';
$usuario_numero_documento = $_POST['numero_documento'] ?? '';
$usuario_telefono = $_POST['telefono'] ?? '';
$usuario_email = $_POST['email'] ?? '';
$usuario_nombre_usuario = $_POST['nombre_usuario'] ?? '';
$usuario_rol_id = $_POST['rol_id'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="icon" href="Access/Img/Icono.jpeg" type="image/jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Access/css/style.css">
</head>

<body class='Contenido-signup'>
    <div class='container'>
        <div class="card">
            <div class="card-header">
                <h1>Registrarse</h1>
            </div>
            <div class="card-body">
                <form class="signup-form" method="POST" action="procesar_signup.php">

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nombres">Nombres:</label>
                            <input type="text" id="nombres" name="nombre" value="<?= htmlspecialchars($usuario_nombre) ?>" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellido" value="<?= htmlspecialchars($usuario_apellido) ?>" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="tipoDocumento">Tipo de documento:</label>
                            <select id="tipoDocumento" name="tipo_documento_id" required class="form-control">
                                <option value="">Seleccione</option>
                                <?php foreach ($tiposDocumento as $tipo): ?>
                                    <option value="<?= $tipo['id'] ?>" <?= ($tipo['id'] == $usuario_tipo_documento_id) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($tipo['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="mb-3 col-md-6">
                            <label for="numeroDocumento">Número de documento:</label>
                            <input type="text" id="numeroDocumento" name="numero_documento" value="<?= htmlspecialchars($usuario_numero_documento) ?>" required class="form-control">
                        </div>


                        <div class="mb-3 col-md-6">
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" value="<?= htmlspecialchars($usuario_telefono) ?>" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="email">Correo electrónico:</label>
                            <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario_email) ?>" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="usuarios">Nombre de Usuario:</label>
                            <input type="text" id="usuarios" name="nombre_usuario" value="<?= htmlspecialchars($usuario_nombre_usuario) ?>" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password">Contraseña:</label>
                            <input type="password" id="password" name="contraseña" required class="form-control">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="rol">Rol de Usuario:</label>
                            <select id="rol" name="rol_id" required class="form-control">
                                <option value="">Seleccione</option>
                                <?php foreach ($roles as $rol): ?>
                                    <option value="<?= $rol['id'] ?>" <?= ($rol['id'] == $usuario_rol_id) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($rol['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Enviar datos</button>
                        </div>
                    </div>


                </form>
            </div>
            <div class="card-footer text-muted">
                <p id='text-login'>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>