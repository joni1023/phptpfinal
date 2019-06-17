<?php
require 'database.php';
$usuario=$_POST['usuario'];
$pass= $_POST['pass'];
//lo de abajo es para el cifrado de la clave pero aun no funciona
$passconvertida=sha1($pass);
$q="select * from usuario where nick='$usuario' and pass='$passconvertida'";
//$q ="SELECT COUNT(*) as contar from usuario WHERE nick='$usuario' and pass='$passconvertida' ";
$consulta = mysqli_query($conexion,$q);

if(mysqli_num_rows($consulta)){
    $array= mysqli_fetch_array($consulta);
    if($array['estado']=="bloqueado"){
        echo "<script>window.location.href='login.php';alert('There are no fields to generate a report');</script>";
    }
    else{
        session_start();
        if($array[rol]== "admin"){
//       usario administrador
            $_SESSION['rol']=$array[rol];
            $_SESSION['username']=$array[nick];
            $_SESSION['user_id']=$array[id];
            $_SESSION['carrito']=0;
            header("location:admin.php");
        }else{
//       usuario normal
            $_SESSION['username']=$array[nick];
            $_SESSION['rol']=$array[rol];
            $_SESSION['user_id']=$array[id];
            $_SESSION['carrito']=0;
            header("location:index.php");
        }
    }
}else{
//    usuario no encontrado
    header("location:login.php");

}




?>