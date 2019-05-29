
<?php

// Create database connection
$db = mysqli_connect("localhost", "root", "", "tp_pw");
$result = mysqli_query($db, "SELECT * FROM item");


while ($row = mysqli_fetch_array($result)) {
    echo"
<tr>
    <td>".$row['nombre']."</td>
    <td>".$row['descripcion']."</td>
    <td>".$row['categoria']."</td>
    <td><select class='form-control'>
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