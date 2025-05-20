<?php
class Database {
    public static function connect() {
        $conexion = new mysqli("localhost", "root", "", "dbaurora");

        if ($conexion->connect_error) {
            die("❌ Error de conexión: " . $conexion->connect_error);
        }

        $conexion->set_charset("utf8"); // Equivalente más claro
        return $conexion;
    }
}
