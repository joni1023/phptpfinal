

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
    <script>
        function agregarProducto(id) {
            var confirmacion = confirm("Estas seguro de borrar este item?");

            if (confirmacion) {
                $.ajax({ url: 'borrar_producto_carrito.php',
                    data: {id: id},
                    type: 'post',
                    success: function(data) {
                        alert("Producto eliminado");
                        location.reload();
                    }
                });
            }
        }
    </script>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

</head>
<div>
<div class="container">
    <h2>Productos en Carrito</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <td>subtotal</td>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php


        // Create database connection
        $db = mysqli_connect("localhost", "root", "", "tp_pw");
        $result = mysqli_query($db, "SELECT * FROM carrito where id_usuario=".$_SESSION['user_id']);

$sumador=null;
        while ($row = mysqli_fetch_array($result)) {
            $resultImage = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM item where id='$row[id_item]'"));
            echo "
<tr>
    <td>".$resultImage['nombre']."</td>
    <td>".$resultImage['descripcion']."</td>
    <td>$ ".$resultImage['precio']."</td>
    <td><input type='number' value='" . $row['cantidad'] . "'></td>
    <td>$  ". $subtotal=$row['cantidad']*$resultImage['precio']    ."         </td>
    <td><button type='button' onclick='agregarProducto(".$row['id'].")'  class='btn btn-danger'>Borrar</button></td>
</tr>";
            $sumador=$sumador+$subtotal;
        }


        ?>
        </tbody>

    </table>
    <?php  echo "<h4>el total de sucompra es: ".$sumador."$</h4>"; ?>
    <a href="pasocompra.php"><button type="submit"  class="btn btn-success" >Contnuar con la compra</button></a>
</div>
<div class="col-lg-12" id="metodoEntrega" style="display: none">
  <div class="col-lg-12">
    <h2>Metodo De Entrega</h2>
  </div>
    <div class="col-lg-6">
        <div><h3>Retirar en la direccion:</h3></div>

    </div>
    <div class="col-lg-6">
        <div><h3>Envio a la direccion:</h3></div>
        <?php $id=$_SESSION['user_id'];
        $consultadirecion= "select * from usuario where id=$id";
        $enviarconsul=mysqli_query($conexion,$consultadirecion);
        $direccion=mysqli_fetch_array($enviarconsul);
        echo $direccion['calle'] ;
        ?>
    </div>
    <button type="button" class="btn btn-success" id="show2" style="margin-left: 25%; width: 50%;margin-top: 5%">Contnuar con la compra</button>

</div>

<p>fin de pagina</p>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $("#show").click(function(){
            $("#metodoEntrega").fadeIn();
        });
        $("#show2").click(function(){
            $("#mediodepago").fadeIn();
        });
    });
</script>
</html>
<?php include 'footer.php'; ?>