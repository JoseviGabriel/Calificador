<?php

require_once 'conectarDB.php';

class administradorDB extends conectarDB {

    public static function conectar() {
        parent::conectar();
    }
    /*
    public static function registrar($usuario, $clave) {
        self::conectar();
        $clave = md5($clave);
        $sql = "INSERT INTO administradores(login,clave) VALUES('$usuario','$clave')";
        parent::$conexion->query($sql);
        $ok = parent::$conexion->errno;
        parent::$conexion->close();
        return $ok;
    }*/

    public static function acceder($usuario, $clave) {
        $resultado = false;
        self::conectar();
        $clave = md5($clave);
        $sql = "SELECT * FROM administradores WHERE login='$usuario' AND clave='$clave'";
        $consulta = parent::$conexion->query($sql);
        //Contamos cuantas filas han salido si ha salido 0 es false y si sale 1 es true
        $valor = mysqli_num_rows($consulta);
        if ($valor === 1) {
            $resultado = true;
        }
        parent::$conexion->close();
        return $resultado;
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
