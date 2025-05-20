<?php
require_once __DIR__ . '/../Controllers/ActividadesController.php'; // Asegúrate de usar la ruta correcta
// Instanciar el controlador
$ActividadController = new ActividadesController();
// Obtener niveles desde el modelo
$actividades = $ActividadController->getAll();
?>

<div class="Ejercicios">
    <h2>Lista de Actividades</h2>

    <table>
        <tr>
            <th>Actividad</th>
            <th>Nivel</th>
            <th>Descripción</th>
            <th>Tiempo de ejecución</th>
        </tr>
        <?php foreach ($actividades as $actividad): ?>
            <tr>
                <td><?= htmlspecialchars($actividad['nombre']) ?></td>
                <td><?= htmlspecialchars($actividad['nivel_nombre']) ?></td>
                <td><?= htmlspecialchars($actividad['descripcion']) ?></td>
                <td><?= htmlspecialchars($actividad['tiempo_estimado']) ?> minutos</td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
