
<?php if (isset($edit)&& isset($pro) && is_object($pro)) : ?>
    <h1>Editar Producto:  <?=$pro->nombre?></h1>
    <?php
    $url_action = base_url . "producto/edit&id=.$pro->id";
    ?>
<?php else: ?>
    <h1>Crear Producto Nuevo</h1>
    <?php
    $url_action = base_url . "producto/save";
    ?>
<?php endif; ?>



<form action="<?= $url_action ?>producto/save" method="POST" enctype="multipart/form-data">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?=$pro->nombre?>"/>


    <label for="descripcion">descripcion</label>
    <textarea type="text" name="descripcion"><?=$pro->descripcion?></textarea>


    <label for="precio">precio</label>
    <input type="text" name="precio "value="<?=$pro->precio?>" />



    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?=$pro->stock?>"/>


    <label for="categoria">Categoria</label>

<?php $categorias = Utils::showCategorias() ?>

    <select name="categoria">

<?php while ($cat = $categorias->fetch_object()): ?>
        <option value="<?= $cat->id ?>" <?= (isset($pro)&& is_object($pro) && $cat->id == $pro->categoria_id) ? 'selected'  : ''?>>
        <?= $cat->nombre ?>

            </option> 

        <?php endwhile; ?>




    </select>



    <label for="imagen">Imagen</label>
    
    <?php if (isset($pro) && is_object($pro)&& !empty($pro->imagen)):?>
    
    <img src="<?= base_url?>uploads/images/<?=$pro->imagen?>"
    
    
    <?php endif;?>
    <input type="file" name="imagen"/>



    <input type="submit" value="Guardar"/>





</form>