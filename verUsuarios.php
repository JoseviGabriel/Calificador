<?php

?>
<caption>Usuarios</caption>
<tr>
    <th>Login</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Telefono</th>
    <th>Clave</th>
    <th>Activo</th>
    <th>Proyecto</th>
    <th colspan="3">Acciones</th>
</tr>
<?php
$alumnos = usuarioDB::leerUsuarios();
//var_dump($alumnos);
//$enlace1=new Enlace("controlador.php","Eliminar","accion");

foreach ($alumnos as $usuario) {
    $acciones = [];
    $radioCheckbox = new RadioCheckBox("checkbox", $usuario->getLogin(), "activar[]", "Activar/Desactivar");
    array_push($acciones, $radioCheckbox);

    echo usuarioHTML::vistaTabular($usuario, $acciones, $usuario->getLogin());
}
?>
</table>
