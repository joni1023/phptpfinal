<?php


$consulta=mysqli_query($conexion,"select comentario,valoracion,usuario.nick as comprador from valoracion inner join item on valoracion.id_item=item.id inner join pedido on valoracion.id_pedido=pedido.id inner join usuario on usuario.id=pedido.id_usuario where item.id='$product_id';");

$sumatoria=0;
while($row=mysqli_fetch_array($consulta)){

   
    $sumatoria=$sumatoria+$row['valoracion'];
}
$cantidadx=mysqli_num_rows($consulta);
$cantidadx;

$valor=$sumatoria/$cantidadx;

if($valor>3){

  echo  "usuario TOP";

}else if($valor<2){

   echo "usuario Medio pelo ";

} else{
   echo "usuario Medio ";
};
