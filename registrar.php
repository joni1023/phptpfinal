<!doctype html>

    <html>
        <head>
            <title>Formulario de Registro</title>
        </head>
        <style>
            #map {
                width: 500px;
                height: 300px;
            }
        </style>

        <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
        <?php
        require 'header.php';
        ?>
        <body>
        <div class="container">
            <h1> Formulario de Registro</h1>
            <h3>Los campos con * son obligatorios</h3>

 <form method="post" action="registro.php" class="form-row">
            <div class="col-lg-6">
                <h3>informacion personal</h3>
                <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-rounded" required>
                </div>
                <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" required>
                </div>
            <div class="form-group">
            <label>CUIL</label>
            <input type="text" name="cuil" required placeholder="20-17458521-1">
                </div>
            </div>
         <div class="col-lg-6" >
            <h3>Dato de cuenta</h3>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
            <label>Nick</label>
            <input type="text" name="nick" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="pass" required>
            </div>
            <div class="form-group">
                <label>Confirmacion de contraseña</label>
                <input type="password" name="repass" required>
            </div>
         </div>
            <div class="col-lg-12 " >

            </div>
        <div class="col-lg-6 " >
            <h3>direccion:</h3>
            <div class="form-group">
                <label>Calle</label>
                <input type="text" name="calle" id="calle" required>
            </div>

            <div class="form-group">
                <label>altura</label>
                <input type="text" id="altura" name="altura" pattern="{0-9}" required>
            </div>
            <div class="form-group">
                <label class="control-label">localidad</label>
                <input class="form-group" type="text" name="localidad" id="localidad" required>
                <input type="hidden" id="latitud" name="latitud">
                <input type="hidden" id="longitud" name="longitud">

            </div>
            <button type="button" onclick="borrarDatos()" class="btn btn-primary active col-lg-6">refrescar</button>
            <button type="button" class="btn btn-success col-lg-6 active" onclick="direccion_buscador();"><span class=" glyphicon glyphicon-search "></span>   Buscar direccion</button>
            <div id="resultado">
            </div>
        </div>
             <div class="col-lg-6" >
                            <div id = 'map'>
                            </div>
             </div>
     <div class="col-lg-6"></div>
     <div class="col-lg-6">
         <button type="button" class="btn btn-success active" onclick="buscar()"><span class="glyphicon glyphicon-map-marker"></span>   Geolocalizacion</button>

     </div>
            <div class="col-lg-12 ">

            <input type="submit" class="btn btn-primary btn-lg active" name="submit" value="Registrar">
            <input type="reset" class="btn btn-default btn-lg active" >
            </div>
        </div>
</form>
        </div>
        </body>


<?php

require 'footer.php';

?>


