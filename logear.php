<?php
require 'database.php';
$usuario=$_POST['usuario'];
$pass= $_POST['pass'];
//lo de abajo es para el cifrado de la clave pero aun no funciona
$passconvertida=sha1($pass);

$q="select * from usuario where nick='$usuario' and pass='$passconvertida'";
//$q ="SELECT COUNT(*) as contar from usuario WHERE nick='$usuario' and pass='$passconvertida' ";
$consulta = mysqli_query($conexion,$q);

$array= mysqli_fetch_array($consulta);
if(count($array)>0){
    session_start();
   if($array[rol]== "admin"){
//       usario administrador
       $_SESSION['rol']=$array[rol];
       $_SESSION['username']=$array[nick];
       header("location:index.php");
   }else{
//       usuario normal
       $_SESSION['username']=$array[nick];
       $_SESSION['rol']=$array[rol];
       header("location:home.php");
   }
}else{
//    usuario no encontrado
    header("location:index.php");

}




?>