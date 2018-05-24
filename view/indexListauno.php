<!DOCTYPE html>
<?php
session_start();
include_once '../model/Listauno.php';
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
                <title>Menú Listas</title>
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
                                <input type="hidden" value="listarListaunos" name="opcion">
                                <input type="submit" value="Ver Integrantes de la Lista" class="btn btn-primary">
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
                                <input type="button" value="Ingresar Lista" onclick="$('#capa').css('display', 'block')" class="btn btn-primary">
                                <div id="capa" style="display: none;padding: 10px; background-color: #66CCFF">
                                    <input type="hidden" value="guardarListauno" name="opcion">
                                    <table width="100%">
                                        <tr>
                                            <td>Nombre Lista:</td><td><input type="text" name="nombrelistau"  required/></td>
                                            <td width="20"></td>
                                            <td>Presidente:</td><td><input type="text" name="presidenteu"  required/></td>
                                            <td width="20"></td>
                                            <td>Vicepresidente:</td><td><input type="text" name="vicepresidenteu"  required/></td>
                                            <td width="20"></td>
                                            <td>Secretario:</td><td><input type="text" name="secretariou"  required/></td>
                                        </tr>
                                        <tr><td height="20" colspan="7"></td></tr>
                                        <tr>
                                            <td>Tesorero:</td><td><input type="text" name="tesorerou"  required/></td>
                                            <td width="20"></td>
                                            <td>Primer Vocal:</td><td><input type="text" name="pvocalu"  required/></td>
                                            <td width="20"></td>
                                            <td>Segundo Vocal:</td><td><input type="text" name="svocalu"  required/></td>
                                            <td width="20"></td>
                                            <td>Tercer Vocal:</td><td><input type="text" name="tvocalu"  required/></td>
                                        </tr>
                                        <tr><td height="20" colspan="7"></td></tr>
                                        <tr>
                                            <td>Cuarto Vocal:</td><td><input type="text" name="cvocalu"  required/></td>
                                            <td width="20"></td>
                                            <td>Quinto Vocal:</td><td><input type="text" name="qvocalu"  required/></td>
                                            <td width="20"></td>
                                            <td>Sexto Vocal:</td><td><input type="text" name="sxvocalu"  required/></td>
                                            <td width="20"></td>
                                            <td>Jefe Campaña:</td><td><input type="text" name="jcampu"  required/></td>
                                        </tr>
                                        <tr><td height="20" colspan="7"></td></tr>
        <!--                                <tr>
                                            <td>Imagen Lista:</td><td colspan="6"><input type="image" name="imagenu"  required/></td>
                                        </tr>-->
                                        <tr><td height="20" colspan="7"></td></tr>
                                        <td colspan="7" align="left"><input type="submit" value="Agregar Lista" class="btn btn-info"></td>
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
                            <th>NOMBRE LISTA</th>
                            <th>PRESIDENTE/A</th>
                            <th>VICEPRESIDENTE/A</th>
                            <th>SECRETARIO/A</th>
                            <th>TESORERO/A</th>
                            <th>1ER VOCAL</th>
                            <th>2DO VOCAL</th>
                            <th>3ER VOCAL</th>
                            <th>4TO VOCAL</th>
                            <th>5TO VOCAL</th>
                            <th>6TO VOCAL</th>
                            <th>JEFE CAMPAÑA</th>
                            <th colspan="2" align="center">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['listadoLU'])) {
                            $listadoLU = unserialize($_SESSION['listadoLU']);
                            foreach ($listadoLU as $uno) {
                                echo "<tr>";
                                echo "<td>" . $uno->getIdlistau() . "</td>";
                                echo "<td>" . $uno->getNombrelistau() . "</td>";
                                echo "<td>" . $uno->getPresidenteu() . "</td>";
                                echo "<td>" . $uno->getVicepresidenteu() . "</td>";
                                echo "<td>" . $uno->getSecretariou() . "</td>";
                                echo "<td>" . $uno->getTesorerou() . "</td>";
                                echo "<td>" . $uno->getPvocalu() . "</td>";
                                echo "<td>" . $uno->getSvocalu() . "</td>";
                                echo "<td>" . $uno->getTvocalu() . "</td>";
                                echo "<td>" . $uno->getCvocalu() . "</td>";
                                echo "<td>" . $uno->getQvocalu() . "</td>";
                                echo "<td>" . $uno->getSxvocalu() . "</td>";
                                echo "<td>" . $uno->getJcampu() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminarListauno&idlistau=" . $uno->getIdlistau() . "'>eliminar</a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=cargarListauno&idlistau=" . $uno->getIdlistau() . "'>actualizar</a></td>";
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