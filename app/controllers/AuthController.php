<?php

session_start();
require_once "../models/Usuario.php";

// LOGOUT
if (isset($_GET['logout'])) {

    session_unset();
    session_destroy();

    header("Location: ../../public/index.php");
    exit();
}

// REGISTRO
if ($_POST['accion'] == "registro") {

    $id_rol = 2; // Asignar el rol de usuario por defecto (2)

    $registrado = Usuario::registrar($_POST['nombre'], $_POST['correo'], $_POST['password'], $id_rol);

    if($registrado){//Si el login fue exitoso, redirige al index pero logueado
        header("Location: ../../public/index.php");
        exit();
    } else {
        echo "Error al registrar el usuario";
    }
}

// LOGIN
if ($_POST['accion'] == "login") {

    $user = Usuario::login($_POST['correo'], $_POST['password']);

    if ($user) {
        $_SESSION['usuario'] = $user;
        header("Location: ../../public/index.php");
        exit();

    } else {
        echo "Correo o contraseña incorrectos";
    }
}

