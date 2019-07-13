
<?php
require 'header.php';
require 'database.php';
$product_id = $_GET['id'];
$result = mysqli_query($conexion, "SELECT * FROM imagen_item where id_item='$product_id'");
$resultslider = mysqli_query($conexion, "SELECT * FROM imagen_item where id_item='$product_id'");
$productdetail= mysqli_fetch_array(mysqli_query($conexion, "SELECT * FROM item where id='$product_id'"));
echo"
<!-- BREADCRUMB -->
<div id='breadcrumb' class='section'>
    <!-- container -->
    <div class='container'>
        <!-- row -->
        <div class='row'>
            <div class='col-md-12'>
                <ul class='breadcrumb-tree'>
                    <li><a href='#'>Todas las categorias</a></li>
                    <li class='active'><a href='#'>".$productdetail['categoria']."</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class='section'>
    <!-- container -->
    <div class='container'>
        <!-- row -->
        <div class='row'>
            <!-- Product main img -->
            <div class='col-md-5 col-md-push-2'>
                <div id='product-main-img'>
                ";
                    while ($row = mysqli_fetch_array($result))
                    {
                    echo"<div class='product-preview'>
                        <img src='data:image/jpeg;base64,".base64_encode($row['imagen'] )."'  alt=''>
                        </div>";
                    }
                echo "  
                    
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class='col-md-2  col-md-pull-5'>
                <div id='product-imgs'>
                 ";
                    while ($rowchild = mysqli_fetch_array($resultslider))
                    {
                    echo"<div class='product-preview'>
                        <img src='data:image/jpeg;base64,".base64_encode($rowchild['imagen'] )."'  alt=''>
                        </div>";
                    }
                    echo"

                    
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class='col-md-5'>
                <div class='product-details'>
                    <h2 class='product-name'>".$productdetail['nombre']."</h2>
                    <div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <a class='review-link' href='#'>10 Calificaciones</a>
                    </div>
                    <div>
                        <h3 class='product-price'>$".$productdetail['precio']." </h3>
                        <span class='product-available'>Con Stock</span>
                    </div>
                    <p> ".$productdetail['descripcion']."</p>

                    <div class='product-options'>
                        <label>
                            Tamaño
                            <select class='input-select'>
                                <option value='0'>X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class='input-select'>
                                <option value='0'>Red</option>
                            </select>
                        </label>
                    </div>

                    <div class='add-to-cart'>
                        <div class='qty-label'>
                            Cantidad
                            <div class='input-number'>
                                <input id='cantidad' type='number' value='1'>
                                <span class='qty-up'>+</span>
                                <span class='qty-down'>-</span>
                            </div>
                        </div>
                        <button onclick='agregarProducto(".$productdetail['id'].")' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> Agregar al carrito</button>
                    </div>

                    <ul class='product-btns'>
                        <li><a href='#'><i class='fa fa-heart-o'></i> Agregar a favoritos</a></li>
                    </ul>

                    <ul class='product-links'>
                        <li>Categoria:</li>
                        <li><a href='#'>".$productdetail['categoria']."</a></li>
                    </ul>

                    <ul class='product-links'>
                        <li>Share:</li>
                        <li><a href='#'><i class='fa fa-facebook'></i></a></li>
                        <li><a href='#'><i class='fa fa-twitter'></i></a></li>
                        <li><a href='#'><i class='fa fa-google-plus'></i></a></li>
                        <li><a href='#'><i class='fa fa-envelope'></i></a></li>
                    </ul>
                    ";

                    echo"
                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class='col-md-12'>
                <div id='product-tab'>
                    <!-- product tab nav -->
                    <ul class='tab-nav'>
                    <li class='active'><a data-toggle='tab' href='#tab4'>Mensajea(3)</a></li>
                        <li ><a data-toggle='tab' href='#tab1'>Description</a></li>
                        <li><a data-toggle='tab' href='#tab2'>Details</a></li>
                        <li><a data-toggle='tab' href='#tab3'>Reviews (3)</a></li>
                        
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class='tab-content'>
                        <!-- tab1  -->
                        <div id='tab1' class='tab-pane fade in'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <p>".$productdetail['descripcion']."</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id='tab2' class='tab-pane fade in'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id='tab3' class='tab-pane fade in'>
                            <div class='row'>
                                <!-- Rating -->
                                <div class='col-md-3'>
                                    <div id='rating'>
                                        <div class='rating-avg'>
                                            <span>4.5</span>
                                            <div class='rating-stars'>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star-o'></i>
                                            </div>
                                        </div>
                                        <ul class='rating'>
                                            <li>
                                                <div class='rating-stars'>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                </div>
                                                <div class='rating-progress'>
                                                    <div style='width: 80%;'></div>
                                                </div>
                                                <span class='sum'>3</span>
                                            </li>
                                            <li>
                                                <div class='rating-stars'>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star-o'></i>
                                                </div>
                                                <div class='rating-progress'>
                                                    <div style='width: 60%;'></div>
                                                </div>
                                                <span class='sum'>2</span>
                                            </li>
                                            <li>
                                                <div class='rating-stars'>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star-o'></i>
                                                    <i class='fa fa-star-o'></i>
                                                </div>
                                                <div class='rating-progress'>
                                                    <div></div>
                                                </div>
                                                <span class='sum'>0</span>
                                            </li>
                                            <li>
                                                <div class='rating-stars'>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star-o'></i>
                                                    <i class='fa fa-star-o'></i>
                                                    <i class='fa fa-star-o'></i>
                                                </div>
                                                <div class='rating-progress'>
                                                    <div></div>
                                                </div>
                                                <span class='sum'>0</span>
                                            </li>
                                            <li>
                                                <div class='rating-stars'>
                                                    <i class='fa fa-star'></i>
                                                    <i class='fa fa-star-o'></i>
                                                    <i class='fa fa-star-o'></i>
                                                    <i class='fa fa-star-o'></i>
                                                    <i class='fa fa-star-o'></i>
                                                </div>
                                                <div class='rating-progress'>
                                                    <div></div>
                                                </div>
                                                <span class='sum'>0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class='col-md-6'>
                                    <div id='reviews'>
                                        <ul class='reviews'>
                                            <li>
                                                <div class='review-heading'>
                                                    <h5 class='name'>John</h5>
                                                    <p class='date'>27 DEC 2018, 8:0 PM</p>
                                                    <div class='review-rating'>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star-o empty'></i>
                                                    </div>
                                                </div>
                                                <div class='review-body'>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='review-heading'>
                                                    <h5 class='name'>John</h5>
                                                    <p class='date'>27 DEC 2018, 8:0 PM</p>
                                                    <div class='review-rating'>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star-o empty'></i>
                                                    </div>
                                                </div>
                                                <div class='review-body'>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class='review-heading'>
                                                    <h5 class='name'>John</h5>
                                                    <p class='date'>27 DEC 2018, 8:0 PM</p>
                                                    <div class='review-rating'>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star'></i>
                                                        <i class='fa fa-star-o empty'></i>
                                                    </div>
                                                </div>
                                                <div class='review-body'>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class='reviews-pagination'>
                                            <li class='active'>1</li>
                                            <li><a href='#'>2</a></li>
                                            <li><a href='#'>3</a></li>
                                            <li><a href='#'>4</a></li>
                                            <li><a href='#'><i class='fa fa-angle-right'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class='col-md-3'>
                                    <div id='review-form'>
                                        <form class='review-form'>
                                            <input class='input' type='text' placeholder='Your Name'>
                                            <input class='input' type='email' placeholder='Your Email'>
                                            <textarea class='input' placeholder='Your Review'></textarea>
                                            <div class='input-rating'>
                                                <span>Your Rating: </span>
                                                <div class='stars'>
                                                    <input id='star5' name='rating' value='5' type='radio'><label for='star5'></label>
                                                    <input id='star4' name='rating' value='4' type='radio'><label for='star4'></label>
                                                    <input id='star3' name='rating' value='3' type='radio'><label for='star3'></label>
                                                    <input id='star2' name='rating' value='2' type='radio'><label for='star2'></label>
                                                    <input id='star1' name='rating' value='1' type='radio'><label for='star1'></label>
                                                </div>
                                            </div>
                                            <button class='primary-btn'>Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                        <!-- tab4  -->
                        <div id='tab4' class='tab-pane fade in active'>
                            <div class='row'>
                                <!-- Reviews -->
                                <div class='col-md-6'>
                                    <div id='reviews'>
                                        <ul class='reviews' id='mensajeria'>";

                                       echo "</ul>
                                        <ul class='reviews-pagination'>
                                            <li class='active'>1</li>
                                            <li><a href='#'>2</a></li>
                                            <li><a href='#'>3</a></li>
                                            <li><a href='#'>4</a></li>
                                            <li><a href='#'><i class='fa fa-angle-right'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->";
                                if(!isset($_SESSION['username'])){
                                    echo "<a href='login.php' class='primary-btn'>inicie sesion para poder mandar mensaje</a>";
                                }elseif($_SESSION['user_id']==$productdetail['id_usuario']){
                                   echo "<a href='resumenUsuario.php' class='primary-btn'>acceda a su panel de mensajes</a>";
                                }else{
                                    echo "
                                <!-- Review Form -->
                                <div class='col-md-6'>
                                    <div id='review-form'>
                                    <form class='review-form' id='form-mensaje'>
                                                <div class=''>
                                                <span>Enivar mensaje como </span>
                                                <div class=''>
                                                    <input id='metodomensaje' name='metodomensaje' value='publico' type='radio' checked>
                                                    <label>Publico</label>
                                                    <input id='metodomensaje' name='metodomensaje' value='privado' type='radio'> 
                                                    <label>Privado</label> 
                                                </div>
                                            </div>
                              <input id='iditem' name='iditem' value='".$product_id."' hidden>
                                            <input name='remitente' id='remitente' class='input' type='text' placeholder='".$_SESSION['username'] ."' value='".$_SESSION['username']."'>
                                            <textarea name='mensaje' id='mensaje' class='input' placeholder='Deja tu mensaje' autofocus></textarea>
                                            <button class='primary-btn' type='submit' >Enviar</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->";}
                                echo "
                            </div>
                        </div>
                        <!-- /tab4  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class='section'>
    <!-- container -->
    <div class='container'>
        <!-- row -->
        <div class='row'>

            <div class='col-md-12'>
                <div class='section-title text-center'>
                    <h3 class='title'>Related Products</h3>
                </div>
            </div>

            <!-- product -->
            <div class='col-md-3 col-xs-6'>
                <div class='product'>
                    <div class='product-img'>
                        <img src='./img/product01.png' alt=''>
                        <div class='product-label'>
                            <span class='sale'>-30%</span>
                        </div>
                    </div>
                    <div class='product-body'>
                        <p class='product-category'>Category</p>
                        <h3 class='product-name'><a href='#'>product name goes here</a></h3>
                        <h4 class='product-price'>$980.00 <del class='product-old-price'>$990.00</del></h4>
                        <div class='product-rating'>
                        </div>
                        <div class='product-btns'>
                            <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
                            <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
                            <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
                        </div>
                    </div>
                    <div class='add-to-cart'>
                        <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <!-- product -->
            <div class='col-md-3 col-xs-6'>
                <div class='product'>
                    <div class='product-img'>
                        <img src='./img/product02.png' alt=''>
                        <div class='product-label'>
                            <span class='new'>NEW</span>
                        </div>
                    </div>
                    <div class='product-body'>
                        <p class='product-category'>Category</p>
                        <h3 class='product-name'><a href='#'>product name goes here</a></h3>
                        <h4 class='product-price'>$980.00 <del class='product-old-price'>$990.00</del></h4>
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
                        <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <div class='clearfix visible-sm visible-xs'></div>

            <!-- product -->
            <div class='col-md-3 col-xs-6'>
                <div class='product'>
                    <div class='product-img'>
                        <img src='./img/product03.png' alt=''>
                    </div>
                    <div class='product-body'>
                        <p class='product-category'>Category</p>
                        <h3 class='product-name'><a href='#'>product name goes here</a></h3>
                        <h4 class='product-price'>$980.00 <del class='product-old-price'>$990.00</del></h4>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='product-btns'>
                            <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
                            <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
                            <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
                        </div>
                    </div>
                    <div class='add-to-cart'>
                        <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <!-- product -->
            <div class='col-md-3 col-xs-6'>
                <div class='product'>
                    <div class='product-img'>
                        <img src='./img/product04.png' alt=''>
                    </div>
                    <div class='product-body'>
                        <p class='product-category'>Category</p>
                        <h3 class='product-name'><a href='#'>product name goes here</a></h3>
                        <h4 class='product-price'>$980.00 <del class='product-old-price'>$990.00</del></h4>
                        <div class='product-rating'>
                        </div>
                        <div class='product-btns'>
                            <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
                            <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
                            <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
                        </div>
                    </div>
                    <div class='add-to-cart'>
                        <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
";
                    require 'footer.php';?>

