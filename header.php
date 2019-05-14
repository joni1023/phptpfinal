<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js"></script>


</head>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Electro.</a>
            </div>
            <ul class="nav navbar-nav">

                <!--                <li class="active"><a href="#">Home</a></li>-->
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

