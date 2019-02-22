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
require_once 'clasesdb/EventoDB.php';
session_start();

if (!isset($_SESSION["administrador"]))
    header("Location: administrador.php");


$usuariossinproyecto = usuarioDB::leerUsuariosSinProyecto();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            form{
                display: none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                <input type="button" name="accion" id="gestionEventos" value="Gestion Eventos"/>
            </article>
            <article>
                Gestion Usuarios
                <input type="button" name="accion" id="gestionUsuarios" value="Gestion Usuarios"/>
            </article>
            <article>
                Gestion Proyectos
                <input type="button" name="accion" id="crearProyectos" value="Gestion Proyectos"/>
            </article>
        </section>
        
        
        <form id="formGestionEventos" action="controladores/controladorAdministrador.php" method="post">
            <table>
               <?php
               require_once 'verEventos.php';
               
               ?>
                
            </table>
        </form>


        <form id="formCrearProyecto" action="controladores/controladorAdministrador.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label>Titulo: </label></td>
                    <td><input type="text" name="titulo" /></td>
                </tr>
                <tr>
                    <td><label>Descripcion Breve: </label></td>
                    <td><input type="text" name="descripcionbreve" /></td>
                </tr>
                <tr>
                    <td><label>Descripcion Detallada: </label></td>
                    <td><textarea  name="descripcionDetallada" ></textarea></td>
                </tr>

                <tr>
                    <td><label> Usuarios</label></td>
                    <td><select multiple name="usuarios[]">
                            <?php
                            foreach ($usuariossinproyecto as $usuario) {
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
                    <td><input type="submit" name="accion" value="Crear Proyecto"/></td>
                </tr>

            </table>
        </form>

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

        <form id="formGestionUsuarios" action="controladores/controladorAdministrador.php">
            <table>
                <?php
                require_once "verUsuarios.php";
                ?>
                <input type="submit" name="accion" value="Activar"/>
                <input type="submit" name="accion" value="Desactivar"/>
            </table>
        </form>

        <footer>
            Pie
        </footer>


    </body>
</html>
