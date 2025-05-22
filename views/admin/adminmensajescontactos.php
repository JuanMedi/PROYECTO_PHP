<?php
require_once __DIR__ . '/../../Controllers/MensajesContactosController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$controller = new MensajesContactosController();
$mensajes = $controller->getAll();
?>

<div class="Niveles">
    <div class="d-flex align-items-center" style="justify-content: space-between;">
        <h2 class="text-azul">Lista de Mensajes (<?= count($mensajes) ?>)</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th class="bg-verde">Usuario</th>
                <th class="bg-verde">Nombre de usuario</th>
                <th class="bg-verde">Email</th>
                <th class="bg-verde">Fecha</th>
            </tr>
            <?php foreach ($mensajes as $mensaje): ?>
                <tr>
                    <td><?= htmlspecialchars($mensaje['id_usuario']) ?></td>
                    <td><?= htmlspecialchars($mensaje['nombre_usuario']) ?></td>
                    <td><?= htmlspecialchars($mensaje['email']) ?></td>
                    <td><?= htmlspecialchars($mensaje['fecha']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <a href="layout.php?page=main">Volver a interfaz de usuarios</a>
</div>
