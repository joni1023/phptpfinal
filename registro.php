<?php

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$sexo=$_POST['sexo'];
$cuil=$_POST['cuil'];
$nick=$_POST['nick'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$email=$_POST['email'];
$calle=$_POST['calle'];
$altura=$_POST['altura'];
$localidad=$_POST['localidad'];


if($nick!=null&&$pass!=null&&$repass!=null){
    if ($pass===$repass){
        require 'database.php';
        $pass=sha1($pass);
        mysqli_query($conexion,"INSERT INTO usuario (nombre,apellido,sexo,cuil,nick,pass,email
                        ,calle,altura,localidad)VALUES ('$nombre','$apellido','$sexo','$cuil','$nick',
                        '$pass','$email','$calle','$altura','$localidad')");
        mysqli_close($conexion);
        header("location:index.php");
    }else{
        echo "introdusca contraseñas iguales";
    }
}else{
    echo "rellene todos los campos";
}


