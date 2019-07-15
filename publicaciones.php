<h3>Mis Publicaciones</h3>
<div class="container">
    <h2>Publicaciones Activas/Inactivas</h2>
    <p>Para realizar cambios en sus publicaciones, haga sus modificaciones en esta pantalla y luego presione guardar</p>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Estado</th>
            <th>Precio</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require 'database.php';
        $result = mysqli_query($conexion, "SELECT * FROM item where id_usuario=$user_id ");


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
         ?>
        </tbody>
    </table>
</div>