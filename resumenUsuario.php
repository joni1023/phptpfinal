<?php
//para no ingresar a la pagina por la url
session_start();
if (!isset($_SESSION['rol'])){
    header("location:index.php");
}


 ?>
    <style>
        * {box-sizing: border-box}
        body {font-family: "Lato", sans-serif;}

        /* Style the tab */
        .tab {

            background-color: #ffffff;
            width: 15%;
            height: 100%;
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
            padding: 0px 12px;
            width: 100%;
            border-left: none;

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

<?php require 'header.php';?>
<div class="row">
<div class="col-lg-2 tab">
    <button class="tablinks" onclick="openTab(event, 'Publicar')" id="defaultOpen">Publicar</button>
    <button class="tablinks" onclick="openTab(event, 'MisPublicaciones')">Mis Publicaciones</button>
    <button class="tablinks" onclick="openTab(event, 'Misventas')">Mis ventas</button>
    <button class="tablinks" onclick="openTab(event, 'preguntasV')">Preguntas de Ventas</button>
    <button class="tablinks" onclick="openTab(event, 'MisPedidos')">Mis Pedidos</button>
    <button class="tablinks" onclick="openTab(event, 'Miscompras')">Mis compras</button>
    <button class="tablinks" onclick="openTab(event, 'preguntasC')">Preguntas de Compras</button>
    <button class="tablinks" onclick="openTab(event, 'Estadisticas')">Estadisticas</button>
</div>

<div id="Publicar" class="col-lg-10 tabcontent">
    <?php
    require 'publicar.php';
    ?>
</div>

<div  id="MisPublicaciones" class="col-lg-10 tabcontent">
    <?php
    require 'publicaciones.php';
    ?>
</div>
    <div id="Misventas" class="col-lg-10 tabcontent">
        <?php
        require 'misVentas.php';
        ?>
    </div>

    <div id="preguntasV" class="col-lg-10 tabcontent">
        <?php
        require 'preguntaVenta.php';
        ?>
    </div>
<div id="MisPedidos" class="col-lg-10 tabcontent">
        <?php
        require 'misPedidos.php';
        ?>
</div>
<div id="Miscompras" class="col-lg-10 tabcontent">
    <?php
    require 'compras.php';
    ?>
</div>
<div id="preguntasC" class="col-lg-10 tabcontent">
    <?php
    require 'preguntaCompra.php';
    ?>
</div>
    <div id="Estadisticas" class="col-lg-10 tabcontent">
        <?php
        require 'Estadisticas.php';
        ?>
    </div>
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



<?php require 'footer.php'; ?>