<?php
include 'database.php';
if(!isset($_POST)){
    header("location:index.php");
}
$item=$_POST['itemb'];

$q="SELECT * FROM item WHERE nombre LIKE '$item%'";
$consulta = mysqli_query($conexion,$q);
    require 'header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h3>Relacionados</h3>
    </div>
<div class="col-lg-3">
    <h2><?php echo $_POST['itemb']; ?></h2>
    <label> <?php $numresult=(mysqli_num_rows($consulta));

        echo $numresult." resultados" ; ?> </label>
</div>
    <div class="col-lg-9" style="height: 120px"></div>
    <div class="col-lg-3"></div>
<div class="col-lg-9">
<?php
    while ($row = mysqli_fetch_array($consulta)) {
        $resultImage = mysqli_fetch_array(mysqli_query($conexion, "SELECT imagen FROM imagen_item where id_item='$row[id]' and principal=1"));

        echo"<div class='row'>";
        echo "<div class='col-lg-4'><a href='verproducto.php?varname=".$row['id']."'><img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' height='120px' width='100px' ></a></div>";

        echo" <div class='col-lg-8'><h2 class='nombre'>". $row['nombre'] . "</h2></div>
    <div class='marca'>". $row['descripcion'] . "</div>
    <div class='precio'>$". $row['precio'] . "</div>
    <a href='verproducto.php?varname=".$row['id']."' class='btn'>Ver producto</a>
    </div>";
    }
?>
</div>
</div>

