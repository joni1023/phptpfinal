<?php
$var_value = $_GET['varname'];
// Create database connection
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$result = mysqli_query($db, "SELECT * FROM imagen_item where id_item='$var_value'");

while ($row = mysqli_fetch_array($result)) {
    echo"<div class='mySlides'>
                <img src='data:image/jpeg;base64,".base64_encode($row['imagen'] )."' >
            </div>";
}
echo"<div class='row2'>";
$contador=0;
$result = mysqli_query($db, "SELECT * FROM imagen_item where id_item='$var_value'");
while ($row = mysqli_fetch_array($result)) {
    $contador=$contador+1;
    echo "<div class='column'>
                    <img class='demo cursor' src='data:image/jpeg;base64,".base64_encode($row['imagen'] )."'  onmouseover='currentSlide($contador)'  alt='The Woods'>
                </div>";
}
echo"</div> </div> </div>";
$resultImage = mysqli_fetch_array(mysqli_query($db, "SELECT  * FROM item where id='$var_value'"));
echo "    <div class='column_right' >
        <h2>".$resultImage['nombre']."</h2>
        <h3> $ ".$resultImage['precio']."</h3>
        <br>
        <br>
        <br>
    <h4>Entrega</h4>
    <p>".$resultImage['tipo_entrega']."</p>
    <br>
    <h4>Descripcion</h4>
    <p>".$resultImage['descripcion']."</p>
    
    <h5>Categoria</h5>
    <p>".$resultImage['categoria']."</p>
    <br>
    <a href='#' class='btn'>Agregar al carrito</a>
    </div>";


//    <a href='vercarrito.php?id=".$resultImage['id']."' class='btn'>Agregar al carrito</a>



