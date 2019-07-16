
<?php
require 'header.php';
$usuarioid=$_SESSION['user_id'];
$produc_id=$_POST['producto_id'];
$pedido_id=$_POST['pedido_id'];


?>


<!-- SECTION -->
<div class="section">

    <!-- container -->
    <div class="container">
        <form method="post" action="valor.php" class="form-row">
            <div class="col-lg-6">
                <h3>Califique del 1 al 5</h3>
                <div class="form-group">
                    <label>Valoracion</label>
                    <input type="number" name="number"  min="1" max="5" class="form-rounded" required>
                </div>
                <h3>Comente su Experiencia</h3>
                <div class="form-group">
                    <textarea name="comentarios" rows="10" cols="40">Escribe aquí tus comentarios</textarea>
                </div>
                <input type="hidden" name="usuario" value="<?php echo $produc_id;?>">
                <input type="hidden" name="productoId" value="<?php echo $produc_id;?>">
                <input type="hidden" name="pedidoId" value="<?php echo $pedido_id;?>">
                <input type="submit" class="btn btn-primary btn-lg active" name="submit" value="Enviar">
            </div>
        </form>
    </div>
<!-- SECTION -->
<div class="section">
    <!-- container -->

    <!-- /container -->
</div>

</div>
<!-- /SECTION -->
<?php require 'footer.php'; ?>