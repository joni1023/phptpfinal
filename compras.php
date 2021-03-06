<?php
require 'database.php';

$usuarioid=$_SESSION['user_id'];
$itemComprados=mysqli_query($conexion,"SELECT item.id,item.id_usuario,nombre,descripcion,categoria,precio,estado,pedido_item.cantidad,pedido.fecha,pedido.id as id_pedido FROM item inner join pedido_item on item.id=pedido_item.id_item
inner join pedido on pedido_item.id_pedido=pedido.id where pedido.id_usuario=".$usuarioid.";");
?>
    <style>
        .product-widgetC {
            position: relative;
            border: 1px solid #E4E7ED;
            width: 55%;
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
            text-transform: uppercase;
            font-size: 15px;
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
    <h3>Mis compras:</h3>
<?php
while ($items=mysqli_fetch_array($itemComprados)){
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
                                <p class="product-category"><?php echo $items['categoria']?></p>
                                <h3 class="product-name"><a href="detalleproducto.php?id=<?php echo $items['id'];?>"><?php echo $items['nombre']?></a></h3>
                                <div><p class="product-old-price"></p></div>
                                <div class="row">
                                    <div class="col-lg-5"><p>precio unitario: <?php echo $items['precio']?></p><p>cantidad: <?php echo $items['cantidad']?> </p>
                                    <h6>Vendedor: <?php echo $items['id_usuario'];?></h6></div>
                                    <div class="col-lg-7"><p>N° de pedido: <?php echo $items['id_pedido']?></p><p>fecha de compra:<?php echo $items['fecha']?> </p>
                                    <form method="post" action="valoracion.php">
                                        <input type="hidden" name="producto_id" value="<?php echo $items['id'];?>">
                                            <input type="hidden" name="pedido_id" value="<?php echo $items['id_pedido'];?>">
                                       <button type="submit" class="primary-btn">Calificar</button>

                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
    <?php }?>