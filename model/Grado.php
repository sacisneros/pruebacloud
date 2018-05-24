<?php

class Grado {
    private $idgrado;
    private $cedulaprofesor;
    private $nivel;
    private $paralelo;
    private $nalumnos;
    private $bod;
    
    function __construct($idgrado, $cedulaprofesor, $nivel, $paralelo, $nalumnos, $bod) {
        $this->idgrado = $idgrado;
        $this->cedulaprofesor = $cedulaprofesor;
        $this->nivel = $nivel;
        $this->paralelo = $paralelo;
        $this->nalumnos = $nalumnos;
        $this->bod = $bod;
    }

    function getIdgrado() {
        return $this->idgrado;
    }

    function getCedulaprofesor() {
        return $this->cedulaprofesor;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getParalelo() {
        return $this->paralelo;
    }

    function getNalumnos() {
        return $this->nalumnos;
    }

    function getBod() {
        return $this->bod;
    }

    function setIdgrado($idgrado) {
        $this->idgrado = $idgrado;
    }

    function setCedulaprofesor($cedulaprofesor) {
        $this->cedulaprofesor = $cedulaprofesor;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setParalelo($paralelo) {
        $this->paralelo = $paralelo;
    }

    function setNalumnos($nalumnos) {
        $this->nalumnos = $nalumnos;
    }

    function setBod($bod) {
        $this->bod = $bod;
    }


}
