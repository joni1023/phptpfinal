<?php
require 'database.php';
$result=mysqli_query($conexion,"SELECT DISTINCT categoria FROM item");
while ($row = mysqli_fetch_array($result)) {
    echo"<li><a href='vercategorias.php?cat=". $row['categoria'] . "'>". $row['categoria'] . "</a></li>";
}
