<?php
require  'database.php';
$id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $cuil=$_POST['cuil'];
    $nick=$_POST['nick'];
    $email=$_POST['email'];
    $calle=$_POST['calle'];
    $altura=$_POST['altura'];
    $localidad=$_POST['localidad'];
    $pass = $_POST['pass'];
    $pass = sha1($pass);
$q="UPDATE usuario SET nombre='$nombre',apellido='$apellido', cuil='$cuil', nick='$nick', email='$email',calle='$calle',altura='$altura',localidad='$localidad',pass='$pass' WHERE id='$id';";
if (mysqli_query($conexion, $q)) {
    echo "New record created successfully";
    header("location:admin.php");
}    else {
    echo "Error: " . $q . "<br>" . mysqli_error($conexion);
}
