<!DOCTYPE html>
<?php
include_once '../model/Resultado.php';
include_once '../model/VotoModel.php';
session_start();

if (isset($_SESSION['resultadoU'])) {
    $resultadoU = $_SESSION['resultadoU'];
}
if (isset($_SESSION['resultadoD'])) {
    $resultadoD = $_SESSION['resultadoD'];
}
if (isset($_SESSION['resultadoB'])) {
    $resultadoB = $_SESSION['resultadoB'];
}
if (isset($_SESSION['resultadoN'])) {
    $resultadoN = $_SESSION['resultadoN'];
}



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
                <meta charset = "UTF-8">
                <title>Voto Electrónico UEFSSYC</title>
                <script src = "js/jquery-2.1.4.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap-table.js"></script>
                <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/bootstrap-table.css" rel="stylesheet">
            </head>
            <body >
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
                <table align="center" >
                    <tr>
                        <td>
                            <table >
                                <tr>
                                    <td align="left" width="100">
                                        <form action="../controller/controller.php">
                                            <input type="hidden" value="profesores" name="opcion">
                                            <input type="submit" value="Menú Tutor" class="btn btn-info">

                                        </form>
                                    </td>
                                    <td width="5"></td>
                                    <td align="left" width="100">
                                        <form action="../controller/controller.php">
                                            <input type="hidden" value="grados" name="opcion">
                                            <input type="submit" value="Menú Grado" class="btn btn-info">

                                        </form>
                                    </td>
                                    <td width="5"></td>
                                    <td align="left" width="100">
                                        <form action="../controller/controller.php">
                                            <input type="hidden" value="estudiantes" name="opcion">
                                            <input type="submit" value="Menú Estudiante" class="btn btn-info">
                                        </form>
                                    </td>
                                    <td width="5"></td>
                                    <td align="left" width="100">
                                        <form action="../controller/controller.php">
                                            <input type="hidden" value="listauno" name="opcion">
                                            <input type="submit" value="Menú Lista" class="btn btn-info">
                                        </form>
                                    </td>
                                    <td width="5"></td>
                                    <td align="right" width="630">
                                        <form action="../controller/controller.php">
                                            <input type="hidden" value="cerrarSesion" name="opcion">
                                            <input type="submit" value="Cerrar Sesion" class="btn btn-info">
                                        </form>
                                    </td>

                                </tr>
                                <tr><td height="30" colspan='9'></td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table align='center'>
                    <tr>
                        <td>
                            <form action="../controller/controller.php">
                                <input type="hidden" value="resultadoUno" name="opcion">
                                <table >
                                    <tr>
                                        <td width='150'>Lista Uno<input type="hidden" value='Lista Uno' name='opcione'></td>
                                        <td width='20'></td>
                                        <td><input type="submit" value="Ver Resultado" class="btn btn-info"></td>
                                    </tr>

                                </table>
                            </form>
                        </td>
                        <td width='20'></td>
                        <td>Votos Válidos Lista Uno:</td><td width='10'></td>
                        <td><b><?php echo $resultadoU->getCantidadv(); ?></b></td>
                    </tr>
                    <tr>
                        <td height='20' colspan='9'></td>
                    </tr>
                    <tr>
                        <td>
                            <form action="../controller/controller.php">
                                <input type="hidden" value="resultadoDos" name="opcion">
                                <table >
                                    <tr>
                                        <td width='150'>Lista Dos<input type="hidden" value='Lista Dos' name='opcione'></td>
                                        <td width='20'></td>
                                        <td><input type="submit" value="Ver Resultado" class="btn btn-info"></td>
                                    </tr>

                                </table>
                            </form>
                        </td>
                        <td width='20'></td>
                        <td>Votos Válidos Lista Dos:</td><td width='10'></td>
                        <td><b><?php echo $resultadoD->getCantidadv(); ?></b></td>
                    </tr>
                    <tr>
                        <td height='20' colspan='9'></td>
                    </tr>
                    <tr>
                        <td>
                            <form action="../controller/controller.php">
                                <input type="hidden" value="resultadoBla" name="opcion">
                                <table >
                                    <tr>
                                        <td width='150'>Votos Blancos<input type="hidden" value='Blanco' name='opcione'></td>
                                        <td width='20'></td>
                                        <td><input type="submit" value="Ver Resultado" class="btn btn-info"></td>
                                    </tr>

                                </table>
                            </form>
                        </td>
                        <td width='20'></td>
                        <td >Votos Blancos:</td><td width='10'></td>
                        <td><b><?php echo $resultadoB->getCantidadv(); ?></b></td>
                    </tr>
                    <tr>
                        <td height='20' colspan='9'></td>
                    </tr>
                    <tr>
                        <td>
                            <form action="../controller/controller.php">
                                <input type="hidden" value="resultadoNul" name="opcion">
                                <table>
                                    <tr>
                                        <td width='150'>Votos Nulos<input type="hidden" value='Nulo' name='opcione'></td>
                                        <td width='20'></td>
                                        <td><input type="submit" value="Ver Resultado" class="btn btn-info"></td>
                                    </tr>

                                </table>
                            </form>
                        </td>
                        <td width='20'></td>
                        <td >Votos Nulos:</td><td width='10'></td>
                        <td><b><?php echo $resultadoN->getCantidadv(); ?></b></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
}
?>