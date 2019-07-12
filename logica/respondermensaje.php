<?php
require '../database.php';

$idmsj=$_POST['idmsj'];
$respuesta=$_POST['respuesta'];
$iditemmsj=$_POST['iditemmsj'];
$metodoR=$_POST['metodoR'];
$leido="si";
$m="update mensaje SET leido='$leido' WHERE id='$idmsj'; ";
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha=date("Y-m-d H:i:s");
$mod=mysqli_query($conexion,$m);
$q="insert into mensaje (mensaje,id_respuesta,id_item,metodo,fecha,remitente) values ('$respuesta','$idmsj','$iditemmsj','$metodoR','$fecha','vendedor'); ";
if (mysqli_query($conexion, $q)) {
    echo "New record created successfully";
    header("location:../preguntaVenta.php");
}    else {
    echo "Error: " . $q . "<br>" . mysqli_error($conexion);
}
