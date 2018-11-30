<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author josev
 */
class Administrador {
    private $login;
    private $clave;
    
    function __construct($login, $clave) {
        $this->login = $login;
        $this->clave = $clave;
    }
    
    function getLogin() {
        return $this->login;
    }

    function getClave() {
        return $this->clave;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }
}
