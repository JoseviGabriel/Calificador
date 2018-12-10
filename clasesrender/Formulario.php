<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formulario
 *
 * @author josev
 */
class Formulario extends Accion {

    private $inputs = [];

    public function Formulario($url) {
        parent::Accion($url);
    }

    public function addInput($input) {
        array_push($this->inputs, $input);
    }

    public function getInputs() {
        return $this->inputs;
    }

    public function dibujar($indice) {

        $form = "<form action='$this->url' method='POST'>";
        $inputs = $this->getInputs();
        foreach ($inputs as $input) {
            $form = $form . $input->dibujar($indice);
        }
        $form = $form . "</form>";
        return $form;
    }

}
