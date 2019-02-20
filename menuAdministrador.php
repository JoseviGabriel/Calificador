<?php
session_start();

if (!isset($_SESSION["administrador"]))
    header("Location: administrador.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="menuAdministrador.js"></script>
    </head>
    <body>
        <header>
            Titulo
        </header>
        <section>
            <article>
                Crear Eventos
                <input type="button" name="accion" id="crearEventos" value="Crear Eventos"/>
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

        <form id="formCrearEvento" action="controladores/controladorAdministrador.php">
            <table>
                <tr>
                    <td><label>Titulo: </label></td>
                    <td><input type="text" name="titulo" /></td>
                </tr>
                <tr>
                    <td><label>Descripcion: </label></td>
                    <td><input type="text" name="descripcion" /></td>
                </tr>
                <tr>
                    <td><label>Fecha Apertura: </label></td>
                    <td><input type="date" name="fecha_a" /></td>
                </tr>
                <tr>
                    <td><label>Fecha Cierre: </label></td>
                    <td><input type="date" name="fecha_c" /></td>
                </tr>
                <tr>
                    <td><label>Apartados a evaluar: </label></td>
                    <td><select multiple name="apartados[]">
                            <option>Disenio</option>
                            <option>Codificacion</option>
                            <option>Diagramas</option>
                            <option>Modelo Entidad Relacion</option>
                            <option>Tiempo de Entrega</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label>Calificacion unica: </label></td>
                    <td>Si<input type="radio" name="cUnica" value="1"/></td>
                    <td>No<input type="radio" name="cUnica" value="0"/></td>
                </tr>
                <tr>
                    <td><label>Abierto para calificacion: </label></td>
                    <td>Si<input type="radio" name="cAbierto" value="1"/></td>
                    <td>No<input type="radio" name="cAbierto" value="0"/></td>
                </tr>
                <tr>
                    <td><input type="submit" name="accion" value="Crear Evento"/></td>
                </tr>

            </table>
        </form>

    </body>
</html>
