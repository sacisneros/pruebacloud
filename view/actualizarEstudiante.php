<!DOCTYPE html>
<?php
include_once '../model/Grado.php';
include_once '../model/Estudiante.php';
include_once '../model/VotoModel.php';
session_start();
$estudiante = $_SESSION['estudiante'];

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
                <title>Actualizar Estudiante</title>
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
                <table align="center" width="996">
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
                            <input type="hidden" value="actualizarEstudiante" name="opcion">
                            <input type="hidden" value="<?php echo $estudiante->getCedulaestudiante(); ?>" name="cedulaestudiante">
                            <table align="left">
                                <tr>
                                    <td width="50">Cédula:</td><td><b><?php echo $estudiante->getCedulaestudiante(); ?></td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td width="50">Grado:</td>
                                    <td>
                                        <select name="idgrado">
                                            <option>Elegir grado</option>
                                            <?php
                                            $votoModel = new VotoModel();
                                            $listadoGra = $votoModel->getGrados();
                                            foreach ($listadoGra as $gra) {
                                                if ($gra->getIdgrado() == $estudiante->getIdgrado()) {
                                                    echo "<option value='" . $gra->getIdgrado() . "' selected=true>" . $gra->getNivel() . " '" . $gra->getParalelo() . "'</option>";
                                                } else {
                                                    echo "<option value='" . $gra->getIdgrado() . "'>" . $gra->getNivel() . " '" . $gra->getParalelo() . "'</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td width="50">Nombre:</td><td><input type="text" name="nomestudiante" value="<?php echo $estudiante->getNomestudiante(); ?>" required/></td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr><td colspan="2" align="center"><input type="submit" value="Actualizar Estudiante" class="btn btn-info"></td></tr>
                            </table><br>
                        </form>
                    </td>
                </tr>
                <tr align="left">
                    <td colspan="1" align="right"><a href='../controller/controller.php?opcion=aIndex'>Ir a Inicio</a></td>
                    <td width="10"></td>
                    <td colspan="1" align="left"><a href='../controller/controller.php?opcion=aIndexEstudiante'>Ir a Menu Estudiante</a>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        <?php
    }
}
?>