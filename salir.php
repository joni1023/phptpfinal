<?php
session_start();
if(isset($_SESSION['user_id']))
{
    $userId=$_SESSION['user_id'];
}
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$userId=$_SESSION['user_id'];
$sql = "DELETE FROM carrito WHERE id_usuario='$userId';";
mysqli_query($db, $sql);
session_destroy();
    header("location:index.php");
    exit();
