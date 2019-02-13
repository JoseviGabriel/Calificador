<?php
session_start();
require_once "../clasesdb/usuarioDB.php";
require_once "../clasesdb/conectarDB.php";
require_once "../clases/Usuario.php";

if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];
    $accion = strtoupper($accion);
    $accion = str_replace(" ", "", $accion);

    switch ($accion) {
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
            header("Location: ../".$url);
            break;
        case "ACCEDER": $login = $_REQUEST["login"];
            $clave = $_REQUEST["clave"];
            $ok = usuarioDB::acceder($login, $clave);
            if($ok){
                $_SESSION["usuario"]=new Usuario($login, NULL, NULL, NULL, NULL, NULL);
                $url = "menuUsuarios.php";
            } else {
                $url = "usuarios.php";
            }
            header("Location: ../".$url);
            break;
    }
}