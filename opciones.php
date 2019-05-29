<?php
session_start();
if(isset($_SESSION['username'])){
    if(isset($_POST['botone'])){
        include 'admin.php';
        $id=$_POST['id'];
        $q="delete from usuario where id=$id";

        if(mysqli_query($conexion,$q)){
            header("location:index.php");
        }
    }
}


