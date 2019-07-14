<!-- section title -->
<div class="col-md-12">
    <div class="section-title">
        <h3 class="title">Nuevos productos</h3>
        <div class="section-nav">
            <ul class="section-tab-nav tab-nav">
                <?php
                require 'categoriasnav.php'; ?>
            </ul>
        </div>
    </div>
</div>
<!-- /section title -->

<!-- Products tab & slick -->
<div class="col-md-12">
    <div class="row">
        <div class="products-tabs">
            <!-- tab -->
            <?php
            $result=mysqli_query($conexion,"SELECT DISTINCT categoria FROM item");
            $counter = 1;
            while ($row = mysqli_fetch_array($result)) {
                if($counter == 1) {
                    echo"<div id='tab1' class='tab-pane active'><div class='products-slick' data-nav='#slick-nav-1'>";
                    $products=mysqli_query($conexion,"SELECT * FROM item WHERE categoria='".$row['categoria']."'");
                    while ($product = mysqli_fetch_array($products)) {
                        echo"<div class='product'>
                        <div class='product-img'>";
                        $resultImage = mysqli_fetch_array(mysqli_query($conexion, "SELECT imagen FROM imagen_item where id_item='$product[id]' and principal=1"));
                            echo"<img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' alt=''>
                            <div class='product-label'>
                                <span class='new'>NUEVO</span>
                            </div>
                        </div>
                        <div class='product-body'>
                            <p class='product-category'>".$product['categoria']."</p>
                            <h3 class='product-name'><a href='#'>".$product['nombre']."</a></h3>
                            <h4 class='product-price'>$".$product['precio']." </h4>
                            <div class='product-rating'>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star-o'></i>
                            </div>
                            <div class='product-btns'>
                                <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>Agregar a favoritos</span></button>
                                <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>Vista rapida</span></button>
                            </div>
                        </div>
                        <div class='add-to-cart'>
                            <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> Agregar al carrito</button>
                        </div>
                    </div>";
                    }
                    echo"</div><div id='slick-nav-1' class='products-slick-nav'></div></div>";
                }
                else
                {
                    echo"<div id='tab".$counter."' class='tab-pane'><div class='products-slick' data-nav='#slick-nav-".$counter."'>";
                    $products=mysqli_query($conexion,"SELECT * FROM item WHERE categoria='".$row['categoria']."' ORDER BY id DESC");
                    while ($product = mysqli_fetch_array($products)) {
                        echo"<div class='product'>
                        <div class='product-img'>";
                        $resultImage = mysqli_fetch_array(mysqli_query($conexion, "SELECT imagen FROM imagen_item where id_item='$product[id]' and principal=1"));
                        echo"<img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' alt=''>
                            <div class='product-label'>
                                <span class='new'>NUEVO</span>
                            </div>
                        </div>
                        <div class='product-body'>
                            <p class='product-category'>".$product['categoria']."</p>
                            <h3 class='product-name'><a href='#'>".$product['nombre']."</a></h3>
                            <h4 class='product-price'>$".$product['precio']." </h4>
                            <div class='product-rating'>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star'></i>
                                <i class='fa fa-star-o'></i>
                            </div>
                            <div class='product-btns'>
                                <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>Agregar a favoritos</span></button>
                                <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>Vista rapida</span></button>
                            </div>
                        </div>
                        <div class='add-to-cart'>
                            <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> Agregar al carrito</button>
                        </div>
                    </div>";
                    }
                    echo"</div><div id='slick-nav-".$counter."' class='products-slick-nav'></div></div>";
                }
                ++$counter;
            }

            ?>

        </div>
    </div>
</div>
<!-- Products tab & slick -->