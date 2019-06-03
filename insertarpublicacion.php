<?php
//para no ingresar a la pagina por la url
session_start();
if (!isset($_SESSION['rol'])){
    header("location:index.php");
}
if($_SESSION['rol']!="normal"){
    header("location:index.php");
}
////
// Create database connection
$db = mysqli_connect("localhost", "root", "", "tp_pw");

// If upload button is clicked ...
if (isset($_POST['publicar'])) {

    // Get image name
    $image1 = $_FILES['image1']['name'];
    //$image2 = $_FILES['image2']['name'];
    //$image3 = $_FILES['image3']['name'];
    //$image4 = $_FILES['image4']['name'];
    //$image5 = $_FILES['image5']['name'];
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($db, $_POST['categoria']);
    $estado = mysqli_real_escape_string($db, $_POST['estado']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);


    // image file directory
    $target = "img/".basename($image1);

    $sql = "INSERT INTO item (id_usuario,nombre,descripcion,categoria,estado,precio,imagen) VALUES (1,'$nombre','$descripcion','$categoria','$estado','$precio','$image1')";

    // execute query
    mysqli_query($db, $sql);
}

?>sd