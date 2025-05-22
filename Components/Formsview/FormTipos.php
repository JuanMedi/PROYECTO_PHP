<?php
require_once __DIR__ . '/../../Controllers/TipoDocumentoController.php';
$controller = new TipoDocumentoController();

$editando = false;
$tipo = [
    'nombre' => '',
];

if (isset($_GET['id'])) {
    $editando = true;
    $tipo = $controller->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $controller->actualizar($_POST['id'], $data);
    } else {
        $controller->crear($data);
    }
    header('Location: ../../layoutadmin.php?page=admintipos');
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
            <input type="text" name="nombre" value="<?= htmlspecialchars($tipo['nombre']) ?>" required><br>

            <button type="submit"><?= $editando ? 'Actualizar' : 'Crear' ?> tipo</button>
        </form>
    </div>
    <a href="/PROYECTO_PHP/layoutadmin.php?page=admintipos">Volver a lista</a>
</div>