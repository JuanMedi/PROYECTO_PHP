<?php
require_once __DIR__ . '/../Models/NivelActividadesModel.php';

class NivelActividadesController
{
    private $model;
    
    public function __construct()
    {
        $this->model = new NivelActividadesModel();
    }

    public function listarNiveles()
    {
        $niveles = $this->model->getAll();

        // Validar que la consulta no falló
        return is_array($niveles) ? $niveles : [];
    }

    // Guardar un nuevo nivel
    public function guardarNivel($nombre)
    {
        $this->model->setNombre($nombre);
        $guardado = $this->model->guardar();
        echo $guardado ? "guardado=1" : "guardado=0";
    }

    // Controlar la petición entrante (POST, GET, etc.)
    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;

            if ($nombre) {
                $this->guardarNivel($nombre);
            } else {
                echo "guardado=0";
            }
        }

        // Podrías agregar GET aquí si quieres manejar listar por GET
        // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //     $this->listarNiveles();
        // }
    }
}
