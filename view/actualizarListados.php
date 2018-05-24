<!DOCTYPE html>
<?php
include_once '../model/Listados.php';
session_start();
$listados = $_SESSION['listados'];
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
                <title>Actualizar Lista Dos</title>
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
                                <input type="hidden" value="actualizarListados" name="opcion">
                                <input type="hidden" value="<?php echo $listados->getIdlistad(); ?>" name="idlistad">
                                <table align="left">
                                    <tr><td>Código:</td><td><b><?php echo $listados->getIdlistad(); ?></b></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Nombre:</td><td><input type="text" name="nombrelistad" value="<?php echo $listados->getNombrelistad(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Presidente/a:</td><td><input type="text" name="presidented" value="<?php echo $listados->getPresidented(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Vicepresidente/a:</td><td><input type="text" name="vicepresidented" value="<?php echo $listados->getVicepresidented(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Secretario/a:</td><td><input type="text" name="secretariod" value="<?php echo $listados->getSecretariod(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Tesorero/a:</td><td><input type="text" name="tesorerod" value="<?php echo $listados->getTesorerod(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Primer Vocal:</td><td><input type="text" name="pvocald" value="<?php echo $listados->getPvocald(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Segundo Vocal:</td><td><input type="text" name="svocald" value="<?php echo $listados->getSvocald(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Tercer Vocal:</td><td><input type="text" name="tvocald" value="<?php echo $listados->getTvocald(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Cuarto Vocal:</td><td><input type="text" name="cvocald" value="<?php echo $listados->getCvocald(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Quinto Vocal:</td><td><input type="text" name="qvocald" value="<?php echo $listados->getQvocald(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Sexto Vocal:</td><td><input type="text" name="sxvocald" value="<?php echo $listados->getSxvocald(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td>Jefe de Campaña:</td><td><input type="text" name="jcampd" value="<?php echo $listados->getJcampd(); ?>" required/></td></tr>
                                    <tr><td height="10"></td></tr>
                                    <tr><td><input type="submit" value="Actualizar Lista" class="btn btn-info"></td></tr>
                                </table><br>
                            </form>
                        </td>
                    </tr>
                    <tr align="left">
                        <td colspan="1" align="right"><a href='../controller/controller.php?opcion=aIndex'>Ir a Inicio</a></td>
                        <td width="10"></td>
                        <td colspan="1" align="left"><a href='../controller/controller.php?opcion=aIndexListados'>Ir a Menu Lista</a>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
}
?>