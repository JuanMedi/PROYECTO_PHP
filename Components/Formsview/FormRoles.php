<?php
require_once __DIR__ . '/../../Controllers/RolUsuariosController.php';
$controller = new RolUsuariosController();

$editando = false;
$Rol = [
    'nombre' => '',
];

if (isset($_GET['id'])) {
    $editando = true;
    $Rol = $controller->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $controller->actualizar($_POST['id'], $data);
    } else {
        $controller->crear($data);
    }
    header('Location: ../../layoutadmin.php?page=adminroles');
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
            <input type="text" name="nombre" value="<?= htmlspecialchars($Rol['nombre']) ?>" required><br>

            <button type="submit"><?= $editando ? 'Actualizar' : 'Crear' ?> Rol</button>
        </form>
    </div>
    <a href="/PROYECTO_PHP/layoutadmin.php?page=adminroles">Volver a lista</a>
</div>