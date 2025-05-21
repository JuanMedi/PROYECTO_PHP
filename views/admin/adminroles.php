<?php
require_once __DIR__ . '/../../Controllers/RolUsuariosController.php'; // ✅ dos niveles hacia arriba desde views/users
$RolController = new RolUsuariosController();
$Roles = $RolController->getAll();
?>
<a href ="createEjercicio.php?id=<?= $Rol['id'] ?>" class="btn btn-primary" >Crear Rol</a>
<div class="Ejercicios">
    <h2 class="text-azul">Lista de Roles</h2>

    <table class="table table-striped">
        <tr>
            <th class="bg-verde">Rol</th>
            <th class ="bg-verde">Acciones</th>
        </tr>
        <?php foreach ($Roles as $Rol): ?>
            <tr>
                <td><?= htmlspecialchars($Rol['nombre']) ?></td>
                <td>
                    
                    <a href="editRol.php?id=<?= $Rol['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="deleteRol.php?id=<?= $Rol['id'] ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<a href="layout.php?page=main">Volver a interfaz de usuarios</a>