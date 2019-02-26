<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proyectoDB
 *
 * @author Usuario
 */
class proyectoDB extends conectarDB {

    protected static function conectar() {
        parent::conectar();
    }

    public static function insertarProyecto($parametros) {
        $titulo = $parametros["titulo"];
        $descripcionbreve = $parametros["descripcionbreve"];
        $descripciondetallada = $parametros["descripcionDetallada"];


        $usuarios = $parametros["usuarios"];
        $limite = sizeof($usuarios);
        $cadenausuarios = "";
        foreach ($usuarios as $clave => $valor) {
            if ($clave == $limite - 1) {
                $cadenausuarios .= $valor;
            } else {
                $cadenausuarios .= $valor . ":";
            }
        }
        self::conectar();
        $sql = "INSERT INTO proyectos(titulo,descripcionBreve,descripcionDetallada,usuarios) VALUES('$titulo','$descripcionbreve','$descripciondetallada','$cadenausuarios')";

        parent::$conexion->query($sql);
        $idproyectoactual = self::obtenerIdUltimoProyecto();
        $usuarios = explode(":", $cadenausuarios);
        foreach ($usuarios as $usuario) {
            self::actualizarUsuariosProyecto($usuario, $idproyectoactual[0]);
        }
        $ok = parent::$conexion->errno;
        parent::$conexion->close();
        return $ok;
    }

    private static function obtenerIdUltimoProyecto() {
        $sql = "SELECT MAX(id) FROM proyectos";
        $consulta = parent::$conexion->query($sql);
        return $consulta->fetch_array();
    }

    private static function actualizarUsuariosProyecto($usuario, $id) {
        self::conectar();
        $sql = "UPDATE usuarios SET proyecto = '$id' WHERE login = '$usuario'";
        parent::$conexion->query($sql);
    }

    public static function obtenerNombrePorId($id) {
        self::conectar();
        $sql = "SELECT titulo FROM proyectos WHERE id = '$id'";
        $consulta = parent::$conexion->query($sql);
        return $consulta->fetch_array();
    }

    public static function obtenerProyectos() {
        $proyectos = [];
        self::conectar();
        $sql = "SELECT * FROM proyectos";
        $consulta = parent::$conexion->query($sql);
        $tupla = $consulta->fetch_array();
        while ($tupla != NULL) {
            $proyecto = new Proyecto($tupla["id"], $tupla["titulo"], $tupla["descripcionBreve"], $tupla["descripcionDetallada"], null, $tupla["evento"]);
            $proyecto->obtenerFicheros(getcwd() . "\\proyectos\\" . $tupla["titulo"]);

            array_push($proyectos, $proyecto);
            $tupla = $consulta->fetch_array();
        }
        return $proyectos;
    }

    public static function obtenerProyectosSinEvento() {
        $proyectos = [];
        self::conectar();
        $sql = "SELECT * FROM proyectos WHERE evento IS NULL";
        $consulta = parent::$conexion->query($sql);
        $tupla = $consulta->fetch_array();
        while ($tupla != NULL) {
            $proyecto = new Proyecto($tupla["id"], $tupla["titulo"], $tupla["descripcionBreve"], $tupla["descripcionDetallada"], null, $tupla["evento"]);
            $proyecto->obtenerFicheros(getcwd() . "\\proyectos\\" . $tupla["titulo"]);
            array_push($proyectos, $proyecto);
            $tupla = $consulta->fetch_array();
        }
        return $proyectos;
    }

    public static function obtenerProyectosPorEvento($idEvento) {
        $proyectos = [];
        self::conectar();
        $sql = "SELECT * FROM proyectos WHERE evento = '$idEvento'";
        $consulta = parent::$conexion->query($sql);
        $tupla = $consulta->fetch_array();
        while ($tupla != NULL) {
            $proyecto = new Proyecto($tupla["id"], $tupla["titulo"], $tupla["descripcionBreve"], $tupla["descripcionDetallada"], null, $tupla["evento"]);
            $proyecto->obtenerFicheros(getcwd() . "\\proyectos\\" . $tupla["titulo"]);

            array_push($proyectos, $proyecto);
            $tupla = $consulta->fetch_array();
        }
        return $proyectos;
    }

