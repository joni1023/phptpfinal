<?php
// Create database connection
$db = mysqli_connect("localhost", "root", "", "tp_pw");

// If upload button is clicked ...
if (isset($_POST['publicar'])) {

    // Get image name
    $image = $_FILES['image']['name'];
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($db, $_POST['categoria']);
    $estado = mysqli_real_escape_string($db, $_POST['estado']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);


    // image file directory
    $target = "img/".basename($image);

    $sql = "INSERT INTO item (id_usuario,nombre,descripcion,categoria,estado,precio,imagen) VALUES (1,'$nombre','$descripcion','$categoria','$estado','$precio','$image')";

    // execute query
    mysqli_query($db, $sql);
}

?>