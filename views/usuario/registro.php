


<!-- esta condicion nos permite borrar la sesion del registro -->
<h1>Registrarse</h1>

 <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>
    
<strong class="alert_green">Registro completado correctamente</strong>

<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') :?>


<strong class="alert_red">Registro completado correctamente</strong>
<?php endif;?>

<!-- funcion que permite borrar la sesion -->

<?php Utils::deleteSsesion('register');?>


<form action="<?=base_url?>usuario/save" method="POST">
    
    
    <label for="nombre">Nombre</label>
        
    <input type="text" name="nombre" required/>
    
    
        <label for="apellidos">Apellidos</label>
        
    <input type="text" name="apellidos" required/>
    
    
        <label for="email">Email</label>
        
    <input type="email" name="email" required/>
    
    
        <label for="password">Contraseña</label>
        
    <input type="password" name="password" required/>
    
    
    <input type="submit" value="Registrarse"/>
    
    
    
    
</form>