<?php

include_once 'Profesor.php';
include_once 'Grado.php';
include_once 'Estudiante.php';
include_once 'Listauno.php';
include_once 'Listados.php';
include_once 'Voto.php';
include_once 'Resultado.php';
include_once 'Database.php';

class VotoModel {

    //MÉTODOS CRUD TABLA MAESTRO PROFESOR
    public function getProfesores() {
        $pdo = Database::connect();
        $sql = "select * from profesor order by nombreprofesor";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $profesor = new Profesor($res['cedulaprofesor'], $res['nombreprofesor']);
            array_push($listado, $profesor);
        }
        Database::disconnect();
        return $listado;
    }

    public function insertarProfesor($nombreprofesor) {
        $pdo = Database::connect();
        $sql = "insert into profesor (nombreprofesor) values (?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($nombreprofesor));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function getProfesor($cedulaprofesor) {
        $pdo = Database::connect();
        $sql = "select * from profesor where cedulaprofesor=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedulaprofesor));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $profesor = new Profesor($res['cedulaprofesor'], $res['nombreprofesor']);
        Database::disconnect();
        return $profesor;
    }

    public function actualizarProfesor($cedulaprofesor, $nombreprofesor) {
        $pdo = Database::connect();
        $sql = "update profesor set nombreprofesor=? where cedulaprofesor=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($nombreprofesor, $cedulaprofesor));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarProfesor($cedulaprofesor) {
        $pdo = Database::connect();
        $sql = "delete from profesor where cedulaprofesor=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedulaprofesor));
        } catch (Exception $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //MÉTODOS CRUD TABLA GRADO
    public function getGrados() {
        $pdo = Database::connect();
        $sql = "select * from grado order by idgrado";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $grado = new Grado($res['idgrado'], $res['cedulaprofesor'], $res['nivel'], $res['paralelo'], $res['nalumnos'], $res['bod']);
            array_push($listado, $grado);
        }
        Database::disconnect();
        return $listado;
    }

    public function insertarGrado($cedulaprofesor, $nivel, $paralelo, $nalumnos, $bod) {
        $pdo = Database::connect();
        $sql = "insert into grado (cedulaprofesor, nivel, paralelo, nalumnos, bod) values (?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedulaprofesor, $nivel, $paralelo, $nalumnos, $bod));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function getGrado($idgrado) {
        $pdo = Database::connect();
        $sql = "select * from grado where idgrado=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idgrado));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $grado = new Grado($res['idgrado'], $res['cedulaprofesor'], $res['nivel'], $res['paralelo'], $res['nalumnos'], $res['bod']);
        Database::disconnect();
        return $grado;
    }

    public function actualizarGrado($cedulaprofesor, $nivel, $paralelo, $nalumnos, $bod, $idgrado) {
        $pdo = Database::connect();
        $sql = "update grado set cedulaprofesor=?, nivel=?, paralelo=?, nalumnos=?, bod=? where idgrado=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedulaprofesor, $nivel, $paralelo, $nalumnos, $bod, $idgrado));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarGrado($idgrado) {
        $pdo = Database::connect();
        $sql = "delete from grado where idgrado=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($idgrado));
        } catch (Exception $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //MÉTODOS CRUD TABLA ESTUDIANTE
    public function getEstudiantes() {
        $pdo = Database::connect();
        $sql = "select * from estudiante order by idgrado";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $estudiante = new Estudiante($res['cedulaestudiante'], $res['idgrado'], $res['nomestudiante']);
            array_push($listado, $estudiante);
        }
        Database::disconnect();
        return $listado;
    }

    public function insertarEstudiante($cedulaestudiante, $idgrado, $nomestudiante) {
        $pdo = Database::connect();
        $sql = "insert into estudiante (cedulaestudiante, idgrado, nomestudiante) values (?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedulaestudiante, $idgrado, $nomestudiante));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function getEstudiante($cedulaestudiante) {
        $pdo = Database::connect();
        $sql = "select * from estudiante where cedulaestudiante=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedulaestudiante));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $estudiante = new Estudiante($res['cedulaestudiante'], $res['idgrado'], $res['nomestudiante']);
        Database::disconnect();
        return $estudiante;
    }

    public function actualizarEstudiante($idgrado, $nomestudiante, $cedulaestudiante) {
        $pdo = Database::connect();
        $sql = "update estudiante set idgrado=?, nomestudiante=? where cedulaestudiante=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($idgrado, $nomestudiante, $cedulaestudiante));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarEstudiante($cedulaestudiante) {
        $pdo = Database::connect();
        $sql = "delete from estudiante where cedulaestudiante=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedulaestudiante));
        } catch (Exception $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //MÉTODOS CRUD TABLA LISTAUNO
    public function getListaunos() {
        $pdo = Database::connect();
        $sql = "SELECT * FROM listauno";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $listauno = new Listauno($res['idlistau'], $res['nombrelistau'], $res['presidenteu'], $res['vicepresidenteu'], $res['secretariou'], $res['tesorerou'], $res['pvocalu'], $res['svocalu'], $res['tvocalu'], $res['cvocalu'], $res['qvocalu'], $res['sxvocalu'], $res['jcampu']);
            array_push($listado, $listauno);
        }
        Database::disconnect();
        return $listado;
    }

    public function insertarListauno($nombrelistau, $presidenteu, $vicepresidenteu, $secretariou, $tesorerou, $pvocalu, $svocalu, $tvocalu, $cvocalu, $qvocalu, $sxvocalu, $jcampu) {
        $pdo = Database::connect();
        $sql = "INSERT INTO listauno(nombrelistau, presidenteu, vicepresidenteu, secretariou, tesorerou, pvocalu, svocalu, tvocalu, cvocalu, qvocalu, sxvocalu, jcampu) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($nombrelistau, $presidenteu, $vicepresidenteu,
                $secretariou, $tesorerou, $pvocalu, $svocalu, $tvocalu,
                $cvocalu, $qvocalu, $sxvocalu, $jcampu));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function getListauno($idlistau) {
        $pdo = Database::connect();
        $sql = "SELECT * FROM listauno WHERE idlistau=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idlistau));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $listauno = new Listauno($res['idlistau'], $res['nombrelistau'], $res['presidenteu'], $res['vicepresidenteu'], $res['secretariou'], $res['tesorerou'], $res['pvocalu'], $res['svocalu'], $res['tvocalu'], $res['cvocalu'], $res['qvocalu'], $res['sxvocalu'], $res['jcampu']);
        Database::disconnect();
        return $listauno;
    }

    public function actualizarListauno($idlistau, $nombrelistau, $presidenteu, $vicepresidenteu, $secretariou, $tesorerou, $pvocalu, $svocalu, $tvocalu, $cvocalu, $qvocalu, $sxvocalu, $jcampu) {
        $pdo = Database::connect();
        $sql = "UPDATE listauno SET nombrelistau=?, presidenteu=?, vicepresidenteu=?, secretariou=?, tesorerou=?, pvocalu=?, svocalu=?, tvocalu=?, cvocalu=?, qvocalu=?, sxvocalu=?, jcampu=? WHERE idlistau=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($nombrelistau, $presidenteu, $vicepresidenteu,
                $secretariou, $tesorerou, $pvocalu, $svocalu, $tvocalu,
                $cvocalu, $qvocalu, $sxvocalu, $jcampu, $idlistau));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarListau($idlistau) {
        $pdo = Database::connect();
        $sql = "delete from listauno where idlistau=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($idlistau));
        } catch (Exception $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //MÉTODOS CRDD TABLA LISTADos
    public function getListadoss() {
        $pdo = Database::connect();
        $sql = "SELECT * FROM listados";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $listados = new Listados($res['idlistad'], $res['nombrelistad'], $res['presidented'], $res['vicepresidented'], $res['secretariod'], $res['tesorerod'], $res['pvocald'], $res['svocald'], $res['tvocald'], $res['cvocald'], $res['qvocald'], $res['sxvocald'], $res['jcampd']);
            array_push($listado, $listados);
        }
        Database::disconnect();
        return $listado;
    }

    public function insertarListados($nombrelistad, $presidented, $vicepresidented, $secretariod, $tesorerod, $pvocald, $svocald, $tvocald, $cvocald, $qvocald, $sxvocald, $jcampd) {
        $pdo = Database::connect();
        $sql = "INSERT INTO listados(nombrelistad, presidented, vicepresidented, secretariod, tesorerod, pvocald, svocald, tvocald, cvocald, qvocald, sxvocald, jcampd) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($nombrelistad, $presidented, $vicepresidented,
                $secretariod, $tesorerod, $pvocald, $svocald,
                $tvocald, $cvocald, $qvocald, $sxvocald, $jcampd));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarListad($idlistad) {
        $pdo = Database::connect();
        $sql = "delete from listados where idlistad=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($idlistad));
        } catch (Exception $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function getListados($idlistad) {
        $pdo = Database::connect();
        $sql = "SELECT * FROM listados WHERE idlistad=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idlistad));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $listados = new Listados($res['idlistad'], $res['nombrelistad'], $res['presidented'], $res['vicepresidented'], $res['secretariod'], $res['tesorerod'], $res['pvocald'], $res['svocald'], $res['tvocald'], $res['cvocald'], $res['qvocald'], $res['sxvocald'], $res['jcampd']);
        Database::disconnect();
        return $listados;
    }

    public function actualizarListados($idlistad, $nombrelistad, $presidented, $vicepresidented, $secretariod, $tesorerod, $pvocald, $svocald, $tvocald, $cvocald, $qvocald, $sxvocald, $jcampd) {
        $pdo = Database::connect();
        $sql = "UPDATE listados SET nombrelistad=?, presidented=?, vicepresidented=?, secretariod=?, tesorerod=?, pvocald=?, svocald=?, tvocald=?, cvocald=?, qvocald=?, sxvocald=?, jcampd=? WHERE idlistad=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($nombrelistad, $presidented, $vicepresidented,
                $secretariod, $tesorerod, $pvocald, $svocald, $tvocald,
                $cvocald, $qvocald, $sxvocald, $jcampd, $idlistad));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //METODOS TABLA VOTO
    public function insertarVoto($cedulaestudiante, $eleccion) {
        $pdo = Database::connect();
        $sql = "INSERT INTO voto(cedulaestudiante, eleccion) VALUES (?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedulaestudiante, $eleccion));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //METODOS REPORTES
    //REPORTE ESTUDIANTES POR GRADO
    public function getEstudiantesPorgrado($idgrado) {
        $pdo = Database::connect();
        $sql = "SELECT e.cedulaestudiante,e.idgrado, e.nomestudiante FROM estudiante e, grado g WHERE e.idgrado=g.idgrado AND e.idgrado=? order by nomestudiante";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idgrado));
        $listado = array();
        foreach ($consulta as $res) {
            $estudiante = new Estudiante($res['cedulaestudiante'], $res['idgrado'], $res['nomestudiante']);
            array_push($listado, $estudiante);
        }
        Database::disconnect();
        return $listado;
    }

    //REPORTE resultados lista uno
