<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <h1>
            Bienvenido
            <?= $_SESSION["usuario"]["nombre"] ?? "Usuario"; ?>
        </h1>
    </header>
    <nav>
        <h3>Menú de usuario</h3>
        <a href="index.php?page=cursos">
            Ver cursos disponibles
        </a>
        <a href="index.php?page=mis_cursos">
            Mis cursos inscritos
        </a>
        <a class="logout" href="../app/controllers/AuthController.php?logout=true">
            Cerrar sesión
        </a>

    </nav>
    <section>
        <h2>Panel de Usuario</h2>
        <p>
            Desde aquí puede consultar los cursos disponibles e inscribirse.
        </p>
    </section>
</body>
</html>
