

<?php
//para no ingresar a la pagina por la url
session_start();
if (!isset($_SESSION['rol'])){
    header("location:index.php");
}
if (!isset($_SESSION)) session_start();
require  'database.php';
require 'header.php'; ?>

<div>
<div class="container">
    <h2>Resumen de Comision por ventas</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Comision</th>
            <th>Total Venta</th>
			<th>Fecha</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $result = mysqli_query($conexion, "SELECT * FROM comision where id_usuario=".$_SESSION['user_id']);

        while ($row = mysqli_fetch_array($result)) {
            $resultImage = mysqli_fetch_array(mysqli_query($conexion, "SELECT * FROM item where id='$row[id_item]'"));
            echo "
<tr>
    <td>".$resultImage['nombre']."</td>
    <td>".$resultImage['descripcion']."</td>
    <td>$ ".$resultImage['precio']."</td>
    <td>" . $row['cantidad_item'] . "</td>
    <td>$  " . $row['total_comision'] . "         </td>
    <td>$  " . $row['total_venta'] . "         </td>
	 <td>" . $row['fecha'] . "</td>
</tr>";
        }


        ?>
        </tbody>

    </table>
    <form action="index.php" method="post">
        <button type="submit" style="margin-left: 25%; width: 50%;margin-top: 5%" class="primary-btn order-submit" >Volver</button>
    </form>
</div>
</div>


<?php include 'footer.php'; ?>