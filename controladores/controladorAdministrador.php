<?php

session_start();
require_once '../clasesdb/administradorDB.php';
require_once '../clasesdb/usuarioDB.php';
require_once '../clasesdb/eventoDB.php';
require_once '../clasesdb/proyectoDB.php';
require_once '../clases/Administrador.php';

if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];
    $accion = strtoupper($accion);
    $accion = str_replace(" ", "", $accion);

    switch ($accion) {
        case "ACCEDER":
            $resultado = administradorDB::acceder($_REQUEST["usuario"], $_REQUEST["clave"]);
            if ($resultado) {
                $_SESSION["administrador"] = new Administrador($_REQUEST["usuario"], $_REQUEST["clave"]);
                $url = "Location:../menuAdministrador.php";
            } else {
                $url = "Location:../administrador.php?mensaje=Error%20Loggin";
            }
            break;

        case "CREAREVENTO":
            $ok = eventoDB::crearEvento($_REQUEST);
            if ($ok == 0) {
                echo "Evento creado correctamente";
            } else {
                echo $ok;
            }
            $url = "Location:../menuAdministrador.php";
            break;


        case "CREARPROYECTO":
            $url = "Location:../menuAdministrador.php";
            $ok = proyectoDB::insertarProyecto($_REQUEST);
            if ($ok == 0) {
                subirFicheros($_REQUEST["titulo"]);
            }
            break;
        case "ACTIVAR":
            $checkBoxes = $_REQUEST["activar"];
            var_dump($checkBoxes);
            foreach ($checkBoxes as $valor) {
                usuarioDB::activarUsuario($valor);
            }
            $url = "Location:../menuAdministrador.php";
            break;
        case "DESACTIVAR":
            $checkBoxes = $_REQUEST["activar"];
            foreach ($checkBoxes as $valor) {
                usuarioDB::desactivarUsuario($valor);
            }
            $url = "Location:../menuAdministrador.php";
            break;
        case "ESTABLECERPROYECTOS":
            $idEvento = $_REQUEST["idEvento"];
            $idProyectos = $_REQUEST["proyectos"];

            eventoDB::establecerProyectos($idEvento, $idProyectos);
            $url = "Location:../menuAdministrador.php";
            break;
    }
    header($url);
}

function subirFicheros($nombreproyecto) {
    //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
    foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
        //Validamos que el archivo exista
        if ($_FILES["archivo"]["name"][$key]) {
            $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

            $directorio = '../proyectos/' . $nombreproyecto . '/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
            }

            $dir = opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            move_uploaded_file($source, $target_path);
            closedir($dir); //Cerramos el directorio de destino
        }
    }
}
