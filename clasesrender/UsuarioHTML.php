<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioHTML
 *
 * @author gabriel
 */
class usuarioHTML {

    public static function vistaTabular($usuario, $acciones, $indice) {
        if($usuario->getActivo() == 1){
            $activo = "Si";
        } else {
            $activo = "No";
        }
        
        $proyecto = proyectoDB::obtenerNombrePorId($usuario->getProyecto());
        ?> 
        <tr>

            <td><?php echo $usuario->getLogin() ?></td>
            <td><?php echo $usuario->getNombre() ?></td>
            <td><?php echo $usuario->getApellidos() ?></td>
            <td><?php echo $usuario->getClave() ?></td>
            <td><?php echo $usuario->getTelefono() ?></td>  
            <td><?php echo $activo ?></td>
            <td><?php echo $proyecto[0] ?></td>
            <?php
            foreach ($acciones as $accion) {
                ?>
                <td><?php echo $accion->dibujar($indice); ?></td>
                <?php
            }
            ?>

        </tr>

        <?php
    }

    
    
    public static function vistaEvento($evento, $acciones, $indice, $proyectos){
        if($evento->getCalificacion() == 1){
            $calificacion = "Unica";
        } else {
            $calificacion = "Normal";
        }
        
        if($evento->getAbierto() == 1){
            $abierto = "Si";
        } else {
            $abierto = "No";
        }
        ?> 
        <tr>

            <td><?php echo $evento->getId() ?></td>
            <td><?php echo $evento->getTitulo() ?></td>
            <td><?php echo $evento->getDescripcion() ?></td>
            <td><?php echo $evento->getFecha_apertura() ?></td>
            <td><?php echo $evento->getFecha_cierre() ?></td>  
            <td><?php echo $evento->getApartados() ?></td>  
            <td><?php echo $calificacion ?></td>  
            <td><?php echo $abierto ?></td> 
            <?php if($proyectos != NULL){?>
            <td>
                <select multiple name="proyectos[]">
                            <?php
                            foreach ($proyectos as $proyecto) {
                                echo self::escribirSelectProyectos($proyecto);
                            }
                            ?>
                        </select>
            </td>
            <?php   }
            foreach ($acciones as $accion) {
                ?>
                <td><?php echo $accion->dibujar($indice); ?></td>
                <?php
            }
            ?>

        </tr>
       <?php
    }
    
    public static function vistaProyectoAdmin($proyecto, $acciones, $indice){
        ?>
        <tr>

            <td><?php echo $proyecto->getId() ?></td>
            <td><?php echo $proyecto->getTitulo() ?></td>
            <td><?php echo $proyecto->getDescripcionbreve() ?></td>
            <td><?php echo $proyecto->getDescripciondetallada() ?></td>
            <?php
            foreach ($acciones as $accion) {
                ?>
                <td><?php echo $accion->dibujar($indice); ?></td>
                <?php
            }
            ?>

        </tr>

        <?php
    }
    
    
    public static function escribirSelects($usuario){
        ?>
        <option><?php echo $usuario->getLogin();?></option>
        <?php
    }
    
    public static function escribirSelectProyectos($proyecto){
        ?>
        <option value="<?php echo $proyecto->getId(); ?>"><?php echo $proyecto->getTitulo();?></option>
        <?php
        
    }
    
    public static function vistaProyectoAlumnos($proyecto, $acciones, $indice){
        $pertenece=false;
        $usuarios=proyectoDB::obtenerUsuariosProyecto($proyecto->getId());
        foreach ($usuarios as $usuario){            
            if ($usuario==$_SESSION["usuario"]->getLogin()) $pertenece=true;
        }
        ?>
        
        <tr>
            <form action="controladores/controladorUsuarios.php" >
            <td><?php echo $proyecto->getId() ?></td>
            <td><?php echo $proyecto->getTitulo() ?></td>
            <td><?php echo $proyecto->getDescripcionbreve() ?></td>
            <td><?php echo $proyecto->getDescripciondetallada() ?></td>
            <td>    
                <?php 
                  if (count($proyecto->getDocumentos()) != 0 ){
                      $titulo=$proyecto->getTitulo();
                      
                    foreach ($proyecto->getDocumentos() as $documento){
                        $ruta= rawurlencode("proyectos/$titulo/$documento");
                      echo "<a target='_blank' href=".$ruta.">".$documento."</a></br>";
                    }
                  }else{
                      echo "Sin ficheros";
                  }

                ?>
            </td>
            <td><?php echo proyectoDB::obtenerMediaProyecto($proyecto->getId())  ?></td>
            <td>
                <?php
                    if ($pertenece){
                        echo "Perteneces a este proyecto no puedes calificarlo.";
                        ?>
                        </td>
                        <?php
                    }else{
                            ?>

                            <select name="notacalificacion">

                                <?php
                                    for ($x=1;$x<11;$x++){
                                        ?>
                                        <option><?php echo $x; ?></option> 
                                        <?php
                                    }
                                ?>
                                 

                            </select>
                        </td>
                        <?php
                        foreach ($acciones as $accion) {
                            ?>
                            <td><?php echo $accion->dibujar($indice); ?></td>
                            <?php
                        }
                    }
            ?>
         </form>
        </tr>
       
        <?php
    }

}
