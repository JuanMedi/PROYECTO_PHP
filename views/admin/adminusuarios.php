<?php
require_once __DIR__ . '/../../Controllers/UsuariosController.php'; // ✅ dos niveles hacia arriba desde views/users
$UsuarioController = new UsuariosController();
$Usuarios = $UsuarioController->getAll();
?>

<div class="Usuarios">

    <div class="d-flex align-items-center" style="justify-content: space-between;">
        <h2 class="text-azul"> <?php $Usuarioscount ?> Lista de Usuarios</h2>
        <a href ="createEjercicio.php?id=<?= $Usuario['id'] ?>" class="btn btn-primary">Crear Usuario</a>
    </div>

    <div class="table-responsive">
        
        <table class="table table-striped">
            <tr>
                <th class="bg-verde">Nombre</th>
                <th class="bg-verde">apellido</th>
                <th class="bg-verde">Tipo de Documento</th>
                <th class="bg-verde">Numero de Documento</th>
                <th class="bg-verde">Telefono</th>
                <th class="bg-verde">Correo</th>
                <th class="bg-verde">Rol</th>
                <th class ="bg-verde">Acciones</th>
            </tr>
            <?php foreach ($Usuarios as $Usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($Usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($Usuario['apellido']) ?></td>
                    <td><?= htmlspecialchars($Usuario['tipo_documento_id']) ?></td>
                    <td><?= htmlspecialchars($Usuario['numero_documento']) ?> </td>
                    <td><?= htmlspecialchars($Usuario['telefono']) ?> </td>
                    <td><?= htmlspecialchars($Usuario['email']) ?> </td>
                    <td><?= htmlspecialchars($Usuario['rol_id']) ?> </td>
                    <td>
                        <a href="editUsuario.php?id=<?= $Usuario['id'] ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="Components/Delete/deleteUsuario.php?id=<?=$Usuario['id']?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<a href="layout.php?page=main">Volver a interfaz de usuarios</a>
