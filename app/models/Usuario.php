<?php
require_once "../../config/database.php";

class Usuario {

    public static function registrar($nombre, $correo, $password, $id_rol){
        $db = Database::conectar();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Insertar el usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, correo, password, id_rol) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $correo, $hash, $id_rol);

        return $stmt->execute();
    }

    public static function login($correo, $password) {
        $db = Database::conectar();

        $sql = "SELECT u.id, u.nombre, u.correo, u.password, r.nombre AS rol
        FROM usuarios u JOIN roles r ON u.id_rol = r.id WHERE u.correo = ? LIMIT 1";

        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();

        $usuario = $stmt->get_result()->fetch_assoc();

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;
        }

        return false;
    }
}