<?php

    $item_id = $_POST['id'];
    $cantidad = $_POST['cantidad'];
    if (!isset($_SESSION)) session_start();
    if(isset($_SESSION['user_id']))
    {
    $userId=$_SESSION['user_id'];
    }
    if(isset($_SESSION['carrito']))
    {
        $_SESSION['carrito']=$_SESSION['carrito']+1;
    }
    $db = mysqli_connect("localhost", "root", "", "tp_pw");
    $userId=$_SESSION['user_id'];
    $sql = "INSERT INTO carrito (id_usuario,id_item,cantidad) VALUES ($userId,'$item_id',$cantidad);";
    mysqli_query($db, $sql);