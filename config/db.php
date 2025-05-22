<?php
class Database {
    public static function connect() {
        $host = 'localhost';
        $user = 'root';
        $pass = ''; // o tu contraseña
        $db = 'dbaurora';

        $conexion = new mysqli($host, $user, $pass, $db);

        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        return $conexion;
    }
}
