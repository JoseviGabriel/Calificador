<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "clasesrender/RadioCheckBox.php";
require_once "clasesrender/Enlace.php";
require_once "clasesrender/Input.php";
require_once "clasesrender/Formulario.php";
require_once "clasesdb/usuarioDB.php";
require_once "clasesrender/UsuarioHTML.php";
// Creamos el Modelo

$usuarios = usuarioDB::leer("usuarios");

// Llamamos a la vista
//require_once "vistaAdministracionUsuarios.php";
//FICHERO VISTAADMINISTRACIONUSUARIOS.PHP
?>




<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Login</th>
                <th>Clave</th>
                <th>Activo</th>
                <th></th>                
                <th></th>
                <th></th>
            </tr>

<?php
$acciones = [];
$enlace1 = new Enlace("controlador.php", "Eliminar", "accion");
$formulario = new Formulario("controlador.php");
$input = new Input("submit", "Editar", "accion");
$formulario->addInput($input);
$input = new Input("submit", "Activar", "accion");
$formulario->addInput($input);
$input = new Input("hidden", NULL, "id");
$formulario->addInput($input);
$input = new RadioCheckBox("checkbox", "Bloqueado", "bloqueo[]", "Bloqueado");
$formulario->addInput($input);
$input = new RadioCheckBox("radio", "Hombre", "sexo", "Hombre");
$formulario->addInput($input);
$input = new RadioCheckBox("radio", "Mujer", "sexo", "Mujer");
$formulario->addInput($input);

array_push($acciones, $enlace1);
array_push($acciones, $formulario);
foreach ($usuarios as $indice => $usuario) {
    echo usuarioHTML::vistaTabular($usuario, $acciones, $indice);
}
?>
        </table>
    </body>
</html>