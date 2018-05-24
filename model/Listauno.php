<?php

class Listauno {
    private $idlistau;
    private $nombrelistau;
    private $presidenteu;
    private $vicepresidenteu;
    private $secretariou;
    private $tesorerou;
    private $pvocalu;
    private $svocalu;
    private $tvocalu;
    private $cvocalu;
    private $qvocalu;
    private $sxvocalu;
    private $jcampu;
    
    function __construct($idlistau, $nombrelistau, $presidenteu, $vicepresidenteu, $secretariou, $tesorerou, $pvocalu, $svocalu, $tvocalu, $cvocalu, $qvocalu, $sxvocalu, $jcampu) {
        $this->idlistau = $idlistau;
        $this->nombrelistau = $nombrelistau;
        $this->presidenteu = $presidenteu;
        $this->vicepresidenteu = $vicepresidenteu;
        $this->secretariou = $secretariou;
        $this->tesorerou = $tesorerou;
        $this->pvocalu = $pvocalu;
        $this->svocalu = $svocalu;
        $this->tvocalu = $tvocalu;
        $this->cvocalu = $cvocalu;
        $this->qvocalu = $qvocalu;
        $this->sxvocalu = $sxvocalu;
        $this->jcampu = $jcampu;
    }
    function getIdlistau() {
        return $this->idlistau;
    }

    function getNombrelistau() {
        return $this->nombrelistau;
    }

    function getPresidenteu() {
        return $this->presidenteu;
    }

    function getVicepresidenteu() {
        return $this->vicepresidenteu;
    }

    function getSecretariou() {
        return $this->secretariou;
    }

    function getTesorerou() {
        return $this->tesorerou;
    }

    function getPvocalu() {
        return $this->pvocalu;
    }

    function getSvocalu() {
        return $this->svocalu;
    }

    function getTvocalu() {
        return $this->tvocalu;
    }

    function getCvocalu() {
        return $this->cvocalu;
    }

    function getQvocalu() {
        return $this->qvocalu;
    }

    function getSxvocalu() {
        return $this->sxvocalu;
    }

    function getJcampu() {
        return $this->jcampu;
    }

    function setIdlistau($idlistau) {
        $this->idlistau = $idlistau;
    }

    function setNombrelistau($nombrelistau) {
        $this->nombrelistau = $nombrelistau;
    }

    function setPresidenteu($presidenteu) {
        $this->presidenteu = $presidenteu;
    }

    function setVicepresidenteu($vicepresidenteu) {
        $this->vicepresidenteu = $vicepresidenteu;
    }

    function setSecretariou($secretariou) {
        $this->secretariou = $secretariou;
    }

    function setTesorerou($tesorerou) {
        $this->tesorerou = $tesorerou;
    }

    function setPvocalu($pvocalu) {
        $this->pvocalu = $pvocalu;
    }

    function setSvocalu($svocalu) {
        $this->svocalu = $svocalu;
    }

    function setTvocalu($tvocalu) {
        $this->tvocalu = $tvocalu;
    }

    function setCvocalu($cvocalu) {
        $this->cvocalu = $cvocalu;
    }

    function setQvocalu($qvocalu) {
        $this->qvocalu = $qvocalu;
    }

    function setSxvocalu($sxvocalu) {
        $this->sxvocalu = $sxvocalu;
    }

    function setJcampu($jcampu) {
        $this->jcampu = $jcampu;
    }


}
