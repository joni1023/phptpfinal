<?php
if (isset($_POST['submit'])) {

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cuil=$_POST['cuil'];
    $email = $_POST['email'];
    $nick = $_POST['nick'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $calle=$_POST['calle'];
    $altura=$_POST['altura'];
    $localidad=$_POST['localidad'];

// primero se valida que no esten vacios
    if ($nick != null && $pass != null && $repass != null) {
        if ($pass === $repass) {
            require 'database.php';
            $pass = sha1($pass);
            mysqli_query($conexion, "INSERT INTO usuario (email,nick,pass)VALUES ('$email','$nick','$pass')");
            mysqli_close($conexion);
            header("location:index.php");
        } else {
            echo "introdusca contraseñas iguales";
        }
    } else {
        echo "rellene todos los campos";

    }

}else{
    header("location:registrar.php");
}
