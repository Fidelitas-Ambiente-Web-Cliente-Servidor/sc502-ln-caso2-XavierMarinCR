<?php

class Solicitud {

    public static function registrar($id_usuario, $id_taller) {
        $db = Database::conectar();

        $sql = "INSERT INTO solicitudes (id_usuario, id_taller, estado) VALUES (?, ?, 'pendiente')";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ii", $id_usuario, $id_taller);

        return $stmt->execute();
    }

    public static function existe($id_usuario, $id_taller) {
        $db = Database::conectar();

        $sql = "SELECT * FROM solicitudes WHERE id_usuario = ? AND id_taller = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ii", $id_usuario, $id_taller);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }

    public static function obtenerSolicitudesPorUsuario($id_usuario) {
        $db = Database::conectar();

        $sql = "SELECT s.id, t.nombre AS nombre_taller, s.estado
                FROM solicitudes s
                JOIN talleres t ON s.id_taller = t.id
                WHERE s.id_usuario = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();

        return $stmt->get_result();
    }

    public static function obtenerTodas(){
        $db = Database::conectar();

        $sql = "SELECT s.id, u.nombre AS nombre_usuario, t.nombre AS nombre_taller, s.estado
                FROM solicitudes s
                JOIN usuarios u ON s.id_usuario = u.id
                JOIN talleres t ON s.id_taller = t.id
                ORDER BY s.id DESC";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->get_result();
    }

    public static function actualizarEstado($id, $nuevo_estado) {
        $db = Database::conectar();

        $sql = "UPDATE solicitudes SET estado = ? WHERE id = ? AND estado = 'pendiente'";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("si", $nuevo_estado, $id);

        return $stmt->execute();
    }

}