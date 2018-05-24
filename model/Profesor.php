<?php

class Profesor {

    private $cedulaprofesor;
    private $nombreprofesor;
    
    function __construct($cedulaprofesor, $nombreprofesor) {
        $this->cedulaprofesor = $cedulaprofesor;
        $this->nombreprofesor = $nombreprofesor;
    }

    function getCedulaprofesor() {
        return $this->cedulaprofesor;
    }

    function getNombreprofesor() {
        return $this->nombreprofesor;
    }

    function setCedulaprofesor($cedulaprofesor) {
        $this->cedulaprofesor = $cedulaprofesor;
    }

    function setNombreprofesor($nombreprofesor) {
        $this->nombreprofesor = $nombreprofesor;
    }


}
