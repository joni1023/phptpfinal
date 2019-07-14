

<?php
//para no ingresar a la pagina por la url
session_start();
if (!isset($_SESSION['rol'])){
    header("location:index.php");
}
require 'header.php'; ?>

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
    <td><button type='button' onclick='borrarProducto(".$row['id'].")'  class='btn btn-danger'>Borrar</button></td>
</tr>";
            $sumador=$sumador+$subtotal;
        }


        ?>
        </tbody>

    </table>
    <?php  echo "<h4>el total de sucompra es: ".$sumador."$</h4>"; ?>
    <form action="pasocompra.php" method="post">
        <input type="hidden" name="totalPedido" value="<?php echo $sumador;?>">
        <button type="submit" style="margin-left: 25%; width: 50%;margin-top: 5%" class="primary-btn order-submit" >Continuar con la compra</button>
    </form>
</div>
</div>


<?php include 'footer.php'; ?>