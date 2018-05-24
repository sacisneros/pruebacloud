<!DOCTYPE html>
<?php
session_start();
include_once '../model/Listados.php';
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
                <title>Menú Lista Dos</title>
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
                                <input type="hidden" value="listarListados" name="opcion">
                                <input type="submit" value="Ver Integrantes de la Lista" class="btn btn-primary">
                            </form>
                        </td>
                        <td width="5"></td>
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
                        <td align="left"  colspan =2>
                            <form action="../controller/controller.php">
                                <input type="hidden" value="insertarGrado" name="opcion">
                                <input type="button" value="Ingresar Lista Dos" onclick="$('#capa').css('display', 'block')" class="btn btn-primary">
                                <div id="capa" style="display: none;padding: 10px; background-color: #66CCFF">
                                    <input type="hidden" value="guardarListados" name="opcion">
                                    <table width="100%">
                                        <tr>
                                            <td>Nombre Lista:</td><td><input type="text" name="nombrelistad"  required/></td>
                                            <td width="20"></td>
                                            <td>Presidente:</td><td><input type="text" name="presidented"  required/></td>
                                            <td width="20"></td>
                                            <td>Vicepresidente:</td><td><input type="text" name="vicepresidented"  required/></td>
                                            <td width="20"></td>
                                            <td>Secretario:</td><td><input type="text" name="secretariod"  required/></td>
                                        </tr>
                                        <tr><td height="20" colspan="7"></td></tr>
                                        <tr>
                                            <td>Tesorero:</td><td><input type="text" name="tesorerod"  required/></td>
                                            <td width="20"></td>
                                            <td>Primer Vocal:</td><td><input type="text" name="pvocald"  required/></td>
                                            <td width="20"></td>
                                            <td>Segundo Vocal:</td><td><input type="text" name="svocald"  required/></td>
                                            <td width="20"></td>
                                            <td>Tercer Vocal:</td><td><input type="text" name="tvocald"  required/></td>
                                        </tr>
                                        <tr><td height="20" colspan="7"></td></tr>
                                        <tr>
                                            <td>Cuarto Vocal:</td><td><input type="text" name="cvocald"  required/></td>
                                            <td width="20"></td>
                                            <td>Quinto Vocal:</td><td><input type="text" name="qvocald"  required/></td>
                                            <td width="20"></td>
                                            <td>Sexto Vocal:</td><td><input type="text" name="sxvocald"  required/></td>
                                            <td width="20"></td>
                                            <td>Jefe Campaña:</td><td><input type="text" name="jcampd"  required/></td>
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
                        if (isset($_SESSION['listadoLD'])) {
                            $listadoLD = unserialize($_SESSION['listadoLD']);
                            foreach ($listadoLD as $dos) {
                                echo "<tr>";
                                echo "<td>" . $dos->getIdlistad() . "</td>";
                                echo "<td>" . $dos->getNombrelistad() . "</td>";
                                echo "<td>" . $dos->getPresidented() . "</td>";
                                echo "<td>" . $dos->getVicepresidented() . "</td>";
                                echo "<td>" . $dos->getSecretariod() . "</td>";
                                echo "<td>" . $dos->getTesorerod() . "</td>";
                                echo "<td>" . $dos->getPvocald() . "</td>";
                                echo "<td>" . $dos->getSvocald() . "</td>";
                                echo "<td>" . $dos->getTvocald() . "</td>";
                                echo "<td>" . $dos->getCvocald() . "</td>";
                                echo "<td>" . $dos->getQvocald() . "</td>";
                                echo "<td>" . $dos->getSxvocald() . "</td>";
                                echo "<td>" . $dos->getJcampd() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminarListados&idlistad=" . $dos->getIdlistad() . "'>eliminar</a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=cargarListados&idlistad=" . $dos->getIdlistad() . "'>actualizar</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se han cargado datos.";
                        }
                        ?>
                    </tbody>
                </table>
                <table>
                    <tr>
                        <td><a href='../controller/controller.php?opcion=aIndex'>Ir a Inicio</a></td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    }
}
?>