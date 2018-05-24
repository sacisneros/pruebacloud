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
                <title>Menú de Estudiante por Grado</title>
                <script src="js/jquery-2.1.4.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap-table.js"></script>
                <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/bootstrap-table.css" rel="stylesheet">
            </head>
            <body>
                <table width="100%" >
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
                <table width="100%" >
                    <tr>
                        <td height="15" ></td>
                        <td align="left" width="60">
                            <form action="../controller/controller.php">
                                <input type="hidden" value="listarEstudiantesPorgrado" name="opcion">

                                <table width="500" >
                                    <tr>
                                        <td width="20"></td>
                                        <td width="175">Seleccionar un grado:</td>
                                        <td width="10"></td>
                                        <td>
                                            <select name="idgrado">
                                                <option>Elegir grado</option>
                                                <?php
                                                $votoModel = new VotoModel();
                                                $listadoGrado = $votoModel->getGrados();
                                                foreach ($listadoGrado as $gra) {
                                                    echo "<option value='" . $gra->getIdgrado() . "'>" . $gra->getNivel() . " '" . $gra->getParalelo() . "'</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="10" colspan="4"></td>
                                    </tr>
                                    <tr>
                                        <td width="20"></td>
                                        <td colspan="2">
                                            <input type="submit" value="Ver Estudiantes" class="btn btn-primary">
                                        </td>
                                    </tr>
                                    <tr><td height="10"></td></tr>

                                </table>
                            </form>
                        </td>

                        <td width="5"></td>
                        <td colspan="3" align="right">
                            <form action="../controller/controller.php">
                                <input type="hidden" value="cerrarSesion" name="opcion">
                                <input type="submit" value="Cerrar Sesion" class="btn btn-info">
                            </form>
                            <br>
                            <a href='../controller/controller.php?opcion=aIndex'>Ir a Inicio</a><p>   </p><a href='../controller/controller.php?opcion=aIndexEstudiante'>Ir a Menu Estudiante</a>
                        </td>
                        <td height="15" width="20"></td>
                    </tr>
                    <tr><td height="15"></td></tr>
                </table>
                <table data-toggle="table">
                    <thead>
                        <tr>
                            <th>CEDULA</th>
                            <th>GRADO</th>
                            <th>NOMBRE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['listadoEsG'])) {
                            $listadoEsG = unserialize($_SESSION['listadoEsG']);
                            $listadoGrado = unserialize($_SESSION['listadoGrado']);
                            foreach ($listadoEsG as $est) {
                                $grado = "";
                                foreach ($listadoGrado as $gra) {
                                    if ($est->getIdgrado() == $gra->getIdgrado()) {
                                        $grado = $gra->getNivel() . " '" . $gra->getParalelo() . "'";
                                    }
                                }
                                echo "<tr>";
                                echo "<td>" . $est->getCedulaestudiante() . "</td>";
                                echo "<td>" . $grado . "</td>";
                                echo "<td>" . $est->getNomestudiante() . "</td>";
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