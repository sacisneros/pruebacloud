<?php

class Estudiante {
    private $cedulaestudiante;
    private $idgrado;
    private $nomestudiante;
    
    function __construct($cedulaestudiante, $idgrado, $nomestudiante) {
        $this->cedulaestudiante = $cedulaestudiante;
        $this->idgrado = $idgrado;
        $this->nomestudiante = $nomestudiante;
    }

    function getCedulaestudiante() {
        return $this->cedulaestudiante;
    }

    function getIdgrado() {
        return $this->idgrado;
    }

    function getNomestudiante() {
        return $this->nomestudiante;
    }

    function setCedulaestudiante($cedulaestudiante) {
        $this->cedulaestudiante = $cedulaestudiante;
    }

    function setIdgrado($idgrado) {
        $this->idgrado = $idgrado;
    }

    function setNomestudiante($nomestudiante) {
        $this->nomestudiante = $nomestudiante;
    }


}
