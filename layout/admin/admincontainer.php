<?php
// Determinar qué contenido cargar
$page = isset($_GET['page']) ? $_GET['page'] : 'adminusuarios'; // Por defecto carga la página principal

// Incluir el archivo correspondiente
switch ($page) {
    case 'adminroles':
        include 'views/admin/adminroles.php';
        break;
    case 'admintipos':
        include 'views/admin/admintipos.php';
        break;
    case 'adminactividades':
        include 'views/admin/adminactividades.php';
        break;
    case 'nivel':
        include 'views/admin/adminnivelactividades.php';
        break;
    default:
        include 'views/admin/adminusuarios.php';
        break;
}
?>