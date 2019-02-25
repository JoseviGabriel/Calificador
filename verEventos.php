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
?>
<caption>Eventos</caption>
<tr>
    <th>Id</th>
    <th>Titulo</th>
    <th>Descripcion</th>
    <th>Fecha Apertura</th>
    <th>Fecha Cierre</th>
    <th>Apartados</th>
    <th>Calificacion</th>
    <th>Abierto</th>
    <th>Proyectos</th>
    <th colspan="3">Acciones</th>
</tr>
<?php

$eventos = eventoDB::obtenerEventos();
$proyectos = proyectoDB::obtenerProyectosSinEvento();
//var_dump($alumnos);
//$enlace1=new Enlace("controlador.php","Eliminar","accion");

foreach ($eventos as $evento) {
    $acciones = [];
    $form = new Formulario("controladores/controladorAdministrador.php");
    $submit = new Input("submit", "Establecer Proyectos", "accion");
    $hidden = new Input("hidden", $evento->getId(), "idEvento");
    
    $form->addInput($submit);
    $form->addInput($hidden);
    array_push($acciones, $form);

    echo usuarioHTML::vistaEvento($evento, $acciones, $evento->getId(), $proyectos);
}
?>