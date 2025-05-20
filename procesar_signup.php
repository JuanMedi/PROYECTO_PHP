<?php
require_once 'config/db.php'; // Asegúrate de que la ruta sea correcta

$db = Database::connect(); // Ahora sí tienes la conexión activa

// Recolectar datos del formulario
$data = [
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'tipo_documento_id' => $_POST['tipo_documento_id'],
    'numero_documento' => $_POST['numero_documento'],
    'telefono' => $_POST['telefono'],
    'email' => $_POST['email'],
    'nombre_usuario' => $_POST['nombre_usuario'],
    'contraseña' => $_POST['contraseña'],
    'rol_id' => $_POST['rol_id']
];

// Aquí deberías llamar a tu controlador o modelo
require_once 'controllers/UsuariosController.php'; // Ajusta ruta si es necesario
$controller = new UsuariosController();
$controller->crear($data);

// Redirigir o mostrar mensaje
header("Location: login.php"); // o donde necesites
exit;
