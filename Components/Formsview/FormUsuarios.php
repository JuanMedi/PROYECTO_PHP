<?php
require_once __DIR__ . '/../../Controllers/UsuariosController.php';
require_once __DIR__ . '/../../Controllers/RolUsuariosController.php';
require_once __DIR__ . '/../../Controllers/TipoDocumentoController.php';

$controller = new UsuariosController();
$Rol = new RolUsuariosController();
$TipoDocumento = new TipoDocumentoController();


$rol = $Rol->getAll();
$tipodocumento = $TipoDocumento->getAll();


$editando = false;
$usuario = [
    'nombre' => '',
    'apellido' => '',
    'tipo_documento_id' => '',
    'numero_documento' => '',
    'telefono' => '',
    'email' => '',
    'nombre_usuario' => '',
    'contraseña' => '',
    'rol_id' => ''
];

if (isset($_GET['id'])) {
    $editando = true;
    $usuario = $controller->getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $controller->actualizar($_POST['id'], $data);
    } else {
        $controller->crear($data);
    }
    header('Location: /PROYECTO_PHP/layoutadmin.php?page=adminusuarios');
    exit;
}
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


<div class="container mt-5 mb-5">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-verde text-white">
            <h4 class="mb-0"><?= $editando ? 'Editar' : 'Crear' ?> Usuario</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <?php if ($editando): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tipo_documento_id" class="form-label">Tipo de Documento:</label>
                        <select class="form-select" id="tipo_documento_id" name="tipo_documento_id" required>
                            <option value="">Seleccionar Tipo Documento</option>
                            <?php foreach ($tipodocumento as $tipo): ?>
                                <option value="<?= $tipo['id'] ?>" <?= $tipo['id'] == $usuario['tipo_documento_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($tipo['nombre']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="numero_documento" class="form-label">Número de Documento:</label>
                        <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="<?= htmlspecialchars($usuario['numero_documento']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>" required>
                    </div>

                    <?php if (!$editando): ?>
                        <div class="col-md-6 mb-3">
                            <label for="contraseña" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                        </div>
                    <?php endif; ?>

                    <div class="col-md-12 mb-3">
                        <label for="rol_id" class="form-label">Rol:</label>
                        <select class="form-select" id="rol_id" name="rol_id" required>
                            <option value="">Seleccionar Rol</option>
                            <?php foreach ($rol as $r): ?>
                                <option value="<?= $r['id'] ?>" <?= $r['id'] == $usuario['rol_id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($r['nombre']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a class="btn btn-outline-secondary" href="/PROYECTO_PHP/layoutadmin.php?page=adminusuarios">
                        <i class="fa-solid fa-arrow-left"></i> Volver a la lista
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-check"></i> <?= $editando ? 'Actualizar' : 'Crear' ?> Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
