<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia seccion con tus datos</p>

<?php
@include __DIR__ . "/../templates/alertas.php"
?>

<form class="formulario" action="/" method="post">
    <div class="campo">
        <label for="email">Email</label>
        <input type="text"
            type="email" 
            id="email"
            placeholder=" Tu Email"
            name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input type="password"
            type="password" 
            id="password"
            placeholder=" tu Password"
            name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Seccion">

</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Crear una</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>