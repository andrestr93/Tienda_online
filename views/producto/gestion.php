<h1>Gestion de productos</h1>

<a href="<?= base_url ?>producto/crear" class="buttonaparte">
    Crear producto
</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>	
    <strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha eliminado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'failed'): ?>	
    <strong class="alert_red">El producto nose ha eliminado correctamente</strong>
<?php endif; ?>

<?php Utils::deleteSsesion('producto') ?>
<?php Utils::deleteSsesion('delete') ?>

<table>
    <tr>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>DESCRIPCIÓN</th>
        <th>ACCIONES</th>
    </tr>
    <?php while ($prod = $productos->fetch_object()): ?>
        <tr>
            <td><?= $prod->nombre; ?></td>
            <td><?= $prod->precio; ?></td>
            <td><?= $prod->stock; ?></td>
            <td><?= $prod->descripcion; ?></td>
            <td> <a  class="button butdelete"href="<?= base_url ?>producto/delete&id=<?= $prod->id ?>">Borrar Producto</a></td>
            <td><a class="button butdeleteg" href="<?= base_url ?>producto/modify&id=<?= $prod->id ?>">Modificar Producto</a></td>      
        </tr>
    <?php endwhile; ?>




</table>
