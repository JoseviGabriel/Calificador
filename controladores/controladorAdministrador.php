<?php

if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];
    $accion = strtoupper($accion);
    $accion = str_replace(" ", "", $accion);
    
    switch($accion){
        case "ACCEDER":
        
        break;
    }
}




?>
