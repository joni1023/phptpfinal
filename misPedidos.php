<?php
//si se pone en resumen hay que sacar el session star
session_start();
$usuarioid=$_SESSION['user_id'];
require 'database.php';
$pedidosUsuario=mysqli_query($conexion,"select * from pedido where id_usuario=".$usuarioid.";");
while ($row=mysqli_fetch_array($pedidosUsuario)){
    echo "mi pedidos numero".$row['id']."<br> y el total es: ". $row['total'];
}