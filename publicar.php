<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <script>
        $('body').on('change', '#file', function ()
        {
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        //image preview
        function imageIsLoaded(e)
        {
            $('#image1')
                .attr('src', e.target.result);
        };
    </script>
    <script>
        function newfile(){
            document.getElementById("file").click();
        }
    </script>
</head>
<body>
<h3>Publicar Producto</h3>
<div id="content">
    <div>
        <img id="image1" onclick="newfile()" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        <img id="image2" onclick="newfile()" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        <img id="image3" onclick="newfile()" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        <img id="image4" onclick="newfile()" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        <img id="image5" onclick="newfile()" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>

    </div>
    <form method="POST" action="insertarpublicacion.php" enctype="multipart/form-data">

        <div id="filediv"><input name="image" type="file" id="file" style="display: none"/></div>
        <div>
            <p>Nombre</p>
            <input type="text" name="nombre">
            <p>Descripcion</p>
            <input type="text" name="descripcion">
            <p>Categoria</p>
            <input type="text" name="categoria">
            <p>Estado</p>
            <input type="text" name="estado">
            <p>Precio</p>
            <input type="number" name="precio">
        </div>
        <div>
            <p></p>
            <button type="submit" name="publicar" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
</body>
</html>