//    public function getReporteListaUno() {
//        $pdo = Database::connect();
//        $sql = "SELECT count(eleccion) FROM voto WHERE eleccion='Lista Uno'";
//        $consulta = $pdo->prepare($sql);
//        $consulta->execute();
//        $res = $consulta->fetch(PDO::FETCH_ASSOC);
//        $numero = $res['numero'];
//        Database::disconnect();
//        if (!isset($numero)) {
//            return 0;
//        }
//        return $numero;
//    }
    public function getResultadoU($eleccion) {
        $pdo = Database::connect();
        $sql = "SELECT 'Lista Uno' as opcione, count(eleccion) as cantidadv from voto where eleccion=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($eleccion));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $result = new Resultado($res['opcione'], $res['cantidadv']);
        Database::disconnect();
        return $result;
    }

    public function getResultadoD($eleccion) {
        $pdo = Database::connect();
        $sql = "SELECT 'Lista Dos' as opcione, count(eleccion) as cantidadv from voto where eleccion=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($eleccion));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $result = new Resultado($res['opcione'], $res['cantidadv']);
        Database::disconnect();
        return $result;
    }

    public function getResultadoB($eleccion) {
        $pdo = Database::connect();
        $sql = "SELECT 'Blancos' as opcione, count(eleccion) as cantidadv from voto where eleccion=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($eleccion));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $result = new Resultado($res['opcione'], $res['cantidadv']);
        Database::disconnect();
        return $result;
    }

    public function getResultadoN($eleccion) {
        $pdo = Database::connect();
        $sql = "SELECT 'Blancos' as opcione, count(eleccion) as cantidadv from voto where eleccion=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($eleccion));
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $result = new Resultado($res['opcione'], $res['cantidadv']);
        Database::disconnect();
        return $result;
    }

}
