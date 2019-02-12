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
        <?php
          if (isset($_REQUEST["mensaje"])) echo $_REQUEST["mensaje"];
        ?>
        <form action="controladores/controladorAdministrador.php"/>
        <table border="1"> 
            <caption>Administradores</caption>
            <tr>
                <td>Usuario</td>
                <td><input type="text" name="usuario" /></td>
            </tr>
             <tr>
                <td>Clave</td>
                <td><input type="password" name="clave" /></td>
            </tr>
        
        </table>
        
        <input type="submit" name="accion" value="Acceder"/>
        
    </body>
</html>
