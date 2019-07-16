<?php
//si se pone en resumen hay que sacar el session star

$usuarioid=$_SESSION['user_id'];
require 'database.php';
$pedidosUsuario=mysqli_query($conexion,"select * from pedido where id_usuario=".$usuarioid.";");
?>

    <h3>Mis pedidos</h3>
    <div class="container">
<?php while ($row=mysqli_fetch_array($pedidosUsuario)){
?>
        <div class="" style="border: 1px solid #E4E7ED;padding: 15px;">
            <h5>N° de pedido: <?php echo $row['id'];?> </h5>
            <p>fecha:<?php echo $row['fecha'];?> </p><p>Total: <?php echo $row['total'];?> </p>
            <p>enviado a : <?php echo $row['direccion'];?></p><p></p>
        </div>
    <br>
        <?php } ?>
    </div>


