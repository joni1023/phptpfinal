<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

</head>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="img/logo.png" width="45" height="45">
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Electro.</a>
            </div>
            <ul class="nav navbar-nav">
                <?php
                if(!isset($_SESSION)) session_start();
                if(isset($_SESSION)){
                    if (isset($_SESSION['rol'])){
                        if($_SESSION['rol']=="admin"){
                            echo "<li class='active'><a href=''>administrar</a></li>";
                        }else{
                            echo "<li class='active'><a href=''>vender</a></li>";
                        }}
                }

                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="registrar.php">Registrate</a> </li>
                <?php
                if (!isset($_SESSION)) session_start();
                if(isset($_SESSION['username'])){
                    $nombre=$_SESSION['username'];
                    echo "<li><a href=''>".$nombre."</a> </li>";
                    echo "<li><a href='salir.php'>salir</a></li>";
                }else{
                    echo "<li><a href='login.php'>loguear</a></li>";
                }

                ?>

            </ul>
        </div>
    </nav>
</header>
<body>
<main>
    <div class="flecha">
        <a href="#barraSuperior">
            <img src="img/flechaArriba.png" alt="Flecha_Ir_Arriba" >
        </a>
    </div>

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
                            <img src="img/banner-computacion2.jpg" alt="Imagen 2">
                            <div class="carousel-caption"> Mi imagen 2 </div>
                        </div>

                        <div class="item">
                            <img src="img/banner-computacion3.jpg" alt="Imagen 3">
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

    <section>
        <h3 class="titulo">PRODUCTOS</h3>

        <article class="producto">
            <img src="img/001.jpg" alt="Producto1">
            <h2 class="nombre">Pendrive </h2>
            <div class="marca">8gb</div>
            <div class="precio">$326</div>
            <a href="#" class="btn">Agregar Al Carrito</a>
        </article>
        <article class="producto">
            <img src="img/002.jpg" alt="Producto2">
            <h2 class="nombre">Teclado </h2>
            <div class="marca">Gamer</div>
            <div class="precio">$420</div>
            <a href="#" class="btn">Agregar Al Carrito</a>
        </article>
        <article class="producto">
            <img src="img/003.jpg" alt="Producto3">
            <h2 class="nombre">Mouse </h2>
            <div class="marca">Gamer</div>
            <div class="precio">$312</div>
            <a href="#" class="btn">Agregar Al Carrito</a>
        </article>
        <article class="producto">
            <img src="img/004.jpg" alt="Producto4">
            <h2 class="nombre">Monitor </h2>
            <div class="marca">HP</div>
            <div class="precio">$4011</div>
            <a href="#" class="btn">Agregar Al Carrito</a>
        </article>
        <article class="producto">
            <img src="img/005.jpg" alt="Producto5">
            <h2 class="nombre">Disco Rigido </h2>
            <div class="marca">1 TeraByte</div>
            <div class="precio">$822</div>
            <a href="#" class="btn">Agregar Al Carrito</a>
        </article>
        <article class="producto">
            <img src="img/006.jpg" alt="Producto6">
            <h2 class="nombre">Impresora Epson</h2>
            <div class="marca">PD365</div>
            <div class="precio">$3850</div>
            <a href="#" class="btn">Agregar Al Carrito</a>
        </article>
        <article class="producto">
            <img src="img/007.jpg" alt="Producto7">
            <h2 class="nombre">Notebook Dell </h2>
            <div class="marca">Procesador Intel 5</div>
            <div class="precio">$18000</div>
            <a href="#" class="btn">Agregar Al Carrito</a>
        </article>
        <article class="producto">
            <img src="img/008.jpg" alt="Producto8">
            <h2 class="nombre">Kit Gamer </h2>
            <div class="marca">Monitor+CPU+Mouse+Teclado</div>
            <div class="precio">$45000</div>
            <a href="#" class="btn">Agregar Al Carrito</a>
        </article>
    </section>
</main>
<footer>

</footer>
</body>
</html>