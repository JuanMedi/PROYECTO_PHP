<?php
// Determinar qué contenido cargar
$page = isset($_GET['page']) ? $_GET['page'] : 'main'; // Por defecto carga la página principal

// Incluir el archivo correspondiente
switch ($page) {
    case 'form':
        include 'views/users/form.php';
        break;
    case 'actividades':
        include 'views/users/actividades.php';
        break;
    default:
        include 'views/users/main.php';
        break;
}
?>