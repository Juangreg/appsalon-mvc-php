<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu E-mail a continuacion</p>

<?php
@include __DIR__ . "/../templates/alertas.php"
?>

<form class="formulario" action="/olvide" method="POST">
    <div class="campo">
        <label for="email">E-mail</label>
        <input 
        type="email"
        id="email"
        name="email"
        placeholder="Tu E-mail"
        />
    </div>
    <input type="submit" value="Enviar Instrucciones" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? inicia seccion</a>
    <a href="/crear-cuenta">¿aun no tienes una cuentas? crear una</a>
</div>