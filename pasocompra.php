<?php
require 'header.php';
require  'database.php';
$_SESSION['carrito']=0;
$valorPedido=$_POST['totalPedido'];
$valorFlete=180;
?>
<div class="section">
<div class="container">
    <div class="col-lg-12" id="metodoEntrega" >
        <div class="col-lg-12">
            <h2 class="title">Metodo De Entrega</h2>
            <br>
        </div>
<!--posibilidad de poner otra direccion  y calcuar el flete-->
        <div class="col-lg-5 order-details">
            <div><h4 class="title">Retirar en la direccion:</h4></div>
            <p>Direccion del vendedor o algun correo </p>

        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6 order-details">
            <div><h4 class="title">Envio a la direccion:</h4></div>
            <?php $id=$_SESSION['user_id'];
            $consultadirecion= "select * from usuario where id=$id";
            $enviarconsul=mysqli_query($conexion,$consultadirecion);
            $direccion=mysqli_fetch_array($enviarconsul);
            echo $direccion['calle']."  ".$direccion['altura']." ,".$direccion['localidad'] ;
            ?>
            <div>
<!--                valor del envio -->
                <h5>el valor del envio a su direccion es $ 180</>
                <hr style="color: #0056b2;" />
                <h4>valor con flete: <?php echo $valorFlete+$valorPedido;?></h4>
            </div>
        </div>  <form action="pasocompra2.php" method="post">

            <input type="hidden" name="totalConEnvio" value="<?php echo $valorFlete+$valorPedido;?>">
			 <select class="input-select" name="tipoEntrega" style="margin-left: 25%; width: 50%;margin-top: 5%">
                                    <option value="0">Retiro en la Direccion del vendedor</option>
                                    <option value="1">Envio a domicilio</option>
             </select>
            <button type="submit" class="primary-btn order-submit" disable  style="margin-left: 25%; width: 50%;margin-top: 5%">Continuar con la compra</button>
        </form>



    </div>


</div>
</div>



<?php require 'footer.php';
?>
