<?php
require 'header.php';
require  'database.php';
?>
<div class="section">
<div class="container">
    <div class="col-lg-12" id="metodoEntrega" >
        <div class="col-lg-12">
            <h2 class="title">Metodo De Entrega</h2>
        </div>

        <div class="col-lg-6 ">
            <div><h4 class="title">Retirar en la direccion:</h4></div>
            <p>Diresccion del vendedor o algun correo </p>

        </div>
        <div class="col-lg-6 order-details">
            <div><h4 class="title">Envio a la direccion:</h4></div>
            <?php $id=$_SESSION['user_id'];
            $consultadirecion= "select * from usuario where id=$id";
            $enviarconsul=mysqli_query($conexion,$consultadirecion);
            $direccion=mysqli_fetch_array($enviarconsul);
            echo $direccion['calle'] ;
            ?>
            <div>
                <h4 class="title">Otra direccion:</h4>
                <div class="form-group">
                    <input class="input" type="text" name="" placeholder="calle">
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="" placeholder="altura">
                </div>                         
                <div class="form-group">       
                    <input class="input" type="text" name="" placeholder="localidad">
                </div>
            </div>
        </div>

        <a href="pasocompra2.php"><button type="button" class="primary-btn order-submit" id="show2" style="margin-left: 25%; width: 50%;margin-top: 5%">Continuar con la compra</button></a>

    </div>


</div>
</div>



<?php require 'footer.php';
?>
