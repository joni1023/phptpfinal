<?php
include 'database.php';

$item=$_POST['itemb'];

$q="SELECT * FROM item WHERE nombre LIKE '$item%'";
$consulta = mysqli_query($conexion,$q);
$result = mysqli_query($conexion, "SELECT * FROM imagen_item where id_item='$var_value'");

    require 'header.php';
echo "<body>";
    while ($row = mysqli_fetch_array($consulta)) {
        echo"<article class='producto'>";
        echo "<a href='verproducto.php?varname=".$row['id']."'><img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' alt='producto' ></a>";

        echo" <h2 class='nombre'>". $row['nombre'] . "</h2>
    <div class='marca'>". $row['descripcion'] . "</div>
    <div class='precio'>$". $row['precio'] . "</div>
    <a href='verproducto.php?varname=".$row['id']."' class='btn'>Ver producto</a>
    </article>";
    }




