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

    
    public static function vistaEvento($evento, $acciones, $indice){
        ?> 
        <tr>

            <td><?php echo $evento->getId() ?></td>
            <td><?php echo $evento->getTitulo() ?></td>
            <td><?php echo $evento->getDescripcion() ?></td>
            <td><?php echo $evento->getFecha_apertura() ?></td>
            <td><?php echo $evento->getFecha_cierre() ?></td>  
            <td><?php echo $evento->getApartados() ?></td>  
            <td><?php echo $evento->getCalificacion() ?></td>  
            <td><?php echo $evento->getAbierto() ?></td>  
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

}
