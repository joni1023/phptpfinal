<?php
if (isset($_POST['submit'])){

$numero=$_POST['number'];
$comentario=$_POST['comentarios'];
$userid = $_POST['usuario'];
$producto_Id2=$_POST['productoId'];
$pedido_Id=$_POST['pedidoId'];
require 'database.php';





$q="INSERT INTO valoracion(id_pedido,id_item,id_usuarioVendedor,comentario,valoracion) VALUES('$pedido_Id','$producto_Id2','$userid','$comentario','$numero');";

 $consulta2=mysqli_query($conexion,$q);
}


header("location:resumenUsuario.php");
?>