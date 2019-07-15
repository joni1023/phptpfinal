<?php
require 'database.php';

$usuarioid=$_SESSION['user_id'];
$itemsVendidos=mysqli_query($conexion,"select item.id,item.nombre,descripcion,categoria,precio,id_pedido,pedido_item.cantidad,pedido.fecha,usuario.nick as comprador from item inner join pedido_item 
on item.id=pedido_item.id_item inner join pedido on pedido_item.id_pedido=pedido.id inner join usuario on usuario.id=pedido.id_usuario where item.id_usuario=".$usuarioid.";");
?>
    <style>
        .product-widgetC {
            position: relative;
            border: 1px solid #E4E7ED;
            width: 45%;
            left: 200px;

        }

        .product-widgetC+.product-widgetC {
            margin: 30px 0px;
        }

        .product-widgetC .product-img {
            position: absolute;
            left: 0px;
            top: 0px;
            width: 140px;
        }

        .product-widgetC .product-img>img {
            width: 100%;
        }

        .product-widgetC .product-body {
            padding-left: 175px;
            min-height: 140px;
        }

        .product-widgetC .product-body .product-category {

            color: #8D99AE;
        }

        .product-widgetC .product-body .product-name {
            text-transform: uppercase;
            font-size: 23px;
        }

        .product-widgetC .product-body .product-name>a {
            font-weight: 700;
        }

        .product-widgetC .product-body .product-name>a:hover, .product-widgetC .product-body .product-name>a:focus {
            color: #D10024;
        }

    </style>

    <h3>Mis Ventas:</h3>
<?php

while ($items=mysqli_fetch_array($itemsVendidos)){
    ?>
    <div class="section">
        <div class="product-widgetC">
            <div class="product-img">
                <?php $resultImage = mysqli_fetch_array(mysqli_query($conexion, "SELECT imagen FROM imagen_item where id_item='$items[id]' and principal=1"));
                if(empty($resultImage['imagen'])){
                    echo " <img src='./img/nodisponible.jpg' alt=''>";
                }else{
                    echo " <img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' alt=''>";
                }
                ?>
            </div>
            <div class="product-body">
                <div><p class="product-old-price"></p></div>
                <div class="row">
                    <div class="col-lg-7"><h5>N° de pedido: <?php echo $items['id_pedido']?></h5><h5 class="product-category">fecha de compra:<?php echo $items['fecha']?> </h5><h6>Comprador <?php echo $items['comprador'];?></h6></div>
                    <div class="col-lg-5"><h5>precio unitario: <?php echo $items['precio']?></h5><h5>cantidad: <?php echo $items['cantidad']?> </h5><h6>Total: $ </h6></div>
                </div>
                <h3 class="title"><a href="detalleproducto.php?id=<?php echo $items['id'];?>"><?php echo $items['nombre']?></a></h3>
            </div>
        </div>
    </div>


<?php }?>