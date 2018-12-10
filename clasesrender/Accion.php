<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accion
 *
 * @author josev
 */
abstract class Accion {

    protected $url;

    public function Accion($url) {
        $this->url = $url;
    }

    public abstract function dibujar($i);
}
