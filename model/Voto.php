<?php

class Voto {

    private $idvoto;
    private $cedulaestudiante;
    private $eleccion;

    function __construct($idvoto, $cedulaestudiante, $eleccion) {
        $this->idvoto = $idvoto;
        $this->cedulaestudiante = $cedulaestudiante;
        $this->eleccion = $eleccion;
    }

    function getIdvoto() {
        return $this->idvoto;
    }

    function getCedulaestudiante() {
        return $this->cedulaestudiante;
    }

    function getEleccion() {
        return $this->eleccion;
    }

    function setIdvoto($idvoto) {
        $this->idvoto = $idvoto;
    }

    function setCedulaestudiante($cedulaestudiante) {
        $this->cedulaestudiante = $cedulaestudiante;
    }

    function setEleccion($eleccion) {
        $this->eleccion = $eleccion;
    }

}
