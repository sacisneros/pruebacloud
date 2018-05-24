<!DOCTYPE html>
<?php
include_once '../model/Listauno.php';
session_start();
$listauno = $_SESSION['listauno'];
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
                <title>Actualizar Lista Uno</title>
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
                                <input type="hidden" value="actualizarListauno" name="opcion">
                                <input type="hidden" value="<?php echo $listauno->getIdlistau(); ?>" name="idlistau">
                                <table align="left">
                                    <tr><td>Código:</td><td><b><?php echo $listauno->getIdlistau(); ?></b></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Nombre:</td><td><input type="text" name="nombrelistau" value="<?php echo $listauno->getNombrelistau(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Presidente/a:</td><td><input type="text" name="presidenteu" value="<?php echo $listauno->getPresidenteu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Vicepresidente/a:</td><td><input type="text" name="vicepresidenteu" value="<?php echo $listauno->getVicepresidenteu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Secretario/a:</td><td><input type="text" name="secretariou" value="<?php echo $listauno->getSecretariou(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Tesorero/a:</td><td><input type="text" name="tesorerou" value="<?php echo $listauno->getTesorerou(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Primer Vocal:</td><td><input type="text" name="pvocalu" value="<?php echo $listauno->getPvocalu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Segundo Vocal:</td><td><input type="text" name="svocalu" value="<?php echo $listauno->getSvocalu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Tercer Vocal:</td><td><input type="text" name="tvocalu" value="<?php echo $listauno->getTvocalu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Cuarto Vocal:</td><td><input type="text" name="cvocalu" value="<?php echo $listauno->getCvocalu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Quinto Vocal:</td><td><input type="text" name="qvocalu" value="<?php echo $listauno->getQvocalu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Sexto Vocal:</td><td><input type="text" name="sxvocalu" value="<?php echo $listauno->getSxvocalu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Jefe de Campaña:</td><td><input type="text" name="jcampu" value="<?php echo $listauno->getJcampu(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td><input type="submit" value="Actualizar Lista" class="btn btn-info"></td></tr>
                                </table><br>
                            </form>
                        </td>
                    </tr>
                    <tr align="left">
                        <td colspan="1" align="right"><a href='../controller/controller.php?opcion=aIndex'>Ir a Inicio</a></td>
                        <td width="10"></td>
                        <td colspan="1" align="left"><a href='../controller/controller.php?opcion=aIndexListauno'>Ir a Menu Lista</a>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
}
?>