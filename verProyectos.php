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

$proyectos = proyectoDB::obtenerProyectos();
?>
<caption>Proyectos</caption>
<tr>
    <th>Id</th>
    <th>Titulo</th>
    <th>Descripcion Breve</th>
    <th>Descripcion Detallada</th>
    <th>Acciones</th>
</tr>
<?php

foreach ($proyectos as $proyecto) {
    $acciones = [];
    $form = new Formulario("controladores/controladorAdministrador.php");
    $cambiar = new Input("submit", "Cambiar Proyecto", "accion");
    $submit = new Input("submit", "Eliminar", "accion");
    $hidden = new Input("hidden", $proyecto->getId(), "idProyecto");
    
    $form->addInput($cambiar);
    $form->addInput($submit);
    $form->addInput($hidden);
    array_push($acciones, $form);
    
    echo UsuarioHTML::vistaProyectoAdmin($proyecto, $acciones, $proyecto->getId());
}
?>
  


