<?php

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

foreach ($eventos as $evento) {
    $acciones = [];
    $form = new Formulario("controladores/controladorUsuarios.php");
    $submit = new Input("submit", "Ver Proyectos", "accion");
    $hidden = new Input("hidden", $evento->getId(), "idEvento");
    $form->addInput($submit);
    $form->addInput($hidden);
    array_push($acciones, $form);

    echo UsuarioHTML::vistaEvento($evento, $acciones, $evento->getId());
}
?>
