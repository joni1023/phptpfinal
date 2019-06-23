<?php
require 'database.php';
$result=mysqli_query($conexion,"SELECT * FROM item LIMIT 3");
while ($row = mysqli_fetch_array($result)) {
    echo"
<div class='col-md-4 col-xs-6'>
    <div class='shop'>
        <div class='shop-img'>";
    $resultImage = mysqli_fetch_array(mysqli_query($conexion, "SELECT imagen FROM imagen_item where id_item='$row[id]' and principal=1"));
         echo"   <img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' WIDTH='600px' height='400px' alt='producto'>
        </div>
        <div class='shop-body'>
            <h3>". $row['nombre'] . "<br>". $row['descripcion'] . "</h3>
            <a href='detalleproducto.php?id=".$row['id']."' class='cta-btn'>Comprar <i class='fa fa-arrow-circle-right'></i></a>
        </div>
    </div>
</div>";
}
