<?php

session_start();

require_once "../models/Solicitud.php";

if(!isset($_SESSION['usuario'])){
    header("Location: ../../public/index.php");
    exit();
}

if($_GET['accion'] == "solicitar"){
    $id_usuario = $_SESSION['usuario']['id'];
    $id_taller = $_GET['id_taller'];

    $resultado = Solicitud::registrar($id_usuario, $id_taller);

    if($resultado){
        header("Location: ../../public/index.php?page=mis_cursos");
        exit();
    } else {
        echo "No fue posible registrar la solicitud.";
    }
}