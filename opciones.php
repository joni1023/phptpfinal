<?php
session_start();
if(isset($_SESSION['username'])){
    if(isset($_POST['botone']))
    {
        include 'database.php';
        $id=$_POST['id'];
        $q="UPDATE usuario SET  estado='Bloqueado' where id=$id";

        if(mysqli_query($conexion,$q)){
            header("location:admin.php");
        }
    }else{
        header("location:index.php");
    }

}
