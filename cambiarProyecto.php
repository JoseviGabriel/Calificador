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


    $usuarios = usuarioDB::leerUsuarios();
    $idProyecto = $_REQUEST["idProyecto"];

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
        <link rel="stylesheet" type="text/css" href="estilos/index.css"/>
    </head>
    <body>
        <form id="formCrearProyecto" action="controladores/controladorAdministrador.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label>Descripcion Breve: </label></td>
                    <td><input type="text" name="descripcionBreve" /></td>
                </tr>
                <tr>
                    <td><label>Descripcion Detallada: </label></td>
                    <td><textarea  name="descripcionDetallada" ></textarea></td>
                </tr>

                <tr>
                    <td><label> Usuarios</label></td>
                    <td><select multiple name="usuarios[]">
                            <?php
                            foreach ($usuarios as $usuario) {
                                echo usuarioHTML::escribirSelects($usuario);
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Archivos</label></td>
                    <td><input type="file" class="form-control" name="archivo[]" multiple /></td>
                </tr>

                <tr>
                    <td><input type="submit" name="accion" value="Aceptar"/></td>
                <input type="hidden" name="idProyecto" value="<?php echo $_REQUEST["idProyecto"]?>"/>
                </tr>

            </table>
        </form>
    </body>
</html>
