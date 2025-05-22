<?php
require_once __DIR__ . '/../../Controllers/ActividadesController.php'; // ✅ dos niveles hacia arriba desde views/users
$ActividadController = new ActividadesController();
$actividades = $ActividadController->getAll();
?>

<div class= "Actividades">
    <div class="d-flex align-items-center" style="justify-content: space-between;">
        <h2 class="text-azul">Lista de Actividades(<?= count($actividades) ?>)</h2>
        <a href ="/PROYECTO_PHP/layoutadmin.php?page=FormActividades" class="btn btn-primary">Crear Actividad</a>
    </div>

    <div class = "table-responsive">
        <table class="table table-striped">
            <tr>
                <th class="bg-verde">Actividad</th>
                <th class="bg-verde">Nivel</th>
                <th class="bg-verde">Descripción</th>
                <th class="bg-verde">Tiempo de ejecución</th>
                <th class ="bg-verde">Acciones</th>
            </tr>
            <?php foreach ($actividades as $actividad): ?>
                <tr>
                    <td><?= htmlspecialchars($actividad['nombre']) ?></td>
                    <td><?= htmlspecialchars($actividad['nivel_nombre']) ?></td>
                    <td><?= htmlspecialchars($actividad['descripcion']) ?></td>
                    <td><?= htmlspecialchars($actividad['tiempo_estimado']) ?> minutos</td>
                    <td>
                        <a href="/PROYECTO_PHP/layoutadmin.php?page=FormActividades&id=<?= $actividad['id'] ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="Components/Delete/deleteActividad.php?id=<?= $actividad['id'] ?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <a href="layout.php?page=main">Volver a interfaz de usuarios</a>
</div>


