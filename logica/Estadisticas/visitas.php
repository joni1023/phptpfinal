<?php
 
$dataPoints = array(
);

require '././database.php';
$query = mysqli_query($conexion, "SELECT fecha as Fecha, COUNT(*) as Total FROM estadisticas GROUP BY Fecha ORDER BY Fecha");
while ($row = mysqli_fetch_array($query))
                    {
					array_push($dataPoints,array("y" => $row['Total'], "label" => $row['Fecha']));                    
                    }
?>