<?php

$nombre=$_POST['nombre'];
$nick=$_POST['nick'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];


//falta poner is empty para que no sea vacio
if($nick!=null&&$pass!=null&&$repass!=null){
    if ($pass===$repass){
        require 'connect_db.php';
        $pass=md5($pass);
        mysqli_query($link,"INSERT INTO registro (nombre,nick,pass)VALUES ('$nombre','$nick','$pass')");
        mysqli_close($link);
        echo "se ha registrado exitosamente";
    }else{
        echo "introdusca contraseñas iguales";
    }
}else{
    echo "rellene todos los campos";
}


