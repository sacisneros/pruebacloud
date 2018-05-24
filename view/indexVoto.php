<!DOCTYPE html>
<?php
session_start();
include_once '../model/Grado.php';
include_once '../model/Estudiante.php';
include_once '../model/Voto.php';
include_once '../model/VotoModel.php';

//$estudiante = $_SESSION['estudiante'];

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
                <title>Menú de Voto</title>
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
                <table width="100%">
                    <tr>
                        <td colspan="3" align="right">
                            <form action="../controller/controller.php">
                                <input type="hidden" value="cerrarSesion" name="opcion">
                                <input type="submit" value="Cerrar Sesion" class="btn btn-info">
                            </form>
                        </td>
                        <td height="15" width="20"></td>
                    </tr>
                    <tr><td height="15"></td></tr>
                    <tr>
                        <td height="15" width="20"></td>
                        <td align="left"  colspan =4 >
                            <form action="../controller/controller.php">
                                <input type="hidden" value="insertarVoto" name="opcion">
                                <table align='center'>
                                    <tr>
                                        <td width='40'></td>
                                        <td align='center'>Cédula:</td><td align='center'><input type="text" name="cedulaestudiante" required/></td>
                                    </tr>
                                    <tr><td height="20"></td></tr>
                                    <tr>
                                        <td width='40'></td>
                                        <td width="100" align="center"><input type="radio" name="eleccion" value='Lista Uno'>Lista Uno</td>
                                        <td width="100" align="center"><input type="radio" name="eleccion" value='Lista Dos'>Lista Dos</td>
                                        <td width="100" align="center"><input type="radio" name="eleccion" value='Blanco'>Blanco</td>
                                        <td width="100" align="center"><input type="radio" name="eleccion" value='Nulo'>Nulo</td>
                                    </tr>
                                    <tr><td height="20"></td></tr>
                                    <tr><td colspan="5" align="center"><input type="submit" onclick="alert('Intento finalizado, ¡Gracias por Sufragar!')" value="Guardar" class="btn btn-info"></td></tr>


                                    
                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>¡Importante!</strong> Una vez presionada la opción <b>Guardar</b> se cerrará el sistema y concluirá su oportunidad de ejercer el voto.
                                    </div>


                                </table>
                            </form>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="4" height="15"></td>
                    </tr>
                </table>

            </body>
        </html>
        <?php
    }
}
?>