<?php require 'header.php' ?>

<div class="row" style="background-image: url('img/login.jpg'); height: 463px">
    <div class="col-lg-12" style="height: 100px"></div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4 class="panel panel-info" style="background-color: white">
    <div class="panel-heading"><h3>Ingresar</h3></div>
    <div class="panel-body">
        <form class="form-horizontal" action="logear.php" method="post" onsubmit="return Validar();">
            <div class="form-group">
                <label class="table-info">Usuario</label>
                <input class="input" type="text" id="usuario" class="input" name="usuario" placeholder="Ejemplo: 'nombre'">
            </div>
            <div class="form-group">
                <label >Contraseña</label>
                <input type="password" id="pass" class="input" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="primary-btn">confirmar</button>
            <a class="secundary-btn " href="registrar.php">Registrate</a>

        </form>
    </div>
    </div>
    <div class="col-lg-4"></div>
</div>

<?php
require 'footer.php';
?>
