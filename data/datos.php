<?php

$usuarios = [

    [
        "id" => 1,
        "nombre" => "Administrador",
        "correo" => "admin@correo.com",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "rol" => "admin"
    ],

    [
        "id" => 2,
        "nombre" => "Usuario",
        "correo" => "user@correo.com",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "rol" => "usuario"
    ]

];

$talleres = [

    [
        "id" => 1,
        "nombre" => "Angular",
        "cupo" => 3
    ],

    [
        "id" => 2,
        "nombre" => "PHP",
        "cupo" => 2
    ],

    [
        "id" => 3,
        "nombre" => "Laravel",
        "cupo" => 1
    ]

];