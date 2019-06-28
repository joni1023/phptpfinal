<?php
include 'database.php';
$categoria = $_GET['cat'];
if($categoria=="Ofertas"){
    $consulta = mysqli_query($conexion,"SELECT * FROM item order by categoria");
}
if($categoria=="Todas"){
    $consulta = mysqli_query($conexion,"SELECT * FROM item order by categoria");
}
if($categoria!="Ofertas" && $categoria!="Todas"){
    $consulta = mysqli_query($conexion,"SELECT * FROM item where categoria='$categoria'");
}
require 'header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <?php
        if($categoria=="Ofertas"){
            echo"<h3>Ofertas</h3>";
        }
        if($categoria=="Todas"){
            echo"<h3>Todas las Categorias</h3>";
        }
        if($categoria!="Ofertas" && $categoria!="Todas"){
            echo"<h3>$categoria</h3>";
        }
        ?>
    </div>
    <div class="col-lg-3">
        <label>  </label>
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

