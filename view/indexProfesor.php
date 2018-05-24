<!DOCTYPE html>
<?php
session_start();
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
                <title>Menú de Tutores</title>
                <script src="js/jquery-2.1.4.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap-table.js"></script>
                <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/bootstrap-table.css" rel="stylesheet">
            </head>
            <body>
                <table width="100%">
                    <tr>
                        <td colspan="4" height="15" width="10"></td>
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
                                <input type="hidden" value="listarProfesores" name="opcion">
                                <input type="submit" value="Ver Tutores" class="btn btn-primary">
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
                                <input type="hidden" value="insertarProfesor" name="opcion">
                                <input type="button" value="Nuevo Tutor" onclick="$('#capa').css('display', 'block')" class="btn btn-primary">
                                <div id="capa" style="display: none;padding: 10px; background-color: #66CCFF">
                                    <input type="hidden" value="guardarProfesor" name="opcion">
                                    Nombre:<input type="text" name="nombreprofesor"  required/><br>
                                    <input type="submit" value="Agregar Tutor" class="btn btn-info">
                                </div>
                            </form>
                        </td>
                        <td width="5"></td>
                    </tr>
                    <tr>
                        <td colspan="5" height="25"></td>
                    </tr>
                </table>
                <table data-toggle="table">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th colspan="2" align="center">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['listadoPr'])) {
                            $listadoPr = unserialize($_SESSION['listadoPr']);
                            foreach ($listadoPr as $pro) {
                                echo "<tr>";
                                echo "<td>" . $pro->getNombreprofesor() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminarProfesor&cedulaprofesor=" . $pro->getCedulaprofesor() . "'>eliminar</a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=cargarProfesor&cedulaprofesor=" . $pro->getCedulaprofesor() . "'>actualizar</a></td>";
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