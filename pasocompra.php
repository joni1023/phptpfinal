<?php
require 'header.php';
require  'database.php';
?>

<div class="container">
    <div class="col-lg-12" id="metodoEntrega" >
        <div class="col-lg-12">
            <h2>Metodo De Entrega</h2>
        </div>

        <div class="col-lg-6">
            <div><h3>Retirar en la direccion:</h3></div>

        </div>
        <div class="col-lg-6">
            <div><h3>Envio a la direccion:</h3></div>
            <?php $id=$_SESSION['user_id'];
            $consultadirecion= "select * from usuario where id=$id";
            $enviarconsul=mysqli_query($conexion,$consultadirecion);
            $direccion=mysqli_fetch_array($enviarconsul);
            echo $direccion['calle'] ;
            ?>
        </div>
        <a href="pasocompra2.php"><button type="button" class="btn btn-success" id="show2" style="margin-left: 25%; width: 50%;margin-top: 5%">Contnuar con la compra</button></a>

    </div>


</div>




<?php require 'footer.php';
?>
