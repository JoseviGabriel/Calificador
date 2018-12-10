<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Input
 *
 * @author josev
 */
class Input {

    private $type;
    private $value;
    private $name;

    public function Input($type, $value, $name) {

        $this->type = $type;
        $this->value = $value;
        $this->name = $name;
    }

    function getType() {
        return $this->type;
    }

    function getValue() {
        return $this->value;
    }

    function getName() {
        return $this->name;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setValue($value) {
        $this->value = $value;
    }

    function setName($name) {
        $this->name = $name;
    }

    public function dibujar($i) {

        if ($this->type == "hidden") {
            $valor = $i;
        } else {
            $valor = $this->value;
        }
        return "<input type='$this->type' "
                . "value='$valor' "
                . "name='$this->name'/>";
    }

}
