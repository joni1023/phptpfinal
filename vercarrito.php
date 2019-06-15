

<?php
//para no ingresar a la pagina por la url
session_start();
if (!isset($_SESSION['rol'])){
    header("location:index.php");
}
require 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box}
        body {font-family: "Lato", sans-serif;}

    </style>
</head>
<body>
<div class="container">
    <h2>Productos en Carrito</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php


        // Create database connection
        $db = mysqli_connect("localhost", "root", "", "tp_pw");
        $result = mysqli_query($db, "SELECT * FROM carrito where id_usuario=".$_SESSION['user_id']);


        while ($row = mysqli_fetch_array($result)) {
            $resultImage = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM item where id='$row[id_item]'"));
            echo "
<tr>
    <td>".$resultImage['nombre']."</td>
    <td>".$resultImage['descripcion']."</td>
    <td>$ ".$resultImage['precio']."</td>
    <td><input type='number' value='" . $row['cantidad'] . "'></td>
    <td><button type='button' formaction='' class='btn btn-danger'>Borrar</button></td>
</tr>
<input type='hidden' name='id' value='" . $row['id'] . "'>";
        }
        ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-success" style="margin-left: 25%; width: 50%;margin-top: 5%">Finalizar compra</button>
</div>

</body>
</html>