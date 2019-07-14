<?php
require 'header.php';
require  'database.php';
$valorPedido=$_POST['totalPedido'];
$valorFlete=180;
?>
<div class="section">
<div class="container">
    <div class="col-lg-12" id="metodoEntrega" >
        <div class="col-lg-12">
            <h2 class="title">Metodo De Entrega</h2>
        </div>
<!--posibilidad de poner otra direccion  y calcuar el flete-->
        <div class="col-lg-6 ">
            <div><h4 class="title">Retirar en la direccion:</h4></div>
            <p>Direccion del vendedor o algun correo </p>

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
            <div>
<!--                valor del envio -->
                <p>el valor del envio a su direccion es $ 180</p>
                <p>valor con flete: <?php echo $valorFlete+$valorPedido;?></p>
            </div>
        </div>  <form action="pasocompra2.php" method="post">

            <input type="hidden" name="totalConEnvio" value="<?php echo $valorFlete+$valorPedido;?>">
            <input type="text" name="direccion" value="<?php echo $direccion['calle'] ?>">
            <button type="submit" class="primary-btn order-submit"  style="margin-left: 25%; width: 50%;margin-top: 5%">Continuar con la compra</button>
        </form>



    </div>


</div>
</div>



<?php require 'footer.php';
?>
