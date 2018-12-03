<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author josev
 */
class Usuario {
    private $nombre;
    private $apellidos;
    private $telefono;
    private $login;
    private $clave;
    private $activo;
    private $proyecto;
    
    function __construct($nombre, $apellidos, $telefono, $login, $clave, $activo) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->login = $login;
        $this->clave = $clave;
        $this->activo = $activo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getLogin() {
        return $this->login;
    }

    function getClave() {
        return $this->clave;
    }

    function getActivo() {
        return $this->activo;
    }
    
    function getProyecto() {
        return $this->proyecto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setProyecto($proyecto) {
        $this->proyecto = $proyecto;
    }
}
