<?php
require '../database.php';
$mensaje=$_POST['mensaje'];
$iditem=$_POST['iditem'];
$remitente=$_POST['remitente'];
$metodomensaje=$_POST['metodomensaje'];
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha=date("Y-m-d H:i:s");

$q="insert into mensaje (id_item,remitente,mensaje,metodo,fecha) values ('$iditem','$remitente','$mensaje','$metodomensaje','$fecha');";
$respuesta=mysqli_query($conexion,$q);
echo "si si logrado";