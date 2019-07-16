<?php
require 'database.php';
$Q="select mensaje.id,id_item,remitente,mensaje,leido,metodo,fecha,id_respuesta from mensaje 
inner join item on mensaje.id_item=item.id
inner join usuario on item.id_usuario=usuario.id
where usuario.id=$user_id and id_respuesta is null ; ";
$consultamen=mysqli_query($conexion,$Q);

?>
    <style>
        #productonombre:hover {
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
<h3 >Mis Mensaje por productos publicados</h3>
<br>
<div class="container" >
    <ul class="reviews">
        <?php
        // if no tma en todos
        if(!$consultamen){?>
            <h4>Usted no tiene preguntas de sus productos publicados</h4>
            <a href="resumenUsuario.php" class="primary-btn">cambiar publicaciones a modo top</a>
        <?php
        }else{
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
         } }
         ?>

    </ul>

</div>


