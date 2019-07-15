
<?php
require 'header.php';
require 'database.php';
$product_id = $_GET['id'];
$result = mysqli_query($conexion, "SELECT * FROM imagen_item where id_item='$product_id'");
$resultslider = mysqli_query($conexion, "SELECT * FROM imagen_item where id_item='$product_id'");
$productdetail= mysqli_fetch_array(mysqli_query($conexion, "SELECT * FROM item where id='$product_id'"));
echo"
<input id='iditemM' name='iditem' value='".$product_id."' hidden>
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
                    <li><a data-toggle='tab' href='#tab4'>Mensajea(3)</a></li>
                        <li ><a data-toggle='tab' href='#tab1'>Description</a></li>
                        <li><a data-toggle='tab' href='#tab2'>Details</a></li>
                        <li class='active'><a data-toggle='tab' href='#tab3'>Ubicación del Producto</a></li>
                        
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
                        <div id='tab3' class='tab-pane fade in active'>
                            <div class='col-lg-12' style='height:200px;'>";?>
                                    <div id="mapa" style="height:200px;"></div>
                                     <?php
                                     echo"                                  
                                <!-- /Reviews -->
                                        <div class=\"col-lg-6\" >
                                        <div id = 'map'>
                                         </div>
                                    </div>
                                <!-- Review Form -->
                                <div class='col-md-3'>
                                    
                                         
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                        <!-- tab4  -->
                        <div id='tab4' class='tab-pane fade in '>
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
                    <h3 class='title'>Productos Relacionados</h3>
                </div>
            </div>";

$result=mysqli_query($conexion,"select * from item where categoria = (select categoria from item where id ='$product_id') LIMIT 4");
while ($row = mysqli_fetch_array($result)) {
    $resultImage = mysqli_fetch_array(mysqli_query($conexion, "SELECT imagen FROM imagen_item where id_item='$row[id]' and principal=1"));
echo"<!-- product -->
            <div class='col-md-3 col-xs-6'>
                <div class='product'>
                    <div class='product-img'>
                        <img src='data:image/jpeg;base64,".base64_encode($resultImage['imagen'] )."' alt=''>
                        <div class='product-label'>                            
                        </div>
                    </div>
                    <div class='product-body'>
                        <p class='product-category'>". $row['categoria'] . "</p>
                        <h3 class='product-name'><a href='#'>". $row['nombre'] . "</a></h3>
                        <h4 class='product-price'>$". $row['precio'] . "</h4>
                        <div class='product-rating'>
                        </div>
                        <div class='product-btns'>
                            <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>agregar a favoritos</span></button>
                        </div>
                    </div>
                    <div class='add-to-cart'>
                        <button class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> agregar al carrito</button>
                    </div>
                </div>
            </div>
            <!-- /product -->";
}

           echo"
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
";

$vendedorLtLon=mysqli_fetch_array(mysqli_query($conexion,"SELECT latitud,longitud from usuario inner join item on usuario.id=item.id_usuario where item.id=".$product_id." ;"));

                    require 'footer.php';?>
<script>

    var map = L.map('mapa').
    setView([<?php echo $vendedorLtLon['latitud'];?>,<?php echo $vendedorLtLon['longitud']; ?> ],14);

    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18
    }).addTo(map);

    L.control.scale().addTo(map);
    L.marker([<?php echo $vendedorLtLon['latitud'];?>,<?php echo $vendedorLtLon['longitud']; ?>]).addTo(map);

</script>

