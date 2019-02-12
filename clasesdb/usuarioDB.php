<?php
require_once "conectarDB.php";

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
class usuarioDB extends conectarDB {

    protected static function conectar() {
        parent::conectar();
    }
    
    public static function registrar($nombre, $apellidos, $telefono, $usuario, $clave){
        self::conectar();
        $clave= md5($clave);
        $sql="INSERT INTO usuarios(login,clave,nombre,apellidos,telefono) VALUES('$usuario','$clave','$nombre','$apellidos','$telefono')";
        parent::$conexion->query($sql);
        $ok = parent::$conexion->errno;
        parent::$conexion->close();
        return $ok;
    }
    
     public static function acceder($usuario,$clave){
         $resultado=false;
         self::conectar();
         $clave= md5($clave);
         $sql="SELECT * FROM usuarios WHERE login='$usuario' AND clave='$clave'";
         $consulta= parent::$conexion->query($sql);
         //Contamos cuantas filas han salido si ha salido 0 es false y si sale 1 es true
         $valor=mysqli_num_rows($consulta);
         if ($valor===1){
             $resultado=true;
         }
         parent::$conexion->close();
         return $resultado;
    }
    
    public static function leerUsuarios() {
        $usuarios = [];
        self::conectar();
        $sql = "SELECT * FROM usuarios";
        $consulta = parent::$conexion->query($sql);

        $tupla = $consulta->fetch_array();
        while ($tupla != NULL) {
            $usuario = new Usuario($tupla["nombre"], $tupla["apellidos"], $tupla["login"], $tupla["clave"],$tupla["telefono"], $tupla["activo"]);
            array_push($usuarios, $usuario);
            $tupla = $consulta->fetch_array();
        }
        $consulta->free();
        parent::$conexion->close();
        return $usuarios;
    }

}
