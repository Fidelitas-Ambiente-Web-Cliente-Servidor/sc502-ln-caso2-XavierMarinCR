<?php
class Database {
    public static function conectar() {
        $conexion = new mysqli("localhost", "root", "", "sistema_inscripcion_talleres");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }
}
