<link rel="stylesheet" href="css/estilos.css">
<?php

require_once "../config/database.php";
require_once "../app/models/Solicitud.php";

$id_usuario = $_SESSION["usuario"]["id"];
$solicitudes = Solicitud::obtenerSolicitudesPorUsuario($id_usuario);

?>

<h1>Mis cursos inscritos</h1>
<table border="1">
    <tr>
        <th>Curso</th>
        <th>Estado</th>
    </tr>

    <?php foreach ($solicitudes as $solicitud) { ?>
        <tr>
            <td><?= $solicitud["nombre_taller"] ?></td>
            <td><?= ucfirst($solicitud["estado"]) ?></td>
        </tr>
    <?php } ?>

</table>
<br>
<a href="index.php">
    Regresar
</a>
