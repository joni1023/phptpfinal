<?php

// Create database connection
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$result = mysqli_query($db, "SELECT * FROM item");


while ($row = mysqli_fetch_array($result)) {
    echo"
<article class='producto'>
    <img src='img/". $row['imagen'] ."' alt='Producto1'>
    <h2 class='nombre'>". $row['nombre'] . "</h2>
    <div class='marca'>". $row['descripcion'] . "</div>
    <div class='precio'>$". $row['precio'] . "</div>
    <a href='#' class='btn'>Agregar Al Carrito</a>
</article>";
}




