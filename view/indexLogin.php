<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
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
        <table align="center">
            <tr><td height="20" colspan="5"></tr>
            <tr>
                <td width="10%"></td>
                <td width="35%">
                    <form action="../controller/controller.php">
                        <table>
                            <input type="hidden" value="iniciarSesion" name="opcion">
                            <tr>
                                <td width="20"></td>
                                <td align="center" colspan="3"><input type="hidden" value="Administrador" name="user"><img src="../view/images/don bosco.jpg" height="150" width="150"></td>
                                <td width="20"></td>
                            </tr>
                            <tr><td height="20" colspan="5"></td></tr>
                            <tr>
                                <td width="20"></td>
                                <td>Clave *:</td>
                                <td width='10'>
                                <td><input type="password" name="contrasena" requiered="true"></td>
                                <td width="20"></td>
                            </tr>
                            <tr><td height="20" colspan="5"></td></tr>
                            <tr>
                                <td align="center" colspan="5"><input type="submit" value="Iniciar Sesión" class="btn btn-info"></td></tr>
                            <tr>
                        </table>
                    </form>
                </td>
                <td width="10%"></td>
                <td width="35%">
                    <form action="../controller/controller.php">
                        <table>
                            <input type="hidden" value="iniciarSesionE" name="opcion">
                            <tr>
                                <td width="20"></td>
                                <td align="center" colspan="3"><input type="hidden" value="Estudiante" name="user"><img src="../view/images/sanchez.jpg" height="150" width="150"></td>
                                <td width="20"></td>
                            </tr>
                            <tr><td height="20" colspan="5"></td></tr>
                            <tr>
                                <td width="20"></td>
                                <td colspan="3" align='center' ><b>Estudiante</b></td>
                                <td width="20"></td>
                            </tr>
                            <tr><td height="20" colspan="5"></td></tr>
                            <tr>
                                <td align="center" colspan="5"><input type="submit" value="Iniciar Sesión" class="btn btn-info"></td></tr>
                            <tr>
                        </table>
                    </form>
                </td>
                <td width="10%"></td>
            </tr>
        </table>
    </body>
</html>
