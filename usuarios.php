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
                    <td><label>Login: </label></td>
                    <td><input type="text" name="login" /></td>
                </tr>
                <tr>
                    <td><label>Clave: </label></td>
                    <td><input type="password" name="clave" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="accion" value="Acceder"/></td>
                    <td><input type="submit" name="accion" value="Registro"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
