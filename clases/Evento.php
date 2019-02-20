<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Evento
 *
 * @author josev
 */
class Evento {
    private $titulo;
    private $descripcion;
    private $fecha_apertura;
    private $fecha_cierre;
    private $apartados = [];
    private $calificacion;
    private $abierto;
    private $proyectos = [];
    
    
    function __construct($titulo, $descripcion, $fecha_apertura, $fecha_cierre, $apartados, $calificacion, $abierto){
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha_apertura = $fecha_apertura;
        $this->fecha_cierre = $fecha_cierre;
        $this->apartados = $apartados;
        $this->calificacion = $calificacion;
        $this->abierto = $abierto;
    }
    
    function getProyectos() {
        return $this->proyectos;
    }

    function addProyecto($proyecto) {
        array_push($this->proyectos, $proyecto);
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha_apertura() {
        return $this->fecha_apertura;
    }

    function getFecha_cierre() {
        return $this->fecha_cierre;
    }

    function getApartados() {
        return $this->apartados;
    }

    function getCalificacion() {
        return $this->calificacion;
    }

    function getAbierto() {
        return $this->abierto;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha_apertura($fecha_apertura) {
        $this->fecha_apertura = $fecha_apertura;
    }

    function setFecha_cierre($fecha_cierre) {
        $this->fecha_cierre = $fecha_cierre;
    }

    function setApartados($apartados) {
        $this->apartados = $apartados;
    }

    function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }

    function setAbierto($abierto) {
        $this->abierto = $abierto;
    }
}
