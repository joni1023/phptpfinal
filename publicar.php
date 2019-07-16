


<h3>Publicar Producto</h3>
    <div class="content">
    <form method="POST" action="insertarpublicacion.php" enctype="multipart/form-data" style="margin-top: 2rem">

        <div ><p>Imagen principal:</p><input name="image1" type="file" id="file1" /></div>
        <div ><p>Imagenes secundarias:</p><input name="image2" type="file" id="file2" /></div>
        <div ><input name="image3" type="file" id="file3" /></div>
        <div ><input name="image4" type="file" id="file4" /></div>
        <div ><input name="image5" type="file" id="file5" /></div>
        <div ><input name="image6" type="file" id="file6" /></div>
        <div ><input name="image7" type="file" id="file7" /></div>
        <div ><input name="image8" type="file" id="file8" /></div>
        <div ><input name="image9" type="file" id="file9" /></div>
        <div "><input name="image10" type="file" id="file10" style="display: none"/></div>
        <div>
            <p>Nombre</p>
            <input type="text" required name="nombre">
            <p>Descripcion</p>
            <textarea maxlength="150" required name="descripcion" id="descripcion">
            </textarea>
            <p>Categoria</p>
            <select name="categoria" required>
                <?php require 'database.php';
            $result=mysqli_query($conexion,"SELECT nombre FROM categorias");
            while ($row = mysqli_fetch_array($result)) {
                echo"<option value='". $row['nombre'] . "'>". $row['nombre'] . "</option>";
            } ?>
            </select>
            <br>
            <br>
            <p>Precio</p>
            <input type="number" required name="precio">
            <br>
            <br>
            <p>cantidad:</p>
            <input type="number" name="cantidad" required>
            <br>
            <br>
            <p for="fader">Dias de publicacion</p>
            <input type="range" min="0" max="100" style="width: 50%" name="dias" value="50" id="fader"
                   step="1" oninput="outputUpdate(value)">
            <output for="fader" id="dias">50 Dias</output>
            <br>
            <p>Metodo de Entrega:</p>
            <input type="radio" name="entrega" value="domicilio" checked> A domicilio
            <input type="radio" name="entrega"value="coordinar"> A coordinar de forma privada
        </div>
        <div>
            <br>
            <button type="submit" id="publicar" name="publicar" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
<!-- jQuery Plugins -->
