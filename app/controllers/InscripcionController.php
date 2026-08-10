<?php

session_start();

require_once "../../config/database.php";
require_once "../models/Solicitud.php";

//Verificar la sesuión del usuario
if(!isset($_SESSION['usuario'])){
    header("Location: ../../public/index.php");
    exit();
}


class InscripcionController{

    public function inscribir($id_taller){
        $id_usuario = $_SESSION['usuario']['id'];

        //Verfificar si la solicitud ya existe
        if(Solicitud::existe($id_usuario, $id_taller)){
            return false;
        }

        return Solicitud::registrar($id_usuario, $id_taller);
    }
}

$accion = $_GET["accion"] ?? "";

if ($accion == "inscribir") {

    $controller = new InscripcionController();

    $resultado = $controller->inscribir($_GET["taller"]);

    if($resultado){
        header("Location: ../../public/index.php?page=mis_cursos");
        exit();
    } else {
        echo "No fue posible registrar la solicitud.";
    }
}

?>