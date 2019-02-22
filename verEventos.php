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
    <td>Proyectos</td>
    <th colspan="3">Acciones</th>
</tr>
<?php
$eventos = eventoDB::obtenerEventos();
$proyectos=proyectoDB::obtenerProyectosSinEvento();

//var_dump($alumnos);
//$enlace1=new Enlace("controlador.php","Eliminar","accion");

foreach ($eventos as $evento) {
    $acciones = [];
    $radioCheckbox = new RadioCheckBox("checkbox", $evento->getId(), "activar[]", "Activar/Desactivar");
    array_push($acciones, $radioCheckbox);

    echo usuarioHTML::vistaEvento($evento, $acciones, $evento->getId(), $proyectos);
}
?>



 
                    
