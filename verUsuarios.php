<?php
require_once 'clases/Usuario.php';
require_once 'clasesdb/usuarioDB.php';
require_once 'clasesrender/Accion.php';
require_once 'clasesrender/Enlace.php';
require_once 'clasesrender/Formulario.php';
require_once 'clasesrender/Input.php';
require_once 'clasesrender/RadioCheckBox.php';
require_once 'clasesrender/UsuarioHTML.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table class="datos">
        <caption>Usuarios</caption>
        <tr>
            <th>Login</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Clave</th>
            <th>Activo</th>
            <th>Proyecto</th>
            <th colspan="3">Acciones</th>
        </tr>
<?php
        $alumnos= usuarioDB::leerUsuarios();
        var_dump($alumnos);
        //var_dump($alumnos);
        $acciones=[];
        //$enlace1=new Enlace("controlador.php","Eliminar","accion");
        $formulario=new Formulario("");
       // $input=new Input("hidden",NULL,"id");
       // $formulario->addInput($input);
        
        
        array_push($acciones, $formulario);
        foreach ($alumnos as $usuario) {
            echo usuarioHTML::vistaTabular($usuario,$acciones, $usuario->getLogin());
        }

?>
    </table>
    </body>
</html>
