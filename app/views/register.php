<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>

<body>
    <div class="container">
        <h2>Registro</h2>

        <form method="POST" action="../controllers/AuthController.php">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="correo" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>

            <button name="accion" value="registro">Registrarse</button>
        </form>

        <a href="../../public/index.php">Volver al login</a>
    </div>
</body>
</html>