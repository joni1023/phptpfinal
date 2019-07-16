<?php
require 'database.php';
if (!isset($_SESSION)) session_start();
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
    <style>
        #map {
            width: 500px;
            height: 300px;
        }


    </style>

    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
    <script > function vermsj(e) {

            $("#vermensaje"+ e ).toggle("slow");
        }
    </script >
    <script>
        function agregarProducto(item_id) {
            var cantidad = document.getElementById('cantidad').value;
            var sessionActive='<?php  if(isset($_SESSION['rol'])){echo "true";}else{echo"false";};?>';
            if(sessionActive==='true'){
                $.ajax({ url: 'agregar_producto_carrito.php',
                    data: {id: item_id,cantidad:cantidad},
                    type: 'post',
                    success: function(data ) {
                        location.reload();
                    }
                });
            }
            else {
                alert("Debe iniciar sesion para agregar productos al carrito!");
            }
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />






</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +549-115-555-4541</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> soporte@electroEcommerce.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Florencio Varela 1903</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li>

                    <?php
                    if (!isset($_SESSION)) session_start();
                    if(isset($_SESSION['username'])){
                    $nombre=$_SESSION['username'];
                    $carrito=$_SESSION['carrito'];
                    $user_id=$_SESSION['user_id'];?>
                <li><a href='resumenUsuario.php'><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Mensajes <?php
                            if($mensajesNLeidos=mysqli_query($conexion,"select * from mensaje inner join item on mensaje.id_item=item.id where leido is null and item.id_usuario='$user_id' and id_respuesta is null ;")){
                                $contadorM=mysqli_num_rows($mensajesNLeidos);
                                echo $contadorM;
                            }
                            ?></span></a></li>
                <?php     echo"<li class='dropdown' >
    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><i class='fa fa-user-o'></i> ".$nombre."<span class='caret'></span></a>
    <ul class='dropdown-menu' style='background-color: #1E1F29'>
        <li style='width: 100%;'><a class='dropdown-item' href='resumenUsuario.php'>Publicaciones</a></li>
        <li><a href='resumenUsuario.php'>Ventas</a></li>
        <li><a href='resumenUsuario.php'>Compras</a></li>
        <li><a href='modificar.php'>Mis datos</a></li>";
                if(isset($_SESSION)){
                    if (isset($_SESSION['rol'])){
                        if($_SESSION['rol']=="admin"){
                            echo "
                                        <li><a href='resumenUsuario.php'>Estadisticas</a></li>
                                        <li role='separator' class='divider'></li>
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
                </li>
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
                            <input class="input" placeholder="Buscar..." list="buscados" id="buscar" name="itemb" style="border-radius:40px 0px 0px 40px;">
                            <datalist id="buscados" >
                            </datalist>
                            <button class="search-btn">Buscar</button>
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
                                <span>Favoritos</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <?php if(isset($_SESSION['username'])){
                            echo "<div class='dropdown'>
                            <a class='dropdown-toggle' data-toggle='dropdown' aria-expanded='true'>
                                <i class='fa fa-shopping-cart'></i>
                                <span>Mi Carrito</span>
                                <div class='qty'>".$carrito."</div>
                            </a>
                            <div class='cart-dropdown'>
                                <div class='cart-list'>
                                    <div class='product-widget'>
                                        <div class='product-img'>
                                            <img src='./img/product01.png' alt=''>
                                        </div>
                                        <div class='product-body'>
                                            <h3 class='product-name'><a href='#'>product name goes here</a></h3>
                                            <h4 class='product-price'><span class='qty'>1x</span>$980.00</h4>
                                        </div>
                                        <button class='delete'><i class='fa fa-close'></i></button>
                                    </div>

                                    <div class='product-widget'>
                                        <div class='product-img'>
                                            <img src='./img/product02.png' alt=''>
                                        </div>
                                        <div class='product-body'>
                                            <h3 class='product-name'><a href='#'>product name goes here</a></h3>
                                            <h4 class='product-price'><span class='qty'>3x</span>$980.00</h4>
                                        </div>
                                        <button class='delete'><i class='fa fa-close'></i></button>
                                    </div>
                                </div>
                                <div class='cart-summary'>
                                    <small>3 Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class='cart-btns'>
                                    <a href='vercarrito.php'>Ver Carrito</a>
                                    <a href='#'>Revisa <i class='fa fa-arrow-circle-right'></i></a>
                                </div>
                            </div>
                        </div>";
                        }
                        ?>
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
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href='vercategorias.php?cat=Ofertas'>Ofertas</a></li>
                <li><a href='vercategorias.php?cat=Todas'>Todas las Categorias</a></li>
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


