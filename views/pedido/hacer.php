
<?php if (isset($_SESSION['identity'])): ?>
    <h1>Hacer Pedido</h1>

    <a  href="<?= base_url ?>carrito/index">Ver la cesta</a>


    <form action="<?= base_url ?>pedido/add" method="POST">

        <br/>
        <h3>Datos del cliente</h3>
        
        <br/>
        <label for="direccion">Direccion</label>
        <input name="direccion" type="text" required/>

        <label for="provincia">Provincia</label>
        <input name="provincia" type="text" required/>

        <label for="localidad">Ciudad</label>
        <input name="localidad" type="text" required/>
        
        <input  class="button button_pedido" type="submit" value="Confirmar Pedido"  />



    </form>


<?php else: ?>

    <h1>Necesitas estar identificado para poder hacer el pedido</h1>

    <br/>
    <p>Por favor identificate y/o registrate</p>

<?php endif; ?>

