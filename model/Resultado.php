<?php

class Resultado {

    private $opcione;
    private $cantidadv;

    function __construct($opcione, $cantidadv) {
        $this->opcione = $opcione;
        $this->cantidadv = $cantidadv;
    }

    function getOpcione() {
        return $this->opcione;
    }

    function getCantidadv() {
        return $this->cantidadv;
    }

    function setOpcione($opcione) {
        $this->opcione = $opcione;
    }

    function setCantidadv($cantidadv) {
        $this->cantidadv = $cantidadv;
    }

}
