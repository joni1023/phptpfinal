<?php
require 'database.php';
$usuario=$_POST['usuario'];
$pass= $_POST['pass'];
//lo de abajo es para el cifrado de la clave pero aun no funciona
$passconvertida=sha1($pass);


$q ="SELECT COUNT(*) as contar from usuario WHERE nick='$usuario' and pass='$passconvertida' ";
$consulta = mysqli_query($conexion,$q);

$array= mysqli_fetch_array($consulta);
if($array['contar']>0){
    session_start();
    $_SESSION['username']=$usuario;
    header("location:home.php");
}else{
    header("location:index.php");

}




?>