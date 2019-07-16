<?php
require 'database.php';
$q="select * from mensaje where remitente like '$nombre' ";
$consultamen=mysqli_query($conexion,$q);

?>
    <style>
        #productonombre:hover {
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
<h3 >Mis Mensaje por producto de mi interes</h3>
<br>
        <div class="container">
            <ul class="reviews">
                <?php
                // if no tma en todos
                if(!$consultamen){;?>
                    <h4>Usted no ha enviado ningun mensaje</h4>
                    <a href="resumenUsuario.php" class="primary-btn">seleccione el articulo , y haga sus preguntas</a>
                    <?php
                }else{
                    $y = -1;
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
                                    color: #FFF;">visto</p>
                            </div>
                            <div class="review-body">
                                <h5 class="name" id="productonombre" onclick="vermsj(<?php echo $y;?>)"> <?php $consulproducto=mysqli_query($conexion,"select * from item where id=".$row['id_item']." ");
                                    $producto=mysqli_fetch_array($consulproducto); echo $producto['nombre']?></h5>
                                <div id="vermensaje<?php echo $y;?>" hidden>
                                    <p style="overflow-wrap:break-word; "><?php echo $row['mensaje']?></p><h5>respuesta:</h5><p><?php $consultarespuesta=mysqli_query($conexion,"SELECT *from mensaje WHERE id_respuesta=".$row['id']." "); $respu=mysqli_fetch_array($consultarespuesta);
                                        echo $respu['mensaje'];?>
                                        <br>
                                    <a href="detalleproducto.php?id=<?php echo $row['id_item'];?>" class="primary-btn">enviar un nuevo mensaje</a>
                                </div>
                            </div>
                        </li>
                        <?php $y--;
                    } }
                ?>

            </ul>


        </div>

