<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Suscribete para recibir nuestras <strong>PROMOCIONES</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Ingresa tu correo">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Suscribete</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="https://es-la.facebook.com/"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/?hl=es-la"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://ar.pinterest.com/"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Nosotros</h3>
                        <p>En Electro somos una empresa comprometida con nuestros usuarios y sus datos</p>
                        <ul class="footer-links">
                            <li><a style="cursor: default"><i class="fa fa-map-marker"></i>Florencio Varela 1903</a></li>
                            <li><a style="cursor: default"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a style="cursor: default"><i class="fa fa-envelope-o"></i>soporte@electro.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Informacion</h3>
                        <ul class="footer-links">
                            <li><a style="cursor: default">contactanos</a></li>
                            <li><a style="cursor: default">Politicas de privacidad</a></li>
                            <li><a style="cursor: default">Pedidos y Devoluciones</a></li>
                            <li><a style="cursor: default">Terminos y condiciones</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Servicios</h3>
                        <ul class="footer-links">
                            <li><a href="#">Mi cuenta</a></li>
                            <li><a href="#">Ver carrito</a></li>
                            <li><a href="#">Lista de deseos</a></li>
                            <li><a href="#">Mis pedidos</a></li>
                            <li><a href="#">Ayuda</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a style="cursor: default"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a style="cursor: default"><i class="fa fa-credit-card"></i></a></li>
                        <li><a style="cursor: default"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a style="cursor: default"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a style="cursor: default"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a style="cursor: default"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>


                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

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
<!--// main siempre ultimo-->
<script>
    function agregarProducto(item_id) {
        var cantidad = document.getElementById('cantidad').value;
        $.ajax({ url: 'agregar_producto_carrito.php',
            data: {id: item_id,cantidad:cantidad},
            type: 'post',
            success: function(data ) {
                location.reload();
            }
        });
    }
</script>
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
<!-- script del carrito-->
<script>
    function borrarProducto(id) {
        var confirmacion = confirm("Estas seguro de borrar este item?");

        if (confirmacion) {
            $.ajax({ url: 'borrar_producto_carrito.php',
                data: {id: id},
                type: 'post',
                success: function(data) {
                    alert("Producto eliminado");
                    location.reload();
                }
            });
        }
    }
</script>
<script src="js/main.js"></script>
<script >
    function Validar()
    {
        user=$('#usuario').val();
        pwd=$('#pass').val();
        if(user=="")
        {
            alert("El campo Usuario esta vacio");
            user.focus();
            return false;
        }
        else
        {
            if(pwd=="")
            {
                alert("El campo Constraseña esta vacio");
                pwd.focus();
                return false;
            }
            else
            {
                return true;
            }
        }
    }
</script>
</body>
</html>