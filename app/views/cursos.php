<link rel="stylesheet" href="css/estilos.css">

<?php
require_once "../app/models/Curso.php";
$cursos = Curso::cursosDisponibles();?>


<h1>Cursos disponibles</h1>
<table border="1">
    <tr>
        <th>Curso</th>
        <th>Cupos disponibles</th>
        <th>Acción</th>
    </tr>

    <?php foreach($cursos as $curso){ ?>
        <tr>
            <td>
                <?= $curso["nombre"] ?>
            </td>
            <td>
                <?= $curso["disponibles"] ?>
            </td>
            <td>
                <?php if($curso["disponibles"] > 0){ ?>
                    <a href="../app/controllers/InscripcionController.php?accion=inscribir&taller=<?= $curso["id"] ?>">                   
                        Inscribirse
                    </a>
                    
                <?php }else{ ?>
                    <strong>Sin cupos</strong>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>
<br>
<a href="index.php">
    Regresar
</a>