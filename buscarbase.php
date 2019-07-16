<?php
include 'database.php';
if(isset($_POST['buscar'])){
    $buscar=$_POST['buscar'];
    $buscarpor=$_POST['buscarpor'];
    if(!empty($buscar)){
        if ($buscarpor=="producto"){
            $q="SELECT * FROM item WHERE nombre LIKE '$buscar%' ";
        }elseif ($buscarpor=="usuario"){
            $q="SELECT * FROM usuario WHERE nombre LIKE '$buscar%' ";
////no me toma la categoria y hay q refrescar la pagina para elegir si no toma siempre la mis consulata de buscar por
        }elseif ($buscarpor=="categoria"){
            $q="select categoria as nombre from item where categoria LIKE '$buscar%' group by categoria ";
        }
        $resultado= mysqli_query($conexion,$q);
        if(!$resultado){
            die("error en la query".mysqli_error($conexion));
        }
        $json= array();
        while($row = mysqli_fetch_array($resultado)){
            $json[]= array(
                'nombre' => $row['nombre'],
            );
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
    }
}else{
    echo "no recibe nada";
}