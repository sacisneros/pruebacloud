<?php

class Listados {

    private $idlistad;
    private $nombrelistad;
    private $presidented;
    private $vicepresidented;
    private $secretariod;
    private $tesorerod;
    private $pvocald;
    private $svocald;
    private $tvocald;
    private $cvocald;
    private $qvocald;
    private $sxvocald;
    private $jcampd;

    function __construct($idlistad, $nombrelistad, $presidented, $vicepresidented, $secretariod, $tesorerod, $pvocald, $svocald, $tvocald, $cvocald, $qvocald, $sxvocald, $jcampd) {
        $this->idlistad = $idlistad;
        $this->nombrelistad = $nombrelistad;
        $this->presidented = $presidented;
        $this->vicepresidented = $vicepresidented;
        $this->secretariod = $secretariod;
        $this->tesorerod = $tesorerod;
        $this->pvocald = $pvocald;
        $this->svocald = $svocald;
        $this->tvocald = $tvocald;
        $this->cvocald = $cvocald;
        $this->qvocald = $qvocald;
        $this->sxvocald = $sxvocald;
        $this->jcampd = $jcampd;
    }

    function getIdlistad() {
        return $this->idlistad;
    }

    function getNombrelistad() {
        return $this->nombrelistad;
    }

    function getPresidented() {
        return $this->presidented;
    }

    function getVicepresidented() {
        return $this->vicepresidented;
    }

    function getSecretariod() {
        return $this->secretariod;
    }

    function getTesorerod() {
        return $this->tesorerod;
    }

    function getPvocald() {
        return $this->pvocald;
    }

    function getSvocald() {
        return $this->svocald;
    }

    function getTvocald() {
        return $this->tvocald;
    }

    function getCvocald() {
        return $this->cvocald;
    }

    function getQvocald() {
        return $this->qvocald;
    }

    function getSxvocald() {
        return $this->sxvocald;
    }

    function getJcampd() {
        return $this->jcampd;
    }

    function setIdlistad($idlistad) {
        $this->idlistad = $idlistad;
    }

    function setNombrelistad($nombrelistad) {
        $this->nombrelistad = $nombrelistad;
    }

    function setPresidented($presidented) {
        $this->presidented = $presidented;
    }

    function setVicepresidented($vicepresidented) {
        $this->vicepresidented = $vicepresidented;
    }

    function setSecretariod($secretariod) {
        $this->secretariod = $secretariod;
    }

    function setTesorerod($tesorerod) {
        $this->tesorerod = $tesorerod;
    }

    function setPvocald($pvocald) {
        $this->pvocald = $pvocald;
    }

    function setSvocald($svocald) {
        $this->svocald = $svocald;
    }

    function setTvocald($tvocald) {
        $this->tvocald = $tvocald;
    }

    function setCvocald($cvocald) {
        $this->cvocald = $cvocald;
    }

    function setQvocald($qvocald) {
        $this->qvocald = $qvocald;
    }

    function setSxvocald($sxvocald) {
        $this->sxvocald = $sxvocald;
    }

    function setJcampd($jcampd) {
        $this->jcampd = $jcampd;
    }

}
