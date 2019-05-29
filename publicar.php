<!DOCTYPE html>
<html>
<head>
    <title>Imagenes</title>
    <script>
        var value=1;
        $('body').on('change', '#file1', function ()
        {
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file2', function ()
        {
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file3', function ()
        {
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file4', function ()
        {
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file5', function ()
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
            $('#image'+value)
                .attr('src', e.target.result);
        };
        function newfile(valor){
            value=valor;
            document.getElementById("file"+valor).click();
        }
    </script>
</head>
<body>
<h3>Publicar Producto</h3>
<div id="content">
    <div>
        <img id="image1" name="image1" onclick="newfile(1)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        <img id="image2" name="image2" onclick="newfile(2)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        <img id="image3" name="image3" onclick="newfile(3)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        <img id="image4" name="image4" onclick="newfile(4)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        <img id="image5" name="image5" onclick="newfile(5)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>

    </div>
    <form method="POST" action="insertarpublicacion.php" enctype="multipart/form-data">

        <div id="filediv1"><input name="image1" type="file" id="file1" style="display: none"/></div>
        <div id="filediv2"><input name="image2" type="file" id="file2" style="display: none"/></div>
        <div id="filediv3"><input name="image3" type="file" id="file3" style="display: none"/></div>
        <div id="filediv4"><input name="image4" type="file" id="file4" style="display: none"/></div>
        <div id="filediv5"><input name="image5" type="file" id="file5" style="display: none"/></div>
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