    public static function eliminarProyecto($idProyecto) {
        self::conectar();
        $sql = "SELECT titulo FROM proyectos WHERE id = '$idProyecto'";
        $consulta = parent::$conexion->query($sql);
        $tupla = $consulta->fetch_array();
        $titulo = $tupla[0];
        $directorio = "../proyectos/$titulo";
        self::eliminar($directorio);
        
        $sql = "UPDATE usuarios SET proyecto = NULL WHERE proyecto = '$idProyecto'";
        $consulta = parent::$conexion->query($sql);
        
        $sql = "DELETE FROM proyectos WHERE id = '$idProyecto'";
        $consulta = parent::$conexion->query($sql);
    }
    
    public static function actualizarProyecto($idProyecto, $descripcionBreve, $descripcionDetallada, $usuarios){
        self::conectar();
        
        $limite = sizeof($usuarios);
        $cadenausuarios = "";
        foreach ($usuarios as $clave => $valor) {
            if ($clave == $limite - 1) {
                $cadenausuarios .= $valor;
            } else {
                $cadenausuarios .= $valor . ":";
            }
        }
        
        $sql = "UPDATE proyectos SET descripcionBreve = '$descripcionBreve', descripcionDetallada = '$descripcionDetallada', usuarios = '$cadenausuarios' WHERE id = '$idProyecto'";
        $consulta = parent::$conexion->query($sql);
        
        $tupla = self::obtenerNombrePorId($idProyecto);
        $titulo = $tupla[0];
        $directorio = "../proyectos/$titulo";
        foreach(glob($directorio."/*") as $archivos){
            unlink($archivos);
        }
        
        return $titulo;
    }
    
    private static function eliminar($valor) {
        if (is_dir($valor)) {
            foreach (glob($valor . "/*") as $archivos_carpeta) {
                if (is_dir($archivos_carpeta)) {
                    eliminar($archivos_carpeta);
                } else {
                    unlink($archivos_carpeta);
                }
            }
            rmdir($valor);
        } else {
            unlink($valor);
        }
    }

    
    public static function obtenerUsuariosProyecto($id){
        self::conectar();
        $sql = "SELECT usuarios FROM proyectos WHERE id='$id'";
        $consulta = parent::$conexion->query($sql);
        $usuarios = $consulta->fetch_array();
        $usuarios = explode(":", $usuarios["usuarios"]);
        return $usuarios;
        
    }
    
    
    public static function insertarCalificacionUsuarioProyecto($login,$id,$calificacion){
        
        self::conectar();
        $resultado=self::consultarUsuarioCalificacion($id, $login);
        if (!$resultado){
            $sql = "INSERT INTO calificaciones(loginUsuario,idProyecto,notaProyecto) VALUES('$login','$id','$calificacion')";
            parent::$conexion->query($sql);
            
        }else{
            self::actualizarNotaProyecto($calificacion, $login, $id);
        }
        $ok = parent::$conexion->errno;
        parent::$conexion->close();
        return $ok;
    }
    
    
    public static function obtenerMediaProyecto($id){
        $suma=0;
        $resultado;
        self::conectar();
        $sql = "SELECT * FROM calificaciones WHERE idProyecto='$id'";
        $consulta = parent::$conexion->query($sql);
        //Contamos cuantas filas han salido si ha salido 0 es false y si sale 1 es true
        $numerocalificaciones = mysqli_num_rows($consulta);
        if ($numerocalificaciones != 0){
            $tupla = $consulta->fetch_array();
            while ($tupla != NULL) {
                $suma+=intval($tupla["notaProyecto"]);
                $tupla = $consulta->fetch_array();
            }
            $resultado=$suma/$numerocalificaciones;
        }else{
            $resultado = "Ninguna calificacion";
        }
        parent::$conexion->close();
        return $resultado;
        
    }
    
    private static function consultarUsuarioCalificacion($id,$usuario){
        $resultado = false;
        $sql = "SELECT * FROM calificaciones WHERE idProyecto='$id' AND loginUsuario='$usuario'";
        $consulta = parent::$conexion->query($sql);
        //Contamos cuantas filas
        $valor = mysqli_num_rows($consulta);
         if ($valor == 1) {
            $resultado = true;
        }
        return $resultado;
    }
    
     private static function actualizarNotaProyecto($calificacion,$usuario, $id) {
        $sql = "UPDATE calificaciones SET notaProyecto = '$calificacion' WHERE loginUsuario = '$usuario' AND idProyecto = '$id'";
        parent::$conexion->query($sql);
    }
     

}
