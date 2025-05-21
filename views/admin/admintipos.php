<?php
require_once __DIR__ . '/../../Controllers/TipoDocumentoController.php'; // ✅ dos niveles hacia arriba desde views/users
$TipoController = new TipoDocumentoController();
$TipoDocumento = $TipoController->getAll();
?>
<a href="crearTipo.php?id=<?= $Tipo['id'] ?>" class="btn btn-primary">Crear Tipo</a>
<div class="Ejercicios">
    <h2 class="text-azul">Lista de Tipos</h2>

    <table class="table table-striped">
        <tr>
            <th class="bg-verde">Tipo</th>
            <th class ="bg-verde">Acciones</th>
        </tr>
        <?php foreach ($TipoDocumento as $Tipo): ?>
            <tr>
                <td><?= htmlspecialchars($Tipo['nombre']) ?></td>
                <td>
                    <a href="editTipo.php?id=<?= $Tipo['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="deleteTipo.php?id=<?= $Tipo['id'] ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<a href="layout.php?page=main">Volver a interfaz de usuarios</a>