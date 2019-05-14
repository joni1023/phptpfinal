<!doctype html>

    <html>
        <head>
            <title>Formulario de Registro</title>
        </head>
        <?php
        require 'header.php';
        ?>
    <body>
//modificar no usar tabla puede romper
<h1> Formulario de Registro</h1>
<h3>Los campos con * son obligatorios</h3>
<form method="post" action="registro.php">
    email
    <input type="text" name="email" required>
    </br>
    Nick Usuario
    <input type="text" name="nick" required>
    </br>
    Contraseña
    <input type="password" name="pass" required>
    </br>
    Confirmacion de contraseña
    <input type="password" name="repass" required>
    </br>
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
