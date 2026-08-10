<?php

session_start();

require_once "../../config/database.php";
require_once "../models/Solicitud.php";

//Verificar que sea administrador
if(!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'Administrador'){
    header("Location: ../../public/index.php");
    exit();
}

$accion = $_GET['accion'] ?? '';
$id = $_GET['id'] ?? '';

if($accion === "aprobar"){
    Solicitud::actualizarEstado($id, "aprobada");
} elseif($accion === "rechazar"){
    Solicitud::actualizarEstado($id, "rechazada");
}

header("Location: ../../public/index.php?page=solicitudes");

exit();