<?php

$email=$_POST['email'];
$nick=$_POST['nick'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];


//falta poner is empty para que no sea vacio
if($nick!=null&&$pass!=null&&$repass!=null){
    if ($pass===$repass){
        require 'database.php';
        $pass=sha1($pass);
        mysqli_query($conexion,"INSERT INTO usuario (email,nick,pass)VALUES ('$email','$nick','$pass')");
        mysqli_close($conexion);
        header("location:index.php");
    }else{
        echo "introdusca contraseñas iguales";
    }
}else{
    echo "rellene todos los campos";
}


