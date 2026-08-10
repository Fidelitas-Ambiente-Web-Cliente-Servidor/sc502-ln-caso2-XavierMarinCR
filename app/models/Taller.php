<?php
require_once "../config/database.php";

class Taller {
    public static function obtenerTalleres() {
        $db = Database::conectar();
        $sql = "SELECT * FROM talleres";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->get_result();
    }
}