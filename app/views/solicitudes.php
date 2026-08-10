<link rel="stylesheet" href="css/estilos.css">

<?php

require_once "../config/database.php";
require_once "../app/models/Solicitud.php";

$solicitudes = Solicitud::obtenerTodas();

?>

<h1>Solicitudes de inscripción</h1>
<table border="1">
    <tr>
        <th>Usuario</th>
        <th>Taller</th>
        <th>Estado</th>
        <th>Acción</th>
    </tr>
    <?php foreach ($solicitudes as $solicitud) {?>
        <tr>
            <td><?= $solicitud["nombre_usuario"] ?></td>
            <td><?= $solicitud["nombre_taller"] ?></td>
            <td><?= ucfirst($solicitud["estado"]) ?></td>
            <td>
                <?php if ($solicitud["estado"] == "pendiente") { ?>
                    <a href="../app/controllers/AdministracionController.php?accion=aprobar&id=<?= $solicitud["id"] ?>">
                        Aprobar
                    </a>
                    |
                    <a href="../app/controllers/AdministracionController.php?accion=rechazar&id=<?= $solicitud["id"] ?>">
                        Rechazar
                    </a>
                <?php } else { ?>
                    Procesada
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>
<br>

<a href="index.php">
    Regresar
</a>
