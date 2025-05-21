<?php
require_once __DIR__ . '/../../Controllers/ActividadesController.php'; // ✅ dos niveles hacia arriba desde views/users
$ActividadController = new ActividadesController();
$actividades = $ActividadController->getAll();
?>

<div class="Ejercicios">
    <h2 class="text-azul">Lista de Actividades</h2>

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
                    <a href="editActividad.php?id=<?= $actividad['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="deleteActividad.php?id=<?= $actividad['id'] ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
   
</div>
<a href="layout.php?page=main">Volver a interfaz de usuarios</a>