

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
    <button type="button" class="btn btn-success" id="show" style="margin-left: 25%; width: 50%;margin-top: 5%">Contnuar con la compra</button>
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
<div class="col-lg-12" id="mediodepago" hidden>
    <div class="col-lg-12">
        <h2>Medio de Pago</h2>
    </div>
    <div class="col-lg-6">
        <div><h3>Mercadopago:</h3></div>
        <form action="" method="post" id="pay" name="pay" >
            <fieldset>
                <ul>
                    <li>
                        <label for="email">Email</label>
                        <input id="email" name="email" value="test_user_19653727@testuser.com" type="email" placeholder="your email"/>
                    </li>
                    <li>
                        <label for="cardNumber">Credit card number:</label>
                        <input type="text" id="cardNumber" data-checkout="cardNumber" placeholder="4509 9535 6623 3704" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                    </li>
                    <li>
                        <label for="securityCode">Security code:</label>
                        <input type="text" id="securityCode" data-checkout="securityCode" placeholder="123" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                    </li>
                    <li>
                        <label for="cardExpirationMonth">Expiration month:</label>
                        <input type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="12" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                    </li>
                    <li>
                        <label for="cardExpirationYear">Expiration year:</label>
                        <input type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="2015" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                    </li>
                    <li>
                        <label for="cardholderName">Card holder name:</label>
                        <input type="text" id="cardholderName" data-checkout="cardholderName" placeholder="APRO" />
                    </li>
                    <li>
                        <label for="docType">Document type:</label>
                        <select id="docType" data-checkout="docType"></select>
                    </li>
                    <li>
                        <label for="docNumber">Document number:</label>
                        <input type="text" id="docNumber" data-checkout="docNumber" placeholder="12345678" />
                    </li>
                </ul>
                <input type="hidden" name="paymentMethodId" />
                <input type="submit" value="Pay!" />
            </fieldset>
        </form>

    </div>
    <div class="col-lg-6">
        <div><h3>Otro metodo:</h3></div>

    </div>
    <button type="submit}" class="btn btn-success"  style="margin-left: 25%; width: 50%;margin-top: 5%">finalizar la compra</button>

</div>
<p>fin de pagina</p>
</body>
<script>
    $(document).ready(function(){
        $("#show").click(function(){
            $("#metodoEntrega").fadeIn();
        });
        $("#show2").click(function(){
            $("#mediodepago").fadeIn();
        });
    });
    Mercadopago.setPublishableKey("TEST-b3d5b663-664a-4e8f-b759-de5d7c12ef8f");
    Mercadopago.getIdentificationTypes();
    function guessingPaymentMethod(event) {
        var bin = getBin();

        if (event.type == "keyup") {
            if (bin.length >= 6) {
                Mercadopago.getPaymentMethod({
                    "bin": bin
                }, setPaymentMethodInfo);
            }
        } else {
            setTimeout(function() {
                if (bin.length >= 6) {
                    Mercadopago.getPaymentMethod({
                        "bin": bin
                    }, setPaymentMethodInfo);
                }
            }, 100);
        }
    };

</script>
</html>