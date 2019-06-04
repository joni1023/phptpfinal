<?php

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $cartArray = array(
        $id
    );
    $_SESSION['carrito'] = $cartArray;
}

echo sizeof($_SESSION['carrito']);

var_dump($_SESSION['carrito']);