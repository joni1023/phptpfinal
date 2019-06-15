<?php


if(isset($_POST['action']) && !empty($_POST['action'])) {
    $item_id = $_POST['id'];
    $db = mysqli_connect("localhost", "root", "", "tp_pw");
    $sql = "INSERT INTO carrito (id_usuario,id_item,cantidad) VALUES (1,'$item_id',1);";
    mysqli_query($db, $sql);
}