<?php
require_once 'clases/Usuario.php';
require_once 'clases/Proyecto.php';
require_once 'clasesdb/usuarioDB.php';
require_once 'clasesdb/proyectoDB.php';
require_once 'clases/Evento.php';
require_once 'clasesrender/Accion.php';
require_once 'clasesrender/Enlace.php';
require_once 'clasesrender/Formulario.php';
require_once 'clasesrender/Input.php';
require_once 'clasesrender/RadioCheckBox.php';
require_once 'clasesrender/UsuarioHTML.php';
require_once 'clasesdb/eventoDB.php';

$idEvento = $_REQUEST["idEvento"];
$proyectos = proyectoDB::obtenerProyectosPorEvento($idEvento);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <caption>Eventos</caption>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Descripcion Breve</th>
                <th>Descripcion Detallada</th>
            </tr>
            <?php
            foreach ($proyectos as $proyecto) {
                $acciones = [];
                echo UsuarioHTML::vistaProyecto($proyecto, $acciones, $proyecto->getId());
            }
            ?>
        </table>
    </body>
</html>
