<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["rol"] != "Administrador") {
    header("Location: index.php");
    exit();
}
require_once "../app/models/Taller.php";

$talleres = Taller::obtenerTalleres();

?>
<!DOCTYPE html>
<html lang ="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Talleres</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>
        Gestión de Talleres
    </h1>
    <p>
        Administrador:
        <?php echo $_SESSION["usuario"]["nombre"]; ?>
    </p>
    <hr>
    <h2>Talleres registrados</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cupo</th>
        </tr>
        <?php foreach($talleres as $taller){ ?>
            <tr>
                <td>
                    <?php echo $taller["id"]; ?>
                </td>
                <td>
                    <?php echo $taller["nombre"]; ?>
                </td>
                <td>
                    <?php echo $taller["cupo"]; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="index.php">
        Regresar
    </a>
</body>
</html>
