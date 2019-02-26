<?php
require_once "../clasesdb/usuarioDB.php";
require_once "../clasesdb/conectarDB.php";
require_once "../clasesdb/proyectoDB.php";
require_once "../clases/Usuario.php";
session_start();
if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];
    $accion = strtoupper($accion);
    $accion = str_replace(" ", "", $accion);

    switch ($accion) {
        case "REGISTRO": $url = "registro.php";
            break;
        case "REGISTRAR": $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];
            $telefono = $_REQUEST["telefono"];
            $usuario = $_REQUEST["login"];
            $clave = $_REQUEST["clave"];
            $error = usuarioDB::registrar($nombre, $apellidos, $telefono, $usuario, $clave);
            if ($error != 0) {
                $mensaje = "No se ha podido registrar correctamente";
                $url = "registro.php?mensaje=".$mensaje;
            } else {
                $mensaje = "Usuario registrado, esperando activación del administrador";
                $url = "registro.php?mensaje=".$mensaje;
            }
            
            break;
        case "ACCEDER": $login = $_REQUEST["login"];
            $clave = $_REQUEST["clave"];
            $ok = usuarioDB::acceder($login, $clave);
            if($ok){
                $_SESSION["usuario"]=new Usuario($login, NULL, NULL, NULL, NULL, NULL, NULL);
                $url = "menuUsuarios.php";
            } else {
                $url = "usuarios.php";
            }
            break;
        case "VERPROYECTOS": $idEvento = $_REQUEST["idEvento"];
            $url = "verProyectosUsuarios.php?idEvento=".$idEvento;
            break;
        
        case "CALIFICAR":
            $calificacion=$_REQUEST["notacalificacion"];
            $login=$_SESSION["usuario"]->getLogin();
            $id=$_REQUEST["idProyecto"];
            proyectoDB::insertarCalificacionUsuarioProyecto($login, $id, $calificacion);
            $url = "menuUsuarios.php";
        break;
    }
     header("Location: ../".$url);
}