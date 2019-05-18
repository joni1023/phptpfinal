<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<header>
    <div class="barraSuperior" id="barraSuperior">
        <img src="img/logo-it.jpeg" alt="Foto_De_Logo" />
        <?php
session_start();
$usuario=$_SESSION['username'];
if(!isset($usuario)){
    header("location:index.php");

}else {
    echo "<p style='margin-top: 40px'>Usuario: $usuario</p>";

}?>
        <div class="separador"></div>
        <div class="acciones">
                        <span class="buscador">
                            <input type="text" name="buscador" id="buscador" placeholder="¿Que estás buscando?">
                        </span>
            <span class="botonBuscar">
                                <input type="submit" value=" ">
                        </span>
        </div>
        <div class="separador"></div>
        <div class="ver_carrito"><h3>Ver Carrito</h3></div>
        <div class="carrito">
            <div class="numero"><p>1</p></div>
        </div>
        <div class="separador"></div>
    </div>

    <div class="barraInferior">
        <ul>
            <li><a class="active" href="#">Inicio</a></li>
            <li><a href="#">Productos</a></li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </div>
</header>
<main>
    <div class="flecha">
        <a href="#barraSuperior">
            <img src="img/flechaArriba.png" alt="Flecha_Ir_Arriba" >
        </a>
    </div>

    <div class="banner"></div>

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