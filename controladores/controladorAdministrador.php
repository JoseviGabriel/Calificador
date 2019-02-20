<?php
session_start();
require_once '../clasesdb/administradorDB.php';
require_once '../clases/Administrador.php';

if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];
    $accion = strtoupper($accion);
    $accion = str_replace(" ", "", $accion);
    
    switch($accion){
        case "ACCEDER":
            $resultado=administradorDB::acceder($_REQUEST["usuario"], $_REQUEST["clave"]);
            if ($resultado){
                $_SESSION["administrador"]=new Administrador($_REQUEST["usuario"],$_REQUEST["clave"]);
                $url="Location:../menuAdministrador.php";
            }else{
                $url="Location:../administrador.php?mensaje=Error%20Loggin";
            }
        break;
        
        case "CREAREVENTO":
            $ok = administradorDB::crearEvento($_REQUEST);
            if($ok == 0){
                echo "Evento creado correctamente";
            } else {
                echo $ok;
            }
            $url = "Location:../menuAdministrador.php";
        break;
    }
    header($url);
}
