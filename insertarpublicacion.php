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
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $image4 = $_FILES['image4']['name'];
    $image5 = $_FILES['image5']['name'];
    $image6 = $_FILES['image6']['name'];
    $image7 = $_FILES['image7']['name'];
    $image8 = $_FILES['image8']['name'];
    $image9 = $_FILES['image9']['name'];
    $image10 = $_FILES['image10']['name'];
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($db, $_POST['categoria']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);

    $sql = "INSERT INTO item (id_usuario,nombre,descripcion,categoria,estado,precio) VALUES (1,'$nombre','$descripcion','$categoria','activo','$precio');";
    $file = addslashes(file_get_contents($_FILES["image1"]["tmp_name"]));
    mysqli_query($db, $sql);
    $last_id = mysqli_insert_id($db);
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file',1,'$last_id')";
        // execute query
    mysqli_query($db, $query);

    if($_FILES['image2']['size']>0){
    $file2= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file2',0,'$last_id')";
    mysqli_query($db, $query);
    }
    if($_FILES['image3']['size']>0){
    $file3= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file3',0,'$last_id')";
    mysqli_query($db, $query);
    }
    if($image4['size']>0){
    $file4= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file4',0,'$last_id')";
    mysqli_query($db, $query);
    }
    if($image5['size']>0){
    $file5= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file5',0,'$last_id')";
    }
    if($image6['size']>0){
    $file6= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file6',0,'$last_id')";
    }
    if($image7['size']>0){
    $file7= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file7',0,'$last_id')";
    }
    if($image8['size']>0){
    $file8= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file8',0,'$last_id')";
    }
    if($image9['size']>0){
    $file9= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file9',0,'$last_id')";
    }
    if($image10['size']>0){
    $file10= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file10',0,'$last_id')";
    }


}

?>