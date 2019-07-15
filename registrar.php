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
        <!--map-->
        <script>
            var feature;
            var map = L.map('map').setView([-34.603518, -58.381613], 15);
            // map.dragging.disable();
            map.touchZoom.disable();
            // map.doubleClickZoom.disable();
            // map.scrollWheelZoom.disable();
            // map.boxZoom.disable();
            //map.keyboard.disable();
            L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, <a href="http://www.jortilles.com">Jortilles</a>',
                maxZoom: 18
            }).addTo(map);

            function buscar() {
                if (navigator.geolocation) {
                    var timeoutVal = 10 * 1000 * 1000;
                    //navigator.geolocation.watchPosition(
                    navigator.geolocation.getCurrentPosition(
                        displayPosition,
                        displayError,
                        {enableHighAccuracy: false, timeout: timeoutVal, maximumAge: 0}
                    );
                } else {
                    alert("Geolocalización no soportada");
                }

                function displayPosition(position) {
                    var lati = position.coords.latitude;
                    var long = position.coords.longitude;
                    var pres = position.coords.accuracy;
                    var altu = position.coords.altitude;

                    jQuery(function () {
                        jQuery("#latitud").val(lati);
                        jQuery("#longitud").val(long);
                        // jQuery("#pre").val(pres);
                        // jQuery("#fecha").val(tiempo());
                        console.log(jQuery("#lat").val(), jQuery("#lng").val(), jQuery("#pre").val(), jQuery("#fecha").val());
                    });


                    L.marker([lati, long], {draggable: true}).addTo(map)
                    //.bindPopup("Ubicación del Usuario" + "</br> Hora:" + parseTimestamp(position.timestamp)+"</br> Ubicacion: lat"+ position.coords.latitude + ", long " + position.coords.longitude + ", precision " + position.coords.accuracy).openPopup();
                        .bindPopup('<p>Latitud:'+lati+'</p><p>Longitud:'+long+'</p>').openPopup();
                    L.control.scale().addTo(map);


                }

                function displayError(error) {
                    var errors = {
                        1: 'Permiso Denegado',
                        2: 'No fue posible obtener la ubicación',
                        3: 'Tiempo Agotado'
                    };
                    alert("Error: " + errors[error.code]);
                }

            }
            function direccion_buscador() {
                if(jQuery("#calle").val().length > 0 && jQuery("#calle").val().length > 0 && jQuery("#calle").val().length > 0){
                    var altura = document.getElementById("altura");
                    var calle = document.getElementById("calle");
                    var localidad=document.getElementById("localidad")
                    var entrada= calle.value + " "+ altura.value + " "+ localidad.value;

                    $.getJSON('http://nominatim.openstreetmap.org/search?format=json&limit=5&q=' + entrada, function(data) {
                        var items = [];

                        $.each(data, function(key, val) {
                            bb = val.boundingbox;
                            items.push("<li><a href='#' onclick='elegirDireccion(" + bb[0] + ", " + bb[2] + ", " + bb[1] + ", " + bb[3] + ",\"" + val.osm_type + "\",\""+ val.display_name +"\");return false;'>" + val.display_name + '</a></li>');
                        });

                        $('#resultado').empty();
                        if (items.length != 0) {
                            $('<p>', { html: "Resultados de la b&uacute;queda:" }).appendTo('#resultado');
                            $('<ul/>', {
                                'class': 'my-new-list',
                                html: items.join('')
                            }).appendTo('#resultado');
                        }else{
                            $('<p>', { html: "Ningun resultado encontrado." }).appendTo('#resultado');
                        }
                    });
                }
                else{ $('#resultado').empty();
                    $('<p>', { html: "los campos no estan rellenados." }).appendTo('#resultado');
                }
            }
            function elegirDireccion(lat1, lng1, lat2, lng2, tipo_osm, type) {
                var loc1 = new L.LatLng(lat1, lng1);
                var loc2 = new L.LatLng(lat2, lng2);
                var bounds = new L.LatLngBounds(loc1, loc2);
                var array = type.split(',');
                jQuery("#localidad").val(array[2]);
                jQuery("#calle").val(array[1]);
                jQuery("#altura").val(array[0]);
                jQuery("#latitud").val(lat1);
                jQuery("#longitud").val(lng2);

                if (feature) {
                    map.removeLayer(feature);
                }
                if (tipo_osm == "node") {
                    feature = L.circle( loc1, 80, {color: 'green', fill: false}).addTo(map);
                    map.fitBounds(bounds);
                    map.setZoom(18);
                }else{
                    if(tipo_osm == "way"){
                        feature= L.marker([lat1,lng2]).addTo(map);
                        map.fitBounds(bounds);

                    }else {
                        var loc3 = new L.LatLng(lat1, lng2);
                        var loc4 = new L.LatLng(lat2, lng1);

                        feature = L.polyline( [loc1, loc4, loc2, loc3, loc1], {color: 'red'}).addTo(map);
                        feature= L.marker([lat1,lng2]).addTo(map);
                        map.fitBounds(bounds);
                    }
                }
            }
            function borrarDatos() {
                jQuery("#localidad").val(null);
                jQuery("#calle").val(null);
                jQuery("#altura").val(null);
                jQuery("#latitud").val(null);
                jQuery("#longitud").val(null);

            }
        </script>

