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
                            <li><a href="resumenUsuario.php">Mi cuenta</a></li>
                            <li><a href="vercarrito.php">Ver carrito</a></li>
                            <li><a href="resumenUsuario.php">Mis pedidos</a></li>
                            <li><a href="resumenUsuario.php">Ayuda</a></li>
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

<script src="js/mensajeria.js"></script>
<script src="js/main.js"></script>
<!-- validar login -->
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