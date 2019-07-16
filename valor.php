<?php
if (isset($_POST['submit'])){

$numero=$_POST['number'];
$comentario=$_POST['comentarios'];
$userid = $_POST['usuario'];


require 'database.php';


    $consulta=mysqli_query($conexion,"select * from usuario where id=".$usuarioid.";");
    $consulta2=mysqli_query($conexion,"select * from usuario inner join item  on (usuario.id=".$usuarioid.")=item.id_usuario)";
    $consulta3=mysqli_query($conexion,"select * from usuario inner join pedido  on (usuario.id=".$usuarioid.")=pedido.id_usuario;");
    $row=mysqli_fetch_array($consulta);
    $row2=mysqli_fetch_array($consulta2);
    $row2=mysqli_fetch_array($consulta3);


$q="INSERT INTO VALORACION(id_pedido,id_item,id_usuarioVendedor,comentario,valoracion) VALUES('$row3['id']','$row2['id']','$row['id']','$comentario','$numero');";

 $consulta4=mysqli_query($conexion,$q);
}


header("location:resumenUsuario.php");
?>