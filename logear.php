<?php

require 'database.php';

session_start();

$usuario=$_POST['usuario'];
$pass=$_POST['pass'];

$q ="SELECT COUNT(*) as contar from usuarios WHERE nombreusuario='$usuario' and pass='$pass' ";
$consulta = mysqli_query($conexion,$q);
$array= mysqli_fetch_array($consulta);

if($array['contar']>0){
    $_SESSION['username']=$usuario;
    header("location:home.php");
}else{
//    $error="constraseña incorrecta";
//    header("location:index.php");
    echo "datos incorrectos";
}




?>