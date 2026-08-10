<?php

session_start();

if (isset($_SESSION["usuario"])) {

    $rol = $_SESSION["usuario"]["rol"];

    if (isset($_GET["page"])) {

        switch ($_GET["page"]) {

            case "cursos":
                include "../app/views/cursos.php";
                break;

            case "mis_cursos":
                include "../app/views/mis_cursos.php";
                break;

            case "solicitudes":
                if ($rol == "Administrador") {
                    include "../app/views/solicitudes.php";
                } else {
                    header("Location: ../app/views/usuario.php");
                }
                break;

            case "talleres":
                if ($rol == "Administrador") {
                    include "../app/views/talleres_admin.php";
                } else {
                    include "../app/views/talleres.php";
                }
                break;

            default:

                if ($rol == "Administrador") {
                    include "../app/views/administrador.php";
                } else {
                    include "../app/views/usuario.php";
                }

                break;
        }

    } else {

        if ($rol == "Administrador") {
            include "../app/views/administrador.php";
        } else {
            include "../app/views/usuario.php";
        }

    }

} else {

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Sistema de Inscripción a Talleres</title>

    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <h1>Sistema de Inscripción a Talleres</h1>

    <div class="container">

        <form id="frmLogin" method="POST" action="../app/controllers/AuthController.php">
            <h2>Login</h2>
            <input type="email" id="correo" name="correo" placeholder="Correo" required>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>

            <button type="submit" name="accion" value="login"> Ingresar </button>

        </form>

        <a href="../app/views/register.php">Registrarse</a>
    </div>

    <div id="mensaje"></div>
</body>

</html>

<?php

}

?>
