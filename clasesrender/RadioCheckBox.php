<?php
require_once "Input.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RadioCheckBox
 *
 * @author josev
 */
class RadioCheckBox extends Input {
    
    private $etiqueta;
    
    public function RadioCheckBox($type, $name, $value, $etiqueta) {
        parent::Input($type, $name, $value);
        $this->etiqueta=$etiqueta;        
    }
    
    public function dibujar($i) {
        
        return parent::dibujar($i)."<label>$this->etiqueta</label>";                
    }        
}
