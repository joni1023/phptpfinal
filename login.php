<!Doctype html>

<HTML>
<title>login</title>
<?php require 'header.php' ?>
<div id="page-container">
<div class="container">
        <form class="form-group" action="logear.php" method="post">
            <div class="form-group">
                <label>Ingrese Usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="Ejemplo: 'nombre'">
            </div>
            <div class="form-group">
                <label >Ingrese Contraseña</label>
                <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">confirmar</button>
            <a class="btn btn-success" href="registrar.php">Registrar</a>

        </form>
</div>
<?php
require 'footer.php';
?>
</div>
</HTML>