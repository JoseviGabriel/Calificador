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
        <form action="controladores/controladorUsuarios.php">
            <table>
                <tr>
                    <td><label>Nombre: </label></td>
                    <td><input type="text" name="nombre" /></td>
                </tr>
                <tr>
                    <td><label>Apellidos: </label></td>
                    <td><input type="text" name="apellidos" /></td>
                </tr>
                <tr>
                    <td><label>Telefono: </label></td>
                    <td><input type="text" name="telefono" /></td>
                </tr>
                <tr>
                    <td><label>Login: </label></td>
                    <td><input type="text" name="login" /></td>
                </tr>
                <tr>
                    <td><label>Clave: </label></td>
                    <td><input type="text" name="clave" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="accion" value="Registrar"/></td>
                </tr>
            </table>
        </form>
        <?php
        ?>
    </body>
</html>
