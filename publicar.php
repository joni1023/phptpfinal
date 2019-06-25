<!DOCTYPE html>
<html>
<head>
    <title>Publicar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        var value=1;
        $('body').on('change', '#file1', function ()
        {
            var extension = $('#file1').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file1').val('');
                return false;
            }

            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file2', function ()
        {
            var extension = $('#file2').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file2').val('');
                return false;
            }
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file3', function ()
        {
            var extension = $('#file3').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file3').val('');
                return false;
            }
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file4', function ()
        {
            var extension = $('#file4').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file4').val('');
                return false;
            }
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file5', function ()
        {
            var extension = $('#file5').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file5').val('');
                return false;
            }
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file6', function ()
        {
            var extension = $('#file6').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file6').val('');
                return false;
            }
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file7', function ()
        {
            var extension = $('#file7').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file7').val('');
                return false;
            }
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file8', function ()
        {
            var extension = $('#file8').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file8').val('');
                return false;
            }
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file9', function ()
        {
            var extension = $('#file9').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file9').val('');
                return false;
            }
            if (this.files && this.files[0])
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);

            }
        });
        $('body').on('change', '#file10', function ()
        {
            var extension = $('#file10').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#file10').val('');
                return false;
            }
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
        function outputUpdate(vol) {
            document.querySelector('#dias').value = vol+' Dias';
        }
    </script>
</head>
<body>
<h3>Publicar Producto</h3>
<div id="content">
    <div style="display:-webkit-box;">
        <div>
            <img id="image1" name="image1" onclick="newfile(1)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <div>Imagen principal</div>
        </div>
        <div style="margin-left: 0.4rem;     display: list-item;">
            <img id="image2" name="image2" onclick="newfile(2)"  src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <img id="image3" name="image3" onclick="newfile(3)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <img id="image4" name="image4" onclick="newfile(4)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <img id="image5" name="image5" onclick="newfile(5)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <img id="image6" name="image6" onclick="newfile(6)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <img id="image7" name="image7" onclick="newfile(7)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <img id="image8" name="image8" onclick="newfile(8)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <img id="image9" name="image9" onclick="newfile(9)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
            <img id="image10" name="image10" onclick="newfile(10)" src='img/emptyproduct.png' style='width:120px; height: 150px; cursor: pointer;'>
        </div>

    </div>
    <form method="POST" action="insertarpublicacion.php" enctype="multipart/form-data" style="margin-top: 2rem">

        <div id="filediv1"><input name="image1" type="file" id="file1" style="display: none"/></div>
        <div id="filediv2"><input name="image2" type="file" id="file2" style="display: none"/></div>
        <div id="filediv3"><input name="image3" type="file" id="file3" style="display: none"/></div>
        <div id="filediv4"><input name="image4" type="file" id="file4" style="display: none"/></div>
        <div id="filediv5"><input name="image5" type="file" id="file5" style="display: none"/></div>
        <div id="filediv6"><input name="image6" type="file" id="file6" style="display: none"/></div>
        <div id="filediv7"><input name="image7" type="file" id="file7" style="display: none"/></div>
        <div id="filediv8"><input name="image8" type="file" id="file8" style="display: none"/></div>
        <div id="filediv9"><input name="image9" type="file" id="file9" style="display: none"/></div>
        <div id="filediv10"><input name="image10" type="file" id="file10" style="display: none"/></div>
        <div>
            <p>Nombre</p>
            <input type="text" required name="nombre">
            <p>Descripcion</p>
            <textarea maxlength="150" required name="descripcion" id="descripcion">
            </textarea>
            <p>Categoria</p>
            <input type="text" required name="categoria">
            <p>Precio</p>
            <input type="number" required name="precio">
            <br>
            <br>
            <label for="fader">Dias de publicacion</label>
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
</body>
</html>