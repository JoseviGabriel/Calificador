<?php
session_start();

if (!isset($_SESSION["administrador"])) header("Location: administrador.php");


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <header>
            Titulo
        </header>
        <section>
            <article>
                Crear Eventos
                <input type="submit" name="accion" value="Crear Eventos"/>
            </article>
            <article>
                Gestion Eventos
                <input type="submit" name="accion" value="Gestion Eventos"/>
            </article>
            <article>
                Gestion Usuarios
                <input type="submit" name="accion" value="Gestion Usuarios"/>
            </article>
        </section>
        
        <footer>
            Pie
        </footer>
        
        
        <?php
            
        ?>
    </body>
</html>
