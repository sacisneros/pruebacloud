<!DOCTYPE html>
<?php
session_start();
$reservacion = unserialize($_SESSION['reservacion']);

include_once '../model/Hotel.php';
include_once '../model/Habitacion.php';
include_once '../model/Ciudad.php';
include_once '../model/Reservacion.php';
include_once '../model/Persona.php';
include_once '../model/ReservacionModel.php';

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
                <title>Realizar Reservacion</title>
                <script src="js/jquery-2.1.4.js"></script>
                <script src="js/bootstrap.js"></script>
                <script src="js/bootstrap-table.js"></script>
                <link href="css/bootstrap.css" rel="stylesheet">
                <link href="css/bootstrap-table.css" rel="stylesheet">
            </head>
            <body>
                <table align="center">
                    <tr>
                        <td colspan="4" height="15"></td>
                    </tr>
                    <tr>
                        <td colspan="4"><img src="../view/images/bannerIndex.jpg" height="210" width="996"></td>
                    </tr>
                    <tr>
                        <td colspan="4" height="15"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                            <form action="../controller/controller.php">
                                <input type="hidden" value="cerrarSesion" name="opcion">
                                <input type="submit" value="Cerrar Sesion" class="btn btn-info">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="../controller/controller.php">
                                <input type="hidden" value="actualizarReservacion" name="opcion">
                                <input type="hidden" value="<?php echo $reservacion->getIdReserva(); ?>" name="idReserva">
                                <table>
                                    <tr><td>Codigo:</td><td><b><?php echo $reservacion->getIdReserva(); ?></b></td></tr>
                                    <td><select name="idPersona">
                                            <?php
                                            $reservacionModel2 = new ReservacionModel();
                                            $listadoPer = $reservacionModel2->getPersonas();
                                            foreach ($listadoPer as $per) {
                                                echo "<option value='" . $per->getIdPersona() . "'>" . $per->getNombrePersona() . " " . $per->getApellidoPersona() . "</option>";
                                            }
                                            ?>
                                        </select></td>
                                    <tr><td width="50">Fecha Inicio:</td>
                                        <td><input type="date" name="fechaInicio" value="<?php $reservacion->getFechaInicio(); ?>" required/></td>
                                    </tr>
                                    <tr><td width="50">Fecha Término:</td>
                                        <td><input type="date" name="fechaTermino" value="<?php $reservacion->getFechaTermino(); ?>" required/></td>
                                    </tr>
                                    <tr><td width="50">Número Personas:</td>
                                        <td><input type="number" value="<?php echo $reservacion->getNumeroPersonas(); ?>" name="numeroPersonas" required/></td>
                                    </tr>
                                    <tr><td width="50">Número Habitaciones:</td>
                                        <td><input type="number" value="<?php echo $reservacion->getNumeroHabitaciones(); ?>" name="numeroHabitaciones" required/></td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
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