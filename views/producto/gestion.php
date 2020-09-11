<h1>Gestion de productos</h1>

<a href="<?= base_url ?>producto/crear" class="buttonaparte">
    Crear producto
</a>

<table>
    <tr>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>DESCRIPCIÓN</th>
    </tr>
    <?php while ($prod = $productos->fetch_object()): ?>
        <tr>
            <td><?= $prod->nombre; ?></td>
            <td><?= $prod->precio; ?></td>
            <td><?= $prod->stock; ?></td>
            <td><?= $prod->descripcion; ?></td>

        </tr>
    <?php endwhile; ?>
</table>
