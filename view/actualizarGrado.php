<!DOCTYPE html>
<?php
include_once '../model/Grado.php';
include_once '../model/Profesor.php';
include_once '../model/VotoModel.php';
session_start();
$grado = $_SESSION['grado'];

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
                <title>Actualizar Grado</title>
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
                            <input type="hidden" value="actualizarGrado" name="opcion">
                            <input type="hidden" value="<?php echo $grado->getIdgrado(); ?>" name="idgrado">
                            <table align="left">
                                <tr>
                                    <td>Profesor:</td>
                                    <td>
                                        <select name="cedulaprofesor">
                                            <option>Elegir profesor</option>
                                            <?php
                                            $votoModel = new VotoModel();
                                            $listadoProf = $votoModel->getProfesores();
                                            foreach ($listadoProf as $prof) {
                                                if ($prof->getCedulaprofesor() == $grado->getCedulaprofesor()) {
                                                    echo "<option value='" . $prof->getCedulaprofesor() . "'selected=true>" . $prof->getNombreprofesor() . "</option>";
                                                } else {
                                                    echo "<option value='" . $prof->getCedulaprofesor() . "'>" . $prof->getNombreprofesor() . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td>Nivel:</td>
                                    <td><input type="number" name="nivel" value="<?php echo $grado->getNivel(); ?>"  required/></td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td>Paralelo:</td>                                    
                                    <td>
                                        <select name="paralelo">
                                            <option>Elegir paralelo</option>
                                            <?php
                                            if ($grado->getParalelo() == "A") {
                                                echo "<option selected=true>A</option>";
                                            } else {
                                                echo "<option>A</option>";
                                            }
                                            if ($grado->getParalelo() == "B") {
                                                echo "<option selected=true>B</option>";
                                            } else {
                                                echo "<option>B</option>";
                                            }
                                            if ($grado->getParalelo() == "C") {
                                                echo "<option selected=true>C</option>";
                                            } else {
                                                echo "<option>C</option>";
                                            }
                                            if ($grado->getParalelo() == "D") {
                                                echo "<option selected=true>D</option>";
                                            } else {
                                                echo "<option>D</option>";
                                            }
                                            if ($grado->getParalelo() == "E") {
                                                echo "<option selected=true>E</option>";
                                            } else {
                                                echo "<option>E</option>";
                                            }
                                            ?> 
                                        </select>
                                    </td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td>N. Alumnos:</td><td><input type="number" name="nalumnos"  value="<?php echo $grado->getNalumnos(); ?>" required/></td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr>
                                    <td>Ciclo:</td>
                                    <td>
                                        <select name="bod">
                                            <option>Elegir Ciclo</option>
                                            <?php
                                            if ($grado->getBod() == "BASICO") {
                                                echo "<option selected=true>BASICO</option>";
                                            } else {
                                                echo "<option>BASICO</option>";
                                            }
                                            if ($grado->getBod() == "BACHILLERATO") {
                                                echo "<option selected=true>BACHILLERATO</option>";
                                            } else {
                                                echo "<option>BACHILLERATO</option>";
                                            }
                                            ?> 
                                        </select>
                                    </td>
                                </tr>
                                <tr><td height="10"></td></tr>
                                <tr><td colspan="2" align="center"><input type="submit" value="Actualizar Grado" class="btn btn-info"></td></tr>
                            </table><br>
                        </form>
                    </td>
                </tr>
                <tr align="left">
                    <td colspan="1" align="right"><a href='../controller/controller.php?opcion=aIndex'>Ir a Inicio</a></td>
                    <td width="10"></td>
                    <td colspan="1" align="left"><a href='../controller/controller.php?opcion=aIndexGrado'>Ir a Menu Grado</a>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        <?php
    }
}
?>