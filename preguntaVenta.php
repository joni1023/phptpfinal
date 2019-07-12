<?php require 'header.php';
require 'database.php';
$q="select * from mensaje where remitente like '".$_SESSION['username']."' ";
$consultamen=mysqli_query($conexion,$q);

?>
    <style>
        #productonombre:hover {
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
<div class="row">
    <header>

</header>
    <div class="col-lg-3"></div>
<div class="col-lg-6">
    <ul class="reviews">
        <?php
        $i = 0;
        while($row = mysqli_fetch_array($consultamen)){ ?>
            <li>
                <div class="review-heading">
                    <h5 class="name"><?php echo $row['remitente']?></h5>
                    <p class="date"><?php echo $row['fecha']?></p>
                    <p id="metodoR" style="background-color:  #D10024;
text-align: center;
color: #FFF;"><?php echo $row['metodo'];?></p>
                    <p style=" <?php if($row['leido']=='si'){ echo "background-color:  #D10024;";}else{ echo "background-color: #eac5c5;";} ?>
text-align: center;
color: #FFF;">leido</p>
                </div>
                <div class="review-body">
                    <h5 class="name" id="productonombre" onclick="vermsj(<?php echo $i;?>)"> <?php $consulproducto=mysqli_query($conexion,"select * from item where id=".$row['id_item']." ");
                    $producto=mysqli_fetch_array($consulproducto); echo $producto['nombre']?></h5>
                    <div id="vermensaje<?php echo $i;?>" hidden>
                    <p style="overflow-wrap:break-word; "><?php echo $row['mensaje']?></p><h5>respuesta:</h5><p><?php $consultarespuesta=mysqli_query($conexion,"SELECT *from mensaje WHERE id_respuesta=".$row['id']." "); $respu=mysqli_fetch_array($consultarespuesta);
                    echo $respu['mensaje'];?>
                        </p><?php if(!isset($respu)){?>
                        <form class="review-form" id="formRespuesta" action="logica/respondermensaje.php" method="post">
                            <input type="hidden" name="metodoR" value="<?php echo $row['metodo'];?>">
                            <input type="hidden" name="idmsj" id="idmensaje" value="<?PHP echo $row['id']?>">
                            <input type="hidden"  id="iditemmensaje" name="iditemmsj" value="<?PHP echo $row['id_item']?>">
                            <textarea name='respuesta' id='mensajeR' style="resize:none;" class='input' placeholder='Deja tu mensaje' autofocus></textarea>
                            <button class='primary-btn' type='submit' >Responder</button>
                        </form>
                            <?php } ?>
                    </div>
                </div>
            </li>
        <?php $i++;
         } ?>

    </ul>


</div>
    <div class="col-lg-3"></div>
</div>


<?php require 'footer.php'; ?>