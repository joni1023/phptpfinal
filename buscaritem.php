<?php
include 'database.php';
if(!isset($_POST)){
    header("location:index.php");
}
$item=$_POST['itemb'];
$query= "SELECT * FROM item 
inner join usuario
on item.id_usuario=usuario.id
WHERE categoria like '$item%' or usuario.nombre like '$item%' or item.nombre like '$item%'";
$consulta = mysqli_query($conexion,$query);
    require 'header.php';
?>

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Todas las Cstegorias</a></li>
                        <li><a href="#">Accesorios</a></li>
                        <li class="active"><?php echo $_POST['itemb']; ?> <?php $numresult=(mysqli_num_rows($consulta));

                            echo "(".$numresult." Resultados )" ; ?> </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categorias</h3>
                        <div class="checkbox-filter">

                            <?php require 'database.php';
                            $result=mysqli_query($conexion,"SELECT nombre FROM categorias");
                            $cont=1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo"<div class='input-checkbox'>
                                <input type='checkbox' id='category-".$cont."'>
                                <label for='category-".$cont."'>
                                    <span></span>
                                    ". $row['nombre'] . "
                                    <small>(120)</small>
                                </label>
                            </div>";
                                $cont++;
                            } ; ?>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Precio</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->



                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Mas Vendidos</h3>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product01.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Categoria</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product02.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product03.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Order Por:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Mostrar:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        <?php
while ($row = mysqli_fetch_array($consulta)) {
    $resultImage = mysqli_fetch_array(mysqli_query($conexion, "SELECT imagen FROM imagen_item where id_item='$row[id]' and principal=1"));

    echo "<div class='col-md-4 col-xs-6'>
                            <div class='product'>
                                <div class='product-img'>";
                                if(empty($resultImage['imagen'])){
                                    echo " <img src='./img/nodisponible.jpg' alt=''>";
                                }else{
                                    echo " <img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' alt=''>";
                                }

                            echo "<div class='product-label'>
                                        <span class='sale'>-30%</span>
                                        <span class='new'>nuevo</span>
                                    </div>
                                </div>
                                <div class='product-body'>
                                    <p class='product-category'>".$row['categoria']."</p>
                                    <h3 class='product-name'><a href=''>". $row['nombre'] . "</a></h3>
                                    <h4 class='product-price'>$". $row['precio'] ." <del class='product-old-price'> $990.00</del></h4>
                                    <div class='product-rating'>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                        <i class='fa fa-star'></i>
                                    </div>
                                    <div class='product-btns'>
                                        <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
                                        <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
                                        <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
                                    </div>
                                </div>
                                <div class='add-to-cart'>
                                    <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> Añadir </button>
                                </div>
                            </div>
                        </div>";
                        }
                        ?>
                        <!-- /product -->
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
<?php
require 'footer.php';
?>