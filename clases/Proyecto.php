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
    private $id;
    private $titulo;
    private $descripcionbreve;
    private $descripciondetallada;
    private $documentos=[];
    private $calificaciones=[];
    private $evento;
    
    function __construct($id,$titulo, $descripcionbreve, $descripciondetallada, $documentos, $evento) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcionbreve = $descripcionbreve;
        $this->descripciondetallada = $descripciondetallada;
        $this->documentos = $documentos;
        $this->evento = $evento;
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
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

   public function setDocumentos($documento) {
        array_push($this->documentos, $documento);
        
    }

    function setEvento($evento) {
        $this->evento = $evento;
    }

    function getCalificaciones() {
        return $this->calificaciones;
    }

    function setCalificaciones($calificaciones) {
        $this->calificaciones = $calificaciones;
    }
    
    function addCalificacion($calificacion){
        array_push($calificaciones, $calificacion);
    }
    
    function obtenerFicheros($ruta){
        $directorio = opendir($ruta);
        while ($archivo = readdir($directorio)){
            if ($archivo == "." || $archivo == ".." ){
                
            }else{
                $this->documentos[]= $archivo;
            }
        }
    }
}
