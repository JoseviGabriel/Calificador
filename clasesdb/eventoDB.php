<?php
require_once 'conectarDB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of eventoDB
 *
 * @author josev
 */
class eventoDB extends conectarDB {
    
    protected static function conectar() {
        parent::conectar();
    }
    
    public static function crearEvento($rq){
        $titulo = $rq["titulo"];
        $descripcion = $rq["descripcion"];
        $fechaApertura = $rq["fecha_a"];
        $fechaCierre = $rq["fecha_c"];
        $arrayApartados = $rq["apartados"];
        $cUnica = $rq["cUnica"];
        $cAbierto = $rq["cAbierto"];
        $apartados = "";
        
        foreach($arrayApartados as $apartado){
            $apartados = $apartados.$apartado.":";
        }
        
        self::conectar();
        $sql = "INSERT INTO eventos(titulo, descripcion, fechaApertura, fechaCierre, apartados, calificacion, abierto) "
                . "VALUES('$titulo', '$descripcion', '$fechaApertura', '$fechaCierre', '$apartados', '$cUnica', '$cAbierto')";
        
        $consulta = parent::$conexion->query($sql);
        
        $ok = parent::$conexion->errno;
        parent::$conexion->close();
        return $ok;
    }
}
