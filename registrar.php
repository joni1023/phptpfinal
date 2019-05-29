<!doctype html>

    <html>
        <head>
            <title>Formulario de Registro</title>
        </head>
        <?php
        require 'header.php';
        ?>
    <body>

<div class="container">
    <h1> Formulario de Registro</h1>
    <h3>Los campos con * son obligatorios</h3>
<form  method="post" action="registro.php" class="form-row">
    <div class="col-lg-6">
        <h3>informacion personal</h3>
        <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="apellido" required>
        </div>
        <div class="form-group">
        <label>Sexo</label>
        <input type="radio" name="sexo" value="mujer">
        <label for="mujer">Mujer</label>
        <input type="radio" name="sexo" value="hombre">
        <label for="hombre">Hombre</label>
        </div>
    <div class="form-group">
    <label>CUIL</label>
    <input type="text" name="cuil" required placeholder="20-17458521-1">
        </div>
    </div>
 <div class="col-lg-6">
    <h3>Dato de cuenta</h3>
    <div class="form-group">
        <label>E-mail</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
    <label>Nick</label>
    <input type="text" name="nick" required>
    </div>
    <div class="form-group">
        <label>Contraseña</label>
        <input type="password" name="pass" required>
    </div>
    <div class="form-group">
        <label>Confirmacion de contraseña</label>
        <input type="password" name="repass" required>
    </div>
 </div>
<div class="col-lg-12">
    <h3>direccion:</h3>
    <div class="form-group">
        <label class="control-label">Localidad</label>
        <input class="form-group" type="text" name="localidad" required>
    </div>

    <div class="form-group">
        <label>Calle</label>
        <input type="text" name="calle" required>
    </div>

    <div class="form-group">
        <label>altura</label>
        <input type="text" name="altura" required>
    </div>
</div>
    <input type="submit" class="btn btn-primary" name="submit" value="Registrar">
    <input type="reset" class="btn btn-success">

</form>
</div>
<?php
if(isset($_POST['submit'])){
    require ("registro.php");
}
?>
    </body>


</html>
