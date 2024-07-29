<h1 class="nombre-pagina">Recuperar password</h1>
<p class="descripcion-pagina">Coloca tu nuevo password a continuacion</p>

<?php
@include_once __DIR__ . '/../templates/alertas.php';
?>

<?php if($error) return; ?>
<form class="formulario" method="POST">
    <div class="campo">
        <label for="sassword">Password</label>
        <input 
        type="password"
        id= "password"
        name="password"
        placeholder="escribe Tu Password"
        />
    </div>
    <input type="submit" class="boton" value="guardar Nuevo Password">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes cuenta? Iniciar seccion?</a>
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Obtener una</a>
</div>