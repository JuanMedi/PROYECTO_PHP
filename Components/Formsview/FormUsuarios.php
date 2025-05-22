<?php
require_once __DIR__ . '/../../Controllers/UsuariosController.php';
$controller = new UsuariosController();

$editando = false;
$usuario = [
    'nombre' => '',
    'apellido' => '',
    'tipo_documento_id' => '',
    'numero_documento' => '',
    'telefono' => '',
    'email' => '',
    'nombre_usuario' => '',
    'contraseña' => '',
    'rol_id' => ''
];

if (isset($_GET['id'])) {
    $editando = true;
    $usuario = $controller->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $controller->actualizar($_POST['id'], $data);
    } else {
        $controller->crear($data);
    }
    header('Location: ../../layoutadmin.php?page=adminusuarios');
    exit;
}
?>

<div class="container form">
    <div class=form>
        <form method="POST">
            <?php if ($editando): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">
            <?php endif; ?>

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required><br>

            <label>Apellido:</label>
            <input type="text" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required><br>

            <label>Tipo Documento:</label>
            <input type="number" name="tipo_documento_id" value="<?= htmlspecialchars($usuario['tipo_documento_id']) ?>" required><br>

            <label>Número Documento:</label>
            <input type="text" name="numero_documento" value="<?= htmlspecialchars($usuario['numero_documento']) ?>" required><br>

            <label>Teléfono:</label>
            <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>" required><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required><br>

            <label>Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>" required><br>

            <?php if (!$editando): ?>
                <label>Contraseña:</label>
                <input type="password" name="contraseña" required><br>
            <?php endif; ?>

            <label>Rol:</label>
            <input type="number" name="rol_id" value="<?= htmlspecialchars($usuario['rol_id']) ?>" required><br>

            <button type="submit"><?= $editando ? 'Actualizar' : 'Crear' ?> Usuario</button>
        </form>
    </div>
    <a href="/PROYECTO_PHP/layoutadmin.php?page=adminusuarios">Volver a lista</a>
</div>