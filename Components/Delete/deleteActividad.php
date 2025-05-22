<?php
// Cargar el controlador
require_once __DIR__ . '/../../Controllers/ActividadesController.php'; // Ajusta la ruta si es necesario

// Verificar si se pasó un ID por GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Instanciar el controlador
    $controller = new ActividadesController();

    // Llamar al método de eliminación
    $controller->eliminar($id);
    header('Location: ../../layoutadmin.php?page=adminactividades');
    exit;
}
?>
