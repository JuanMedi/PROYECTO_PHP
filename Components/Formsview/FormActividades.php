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

<div class="container form">
    <div class="form">
        <form method="POST">
            <?php if ($editando): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">
            <?php endif; ?>

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($actividad['nombre']) ?>" required><br>

            <label>Descripción:</label>
            <textarea name="descripcion" required><?= htmlspecialchars($actividad['descripcion']) ?></textarea><br>

            <label>Nivel:</label>
            <select name="nivel_id" required>
                <option value="">Seleccionar Nivel</option>
                <?php foreach ($niveles as $nivel): ?>
                    <option value="<?= $nivel['id'] ?>" <?= $nivel['id'] == $actividad['nivel_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($nivel['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Tiempo estimado (minutos):</label>
            <input type="number" name="tiempo_estimado" value="<?= htmlspecialchars($actividad['tiempo_estimado']) ?>" required><br>

            <button type="submit"><?= $editando ? 'Actualizar' : 'Crear' ?> Actividad</button>
        </form>
    </div>

    <a href="/PROYECTO_PHP/layoutadmin.php?page=adminactividades">Volver a lista</a>
</div>
