<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proyecto
 *
 * 
 */
class Proyecto {
    private $titulo;
    private $descripcionbreve;
    private $descripciondetallada;
    private $documentos=[];
    private $evento;
    
    function __construct($titulo, $descripcionbreve, $descripciondetallada, $documentos, $evento) {
        $this->titulo = $titulo;
        $this->descripcionbreve = $descripcionbreve;
        $this->descripciondetallada = $descripciondetallada;
        $this->documentos = $documentos;
        $this->evento = $evento;
    }
    
    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcionbreve() {
        return $this->descripcionbreve;
    }

    function getDescripciondetallada() {
        return $this->descripciondetallada;
    }

    function getDocumentos() {
        return $this->documentos;
    }

    function getEvento() {
        return $this->evento;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcionbreve($descripcionbreve) {
        $this->descripcionbreve = $descripcionbreve;
    }

    function setDescripciondetallada($descripciondetallada) {
        $this->descripciondetallada = $descripciondetallada;
    }

    function setDocumentos($documentos) {
        $this->documentos = $documentos;
    }

    function setEvento($evento) {
        $this->evento = $evento;
    }



}
