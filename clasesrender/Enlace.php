<?php
require_once "Accion.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Enlace
 *
 * @author josev
 */
class Enlace extends Accion {

    private $rotulo;
    private $name;

    public function Enlace($url, $rotulo, $name) {
        Accion::__construct($url);
        $this->rotulo = $rotulo;
        $this->name = $name;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getRotulo() {
        return $this->rotulo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setRotulo($rotulo) {
        $this->rotulo = $rotulo;
    }

    public function dibujar($indice) {

        $url = $this->url;
        $html = "<a href='$url?id=$indice&$this->name=$this->rotulo'>$this->rotulo</a>";
        return $html;
    }
}
