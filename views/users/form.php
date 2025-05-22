<?php
session_start();
// Asegúrate que al iniciar sesión, guardas el ID del usuario en $_SESSION['id']
?>

<div class = 'Contactenos' style="display: flex; justify-content: center; align-items: center;">
    <div class="card " style="width: 50rem,">
        <img src="Access/Img/Contactenos.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Contactenos</h5>
            <p class="card-text"> Si tienes alguna pregunta o inquietud, no dudes en ponerte en contacto con nosotros.
                </br>
                Estamos aquí para ayudarte y brindarte la información que necesites.
                Presiona el botón de abajo para registrar tu registro de contacto.
            </p>
            <form method="POST" action="/PROYECTO_PHP/Controllers/MensajesContactosController.php">
                <input type="hidden" name="action" value="crearMensaje">
                <button type="submit" class="btn btn-primary" style="color:white;">Enviar tus datos</button>
            </form>
        </div>
    </div>
</div>
