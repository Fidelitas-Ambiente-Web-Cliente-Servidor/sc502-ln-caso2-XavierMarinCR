<?php
require_once "../config/database.php";


class Curso{

    public static function obtenerCursos(){
        $db = Database::conectar();
        $sql = "SELECT * FROM talleres";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->get_result();
    }


    public static function cursosDisponibles(){
        $db = Database::conectar();
        
        $sql = "
        SELECT
            t.id,
            t.nombre,
            t.cupo,
            t.cupo - COUNT(s.id) AS disponibles
        FROM talleres t
        LEFT JOIN solicitudes s
            ON s.id_taller = t.id
            AND s.estado = 'aprobada'
        GROUP BY
            t.id,
            t.nombre,
            t.cupo
    ";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->get_result();
    }
}