<!doctype html>

    <html>
        <head>
            <title>Formulario de Registro</title>
        </head>
        <?php
        require 'header.php';
        ?>
    <body>
<h1> Formulario de Registro</h1>
<h3>Los campos con * son obligatorios</h3>
<form  method="post" action="registro.php">
    <div class="form-group">
        <label>email</label>
        <input type="text" name="email" required>
    </div>
    <div class="form-group"
        <label>Nick Usuario</label>
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

    <input type="submit" name="submit" value="Registrar">
    <input type="reset">

</form>
<?php
if(isset($_POST['submit'])){
    require ("registro.php");
}
?>
    </body>


<?php
require 'footer.php';
?>
</html>
