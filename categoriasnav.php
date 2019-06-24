<?php
require 'database.php';
$result=mysqli_query($conexion,"SELECT DISTINCT categoria FROM item");
$counter = 1;
while ($row = mysqli_fetch_array($result)) {
    if($counter == 1) {
        echo"<li class='active'><a data-toggle='tab' href='#tab1'>". $row['categoria'] . "</a></li>";
    }
    else
    {
        echo"<li><a data-toggle='tab' href='#tab".$counter."'>". $row['categoria'] . "</a></li>";
    }
    ++$counter;
}
