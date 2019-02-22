<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: usuarios.php");
}
require_once 'clases/Usuario.php';
require_once 'clasesdb/usuarioDB.php';
require_once 'clasesdb/proyectoDB.php';
require_once 'clases/Evento.php';
require_once 'clasesrender/Accion.php';
require_once 'clasesrender/Enlace.php';
require_once 'clasesrender/Formulario.php';
require_once 'clasesrender/Input.php';
require_once 'clasesrender/RadioCheckBox.php';
require_once 'clasesrender/UsuarioHTML.php';
require_once 'clasesdb/EventoDB.php';

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
        <?php
            require_once 'verEventosUsuarios.php';
        ?>
        </table>
    </body>
</html>
