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
    header('Location:/PROYECTO_PHP/layoutadmin.php?page=admintipos');
    exit;
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


<div class="container mt-5 mb-5">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-verde text-white">
            <h4 class="mb-0"><?= $editando ? 'Editar' : 'Crear' ?> Tipo</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <?php if ($editando): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Tipo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($tipo['nombre']) ?>" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/PROYECTO_PHP/layoutadmin.php?page=admintipos" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Volver a la lista
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-check"></i> <?= $editando ? 'Actualizar' : 'Crear' ?> Tipo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
