<!DOCTYPE html>
<?php
session_start();
include_once '../model/Grado.php';
include_once '../model/Profesor.php';
include_once '../model/VotoModel.php';
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
                <title>Menú de Grado</title>
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
                        <td height="15" width="20"></td>
                        <td align="left"><form action="../controller/controller.php">
                                <input type="hidden" value="listarGrados" name="opcion">
                                <input type="submit" value="Ver Grados" class="btn btn-primary">
                            </form>
                        </td>
                        <td width="5"></td>
                        <td colspan="3" align="right">
                            <form action="../controller/controller.php">
                                <input type="hidden" value="cerrarSesion" name="opcion">
                                <input type="submit" value="Cerrar Sesion" class="btn btn-info">
                            </form>
                            <br>
                            <a href='../controller/controller.php?opcion=aIndex'>Ir a Inicio</a>
                        </td>
                        <td height="15" width="20"></td>
                    </tr>
                    <tr><td height="15"></td></tr>
                    <tr>
                        <td height="15" width="20"></td>
                        <td align="left"  colspan =2>
                            <form action="../controller/controller.php">
                                <input type="hidden" value="insertarGrado" name="opcion">
                                <input type="button" value="Nuevo Grado" onclick="$('#capa').css('display', 'block')" class="btn btn-primary">
                                <div id="capa" style="display: none;padding: 10px; background-color: #66CCFF">
                                    <input type="hidden" value="guardarGrado" name="opcion">
                                    <table>
                                        <tr>
                                            <td>Profesor:</td>
                                            <td>
                                                <select name="cedulaprofesor">
                                                    <option>Elegir profesor</option>
                                                    <?php
                                                    $votoModel = new VotoModel();
                                                    $listadoProf = $votoModel->getProfesores();
                                                    foreach ($listadoProf as $prof) {
                                                        echo "<option value='" . $prof->getCedulaprofesor() . "'>" . $prof->getNombreprofesor() . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td width="20"></td>
                                            <td>Nivel:</td>
                                            <td><input type="number" name="nivel"  required/></td>
                                            <td width="20"></td>
                                            <td>Paralelo:</td>                                    
                                            <td>
                                                <select name="paralelo">
                                                    <option>Elegir paralelo</option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>                                            
                                                    <option>E</option>
                                                </select>
                                            </td>
                                            <td width="20"></td>
                                            <td>N. Alumnos:</td>
                                            <td><input type="number" name="nalumnos"  required/></td>
                                            <td width="20"></td>
                                            <td>Ciclo:</td>
                                            <td>
                                                <select name="bod">
                                                    <option>Elegir Ciclo</option>
                                                    <option>BASICO</option>
                                                    <option>BACHILLERATO</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <td><input type="submit" value="Agregar Grado" class="btn btn-info"></td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" height="15"></td>
                    </tr>
                </table>
                <table data-toggle="table">
                    <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>PROFESOR</th>
                            <th>NIVEL</th>
                            <th>PARALELO</th>
                            <th>NUM.ALUMNOS</th>
                            <th>CICLO</th>
                            <th colspan="2" align="center">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['listadoGr'])) {
                            $listadoGr = unserialize($_SESSION['listadoGr']);
                            $listadoProf = unserialize($_SESSION['listadoProf']);
                            foreach ($listadoGr as $gra) {
                                $nombrePr = "";
                                foreach ($listadoProf as $pro) {
                                    if ($gra->getCedulaprofesor() == $pro->getCedulaprofesor()) {
                                        $nombrePr = $pro->getNombreprofesor();
                                    }
                                }
                                echo "<tr>";
                                echo "<td>" . $gra->getIdgrado() . "</td>";
                                echo "<td>" . $nombrePr . "</td>";
                                echo "<td>" . $gra->getNivel() . "</td>";
                                echo "<td>" . $gra->getParalelo() . "</td>";
                                echo "<td>" . $gra->getNalumnos() . "</td>";
                                echo "<td>" . $gra->getBod() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminarGrado&idgrado=" . $gra->getIdgrado() . "'>eliminar</a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=cargarGrado&idgrado=" . $gra->getIdgrado() . "'>actualizar</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se han cargado datos.";
                        }
                        ?>
                    </tbody>
                </table>
            </body>
        </html>

        <?php
    }
}
?>