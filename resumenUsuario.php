<?php
//para no ingresar a la pagina por la url
session_start();
if (!isset($_SESSION['rol'])){
    header("location:index.php");
}


require 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box}
        body {font-family: "Lato", sans-serif;}

        /* Style the tab */
        .tab {
            float: left;
            background-color: #ffffff;
            width: 15%;
            height: 300px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #dee3ea;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: #d8deea;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;
            width: 80%;
            border-left: none;
            height: 300px;
        }
    </style>
    <script>
        function cambio_de_estado(id) {
            estado = document.getElementById("estado_producto_"+id).value;
            $.ajax({ url: 'cambiar_estado_producto.php',
                data: {id: id,estado:estado},
                type: 'post',
                success: function(data ) {
                     location.reload();
                }
            });
        }
    </script>
</head>
<body>

<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'Publicar')" id="defaultOpen">Publicar</button>
    <button class="tablinks" onclick="openTab(event, 'Misventas')">Mis ventas</button>
    <button class="tablinks" onclick="openTab(event, 'Miscompras')">Mis compras</button>
    <button class="tablinks" onclick="openTab(event, 'Mispreguntas')">Mis preguntas</button>
</div>

<div id="Publicar" class="tabcontent">
    <?php
    require 'publicar.php';
    ?>
</div>

<div id="Misventas" class="tabcontent">
    <?php
    require 'ventas.php';
    ?>
</div>

<div id="Miscompras" class="tabcontent">
    <?php
    require 'compras.php';
    ?>
</div>
<div id="Mispreguntas" class="tabcontent">

</div>

<script>
    function openTab(evt, Name) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(Name).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<!--//funciona pra el buscador-->
<script
        src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="js/buscar.js"></script>
<script src="js/main.js"></script>
</body>

</html>

