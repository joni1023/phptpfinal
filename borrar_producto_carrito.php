<?php

$item_id = $_POST['id'];
if (!isset($_SESSION)) session_start();
if(isset($_SESSION['user_id']))
{
    $userId=$_SESSION['user_id'];
    $_SESSION['carrito']=$_SESSION['carrito']-1;
}
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$userId=$_SESSION['user_id'];
$sql = "DELETE FROM carrito WHERE id_usuario='$userId' and id='$item_id';";
mysqli_query($db, $sql);
