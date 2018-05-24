<?php

include_once '../model/Profesor.php';
include_once '../model/Grado.php';
require_once '../model/VotoModel.php';
session_start();
$votoModel = new votoModel();
$opcion = $_REQUEST['opcion'];
$contrasena = "";
switch ($opcion) {
    //LOGIN ADMINISTRADOR
    case "iniciarSesion":
        $user = $_REQUEST['user'];
        $contrasena = $_REQUEST['contrasena'];
        $bandera = 'N';
        if ($user == "Administrador" && $contrasena == "123") {
            $bandera = 'S';

            $opcione = 'null';
            $resultadoU = $votoModel->getResultadoU($opcione);

            $_SESSION["bandera"] = serialize($bandera);
            header('Location: ../view/index.php');
        } else {
            $bandera = 'N';
            $_SESSION["bandera"] = serialize($bandera);
            header('Location: ../view/indexLogin.php');
        }
        break;
    //LOGIN ESTUDIANTE
    case "iniciarSesionE":
        $user = $_REQUEST['user'];

        $bandera = 'N';
        if ($user == "Estudiante") {
            $bandera = 'S';
            $_SESSION["bandera"] = serialize($bandera);
            header('Location: ../view/indexVoto.php');
        } else {
            $bandera = 'N';
            $_SESSION["bandera"] = serialize($bandera);
            header('Location: ../view/indexLogin.php');
        }
        break;
    //CERRAR SESION
    case "cerrarSesion":
        session_destroy();
        header('Location: ../view/indexLogin.php');
        break;

    //CASOS CRUD TABLA MAESTRO Profesor
    case "profesores":
        header('Location: ../view/indexProfesor.php');
        break;
    case "listarProfesores":
        $listadoPr = $votoModel->getProfesores();
        $_SESSION['listadoPr'] = serialize($listadoPr);
        header('Location: ../view/indexProfesor.php');
        break;
    case "guardarProfesor":
        $nombreprofesor = $_REQUEST['nombreprofesor'];
        try {
            $votoModel->insertarProfesor($nombreprofesor);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        $listadoPr = $votoModel->getProfesores();
        $_SESSION['listadoPr'] = serialize($listadoPr);
        header('Location: ../view/indexProfesor.php');
        break;
    case "eliminarProfesor":
        $cedulaprofesor = $_REQUEST['cedulaprofesor'];
        $votoModel->eliminarProfesor($cedulaprofesor);
        $listadoPr = $votoModel->getProfesores();
        $_SESSION['listadoPr'] = serialize($listadoPr);
        header('Location: ../view/indexProfesor.php');
        break;
    case "cargarProfesor":
        $cedulaprofesor = $_REQUEST['cedulaprofesor'];
        $profesor = $votoModel->getProfesor($cedulaprofesor);
        $_SESSION['profesor'] = $profesor;
        header('Location: ../view/actualizarProfesor.php');
        break;
    case "actualizarProfesor":
        $cedulaprofesor = $_REQUEST['cedulaprofesor'];
        $nombreprofesor = $_REQUEST['nombreprofesor'];
        $votoModel->actualizarProfesor($cedulaprofesor, $nombreprofesor);
        $listadoPr = $votoModel->getProfesores();
        $_SESSION['listadoPr'] = serialize($listadoPr);
        $profesor = $votoModel->getProfesor($cedulaprofesor);
        $_SESSION['profesor'] = $profesor;
        header('Location: ../view/indexProfesor.php');
        break;
    //CASOS CRUD TABLA grado
    case "grados":
        header('Location: ../view/indexGrado.php');
        break;
    case "listarGrados":
        $listadoGr = $votoModel->getGrados();
        $listadoProf = $votoModel->getProfesores();
        $_SESSION['listadoProf'] = serialize($listadoProf);
        $_SESSION['listadoGr'] = serialize($listadoGr);
        header('Location: ../view/indexGrado.php');
        break;
    case "guardarGrado":
        $cedulaprofesor = $_REQUEST['cedulaprofesor'];
        $nivel = $_REQUEST['nivel'];
        $paralelo = $_REQUEST['paralelo'];
        $nalumnos = $_REQUEST['nalumnos'];
        $bod = $_REQUEST['bod'];
        try {
            $votoModel->insertarGrado($cedulaprofesor, $nivel, $paralelo, $nalumnos, $bod);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        $listadoProf = $votoModel->getProfesores();
        $_SESSION['listadoProf'] = serialize($listadoProf);
        $listadoGr = $votoModel->getGrados();
        $_SESSION['listadoGr'] = serialize($listadoGr);
        header('Location: ../view/indexGrado.php');
        break;
    case "eliminarGrado":
        $idgrado = $_REQUEST['idgrado'];
        $votoModel->eliminarGrado($idgrado);
        $listadoGr = $votoModel->getGrados();
        $_SESSION['listadoGr'] = serialize($listadoGr);
        header('Location: ../view/indexGrado.php');
        break;
    case "cargarGrado":
        $idgrado = $_REQUEST['idgrado'];
        $grado = $votoModel->getGrado($idgrado);
        $_SESSION['grado'] = $grado;
        header('Location: ../view/actualizarGrado.php');
        break;
    case "actualizarGrado":
        $idgrado = $_REQUEST['idgrado'];
        $cedulaprofesor = $_REQUEST['cedulaprofesor'];
        $nivel = $_REQUEST['nivel'];
        $paralelo = $_REQUEST['paralelo'];
        $nalumnos = $_REQUEST['nalumnos'];
        $bod = $_REQUEST['bod'];
        $votoModel->actualizarGrado($cedulaprofesor, $nivel, $paralelo, $nalumnos, $bod, $idgrado);
        $listadoGr = $votoModel->getGrados();
        $_SESSION['listadoGr'] = serialize($listadoGr);
        $grado = $votoModel->getGrado($idgrado);
        $_SESSION['grado'] = $grado;
        header('Location: ../view/indexGrado.php');
        break;
    //CASOS CRUD TABLA ESTUDIANTE
    case "estudiantes":
        header('Location: ../view/indexEstudiante.php');
        break;
    case "listarEstudiantes":
        $listadoEs = $votoModel->getEstudiantes();
        $listadoGrad = $votoModel->getGrados();
        $_SESSION['listadoEs'] = serialize($listadoEs);
        $_SESSION['listadoGrad'] = serialize($listadoGrad);
        header('Location: ../view/indexEstudiante.php');
        break;
    case "guardarEstudiante":
        $cedulaestudiante = $_REQUEST['cedulaestudiante'];
        $idgrado = $_REQUEST['idgrado'];
        $nomestudiante = $_REQUEST['nomestudiante'];
        try {
            $votoModel->insertarEstudiante($cedulaestudiante, $idgrado, $nomestudiante);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        $listadoGrad = $votoModel->getGrados();
        $_SESSION['listadoGrad'] = serialize($listadoGrad);
        $listadoEs = $votoModel->getEstudiantes();
        $_SESSION['listadoEs'] = serialize($listadoEs);
        header('Location: ../view/indexEstudiante.php');
        break;
    case "eliminarEstudiante":
        $cedulaestudiante = $_REQUEST['cedulaestudiante'];
        $votoModel->eliminarEstudiante($cedulaestudiante);
        $listadoEs = $votoModel->getEstudiantes();
        $_SESSION['listadoEs'] = serialize($listadoEs);
        header('Location: ../view/indexEstudiante.php');
        break;
    case "cargarEstudiante":
        $cedulaestudiante = $_REQUEST['cedulaestudiante'];
        $estudiante = $votoModel->getEstudiante($cedulaestudiante);
        $_SESSION['estudiante'] = $estudiante;
        header('Location: ../view/actualizarEstudiante.php');
        break;
    case "actualizarEstudiante":
        $cedulaestudiante = $_REQUEST['cedulaestudiante'];
        $idgrado = $_REQUEST['idgrado'];
        $nomestudiante = $_REQUEST['nomestudiante'];
        $votoModel->actualizarEstudiante($idgrado, $nomestudiante, $cedulaestudiante);
        $listadoEs = $votoModel->getEstudiantes();
        $_SESSION['listadoEs'] = serialize($listadoEs);
        $listadoGrad = $votoModel->getGrados();
        $_SESSION['listadoGrad'] = serialize($listadoGrad);
        $estudiante = $votoModel->getEstudiante($cedulaestudiante);
        $_SESSION['estudiante'] = $estudiante;
        header('Location: ../view/indexEstudiante.php');
        break;
    //CASOS CRUD TABLA LISTAUNO
    case "listauno":
        header('Location: ../view/indexListauno.php');
        break;
    case "listarListaunos":
        $listadoLU = $votoModel->getListaunos();
        $_SESSION['listadoLU'] = serialize($listadoLU);
        header('Location: ../view/indexListauno.php');
        break;
    case "guardarListauno":
        $nombrelistau = $_REQUEST['nombrelistau'];
        $presidenteu = $_REQUEST['presidenteu'];
        $vicepresidenteu = $_REQUEST['vicepresidenteu'];
        $secretariou = $_REQUEST['secretariou'];
        $tesorerou = $_REQUEST['tesorerou'];
        $pvocalu = $_REQUEST['pvocalu'];
        $svocalu = $_REQUEST['svocalu'];
        $tvocalu = $_REQUEST['tvocalu'];
        $cvocalu = $_REQUEST['cvocalu'];
        $qvocalu = $_REQUEST['qvocalu'];
        $sxvocalu = $_REQUEST['sxvocalu'];
        $jcampu = $_REQUEST['jcampu'];
        try {
            $votoModel->insertarListauno($nombrelistau, $presidenteu, $vicepresidenteu, $secretariou, $tesorerou, $pvocalu, $svocalu, $tvocalu, $cvocalu, $qvocalu, $sxvocalu, $jcampu);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        $listadoLU = $votoModel->getListaunos();
        $_SESSION['listadoLU'] = serialize($listadoLU);
        header('Location: ../view/indexListauno.php');
        break;
    case "eliminarListauno":
        $idlistau = $_REQUEST['idlistau'];
        $votoModel->eliminarListau($idlistau);
        $listadoLU = $votoModel->getListaunos();
        $_SESSION['listadoLU'] = serialize($listadoLU);
        header('Location: ../view/indexListauno.php');
        break;
    case "cargarListauno":
        $idlistau = $_REQUEST['idlistau'];
        $listauno = $votoModel->getListauno($idlistau);
        $_SESSION['listauno'] = $listauno;
        header('Location: ../view/actualizarListauno.php');
        break;
    case "actualizarListauno":
        $idlistau = $_REQUEST['idlistau'];
        $nombrelistau = $_REQUEST['nombrelistau'];
        $presidenteu = $_REQUEST['presidenteu'];
        $vicepresidenteu = $_REQUEST['vicepresidenteu'];
        $secretariou = $_REQUEST['secretariou'];
        $tesorerou = $_REQUEST['tesorerou'];
        $pvocalu = $_REQUEST['pvocalu'];
        $svocalu = $_REQUEST['svocalu'];
        $tvocalu = $_REQUEST['tvocalu'];
        $cvocalu = $_REQUEST['cvocalu'];
        $qvocalu = $_REQUEST['qvocalu'];
        $sxvocalu = $_REQUEST['sxvocalu'];
        $jcampu = $_REQUEST['jcampu'];
        $votoModel->actualizarListauno($idlistau, $nombrelistau, $presidenteu, $vicepresidenteu, $secretariou, $tesorerou, $pvocalu, $svocalu, $tvocalu, $cvocalu, $qvocalu, $sxvocalu, $jcampu);
        $listadoLU = $votoModel->getListaunos();
        $_SESSION['listadoLU'] = serialize($listadoLU);
        $listauno = $votoModel->getListauno($idlistau);
        $_SESSION['listauno'] = $listauno;
        header('Location: ../view/indexListauno.php');
        break;
    //CASOS CRUD TABLA LISTADOS
    case "listados":
        header('Location: ../view/indexListados.php');
        break;
    case "listarListados":
        $listadoLD = $votoModel->getListadoss();
        $_SESSION['listadoLD'] = serialize($listadoLD);
        header('Location: ../view/indexListados.php');
        break;
    case "guardarListados":
        $nombrelistad = $_REQUEST['nombrelistad'];
        $presidented = $_REQUEST['presidented'];
        $vicepresidented = $_REQUEST['vicepresidented'];
        $secretariod = $_REQUEST['secretariod'];
        $tesorerod = $_REQUEST['tesorerod'];
        $pvocald = $_REQUEST['pvocald'];
        $svocald = $_REQUEST['svocald'];
        $tvocald = $_REQUEST['tvocald'];
        $cvocald = $_REQUEST['cvocald'];
        $qvocald = $_REQUEST['qvocald'];
        $sxvocald = $_REQUEST['sxvocald'];
        $jcampd = $_REQUEST['jcampd'];
        try {
            $votoModel->insertarListados($nombrelistad, $presidented, $vicepresidented, $secretariod, $tesorerod, $pvocald, $svocald, $tvocald, $cvocald, $qvocald, $sxvocald, $jcampd);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        $listadoLD = $votoModel->getListadoss();
        $_SESSION['listadoLD'] = serialize($listadoLD);
        header('Location: ../view/indexListados.php');
        break;
    case "eliminarListados":
        $idlistad = $_REQUEST['idlistad'];
        $votoModel->eliminarListad($idlistad);
        $listadoLD = $votoModel->getListadoss();
        $_SESSION['listadoLD'] = serialize($listadoLD);
        header('Location: ../view/indexListados.php');
        break;
    case "cargarListados":
        $idlistad = $_REQUEST['idlistad'];
        $listados = $votoModel->getListados($idlistad);
        $_SESSION['listados'] = $listados;
        header('Location: ../view/actualizarListados.php');
        break;
    case "actualizarListados":
        $idlistad = $_REQUEST['idlistad'];
        $nombrelistad = $_REQUEST['nombrelistad'];
        $presidented = $_REQUEST['presidented'];
        $vicepresidented = $_REQUEST['vicepresidented'];
        $secretariod = $_REQUEST['secretariod'];
        $tesorerod = $_REQUEST['tesorerod'];
        $pvocald = $_REQUEST['pvocald'];
        $svocald = $_REQUEST['svocald'];
        $tvocald = $_REQUEST['tvocald'];
        $cvocald = $_REQUEST['cvocald'];
        $qvocald = $_REQUEST['qvocald'];
        $sxvocald = $_REQUEST['sxvocald'];
        $jcampd = $_REQUEST['jcampd'];
        $votoModel->actualizarListados($idlistad, $nombrelistad, $presidented, $vicepresidented, $secretariod, $tesorerod, $pvocald, $svocald, $tvocald, $cvocald, $qvocald, $sxvocald, $jcampd);
        $listadoLD = $votoModel->getListadoss();
        $_SESSION['listadoLD'] = serialize($listadoLD);
        $listados = $votoModel->getListados($idlistad);
        $_SESSION['listados'] = $listados;
        header('Location: ../view/indexListados.php');
        break;
    //casos tabla voto
    case "insertarVoto":
        $cedulaestudiante = $_REQUEST['cedulaestudiante'];
        $eleccion = $_REQUEST['eleccion'];
        try {
            $votoModel->insertarVoto($cedulaestudiante, $eleccion);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }
        header('Location: ../view/indexLogin.php');
        break;
    //CASOS REPORTES
    //REPORTE ESTUDIANTES POR GRADO
    case "EstudiantesGrado":
        header('Location: ../view/indexEstudiantePorgrado.php');
        break;
    case "listarEstudiantesPorgrado":
        $idgrado = $_REQUEST['idgrado'];
        $listadoEsG = $votoModel->getEstudiantesPorgrado($idgrado);
        $listadoGrado = $votoModel->getGrados();
        $_SESSION['listadoEsG'] = serialize($listadoEsG);
        $_SESSION['listadoGrado'] = serialize($listadoGrado);
        header('Location: ../view/indexEstudiantePorgrado.php');
        break;
    
    //reporte resultado lista uno
    case "resultadoUno":
        $opcione = $_REQUEST['opcione'];
        $resultadoU = $votoModel->getResultadoU($opcione);
        $_SESSION['resultadoU'] = $resultadoU;
        header('Location: ../view/index.php');
        break;
    //reporte resultado lista dos
    case "resultadoDos":
        $opcione = $_REQUEST['opcione'];
        $resultadoD = $votoModel->getResultadoD($opcione);
        $_SESSION['resultadoD'] = $resultadoD;
        header('Location: ../view/index.php');
        break;
   //reporte resultado blancos
    case "resultadoBla":
        $opcione = $_REQUEST['opcione'];
        $resultadoB = $votoModel->getResultadoB($opcione);
        $_SESSION['resultadoB'] = $resultadoB;
        header('Location: ../view/index.php');
        break;
    //reporte resultado nulos
    case "resultadoNul":
        $opcione = $_REQUEST['opcione'];
        $resultadoN = $votoModel->getResultadoN($opcione);
        $_SESSION['resultadoN'] = $resultadoN;
        header('Location: ../view/index.php');
        break;
    //CASOS BOTONES DE NAVEGACION
    case "aIndexGrado":
        header('Location: ../view/indexGrado.php');
        break;
    case "aIndexProfesor":
        header('Location: ../view/indexProfesor.php');
        break;
    case "aIndexEstudiante":
        header('Location: ../view/indexEstudiante.php');
        break;
    case "aIndexListauno":
        header('Location: ../view/indexListauno.php');
        break;
    case "aIndexListados":
        header('Location: ../view/indexListados.php');
        break;
    case "aIndex":
        header('Location: ../view/index.php');
        break;

    default:
        header('Location: ../view/index.php');
}
