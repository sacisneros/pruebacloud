<!DOCTYPE html>
<?php
session_start();
include_once '../model/Grado.php';
include_once '../model/Estudiante.php';
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
                <script>
                    function validarcedula() {
                        var i;
                        var cedula;
                        var acumulado;
                        cedula = document.formacedula.textocedula.value;
                        var instancia;
                        acumulado = 0;
                        for (i = 1; i <= 9; i++) {
                            if (i % 2 != 0) {
                                instancia = cedula.substring(i - 1, i) * 2;
                                if (instancia > 9)
                                    instancia -= 9;
                            } else
                                instancia = cedula.substring(i - 1, i);
                            acumulado += parseInt(instancia);
                        }
                        while (acumulado > 0)
                            acumulado -= 10;
                        if (cedula.substring(9, 10) != (acumulado * -1)) {
                            alert("Cedula no valida!!");
                            document.formacedula.textocedula.setfocus();
                        }
                    }
                </script>
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
                        <td height="15" ></td>
                        <td align="left" width="60"><form action="../controller/controller.php">
                                <input type="hidden" value="listarEstudiantes" name="opcion">
                                <input type="submit" value="Ver Estudiantes" class="btn btn-primary">
                            </form>
                        </td>
                        <td width="5"></td>
                        <td align="left" width="60"><form action="../controller/controller.php">
                                <input type="hidden" value="EstudiantesGrado" name="opcion">
                                <input type="submit" value="Ver Estudiantes por Grado" class="btn btn-primary">
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
                        <td align="left"  colspan =4 >
                            <form action="../controller/controller.php">
                                <input type="hidden" value="insertarEstudiante" name="opcion">
                                <input type="button" value="Nuevo Estudiante" onclick="$('#capa').css('display', 'block')" class="btn btn-primary">
                                <div id="capa" style="display: none;padding: 10px; background-color: #66CCFF">
                                    <input type="hidden" value="guardarEstudiante" name="opcion">
                                    <table>
                                        <tr>
                                            <td width="50">Cédula:</td><td><input type="text" name="cedulaestudiante" id="textocedula" size="17" maxlength="17" onchange="validarcedula()" required/></td>
                                            <td width="50"></td>
                                            <td width="50">Grado:</td>
                                            <td>
                                                <select name="idgrado">
                                                    <option>Elegir grado</option>
                                                    <?php
                                                    $votoModel = new VotoModel();
                                                    $listadoGra = $votoModel->getGrados();
                                                    foreach ($listadoGra as $gra) {
                                                        echo "<option value='" . $gra->getIdgrado() . "'>" . $gra->getNivel() . " '" . $gra->getParalelo() . "'</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td width="50"></td>
                                            <td width="50">Nombre:</td><td><input type="text" name="nomestudiante"  required/></td>
                                        </tr>
                                        <tr><td height="10"></td></tr>
                                        <tr>
                                            <td colspan="8"><input type="submit" value="Agregar Estudiante" class="btn btn-info"></td>
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
                            <th>CEDULA</th>
                            <th>GRADO</th>
                            <th>NOMBRE</th>
                            <th colspan="2" align="center">OPCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['listadoEs'])) {
                            $listadoEs = unserialize($_SESSION['listadoEs']);
                            $listadoGrad = unserialize($_SESSION['listadoGrad']);
                            foreach ($listadoEs as $est) {
                                $grado = "";
                                foreach ($listadoGrad as $gra) {
                                    if ($est->getIdgrado() == $gra->getIdgrado()) {
                                        $grado = $gra->getNivel() . " '" . $gra->getParalelo() . "'";
                                    }
                                }
                                echo "<tr>";
                                echo "<td>" . $est->getCedulaestudiante() . "</td>";
                                echo "<td>" . $grado . "</td>";
                                echo "<td>" . $est->getNomestudiante() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminarEstudiante&cedulaestudiante=" . $est->getCedulaestudiante() . "'>eliminar</a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=cargarEstudiante&cedulaestudiante=" . $est->getCedulaestudiante() . "'>actualizar</a></td>";
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