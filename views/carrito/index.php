<h1>Mi cesta </h1>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>

    <table>
        <tr>

            <td>Imagen</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Unidades</td>
            <td>Eliminar</td>

        </tr>
        <?php
        foreach ($carrito as $indice => $elemento) :

            $producto = $elemento['producto'];
            ?>

            <tr>
                <td><?php if ($producto->imagen != null): ?>


                        <img  class="imgcesta" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"/>

                    <?php else: ?>
                        <img class="imgcesta" src="<?= base_url ?>assets/img/camiseta.png"/>

                    <?php endif; ?>
                </td>
                <td>
                    <?= $producto->nombre ?>
                </td>
                <td>
                    <?= $producto->precio ?>

                </td>

                <td>
                    <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>?>" class="button cantidad ">+</a>  
                    <?= $elemento['unidades'] ?>
                    <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>?>" class="button cantidad">-</a>  

                </td>



                <td>

                    <a href="<?= base_url ?>carrito/delete&index=<?= $indice ?>" class="button button_delete">Quitar producto</a>    
                </td>



            </tr>

        <?php endforeach; ?>






    </table>
    <a href="<?= base_url ?>carrito/deleteAll"class=" button button_delete">Vaciar Carrito</a>
    <div class="totalcarrito">
        <?php $stat = Utils::stackcarrito(); ?>

        <h3>Precio Total: <?= $stat['total'] ?></h3>

        <a href="<?= base_url ?>pedido/hacer"class="button button_pedido">Confirmar Pedido</a>


    </div>
<?php else: ?>
    <p>El carrito está vacio, añade algun producto</p>
<?php endif; ?>