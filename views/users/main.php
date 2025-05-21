<?php
require_once 'Controllers/UsuariosController.php';
require_once 'Controllers/LoginController.php';

$controlador = new UsuariosController();

$email = $_SESSION['email'] ?? null;
$rol = $_SESSION['rol_id'] ?? null;
$nombre = 'Invitado';

if ($email) {
    $nombre = $controlador->obtenerNombreUsuario($email) ?? 'Invitado';
}
?>

<div class="Bienvenida">
    <h1>¡Bienvenido a la Página Principal!</h1>
    <h2>¡Hola, <?= htmlspecialchars($nombre) ?>!</h2>
</div>

<section class="bg-verde">
    <div class="container">
        <div class="Contexto">
            <div class="columna">
                <h2>¿Qué es Aurora?</h2>
                <p> Proyecto Aurora es una iniciativa apasionante que fusiona el desarrollo personal, el crecimiento espiritual y dinámicas de alto impacto para ofrecer experiencias transformadoras.</p>
                <img src="Access/img/Meditacion.jpg" alt="Aurora">
            </div>
            <div class="columna">
                <h2>Justificación</h2>
                <p>Como servidores y activistas de las diferentes dinámicas sociales reconocemos la profunda importancia de abordar el desarrollo personal y el crecimiento espiritual en la sociedad actual...</p>
                <img src="Access/img/Justificacion.jpg" alt="Aurora">
            </div>
        </div>
    </div>
</section>

<div class='Aspectos mb-4 mt-4' style='text-align:center'>
    <h1 class="text-azul">Enfoques</h1>
    <div class='Aspectos1'>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Evaluación Continua</h5>
                <p class="card-text">Evaluamos y ajustamos constantemente el impacto de nuestras dinámicas en el desarrollo personal y espiritual.</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Enfoque en la Personalización</h5>
                <p class="card-text">Personalizamos las experiencias según las necesidades y objetivos individuales de cada participante.</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Asesoramiento Profesional</h5>
                <p class="card-text">Contamos con profesionales en desarrollo personal y salud mental para un espacio seguro y positivo.</p>
            </div>
        </div>
    </div>
    <div class='Aspectos2'>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Programas de Seguimiento</h5>
                <p class="card-text">Ofrecemos Programas de Seguimiento que refuerzan el crecimiento continuo de los participantes.</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Aspectos Logísticos para comercialización</h5>
                <p class="card-text">Aspectos Logísticos para comercialización</p>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Alianzas Estratégicas más Amplias</h5>
                <p class="card-text">Formamos Alianzas Estratégicas para enriquecer y expandir el impacto de nuestras experiencias.</p>
            </div>
        </div>
        
    </div>
    <div class = "link-admin", style = "position:absolute; right:0" >
        <a href="layoutadmin.php/admin?page=adminusuarios">Ingresar funcionalidades Admin</a>
    </div>
</div>