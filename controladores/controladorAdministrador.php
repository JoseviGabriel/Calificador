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
            header($url);
        break;
        
        case "CREAREVENTO":
            
        break;
    
    
    }
}

function subirFicheros($nombreproyecto){
    //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../proyectos'.$nombreproyecto.'/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
                        move_uploaded_file($source, $target_path);
			closedir($dir); //Cerramos el directorio de destino
		}
	}
    
    
}