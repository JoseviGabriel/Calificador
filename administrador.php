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
        <form action="controladores/controladoradministrador.php"/>
        <table border="1"> 
            <caption>Administradores</caption>
            <tr>
                <td>Usuario</td>
                <td><input type="text" name="usuario" /></td>
            </tr>
             <tr>
                <td>Clave</td>
                <td><input type="password" name="usuario" /></td>
            </tr>
        
        </table>
        
        <input type="submit" name="accion" value="Acceder"/>
        <?php
        // put your code here
        ?>
    </body>
</html>
