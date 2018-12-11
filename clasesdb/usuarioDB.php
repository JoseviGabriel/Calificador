<?php

define("HOST", "p:localhost");
define("USUARIO", "root");
define("CONTRASENIA", "");
define("DB", "calificador");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioDB
 *
 * @author Usuario
 */
class usuarioDB {
    private static $conexion;
    private static $consIdentificacion;
    
    private static function conectar() {
        self::$conexion = new mysqli(HOST, USUARIO, CONTRASENIA, DB);
        if (self::$conexion->connect_errno != NULL) {
            die("Error, al conectar con la base de datos: " . self::$conexion->connect_error);
        }
    }
    
    public static function leer($tabla) {
        $usuarios = [];
        self::conectar();
        $sql = "SELECT * FROM $tabla";
        $consulta = self::$conexion->query($sql);

        $tupla = $consulta->fetch_array();
        while ($tupla != NULL) {
            $usuario = new Usuario($tupla["nombre"], $tupla["apellidos"], $tupla["login"], $tupla["clave"], $tupla["activo"]);
            array_push($usuarios, $usuario);
            $tupla = $consulta->fetch_array();
        }
        $consulta->free();
        self::$conexion->close();
        return $usuarios;
    }
}
