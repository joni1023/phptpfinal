<?php

// Create database connection
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$result = mysqli_query($db, "SELECT * FROM item where estado='activo'");


while ($row = mysqli_fetch_array($result)) {
    echo"<article class='producto'>";
    $resultImage = mysqli_fetch_array(mysqli_query($db, "SELECT  imagen FROM imagen_item where id_item='$row[id]' and principal=1"));
        echo " <img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' alt='Producto1'>";

    echo"    <h2 class='nombre'>". $row['nombre'] . "</h2>
    <div class='marca'>". $row['descripcion'] . "</div>
    <div class='precio'>$". $row['precio'] . "</div>
    <a href='#' class='btn'>Ver producto</a>
    </article>";
}





