<?php
require_once __DIR__ . '/../../Controllers/NivelActividadesController.php'; // ✅ dos niveles hacia arriba desde views/users
$NivelController = new NivelActividadesController();
$Niveles = $NivelController->getAll();
?>

<div class = "Niveles">
    <div class="d-flex align-items-center" style="justify-content: space-between;">
        <h2 class="text-azul">Lista de Niveles</h2>
        <a href ="Components/Formsview/FormNiveles.php" class="btn btn-primary">Crear Nivel</a>
    </div>

    <div class = "table-responsive">
        <table class="table table-striped">
            <tr>
                <th class="bg-verde">Nombre</th>
                <th class ="bg-verde">Acciones</th>
            </tr>
            <?php foreach ($Niveles as $Nivel): ?>
            <tr>
                <td><?= htmlspecialchars($Nivel['nombre']) ?></td>
                <td>
                    <a href="Components/Formsview/FormNiveles.php?id=<?= $Nivel['id'] ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="Components/Delete/deleteNivel.php?id=<?= $Nivel['id'] ?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <a href="layout.php?page=main">Volver a interfaz de usuarios</a>
</div>

