<?php
require_once __DIR__ . '/../../Controllers/RolUsuariosController.php'; // ✅ dos niveles hacia arriba desde views/users
$RolController = new RolUsuariosController();
$Roles = $RolController->getAll();
?>
<div class = "Roles">
    <div class="d-flex align-items-center" style="justify-content: space-between;">
        <h2 class="text-azul">Lista de Roles (<?= count($Roles) ?>)</h2>
        <a href ="/PROYECTO_PHP/layoutadmin.php?page=FormRoles" class="btn btn-primary">Crear Rol</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th class="bg-verde">Nombre</th>
                <th class ="bg-verde">Acciones</th>
            </tr>
            <?php foreach ($Roles as $Rol): ?>
                <tr>
                    <td><?= htmlspecialchars($Rol['nombre']) ?></td>
                    <td>
                        <a href="/PROYECTO_PHP/layoutadmin.php?page=FormRoles&id=<?= $Rol['id'] ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="Components/Delete/deleteRol.php?id=<?= $Rol['id'] ?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <a href="layout.php?page=main">Volver a interfaz de usuarios</a>
</div>

    
</div>
