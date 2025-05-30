<?php
// Determinar qué contenido cargar
$page = isset($_GET['page']) ? $_GET['page'] : 'adminusuarios'; // Por defecto carga la página principal

// Incluir el archivo correspondiente
switch ($page) {
    case 'FormUsuarios':
        include 'Components/Formsview/FormUsuarios.php';
        break;
    case 'FormTipos':
        include 'Components/Formsview/FormTipos.php';
        break;
    case 'FormRoles':
        include 'Components/Formsview/FormRoles.php';
        break;
    case 'FormActividades':
        include 'Components/Formsview/FormActividades.php';
        break;
    case 'FormNiveles':
        include 'Components/Formsview/FormNiveles.php';
        break;
    case 'adminroles':
        include 'views/admin/adminroles.php';
        break;
    case 'adminmensajescontactos':
        include 'views/admin/adminmensajescontactos.php';
        break;
    case 'admintipos':
        include 'views/admin/admintipos.php';
        break;
    case 'adminactividades':
        include 'views/admin/adminactividades.php';
        break;
    case 'adminnivelactividades':
        include 'views/admin/adminnivelactividades.php';
        break;
    default:
        include 'views/admin/adminusuarios.php';
        break;
}
?>