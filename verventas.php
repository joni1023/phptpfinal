
<?php

// Create database connection
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$result = mysqli_query($db, "SELECT * FROM item where id_usuario=$user_id ");


while ($row = mysqli_fetch_array($result)) {
    if($row['estado']=='activo'){
        echo"<tr>";
    }
    else{
        echo"<tr bgcolor='#ff605b'>";
    }
        echo"
    <td>".$row['nombre']."</td>
    <td>".$row['descripcion']."</td>
    <td>".$row['categoria']."</td>
    <td><select id='estado_producto_".$row['id']."' onchange='cambio_de_estado(".$row['id'].")' class='form-control'>
    ";
    if($row['estado']=='activo'){
        echo"<option value='activo' selected>Activo</option>
        <option value='inactivo'>Inactivo</option>";
    }
    else{
        echo"<option value='activo' >Activo</option>
        <option value='inactivo' selected>Inactivo</option>";
    }
    echo"
</select></td>
    <td>".$row['precio']."</td>
</tr>";
}