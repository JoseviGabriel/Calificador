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
class proyectoDB extends conectarDB{
    protected static function conectar() {
        parent::conectar();
    }
    
    
    
    public static function insertarProyecto($parametros){
        $titulo=$parametros["titulo"];
        $descripcionbreve=$parametros["descripcionbreve"];
        $descripciondetallada=$parametros["descripcionDetallada"];

        
        $usuarios=$parametros["usuarios"];
        $limite= sizeof($usuarios);
        $cadenausuarios="";
            foreach ($usuarios as $clave => $valor){
                if ($clave==$limite-1){
                    $cadenausuarios.=$valor;
                }else{
                    $cadenausuarios.=$valor.":";
                }
            }
        self::conectar();
        $sql="INSERT INTO proyectos(titulo,descripcionBreve,descripcionDetallada,usuarios) VALUES('$titulo','$descripcionbreve','$descripciondetallada','$cadenausuarios')";
        $idproyectoactual=self::obtenerIdUltimoProyecto();
        $usuarios = explode(":", $cadenausuarios);
        foreach ($usuarios as $usuario){
            self::actualizarUsuariosProyecto($usuario, $idproyectoactual[0]+1);
        }
        parent::$conexion->query($sql);
        $ok = parent::$conexion->errno;
        parent::$conexion->close();
        return $ok;
        
    }
    
    private static function obtenerIdUltimoProyecto(){
        $sql="SELECT MAX(id) FROM proyectos";
        $consulta=parent::$conexion->query($sql);
        return $consulta->fetch_array();
    }
    
    private static function actualizarUsuariosProyecto($usuario,$id){
        self::conectar();
        $sql = "UPDATE usuarios SET proyecto = '$id' WHERE login = '$usuario'";
        parent::$conexion->query($sql);
    }
}
