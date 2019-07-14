<?php
require 'database.php';
$result=mysqli_query($conexion,"SELECT nombre FROM categorias");
while ($row = mysqli_fetch_array($result)) {
    echo"<li><a href='vercategorias.php?cat=". $row['nombre'] . "'>". $row['nombre'] . "</a></li>";
}
