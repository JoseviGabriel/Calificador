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

    public static function crearEvento($rq) {
        $titulo = $rq["titulo"];
        $descripcion = $rq["descripcion"];
        $fechaApertura = $rq["fecha_a"];
        $fechaCierre = $rq["fecha_c"];
        $arrayApartados = $rq["apartados"];
        $cUnica = $rq["cUnica"];
        $cAbierto = $rq["cAbierto"];
        $cadena = "";
        $limite = sizeof($arrayApartados);
        foreach ($arrayApartados as $clave => $valor) {
            if ($clave == $limite - 1) {
                $cadena .= $valor;
            } else {
                $cadena .= $valor . ":";
            }
        }

        self::conectar();
        $sql = "INSERT INTO eventos(titulo, descripcion, fechaApertura, fechaCierre, apartados, calificacion, abierto) "
                . "VALUES('$titulo', '$descripcion', '$fechaApertura', '$fechaCierre', '$cadena', '$cUnica', '$cAbierto')";

        $consulta = parent::$conexion->query($sql);

        $ok = parent::$conexion->errno;
        parent::$conexion->close();
        return $ok;
    }
    
    
    public static function obtenerEventos(){
        $eventos = [];
        self::conectar();
        $sql = "SELECT * FROM eventos";
        $consulta = parent::$conexion->query($sql);
        //Contamos cuantas filas han salido si ha salido 0 es false y si sale 1 es true
        $tupla = $consulta->fetch_array();
        while ($tupla != NULL) {
            $evento = new Evento($tupla["id"],$tupla["titulo"],$tupla["descripcion"], $tupla["fechaApertura"], $tupla["fechaCierre"], $tupla["apartados"], $tupla["calificacion"], $tupla["abierto"]);
            $evento->addProyecto($tupla["proyectos"]);
            array_push($eventos, $evento);
            $tupla = $consulta->fetch_array();
        }
        parent::$conexion->close();
        return $eventos;
    }

}
