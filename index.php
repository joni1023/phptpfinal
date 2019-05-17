<?php
require 'header.php';?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <!-- aqui insertaremos el slider -->
            <div id="carousel1" class="carousel slide" data-ride="carousel">
                <!-- Indicatodores -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel1" data-slide-to="1"></li>
                    <li data-target="#carousel1" data-slide-to="2"></li>
                </ol>

                <!-- Contenedor de las imagenes -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                       <a href="login.php"> <img src="img/banner-computacion1.jpg" alt="Imagen 1"></a>
                        <div class="carousel-caption"> Mi imagen 1 </div>
                    </div>

                    <div class="item">
                        <img src="img/005.jpg" alt="Imagen 2">
                        <div class="carousel-caption"> Mi imagen 2 </div>
                    </div>

                    <div class="item">
                        <img src="img/003.jpg" alt="Imagen 3">
                        <div class="carousel-caption"> Mi imagen 3 </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>

            </div>


        </div>
    </div>
</div>



</body>


<?php

require 'footer.php';
?>