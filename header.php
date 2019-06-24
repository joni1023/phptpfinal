<?php
require 'database.php';
$q="select * from item";
$consult=mysqli_query($conexion,$q);
$array=array();
while ($row=mysqli_fetch_array($consult)){
    $item=$row['nombre'];
    array_push($array,$item);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="#"><i class="fa fa-user-o"></i>
                        <?php
                        if (!isset($_SESSION)) session_start();
                        if(isset($_SESSION['username'])){
                            $nombre=$_SESSION['username'];
                            $carrito=$_SESSION['carrito'];
                            echo "<li><a style='cursor:pointer' id='carrito' href='vercarrito.php'><span class='glyphicon glyphicon-shopping-cart fa-lg'></span><asp:Label ID='lblCartCount' ForeColor='White'/>".$carrito."</a></li>";
                            echo"<li class='dropdown'>
    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-user'></span> ".$nombre."<span class='caret'></span></a>
    <ul class='dropdown-menu'>
        <li><a href='resumenUsuario.php'>Publicaciones</a></li>
        <li><a href='resumenUsuario.php'>Ventas</a></li>
        <li><a href='resumenUsuario.php'>Compras</a></li>
        <li><a href='#'>Mis datos</a></li>";
                            if(isset($_SESSION)){
                                if (isset($_SESSION['rol'])){
                                    if($_SESSION['rol']=="admin"){
                                        echo "<li role='separator' class='divider'></li>
                                          <li><a href='admin.php'>Configuracion</a></li>";
                                    }}
                            };
                            echo"</ul></li>";

                            echo "<li><a href='salir.php'>salir</a></li>";
                        }else{
                            echo "<li><a href='registrar.php'>Registrate</a> </li>";
                            echo "<li><a href='login.php'>Ingresá</a></li>";
                        }

                        ?>
                    </a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="index.php" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>

                </div>
                <!-- /LOGO -->

                <!-- BARRA DE BUSQUEDA -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form method="post" action="buscaritem.php">
                            <select class="input-select" id="buscarpor">
                                <option value="categoria">categoria</option>
                                <option value="producto">producto</option>
                                <option value="usuario">usuario</option>
                            </select>
                            <input class="input" placeholder="Buscame" list="buscados" id="buscar" name="itemb">
                            <datalist id="buscados" >
                            </datalist>
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /BARRA DE BUSQUEDA -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">3</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">View Cart</a>
                                    <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="#">Ofertas</a></li>
                <li><a href="#">Todas las Categorias</a></li>
                <?php
                require 'categorias.php'; ?>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->


<!--<head>-->
<!--    <meta charset="utf-8" />-->
<!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
<!---->
<!--    <script-->
<!--            src="https://code.jquery.com/jquery-3.4.1.min.js"-->
<!--            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="-->
<!--            crossorigin="anonymous"></script>-->
<!--    <script src="js/bootstrap.min.js"></script>-->
<!--    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
<!--    <link rel="stylesheet" href="css/jquery.ui.css">-->
<!--    <link rel="stylesheet" href="css/estilos.css">-->
<!---->
<!--</head>-->
<!--<header id="header">-->
<!--    <nav class="navbar navbar-inverse">-->
<!--        <div class="container-fluid">-->
<!--            <div class="navbar-header">-->
<!--                <img src="img/logo.png" width="45" height="45">-->
<!--            </div>-->
<!--            <div class="navbar-header">-->
<!--                <a class="navbar-brand" href="index.php">Electro.</a>-->
<!--            </div>-->
<!--            <ul class="nav navbar-nav">-->
<!--                --><?php
//                if(!isset($_SESSION)) session_start();
//                if(isset($_SESSION)){
//                    if (isset($_SESSION['rol'])){
//                            if($_SESSION['rol']=="admin"){
//
//                            }else{
//                                echo "<li class='active'><a href=''>vender</a></li>";
//                            }}
//                }
//
//            ?>
<!--            </ul>-->
<!--            <ul class="nav navbar-nav navbar-right">-->
<!---->
<!---->
<!---->
<!--            </ul>-->
<!--            <form method="post" action="buscaritem.php" class="navbar-form">-->
<!--                <div class="form-group" style="display:inline;">-->
<!--                    <div class="input-group" style="display:table;">-->
<!--                        <input class="form-control" id="buscar" name="itemb" placeholder="Buscar" type="text">-->
<!--                        <span class="input-group-addon" style="width:5%;"><button type="submit"><span class="glyphicon glyphicon-search" style="cursor:pointer"></span></button></span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </nav>-->
<!--</header>-->
<!--se agrego a lo ultimo-->
<script
        src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="js/buscar.js"></script>


