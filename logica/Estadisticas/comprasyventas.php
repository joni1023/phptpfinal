<?php
require '././database.php';
$resultado_ventas = mysqli_query($conexion, "SELECT * FROM pedido");
$resultado_compras_domicilio= mysqli_query($conexion, "SELECT * FROM pedido where direccion='Envio a domicilio'");
$resultado_compras_retira=mysqli_query($conexion, "SELECT * FROM pedido where direccion!='Envio a domicilio'");
$cantidad_ventas= mysqli_num_rows($resultado_ventas);
$cantidad_compras_domicilio= mysqli_num_rows($resultado_compras_domicilio);
$cantidad_compras_retira= mysqli_num_rows($resultado_compras_retira);
$total=$cantidad_ventas+$cantidad_compras_domicilio+$cantidad_compras_retira;
$total_cantidad_ventas=(($cantidad_ventas/$total)*100);
$total_cantidad_compras_domicilio=(($cantidad_compras_domicilio/$total)*100);
$total_cantidad_compras_retira=(($cantidad_compras_retira/$total)*100);
echo "[{
                        name: 'Ventas',
                        y: ".$total_cantidad_ventas.",
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Compras- Entrega a domicilio',
                        y: ".$total_cantidad_compras_domicilio."
                    },{
                        name: 'Compras- Retira del domicilio',
                        y: ".$total_cantidad_compras_retira."
                    }]";
?>