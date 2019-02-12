<?php
define("HOST", "p:localhost");
define("USUARIO", "root");
define("CONTRASENIA", "");
define("DB", "calificador");
//Clase para conectar con la BD
class conectarDB {
    protected static $conexion;

    protected static function conectar() {
        self::$conexion = new mysqli(HOST, USUARIO, CONTRASENIA, DB);
        if (self::$conexion->connect_errno != NULL) {
            die("Error, al conectar con la base de datos: " . self::$conexion->connect_error);
        }
    }
    
    
}
