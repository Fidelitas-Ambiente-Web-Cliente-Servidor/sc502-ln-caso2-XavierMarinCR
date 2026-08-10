<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["rol"] != "Administrador") {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <h1>Panel de Administrador</h1>
        <p>
            Usuario:
            <?= $_SESSION["usuario"]["nombre"]; ?>
        </p>
    </header>
    <nav>
        <h3>Menú</h3>
        <a href="index.php?page=talleres">
            Gestionar talleres
        </a>
        <a href="index.php?page=solicitudes">
            Ver solicitudes
        </a>
        <a class="logout" href="../app/controllers/AuthController.php?logout=true">
            Cerrar sesión
        </a>

    </nav>
    <section>
        <h2>Bienvenido al sistema</h2>
        <p>
            Desde este panel puede administrar las opciones del sistema.
        </p>
    </section>
</body>
</html>
