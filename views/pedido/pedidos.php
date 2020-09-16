
<?php if (isset($gestion)) : ?>
    <h1>Gestion Pedidos</h1>


<?php else: ?>
    <h1>Mis Pedidos</h1>

<?php endif; ?>
<table>
    <tr>

        <td>Nº Pedido</td>
        <td>Coste</td>
        <td>Estado</td>
        <td>Fecha</td
    </tr>
    <?php while ($ped = $pedidos->fetch_object()) : ?>

        <tr>



            <td>

                <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a>
            </td>
            <td>
                <?= $ped->coste ?> $

            </td>

            <td>
      <p>Estado: <?= Utils::showStatus($ped->estado) ?></p>



            </td>

            <td>
                <?= $ped->fecha ?>
            </td>



        </tr>

    <?php endwhile; ?>






</table>
