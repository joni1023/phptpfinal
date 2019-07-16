<?php
 
$dataPointsbusqueda = array(
);

require '././database.php';
$query = mysqli_query($conexion, "SELECT DISTINCT busqueda as busqueda,count(*)as total FROM estadisticas where busqueda <> ''");
while ($row = mysqli_fetch_array($query))
                    {
					array_push($dataPoints,array("y" => $row['total'], "label" => $row['busqueda']));                    
                    }
?>
