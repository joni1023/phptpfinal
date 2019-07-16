<?php
require '../database.php';
$iditem=$_POST['iditem'];
$publico="publico";
$q="SELECT * FROM mensaje where (id_item=$iditem and metodo like '$publico')and id_respuesta is null ";
$respuesta=mysqli_query($conexion,$q);
$w="select * from mensaje where id_item=$iditem; ";
$mensajerespuesta=mysqli_query($conexion,$w);
if(!$respuesta){
    die("error en la query".mysqli_error($conexion));
}
$json= array();

while($row = mysqli_fetch_array($respuesta)){

    $json[]= array(
        'remitente' => $row['remitente'],
        'mensaje' => $row['mensaje'],
        'fecha' => $row['fecha']
    );
    $idrow=$row['id'];
    if($mensajerespuesta){
    while ($col=mysqli_fetch_array($mensajerespuesta)){

        $idcol=$col['id_respuesta'];

        if( $idrow == $idcol){
            $json[]= array(
                'remitente' => $col['remitente'],
                'mensaje' => $col['mensaje'],
                'fecha' => $col['fecha']
            );

        }
    }
            }
}
$jsonstring=json_encode($json);
echo $jsonstring;
