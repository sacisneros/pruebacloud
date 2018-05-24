<!DOCTYPE html>
<?php
include_once '../model/Profesor.php';
session_start();
$profesor = $_SESSION['profesor'];
if (!isset($_SESSION['bandera'])) {
    session_destroy();
    header('Location: ../view/indexLogin.php');
} else {
    $bandera = unserialize($_SESSION['bandera']);
    if ($bandera == 'N') {
        session_destroy();
        header('Location: ../view/indexLogin.php');
    } else if ($bandera == 'S') {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Actualizar Tutor</title>
                <script src="js/jquery-2.1.4.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap-table.js"></script>
                <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/bootstrap-table.css" rel="stylesheet">
            </head>
            <body>
                <table width="100%">
                    <tr>
                        <td colspan="4" height="15"></td>
                    </tr>
                    <tr>
                        <td colspan="4"><img src="../view/images/bannerIndex.png" height="300" width="100%"></td>
                    </tr>
                    <tr>
                        <td colspan="4" height="15"></td>
                    </tr>
                </table>
                <table align="center" width="996" >
                    <tr>
                        <td colspan="3" align="right">
                            <form action="../controller/controller.php">
                                <input type="hidden" value="cerrarSesion" name="opcion">
                                <input type="submit" value="Cerrar Sesion" class="btn btn-info">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td align="middle">

                            <form action="../controller/controller.php">
                                <input type="hidden" value="actualizarProfesor" name="opcion">
                                <input type="hidden" value="<?php echo $profesor->getCedulaprofesor(); ?>" name="cedulaprofesor">
                                <table align="left">
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Nombre:</td><td><input type="text" name="nombreprofesor" value="<?php echo $profesor->getNombreprofesor(); ?>" required/></td>
                                    <tr><td height="10"></td></tr> </tr>
                                    <tr><td colspan="2" align="center"><input type="submit" value="Actualizar Tutor" class="btn btn-info"></td></tr>
                                </table><br>
                            </form>
                        </td>
                    </tr>
                    <tr align="left">
                        <td colspan="1" align="right"><a href='../controller/controller.php?opcion=aIndex'>Ir a Inicio</a></td>
                        <td width="10"></td>
                        <td colspan="1" align="left"><a href='../controller/controller.php?opcion=aIndexProfesor'>Ir a Menu Profesor</a>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
}
?>