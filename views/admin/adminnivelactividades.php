<?php
require_once __DIR__ . '/../../Controllers/NivelActividadesController.php'; // ✅ dos niveles hacia arriba desde views/users
$NivelController = new NivelActividadesController();
$Niveles = $NivelController->getAll();
?>
<a href ="createEjercicio.php?id=<?= $Nivel['id'] ?>" class="btn btn-primary">Crear Nivel</a>
<div class="Ejercicios">
    <h2 class="text-azul">Lista de Niveles</h2>

    <table class="table table-striped">
        <tr>
            <th class="bg-verde">Nivel</th>
            <th class ="bg-verde">Acciones</th>
        </tr>
        <?php foreach ($Niveles as $Nivel): ?>
            <tr>
                <td><?= htmlspecialchars($Nivel['nombre']) ?></td>
                <td>
                    <a href="editNivel.php?id=<?= $Nivel['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="deleteNivel.php?id=<?= $Nivel['id'] ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>   
</div>
<a href="layout.php?page=main">Volver a interfaz de usuarios</a>