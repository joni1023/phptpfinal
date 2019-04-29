<?php
session_start();
$usuario=$_SESSION['username'];
if(!isset($usuario)){
    location("location:index.php");

}else {
    echo "<h2>bienvenido $usuario</h2>";
    echo "<a href='salir.php'>salir</a>";
}
