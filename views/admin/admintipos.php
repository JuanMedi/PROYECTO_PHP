<?php
require_once __DIR__ . '/../../Controllers/TipoDocumentoController.php'; // ✅ dos niveles hacia arriba desde views/users
$TipoController = new TipoDocumentoController();
$TipoDocumento = $TipoController->getAll();
?>

<div class = "Tipos">

    <div class="d-flex align-items-center" style="justify-content: space-between;">
        <h2 class="text-azul"> Lista de Tipos</h2>
        <a href ="Components/Formsview/FormTipos.php" class="btn btn-primary">Crear Tipo</a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th class="bg-verde">Tipo</th>
                <th class ="bg-verde">Acciones</th>
            </tr>
            <?php foreach ($TipoDocumento as $Tipo): ?>
                <tr>
                    <td><?= htmlspecialchars($Tipo['nombre']) ?></td>
                    <td>
                        <a href="Components/Formsview/FormTipos.php?id=<?= $Tipo['id'] ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="Components/Delete/deleteTipo.php?id=<?= $Tipo['id'] ?>" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        
    <a href="layout.php?page=main">Volver a interfaz de usuarios</a>
</div>
