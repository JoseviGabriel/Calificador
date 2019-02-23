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
$proyectos=proyectoDB::obtenerProyectosSinEvento();

//var_dump($alumnos);
//$enlace1=new Enlace("controlador.php","Eliminar","accion");

foreach ($eventos as $evento) {
    $acciones = [];
    $submit = new Input("submit", "Establecer Proyectos", "accion");
    $hidden = new Input("hidden", $evento->getId(), "idEvento");
    array_push($acciones, $submit);
    array_push($acciones, $hidden);

    echo usuarioHTML::vistaEvento($evento, $acciones, $evento->getId(), $proyectos);
}
?>



 
                    
