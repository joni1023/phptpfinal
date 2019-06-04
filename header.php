<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

</head>
<header id="header">
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

                            }else{
                                echo "<li class='active'><a href=''>vender</a></li>";
                            }}
                }

            ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php
                if (!isset($_SESSION)) session_start();
                if(isset($_SESSION['username'])){
                    $nombre=$_SESSION['username'];
                    $carrito=sizeof($_SESSION['carrito']);
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

            </ul>
            <form class="navbar-form">
                <div class="form-group" style="display:inline;">
                    <div class="input-group" style="display:table;">
                        <input class="form-control" name="buscar" placeholder="Buscar" autocomplete="off" type="text">
                        <span class="input-group-addon" style="width:5%;"><span class="glyphicon glyphicon-search" style="cursor:pointer"></span></span>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</header>

