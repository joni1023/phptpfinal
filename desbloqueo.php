<?php
session_start();
if(isset($_SESSION['username'])){
        include 'database.php';

        $id = $_POST['id'];
        $s="select * from usuario where id=$id";
        $consulta=mysqli_query($conexion,$s);
        $row=mysqli_fetch_array($consulta);
        if($row['estado']=='Bloqueado'){

            $q = "UPDATE usuario SET  estado='Disponible' where id=$id";

            if (mysqli_query($conexion, $q)) {
                header("location:admin.php");
            }

        }else{
            header("location:admin.php");
        }

}

