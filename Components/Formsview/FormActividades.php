<?php
require_once __DIR__ . '/../../Controllers/ActividadesController.php';
require_once __DIR__ . '/../../Controllers/NivelActividadesController.php'; // Si tenés niveles

$actividadController = new ActividadesController();
$nivelController = new NivelActividadesController();

$editando = false;
$actividad = [
    'nombre' => '',
    'descripcion' => '',
    'nivel_id' => '',
    'tiempo_estimado' => ''
];

if (isset($_GET['id'])) {
    $editando = true;
    $actividad = $actividadController->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $actividadController->actualizar($_POST['id'], $data);
    } else {
        $actividadController->crear($data);
    }
    header('Location: /PROYECTO_PHP/layoutadmin.php?page=adminactividades');
    exit;
}

$niveles = $nivelController->getAll();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

<div class="container mt-5 mb-5">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-verde text-white">
            <h4 class="mb-0"><?= $editando ? 'Editar' : 'Crear' ?> Actividad</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <?php if ($editando): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">
                <?php endif; ?>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($actividad['nombre']) ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= htmlspecialchars($actividad['descripcion']) ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="nivel_id" class="form-label">Nivel:</label>
                        <select class="form-select" id="nivel_id" name="nivel_id" required>
                            <option value="">Seleccionar Nivel</option>
                            <?php foreach ($niveles as $nivel): ?>
                                <option value="<?= $nivel['id'] ?>" <?= $nivel['id'] == $actividad['nivel_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($nivel['nombre']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="tiempo_estimado" class="form-label">Tiempo estimado (minutos):</label>
                        <input type="number" class="form-control" id="tiempo_estimado" name="tiempo_estimado" value="<?= htmlspecialchars($actividad['tiempo_estimado']) ?>" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/PROYECTO_PHP/layoutadmin.php?page=adminactividades" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Volver a la lista
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-check"></i> <?= $editando ? 'Actualizar' : 'Crear' ?> Actividad
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
