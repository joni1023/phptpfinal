<?php
$var_value = $_GET['varname'];
// Create database connection
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$result = mysqli_query($db, "SELECT * FROM imagen_item where id_item='$var_value'");

echo"<ul id='galeria'>";
while ($row = mysqli_fetch_array($result)) {
    echo"<li><img src='data:image/jpeg;base64,".base64_encode($row['imagen'] )."' alt='' /></li>";
}
$resultImage = mysqli_fetch_array(mysqli_query($db, "SELECT  * FROM item where id='$var_value'"));
echo "
</ul>
</div>
<div>
    <h2>Nombre</h2>
    <p>".$resultImage['nombre']."</p>
    <h2>Descripcion</h2>
    <p>".$resultImage['descripcion']."</p>
    <h2>Categoria</h2>
    <p>".$resultImage['categoria']."</p>
    <h2>Precio</h2>
    <h3> $ ".$resultImage['precio']."</h3>
</div>
";


