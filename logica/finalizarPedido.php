<?php
require '../database.php';
//si se pone en resumen hay que sacar el session star
session_start();
$usuarioid=$_SESSION['user_id'];
// guardar pedido
$total=$_POST['total'];
$direccion=$_POST['direccion'];
$tipoEntrega=$_POST['tipoEntrega'];
if($tipoEntrega==1){
$direccion="Envio a domicilio";
}
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha=date("Y-m-d H:i:s");
mysqli_query($conexion,"insert into pedido (id_usuario,direccion,total,fecha) values ('$usuarioid','$direccion','$total','$fecha')");
// traigo id del pedido el ultimo
$pedido=mysqli_query($conexion,"SELECT MAX(id) as id FROM pedido where id_usuario=".$usuarioid." ; ");
$pedi=mysqli_fetch_array($pedido);
$id_Pedido=$pedi['id'];
// traigo el carrito y lo envio a pedido item
$result = mysqli_query($conexion, "SELECT * FROM carrito where id_usuario=".$_SESSION['user_id']);
while ($row=mysqli_fetch_array($result)){
//    agrego lo del carrito al pedido item
    $id_item=$row['id_item'];
    $cantidad=$row['cantidad'];
    mysqli_query($conexion,"insert into pedido_item (id_pedido,id_item,cantidad) values ('$id_Pedido','$id_item','$cantidad')");
    // descontar cantidad del item


    $cantidadItemCargado=mysqli_fetch_array(mysqli_query($conexion,"select cantidad from item "));
    $nuevaCantidad=$cantidadItemCargado['cantidad']-$cantidad;
    mysqli_query($conexion,"update item set cantidad=".$nuevaCantidad." where id=".$id_item."");
}


// borro la tabla carrito
$sql = "DELETE FROM carrito WHERE id_usuario='$usuarioid';";
mysqli_query($conexion, $sql);
//comision 4%
$comision=$total*0.04;
$querycomision = "INSERT INTO comision(id_usuario,id_item,cantidad_item,total_venta,total_comision,fecha) VALUES ('$usuarioid','$id_item','$cantidad','$total','$comision',now())";
mysqli_query($conexion, $querycomision);
header("location:../resumenUsuario.php");
