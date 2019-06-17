<?php

// If upload button is clicked ...
if (isset($_POST['publicar'])) {
    ////
// Create database connection
    $db = mysqli_connect("localhost", "root", "", "tp_pw");

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
    $entrega = mysqli_real_escape_string($db, $_POST['entrega']);
    $dias =  $_POST['dias'];
    //calcular vencimiento
    $fecha = date('Y-m-j');
    $nuevafecha = strtotime ( '+2 day' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );


    $sql = "INSERT INTO item (id_usuario,nombre,descripcion,categoria,estado,precio,vencimiento,tipo_entrega) VALUES (1,'$nombre','$descripcion','$categoria','activo','$precio','$nuevafecha','$entrega');";
    $file1 = addslashes(file_get_contents($_FILES["image1"]["tmp_name"]));
    mysqli_query($db, $sql);
    $last_id = mysqli_insert_id($db);
    $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file1',1,'$last_id')";
        // execute query
    mysqli_query($db, $query);

    if($_FILES['image2']['size']>0){
    $file2= addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
    $query = "INSERT INTO imagen_item(imagen,principal,id_item)  VALUES ('$file2',0,'$last_id')";
        mysqli_query($db, $query);
    }

    if($_FILES['image3']['size']>0){
        $file3= addslashes(file_get_contents($_FILES["image3"]["tmp_name"]));
        $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file3',0,'$last_id')";
        mysqli_query($db, $query);
    }
    if($_FILES['image4']['size']>0){
        $file4= addslashes(file_get_contents($_FILES["image4"]["tmp_name"]));
        $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file4',0,'$last_id')";
        mysqli_query($db, $query);
    }
    if($_FILES['image5']['size']>0){
        $file5= addslashes(file_get_contents($_FILES["image5"]["tmp_name"]));
        $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file5',0,'$last_id')";
        mysqli_query($db, $query);
    }
    if($_FILES['image6']['size']>0){
        $file6= addslashes(file_get_contents($_FILES["image6"]["tmp_name"]));
        $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file6',0,'$last_id')";
        mysqli_query($db, $query);
    }
    if($_FILES['image7']['size']>0){
        $file7= addslashes(file_get_contents($_FILES["image7"]["tmp_name"]));
        $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file7',0,'$last_id')";
        mysqli_query($db, $query);
    }
    if($_FILES['image8']['size']>0){
        $file8= addslashes(file_get_contents($_FILES["image8"]["tmp_name"]));
        $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file8',0,'$last_id')";
        mysqli_query($db, $query);
    }
    if($_FILES['image9']['size']>0){
        $file9= addslashes(file_get_contents($_FILES["image9"]["tmp_name"]));
        $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file9',0,'$last_id')";
        mysqli_query($db, $query);
    }
    if($_FILES['image10']['size']>0){
        $file10= addslashes(file_get_contents($_FILES["image10"]["tmp_name"]));
        $query = "INSERT INTO imagen_item(imagen,principal,id_item) VALUES ('$file10',0,'$last_id')";
        mysqli_query($db, $query);
    }

    mysqli_close($db);
    header("location:index.php");
}
else{
    echo "Pagina no encontrada";
}
?>