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
        ?> 
        <tr>

            <td><?php echo $usuario->getLogin() ?></td>
            <td><?php echo $usuario->getNombre() ?></td>
            <td><?php echo $usuario->getApellidos() ?></td>
            <td><?php echo $usuario->getTelefono() ?></td>
            <td><?php echo $usuario->getClave() ?></td>  
            <td><?php echo $usuario->getActivo() ?></td>
            <td><?php echo $usuario->getProyecto() ?></td>
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

}
